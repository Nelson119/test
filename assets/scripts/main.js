/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        $('.burg').on('click', function(){
          $(this).toggleClass('menu-opened');
          $('.wrap.container,footer .social').toggleClass('blur');
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // console.log($.easing.easeOutQuart);
        var animations = ['jello','wobble','tada','swing','swing','shake','rubberBand','pulse','bounce'];
        var animateIcons = $('.main-grid svg');
        var lastIcon = null;

        function randomIconAnimate(){

          if($(window).width() < 1170 || $('html.ie').length){
            return;
          }
          var rand = animateIcons[Math.floor(Math.random() * animateIcons.length)];
          var ani = animations[Math.floor(Math.random() * animations.length)];
          $(rand).attr('class','animated ' + ani);

          if(rand === lastIcon){
            randomIconAnimate();
            return;
          }

          lastIcon = rand;
          setTimeout(function(){
            if(rand){
              $(rand).removeAttr('class');
            }
          } , 1500);
        }

        var iconInterval = setInterval(randomIconAnimate, 5000 * Math.random() + 3000);
        randomIconAnimate();

        $('main .kv').slick({
          dots: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          // variableWidth: true,
          fade: true,
          speed: 1250,
          arrows: false
        });

        $('.kv .slick-dots li').unbind('click').on('click', function(){
          var idx = $(this).index();
          if(idx === $('.kv .slick-dots .slick-active').index()){
            return;
          }
          var leave = $('.kv .slick-list .slick-slide').eq($('.kv .slick-dots .slick-active').index()).find('article');
          var target = $('.kv .slick-list .slick-slide').eq(idx).find('article');
          var tl = new TimelineMax();
          if($(window).width() > 768){
            tl.set(target, {x:-768,opacity:0});
            tl.add([TweenMax.to(leave,0.5, {x:-768,opacity:0})]);
            tl.add([function(){
              $('main .kv').slick('slickGoTo', idx);
            }]);
            tl.add([TweenMax.to(target,0.5, {x:0,opacity:1,delay:0.5})]);
          }else{
            tl.set(target, {x:768,opacity:0});
            tl.add([TweenMax.to(leave,0.5, {x:768,opacity:0})]);
            tl.add([function(){
              $('main .kv').slick('slickGoTo', idx);
            }]);
            tl.add([TweenMax.to(target,0.5, {x:0,opacity:1,delay:0.5})]);
          }
        });

        $('main .main-grid >ul >li:not(:eq(3)) figure').slick({
          dots: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          speed: 750,
          fade: true,
          cssEase: 'linear',
          arrows: false
        });

        $('main .main-grid >ul >li:eq(3) figure').slick({
          dots: false,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          speed: 750,
          fade: true,
          cssEase: 'linear',
          arrows: false
        });
        
        $('main .main-grid >ul >li:not(.arrow-left):not(.arrow-right)').hover(function(){
          $(this).addClass('hint');
        }, function(){
          $(this).removeClass('hint');
        });
        $('main .main-grid >ul >li.arrow-left').hover(function(){
          $(this).prev().addClass('hint');
        }, function(){
          $(this).prev().removeClass('hint');
        });
        $('main .main-grid >ul >li.arrow-right').hover(function(){
          $(this).next().addClass('hint');
        }, function(){
          $(this).next().removeClass('hint');
        });
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'about': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // console.log($.easing.easeOutQuart);
        var leaders = $('.member-list li.leaders');
        var members = $('.member-list li:not(.leaders)');
        var memberArr = [];
        members.each(function(i, member){
          memberArr.push(member);
        });

        $('.member-list li').remove();
        $.each(leaders, function(i, leader){
          if(i === leaders.length-1 && leaders.length % 2 !== 0){
            var conatiner = $('<aside></aside>').addClass('col-lg-12');
            var insertTo = Math.floor(Math.random() * 5);
            if(memberArr.length < 5){
              insertTo = Math.floor(Math.random() * memberArr.length);
            }
            var cursor = 0;
            while(memberArr.length){
              if(insertTo === cursor){
                conatiner.append($(leader).clone());
              }else{
                conatiner.append($(memberArr.pop()).clone());                
              }
              cursor++;
            }
            $('.member-list').append(conatiner);
            conatiner.isotope({ layoutMode: 'masonry' });
          }
          else{
            var square = $('<aside></aside>').addClass('col-lg-6');
            var total = 6;
            var indexOfLeader = Math.floor(Math.random() * 5 + 2);
            while(total){
              if(indexOfLeader === total){
                square.append($(leader).clone().removeClass('col-lg-4').addClass('col-lg-8'));
              }else{
                square.append($(memberArr.pop()).clone().removeClass('col-lg-2').addClass('col-lg-4'));
              }
              total--;
            }
            $('.member-list').append(square);
            if(indexOfLeader < 6){
              square.isotope({ layoutMode: 'masonry' });
            }
          }
        });
        // $('.member-list').isotope({ layoutMode: 'masonry' });
        // JavaScript to be fired on the home page, after the init JS
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

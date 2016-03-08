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
          if($(this).hasClass('menu-opened')){
            $(this).removeClass('menu-opened');
            $('.wrap.container,footer .social').removeClass('blur');
          }else{
            $(this).addClass('menu-opened');
            $('.wrap.container,footer .social').addClass('blur');
            $('.search-input').removeClass('on');
          }
        });
        $('.nav.search .search').on('click', function(){
          $('.search-input').addClass('on');
          $('.burg').removeClass('menu-opened');
          $('.wrap.container,footer .social').addClass('blur');
          $('.search-input input').trigger('focus').one('blur', function(){
            $('.search-input').removeClass('on');
            $('.wrap.container,footer .social').removeClass('blur');
          });
        });
        $('.close-search').on('click', function(){
          $('.search-input').removeClass('on');
          $('.wrap.container,footer .social').removeClass('blur');
        });
        $('.taxonomy').on('click', function(){
          if($(window).width() < 1170){
            $(this).toggleClass('on');
          }else{
            $(this).removeClass('on');
          }
        });

        $(window).on('resize', function(){
            if($(window).width() < 768){
              if($('.burg').hasClass('menu-opened')){
                $('.burg').removeClass('menu-opened');
              }
              if($('.wrap.container').hasClass('blur')){
                $('.wrap.container').removeClass('blur');
              }
              if($('footer .social').hasClass('blur')){
                $('footer .social').removeClass('blur');
              }
              if($('.search-input').hasClass('on')){
                $('.search-input').removeClass('on');
              }
            }
        }).trigger('resize');
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
        var animations = ['jello','wobble','tada','swing','shake','rubberBand','pulse','bounce'];
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
          autoplay: true,
          autoplaySpeed: 4750,
          slidesToScroll: 1,
          // variableWidth: true,
          fade: true,
          speed: 750,
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
          autoplay: true,
          autoplaySpeed: 4250,
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
          autoplaySpeed: 3750,
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
        // fake ;
        for(var i=0;i<5; i++){
          $('.member-list').append($('.member-list li:not(.leaders)').clone()); 
        }
        for(var j=0;j<2; j++){
          $('.member-list').append($('.member-list li.leaders').clone()); 
        }
        //--
        var joinus = $('.member-list li.joinus').clone().first();
        $('.member-list li.joinus').remove();
        var leaders = $('.member-list li.leaders').clone();
        var members = $('.member-list li:not(.leaders)').clone();

        function renderList(){

          var memberArr = [];
          members.each(function(i, member){
            memberArr.push($(member).clone());
          });
          if($(window).width() >= 1170 ){
            if($('.member-list').hasClass('lg')){
              return ;
            }
            $('.member-list >*').remove();
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
                conatiner.append(joinus.removeAttr('class').addClass('joinus col-lg-2 col-md-2'));
                $('.member-list').append(conatiner);
                if(insertTo !== 0){
                  conatiner.isotope({ layoutMode: 'masonry' });
                }
              }else{
                var square = $('<aside></aside>').addClass('col-lg-6 col-md-6');
                var total = 6;
                var indexOfLeader = Math.floor(Math.random() * 5 + 2);
                while(total){
                  if(indexOfLeader === total){
                    square.append($(leader).clone().removeAttr('class').addClass('leaders col-lg-8 col-md-8'));
                  }else{
                    square.append($(memberArr.pop()).clone().removeAttr('class').addClass('col-lg-4 col-md-4'));
                  }
                  total--;
                }
                $('.member-list').append(square);
                if(indexOfLeader < 6){
                  square.isotope({ layoutMode: 'masonry' });
                }
              }
            });
            var c1 = $('<aside></aside>').addClass('col-lg-12');
            while(memberArr.length){
              c1.append( memberArr.pop().removeAttr('class').addClass('col-lg-2 col-md-2'));
            }
            if(leaders.length % 2 === 0){
              c1.append(joinus.removeAttr('class').addClass('joinus col-lg-2 col-md-2'));
            }
            $('.member-list').removeClass('sm xs').addClass('lg');
            $('.member-list').append(c1);

          }else if($(window).width() < 1170 && $(window).width() >= 768 ){
            if($('.member-list').hasClass('sm')){
              return ;
            }
            $('.member-list >*').remove();
            $.each(leaders, function(i, leader){
                var square = $('<aside></aside>').addClass('col-sm-6');
                var total = 5;
                var indexOfLeader = Math.floor(Math.random() * 2) * 2 + 1;
                while(total){
                  if(indexOfLeader === total){
                    square.append($(leader).clone().removeAttr('class').addClass('leaders col-sm-12'));
                  }else{
                    square.append($(memberArr.pop()).clone().removeAttr('class').addClass('col-sm-6'));
                  }
                  total--;
                }
                $('.member-list').append(square);
            });
            var c2 = $('<aside></aside>').addClass('col-sm-12');
            while(memberArr.length){
              c2.append( memberArr.pop().removeAttr('class').addClass('col-sm-3'));
            }
            c2.append(joinus.removeAttr('class').addClass('joinus col-sm-3'));
            $('.member-list').removeClass('lg xs').addClass('sm');
            $('.member-list').append(c2);
          }else if($(window).width() < 768 ){

            if($('.member-list').hasClass('xs')){
              return ;
            }
            $('.member-list >*').remove();
            var c3 = $('<aside></aside>').addClass('col-xs-12');
            var total = leaders.length + memberArr.length;
            var leaderIndexes = [];
            var currentLeader = 0;
            while(total){
              var rand = Math.floor(Math.random() * 1000)  > 500;
              if(rand && leaders.length > currentLeader){
                var leader = leaders[currentLeader];
                c3.append($(leader).clone().removeAttr('class').addClass('leaders col-xs-12'));
                currentLeader++;
              }else if(memberArr.length === 1 && leaders.length > currentLeader + 1){
                var leader = leaders[currentLeader];
                c3.append($(leader).clone().removeAttr('class').addClass('leaders col-xs-12'));
                currentLeader++;
              }else{
                var member1 = memberArr.pop();
                var member2 = memberArr.pop();
                if(member1){
                  c3.append($(member1).clone().removeAttr('class').addClass('col-xs-6'));
                }
                if(member2){
                  c3.append($(member2).clone().removeAttr('class').addClass('col-xs-6'));
                }
              }
              total--;
            }
            $('.member-list').append(c3);
            while(memberArr.length){
              c3.append( memberArr.pop().removeAttr('class').addClass('col-sm-3'));
            }
            c3.append(joinus.removeAttr('class').addClass('joinus col-xs-6'));
            $('.member-list').removeClass('lg sm').addClass('xs');
            $('.member-list').append(c3);

          }
          $('.member-list a').on('click', function(ev){
            var o = this;
            var info = $(o).parents('li');

            $('li.flip').not(info).removeClass('flip');
            setTimeout(function(){
              $('li.flip').not(info).removeClass('right')
                .removeClass('left')
                .removeClass('bottom')
                .removeClass('top');
            }, 450);

            var classes = [];
            classes.push('flip');
            if(!info.hasClass('flip')){
              if(!info.hasClass('leaders')){
                if(ev.clientX > $(window).width() / 2){
                  classes.push('right');
                }else{
                  classes.push('left');
                }
                var isTopRow = Math.round(Math.abs($(o).offset().top - $('.member-list').offset().top)) === 3;
                var isBottomRow = 
                  Math.round(Math.abs($(o).offset().top - $('.member-list').offset().top)) === 
                    $('.member-list').outerHeight() - $(o).outerHeight() - 3;
                if(isTopRow){
                  classes.push('top');
                }
                else if(isBottomRow){
                  classes.push('bottom');
                }
                else if(ev.clientY > $(window).height() / 2){
                  classes.push('bottom');
                }else{
                  classes.push('top');
                }
              }
              for(var i in classes){
                info.addClass(classes[i]);
              }
            }else{
              info.removeClass('flip');
              setTimeout(function(){
                info.removeClass('right')
                  .removeClass('left')
                  .removeClass('bottom')
                  .removeClass('top');
              }, 450);
            }
          });
        }
        renderList();

        $(window).on('resize', renderList);
      }
    },
    'archive': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // $('.kv nav ul').on('init', function(){
        //   $(this).slick('slickGoTo', 0);
        // });
        $('.kv .background ul').slick({ dots: false, arrows: false, fade:true, speed: 800 });
        $('.kv nav ul').slick({ asNavFor: '.kv .background ul', dots: true, fade:true, speed: 800 });

      }
    },
    'single': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        $('.kv.columns ul').slick({ dots: true, arrows: false, fade:true, speed: 800 });
        // $('.kv.videos a').colorbox({iframe:true, innerWidth:800, innerHeight:540});

        $('.share').on('click', function(){
          $(this).parent().toggleClass('on');
        });

        $('.lg-backdrop,.lg-outer').remove();
        $('.single-videos .kv.videos a').unbind('click').on('click', function(e){
          if($(window).width() < 768){
            return true;
          }
          e.preventDefault();
          console.log(e);
          var data = [];
          data.push({
              src: $(this).attr('href'),
              subHtml: $(this).attr('data-sub-html')
          });

          $(window).lightGallery({
            thumbnail: true,
            dynamic: true,
            mode: 'lg-lollipop',
            appendSubHtmlTo: '.lg-video',
            fullScreen: false,
            controls: false,
            download: false,
            counter: false,
            zoom: false,
            dynamicEl: data,
            loadYoutubeThumbnail: true,
            loadVimeoThumbnail: true,
            youtubeThumbSize: 'maxresdefault',
            youtubePlayerParams: {
                modestbranding: 1,
                showinfo: 0,
                rel: 0,
                controls: 1
            },
            vimeoPlayerParams: {
                byline: 0,
                portrait: 0,
                color: 'fe805b'
            },
            videoMaxWidth: 950
          }); 
          return false;
        });
      }
    },
    'contact': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        $('.jobs-container').slick({
          dots: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          speed: 750,
          fade: true,
          cssEase: 'linear',
          arrows: true
        });
        $('#qa .panel-heading').unbind('click').on('click', function(){
          var collapsed = $('a', this).hasClass('collapsed');
          var collapse = $(this).parents('.panel').find('.panel-collapse');
          var h = collapse.find('.panel-body').outerHeight();
          var panel = $(this).parents('.panel');
          
          if(collapsed){
            $('a', this).removeClass('collapsed');
            collapse.height(h);
            panel.siblings().find('.panel-collapse').height(0);
            panel.siblings().find('a').addClass('collapsed');
          }else{
            $('a', this).addClass('collapsed');
            collapse.height(0);
          }

        }).first().trigger('click');  

        $('#tab-tedx-in-taiwan ul').slick({
          dots: true,
          vertical: true,
          infinite: true,
          slidesToShow: 6,
          slidesToScroll: 6,
          speed: 1,
          // fade: true,
          cssEase: 'linear',
          arrows: false
        });
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

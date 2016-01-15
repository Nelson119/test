
<?php $theme_path = get_template_directory_uri() . '/dist/'?>

<section class="mmenu-head">
  <aside>
    <a id="mm" href="javascript:"><i class="fa fa-bars"></i></a>
    <a class="logo" href="./"><img class="svg" alt="" src="<?php echo $theme_path?>images/common/logo.svg"></a>
    <a class="search" href="javascript:"><img src="<?php echo $theme_path?>images/common/search.svg"></a>
  </aside>
  <form role="search" action="/search.html" method="get" class="search_form" id="search_form">
    <input type="search" placeholder="Search" name="s" class="search_inp">
    <input type="submit" role="button" class="search_sub mover"></form>
</section>
<?php if( is_front_page()):?>
<section id="kv" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <ul class="">
    <li><a href="javascript:"><img src="<?php echo $theme_path?>images/kv/banner1.png"></a></li>
    <li><a href="javascript:"><img src="<?php echo $theme_path?>images/kv/banner1.png"></a></li>
    <li><a href="javascript:"><img src="<?php echo $theme_path?>images/kv/banner1.png"></a></li>
  </ul>
</section>
<?php endif ?>
<header>
  <section class="fit">
    <a class="logo" href="<?php echo get_site_url()?>"><img class="svg" alt="" src="<?php echo $theme_path?>images/common/logo.svg"></a>
    <aside>
      <nav id="menu">
        <?php html5blank_nav(); ?>
        <ul class="social">
          <li class="no-child"><a target="_blank" href="http://instagram.com"><img src="<?php echo $theme_path?>images/common/ig.svg"></a></li>
          <li class="no-child"><a target="_blank" href="http://facebook.com"><img src="<?php echo $theme_path?>images/common/fb.svg"></a></li>
          <li class="no-child"><a target="_blank" href="http://pinterest.com"><img src="<?php echo $theme_path?>images/common/p.svg"></a>
          </li>
          <li class="search"><a href="javascript:"><img src="<?php echo $theme_path?>images/common/search.svg"></a>
            <div>
              <section class="center">
                <i class="fa fa-search"></i><input name="search-term" placeholder="Search anytime by typing">
              </section>
            </div>
          </li>
        </ul>
      </nav>
      <section class="marquee">

        <div class="container cd-headline letters type">
          <ul class="cd-words-wrapper waiting">
            <li><span>// </span></li>
            <li>
              <?php 
                $wp_query =  new WP_Query( array( 'pagename' => 'home' ) );

                if ($wp_query->have_posts()) : $wp_query->the_post();
                  $cfs = CFS();
                  $marquees = $cfs->get('marquee');
                  if(count($marquees)) {
                    $first = true;
                    foreach ($marquees as $mq) {
                      ?><a  <?php if($first) echo 'class="is-visible" '?>target="_blank" href="<?php echo $mq['link']?>"><?php echo $mq['text']?></a>
                    <?php 
                      $first = false;
                    }

                  }
                endif;
                wp_reset_query();
              ?>
            </li>
            <li><span>//</span></li>
          </ul>
        </div>
      </section>
      <section class="overlay"></section>
    </aside>
  </section>
</header>
<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php if (have_posts()) : the_post(); ?>
  <section class="page vendors">
    <div class="container main-content">
      <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
      <div class="col-lg-12 header-buff">
        <section class="row">
          <section class="col-lg-12">
            <span class="category"><?php echo CFS()->get('tagline')?></span>
            <h3><?php the_title(); ?></h3>
          </section>
        </section>
        <section class="row">
          <article class="col-lg-9">
            <section id="gallery">
              <a class="zoom" href="javascript:"><img src="<?php echo $theme_path?>images/common/zoom.png"></a>
              <ul class="slides">
              <?php 
                $cfs = CFS();
                $pictures = $cfs->get('gallery');
                if(count($pictures)) {
                  foreach ($pictures as $picture) {
                    ?>
                      <li><figure style="background-image:url(<?php echo $picture['image']?>)"><img src="<?php echo $picture['image']?>"></figure></li>
                  <?php }

                }?>
              </ul>
              <ol class="slide-thumb">
                <?php 
                  if(count($pictures)) {
                    foreach ($pictures as $picture) {
                      ?>
                      <li><figure style="background-image:url(<?php echo $picture['image']?>)"><img src="<?php echo $picture['image']?>"></figure></li>
                    <?php }

                  }?>
              </ol>
            </section>
            <?php the_content();?>
            <aside class="text-center">
              <aside class="pagination">
              <?php wp_link_pages(array(
                'before' => '' . __(''),
                'after' => '',
                'next_or_number' => 'next_and_number', # activate parameter overloading
                'nextpagelink' => __('<span class="nextpostslink"><img src="/wp-content/themes/sage-theme/dist/images/common/next.png"></span>'),
                'previouspagelink' => __('<span class="previouspostslink"><img src="/wp-content/themes/sage-theme/dist/images/common/prev.png"></span>'),
                'pagelink' => '<span class="page-number">%</span>',
                'echo' => 1 )
              );?>
              </aside>
            </aside>
          </article>
          <aside class="side col-lg-3 col-md-12 col-sm-12 col-xs-12 pull-right text-left">
            <section class="row">
                <?php 
                    $cfs = CFS();
                    $side = $cfs->get('side');
                    if(count($side)) {
                      foreach ($side as $s) {
                        ?>
              <div class="vendor-about">
                <hr>
                <span class="tagline"><?php echo $s['headline'] ?></span>
                <?php if ($s['image'] != '' || $s['image'] != null) :?>
                <img class="logo" src="<?php echo $s['image']?>">
                <?php endif?>
                <p class="description text-left"><?php echo $s['content']?></p>
              </div>

                      <?php 
                      }
                    }
                ?>
            </section>
          </aside>
        </section>
        <section class="row">
          <article class="col-lg-9">
            <div class="fb-like" data-href="<?php echo get_the_permalink()?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            <hr class="comments-top">
            <div class="comments">
              <div class="fb-comments" data-href="<?php echo get_the_permalink()?>" data-width="100%" data-numposts="5"></div>
            </div>
          </article>
        </section>
      </div>
    </div>
      
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev icon-left-open-big"></a>
        <a class="next icon-right-open-big"></a>
        <a class="close"><i class="icon-right-open-big"></i><i class="icon-left-open-big"></i></a>
        <ol class="indicator"></ol>
    </div>
  </section>
<?php endif ?>

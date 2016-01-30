<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
?>
    <section class="page home">
      <div class="container">
        <section class="reports three-col col-lg-12">
          <h3 class="col-lg-12"><b>REPORT</b><span>專題報導</span></h3>
          <section class="row">
            <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="row">
                <?php 
                  $wp_query = new WP_Query (array (
                      'post_type' => 'report',
                      'posts_per_page' => 3,
                      'orderby' => 'date',
                      'order' => 'desc',
                      'paged' => 1
                  ));

                  while ($wp_query->have_posts()) : $wp_query->the_post(); 
                    $summary = types_render_field("summary",array("raw"=>true));
                    if($summary == null || $summary == ""){
                      $summary = get_the_content();
                      if(strlen($summary) > 42){
                        $summary = wp_trim_words( get_the_content(), 41 );
                      }
                    }
                    $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                    if($thumbnail == null || $thumbnail == ""){
                      $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                    }
                    $terms = wp_get_post_terms( get_the_ID(), '專題報導',  array("fields" => "names") ); 
                    if(count($terms) >0){
                      $term_name = $terms[0];
                      $term_link = get_term_link($term_name, '專題報導' );
                    }
                  ?>
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                  <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo $term_link?>"><?php echo $term_name?></a>
                  <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
                  <aside>
                    <a style="background-image:url(<?php echo $thumbnail?>)" class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="<?php echo get_the_permalink()?>"><i></i></a>
                    <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
                    <p class="col-lg-12"><?php echo $summary?></p>
                  </aside>
                </li>
                <?php endwhile?>
                <?php wp_reset_query(); ?>
              </ul>
            </section>
            
          </section>
          <aside class="row">
            <section class="btn-container col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="<?php echo get_site_url()?>/report" class="btn-shine"><span>VIEW MORE &gt;</span></a>
            </section>
          </aside>
        </section>
        <section class="customs highlight col-lg-12">
          <h3 class="col-lg-12"><b>CUSTOMS</b><span>禮俗教室</span></h3>
          <section class="row">
            <?php 
              $wp_query = new WP_Query (array (
                  'post_type' => 'customs',
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              if ($wp_query->have_posts()) : $wp_query->the_post();
                $summary = types_render_field("summary",array("raw"=>true));
                if($summary == null || $summary == ""){
                  $summary = get_the_content();
                  if(strlen($summary) > 42){
                    $summary = wp_trim_words( get_the_content(), 41 );
                  }
                }
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
                $terms = wp_get_post_terms( get_the_ID(), '禮俗教室',  array("fields" => "names") ); 
                if(count($terms) >0){
                  $term_name = $terms[0];
                  $term_link = get_term_link($term_name, '禮俗教室' );
                }
              ?>
            <a href="<?php echo get_the_permalink()?>" class="col-lg-8">
              <aside style="background-image:url(<?php echo $thumbnail?>)" class="visual">
                <i></i>
              </aside>
            </a>
            <aside class="col-lg-4 text-content">
              <a class="category col-lg-6" href="<?php echo $term_link?>"><?php echo $term_name?></a>
              <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
              <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
              <p class="col-lg-12"><?php echo $summary?></p>

            </aside>
            <?php endif?>
            <?php wp_reset_query(); ?>
          </section>
          <aside class="row">
            <section class="btn-container col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="<?php echo get_site_url()?>/customs" class="btn-shine"><span>VIEW MORE &gt;</span></a>
            </section>
          </aside>
        </section>
        <section class="inspired two-col col-lg-12">
          <h3 class="col-lg-12"><b>inspired</b><span>婚禮創意</span></h3>
          <ul class="row">
            <?php 
              $wp_query = new WP_Query (array (
                  'post_type' => 'inspired',
                  'posts_per_page' => 2,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              while ($wp_query->have_posts()) : $wp_query->the_post();
                $summary = types_render_field("summary",array("raw"=>true));
                if($summary == null || $summary == ""){
                  $summary = get_the_content();
                  if(strlen($summary) > 42){
                    $summary = wp_trim_words( get_the_content(), 41 );
                  }
                }
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
                $terms = wp_get_post_terms( get_the_ID(), '婚禮創意',  array("fields" => "names") ); 
                if(count($terms) >0){
                  $term_name = $terms[0];
                  $term_link = get_term_link($term_name, '婚禮創意' );
                }
              ?>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <a class="category col-lg-6" href="<?php echo $term_link?>"><?php echo $term_name?></a>
              <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
              <a style="background-image:url(<?php echo $thumbnail?>)" class="thumb col-lg-12" href="<?php echo get_the_permalink()?>"><i></i></a>
              <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
              <p class="col-lg-12"><?php echo $summary?></p>
            </li>
            <?php endwhile?>
            <?php wp_reset_query(); ?>
          </ul>
          <aside class="row">
            <section class="btn-container col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="<?php echo get_site_url()?>/inspired" class="btn-shine"><span>VIEW MORE &gt;</span></a>
            </section>
          </aside>
        </section>
        <section class="interview sm-three-col col-lg-12">
          <h3 class="col-lg-12"><b>INTERVIEW</b><span>人物專訪</span></h3>
          <ul class="row">
          <?php 
            $wp_query = new WP_Query (array (
                'post_type' => 'interview',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'desc',
                'paged' => 1
            ));

            while ($wp_query->have_posts()) : $wp_query->the_post();
              $summary = types_render_field("summary",array("raw"=>true));
              if($summary == null || $summary == ""){
                $summary = get_the_content();
                if(strlen($summary) > 42){
                  $summary = wp_trim_words( get_the_content(), 41 );
                }
              }
              $thumbnail = types_render_field("thumbnail",array("raw"=>true));
              if($thumbnail == null || $thumbnail == ""){
                $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
              }
            ?>
            <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <s class="top"></s>
              <s class="bottom"></s>
              <s class="left"></s>
              <s class="right"></s>
              <a class="thumb" href="<?php echo get_the_permalink()?>" style="background-image:url(<?php echo $thumbnail?>)"><i></i></a>
              <h5><?php the_title()?></h5>
              <i></i>
              <p><?php echo $summary?></p>
            </li>
            <?php endwhile?>
            <?php wp_reset_query(); ?>
          </ul>
          <aside class="row">
            <section class="btn-container col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <a href="<?php echo get_site_url()?>/interview" class="btn-shine"><span>VIEW MORE &gt;</span></a>
            </section>
          </aside>
        </section>
        <aside class="floating-banner">
          <a href="<?php echo CFS()->get('banner-link')?>">
            <img src="<?php echo CFS()->get('banner')?>">
            <span><?php echo CFS()->get('banner-text')?></span>
          </a>
        </aside>
        <a class="gotop" href="javascript:"><i class="fa fa-chevron-up"></i></a>
      </div>
      <section class="vendors">
          <aside class="container"><h6 class="text-center">廠商資訊</h6></aside>
          <ul>
            <?php 
              $wp_query = new WP_Query (array (
                  'post_type' => 'vendor',
                  'posts_per_page' => 100,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              while ($wp_query->have_posts()) : $wp_query->the_post();
                $summary = types_render_field("summary",array("raw"=>true));
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
            <li>
              <a href="<?php echo get_the_permalink()?>" title="<?php the_title()?>" style="background-image:url(<?php echo $thumbnail?>)">
                <!-- <img src="<?php echo $thumbnail?>"> --><span><?php the_title()?></span><i></i>
              </a>
            </li>
            <?php endwhile?>
            <?php wp_reset_query(); ?>
          </ul>
      </section>
    </section>
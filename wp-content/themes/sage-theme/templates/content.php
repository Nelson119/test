<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $wp_query->the_post(); 
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  $tax = get_query_var( 'taxonomy' );
  $term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); 
?>
    <section class="page report-list">
      <div class="container">
		<div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
        <section class="row">
          <section class="col-lg-12">
            <div class="col-lg-12"><h2><img src="<?php echo $theme_path?>images/common/<?php echo $posttype?>.svg"></h2></div>
            <section class="highlight col-lg-12">
            <section class="row">
              <?php 
                $wp_query = new WP_Query (array (
                    'post_type' => $posttype,
                    '置頂項目' => 'highlight',
                    'post_per_page' => 1,
                    'order_by' => 'date',
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
                ?>
              <a href="<?php echo get_the_permalink()?>" class="col-lg-8">
                <aside class="visual">
                  <img src="<?php echo $thumbnail?>"><i></i>
                </aside>
              </a>
              <aside class="col-lg-4 text-content">
                <a class="category col-lg-6" href="<?php echo get_the_permalink()?>"><?php echo $obj->labels->name?></a>
                <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
                <p class="col-lg-12"><?php echo $summary?></p>

              </aside>
              <?php endif?>
            </section>
              <hr>
            </section>
            <section class="two-col col-lg-12">
              <ul class="row">
              <?php 
                $wp_query = new WP_Query (array (
                    'post_type' => $posttype,
                    'tax_query' => array(
                      array(
                          'taxonomy'  => '置頂項目',
                          'field'     => 'slug',
                          'terms'     => 'select',
                          ),
                      array(
                          'taxonomy'  => $tax,
                          'field'     => 'slug',
                          'terms'     => $term->name
                          )
                     ),
                    'post_per_page' => 1,
                    'order_by' => 'date',
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
                ?>
                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <a class="category col-lg-6" href="<?php echo get_the_permalink()?>">編輯精選<img src="<?php echo $theme_path?>images/common/crown.svg"></a>
                  <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                  <a class="thumb col-lg-12" href="<?php echo get_the_permalink()?>"><img src="<?php echo $thumbnail?>"><i></i></a>
                  <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
                  <p class="col-lg-12"><?php echo $summary?></p>
                </li>
              <?php endif?>
              <?php 
                $wp_query = new WP_Query (array (
                    'post_type' => $posttype,
                    'tax_query' => array(
                      array(
                          'taxonomy'  => '置頂項目',
                          'field'     => 'slug',
                          'terms'     => 'hot',
                          ),
                      array(
                          'taxonomy'  => $tax,
                          'field'     => 'slug',
                          'terms'     => $term->name
                          )
                     ),
                    'post_per_page' => 1,
                    'order_by' => 'date',
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
                ?>
                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <a class="category col-lg-6" href="<?php echo get_the_permalink()?>">網友最愛<img src="<?php echo $theme_path?>images/common/heart.svg"></a>
                  <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                  <a class="thumb col-lg-12" href="<?php echo get_the_permalink()?>"><img src="<?php echo $thumbnail?>"><i></i></a>
                  <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
                  <p class="col-lg-12"><?php echo $summary?></p>
                </li>
              <?php endif?>
              </ul>
              <hr>
            </section>

            <section class="three-col col-lg-12">
              <section class="row">
                <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="row">
                    <?php 
                      $wp_query = new WP_Query (array (
                          'post_type' => $posttype,
                          'tax_query' => array(
                            array(
                                'taxonomy'  => '置頂項目',
                                'field'     => 'slug',
                                'terms'     => array('highlight','hot','select'), // exclude media posts in the news-cat custom taxonomy
                                'operator'  => 'NOT IN'
                                ),
                            array(
                                'taxonomy'  => $tax,
                                'field'     => 'slug',
                                'terms'     => $term->name
                                )
                           ),
                          'posts_per_page' => 6,
                          'order_by' => 'date',
                          'order' => 'desc',
                          'paged' => $page
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
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo get_the_permalink()?>">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="<?php echo get_the_permalink()?>"><img src="<?php echo $thumbnail?>"><i></i></a>
                        <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
                        <p class="col-lg-12"><?php echo $summary?></p>
                      </aside>
                    </li>
                    <?php endwhile?>
                    <?php wp_reset_query(); ?>
                  </ul>
                </section>
                
              </section>
            </section>
            <aside class="text-center">
              <aside class="pagination">
                <a href="customs-list.html" class="prev"><img src="<?php echo $theme_path?>images/common/dual-prev.png"></a>
                <ul>
                  <li><a href="customs-list.html">1</a></li>
                  <li><a href="customs-list-next.html">2</a></li>
                  <li><a href="customs-list-next.html">3</a></li>
                </ul>
                <a>...</a>
                <a href="customs-list-next.html"><img src="<?php echo $theme_path?>images/common/next.png"></a>
                <a href="customs-list-next.html">Last</a>
                <a href="customs-list-next.html" class="next"><img src="<?php echo $theme_path?>images/common/dual-next.png"></a>
              </aside>
            </aside>
          </section>
        </section>
      </div>
      
    </section>

<?php the_posts_navigation(); ?>
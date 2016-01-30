<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $wp_query->the_post(); 
  $obj = get_post_type_object( $posttype );
  $tax = get_query_var( 'taxonomy' );
  $term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); 
  $paged = (get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
  $q = new WP_Query(array('pagename' => 'home'));
  if($q->have_posts()):
    $q->the_post();
    $tagline = CFS()->get('tagline');
    wp_reset_query();
  endif;
?>
    <section class="page vendor-list">
      <div class="container">
        <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
        <section class="row">
          <section class="col-lg-12">
            <div class="col-lg-12"><h2><img src="<?php echo $theme_path?>images/common/vendor.svg"><sub> <?php echo $tagline?></sub></h2></div>
            <section class="sm-three-col col-lg-12">
              <span class="tagline">優質首選<img src="<?php echo $theme_path?>images/common/crown.svg"></span>
              <ul class="row text-center">
                <?php 
                  if($tax == '' || $tax == null){
                    $args =  array(
                      array(
                          'taxonomy'  => '優質首選',
                          'field'     => 'slug',
                          'terms'     => array('select')
                      )
                    );
                  }else{
                    $args =  array(
                      array(
                          'taxonomy'  => '優質首選',
                          'field'     => 'slug',
                          'terms'     => array('select')
                      ),
                      array(
                          'taxonomy'  => $tax,
                          'field'     => 'slug',
                          'terms'     => $term->name
                          )
                    );
                  }
                  $wp_query = new WP_Query (array (
                      'post_type' => 'vendor',
                      'tax_query' => $args,
                      'posts_per_page' => 50,
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
                  <a class="thumb" href="<?php echo get_the_permalink()?>" style="background-image:url(<?php echo $thumbnail?>)"><i></i></a>
                  <h5><?php echo $summary?></h5>
                  <i></i>
                </li>
                <?php endwhile?>
                <?php wp_reset_query(); ?>
              </ul>
              <hr>
              <span class="tagline">網友正在看<img src="<?php echo $theme_path?>images/common/eye.svg"></span>
              <ul class="row text-center">
                <?php 
                  if($tax == '' || $tax == null){
                    $args =  array(
                      array(
                          'taxonomy'  => '優質首選',
                          'field'     => 'slug',
                          'terms'     => array('select'), // exclude media posts in the news-cat custom taxonomy
                          'operator'  => 'NOT IN'
                      )
                    );
                  }else{
                    $args =  array(
                      array(
                          'taxonomy'  => '優質首選',
                          'field'     => 'slug',
                          'terms'     => array('select'), // exclude media posts in the news-cat custom taxonomy
                          'operator'  => 'NOT IN'
                      ),
                      array(
                          'taxonomy'  => $tax,
                          'field'     => 'slug',
                          'terms'     => $term->name
                          )
                    );
                  }
                  $wp_query = new WP_Query (array (
                      'post_type' => 'vendor',
                      'tax_query' => $args,
                      'posts_per_page' => 6,
                      'orderby' => 'rand',
                      'order' => 'desc',
                      'paged' => $paged
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
                  <a class="thumb" href="<?php echo get_the_permalink()?>" style="background-image:url(<?php echo $thumbnail?>)"><i></i></a>
                  <h5><?php echo $summary?></h5>
                  <i></i>
                </li>
                <?php endwhile?>
                <?php wp_reset_query(); ?>
              </ul>
            </section>
          </section>
        </section>
        <?php get_template_part('pagination'); ?><!-- /.pagination -->
      </div>
    </section>
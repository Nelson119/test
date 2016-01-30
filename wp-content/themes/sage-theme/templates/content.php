<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $wp_query->the_post(); 
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  $tax = get_query_var( 'taxonomy' );
  $term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); 
  $paged = (get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
  $list_exclude = array();
  if($tax == '' || $tax == null){
      $hot_args =  array(
          array(
              'taxonomy'  => '置頂項目',
              'field'     => 'slug',
              'terms'     => 'hot',
          )
      );
      $highlight_args =  array(
          array(
              'taxonomy'  => '置頂項目',
              'field'     => 'slug',
              'terms'     => 'highlight',
          )
      );
      $select_args =  array(
          array(
              'taxonomy'  => '置頂項目',
              'field'     => 'slug',
              'terms'     => 'select',
          )
      );
  }else{
      $hot_args =  array(
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
      );
      $highlight_args =  array(
          array(
              'taxonomy'  => '置頂項目',
              'field'     => 'slug',
              'terms'     => 'highlight',
          ),
          array(
              'taxonomy'  => $tax,
              'field'     => 'slug',
              'terms'     => $term->name
          )
      );
      $select_args =  array(
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
      );
  }
  $hot = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $hot_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));
  $highlight = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $highlight_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));
  $select = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $select_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));

  if ($highlight->have_posts()) : $highlight->the_post();
      array_push($list_exclude,get_the_id());
  endif;
  if ($select->have_posts()) : $select->the_post();
      array_push($list_exclude,get_the_id());
  endif;
  if ($hot->have_posts()) : $hot->the_post();
      array_push($list_exclude,get_the_id());
  endif;
  $highlight = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $highlight_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));
  $select = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $select_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));
  $hot = new WP_Query (array (
      'post_type' => $posttype,
      'tax_query' => $hot_args,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'desc',
      'paged' => 1
  ));
?>
<section class="page report-list">
  <div class="container">
    <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
    <section class="row">
      <section class="col-lg-12">
        <div class="col-lg-12"><h2><img src="<?php echo $theme_path?>images/common/<?php echo $posttype?>.svg"></h2></div>
        
        <?php if($paged == 1):?>
        <section class="highlight col-lg-12">
        <section class="row">
          <?php 
            if ($highlight->have_posts()) : $highlight->the_post();
              $summary = types_render_field("summary",array("raw"=>true));
              if($summary == null || $summary == ""){
                $summary = get_the_content();
                if(strlen($summary) > 96){
                  $summary = wp_trim_words( get_the_content(), 95 );
                }
              }
              $thumbnail = types_render_field("thumbnail",array("raw"=>true));
              if($thumbnail == null || $thumbnail == ""){
                $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
              }
            ?>
          <a  href="<?php echo get_the_permalink()?>" class="col-lg-8">
            <aside class="visual" style="background-image:url(<?php echo $thumbnail?>)">
              <i></i>
            </aside>
          </a>
          <aside class="col-lg-4 text-content">
            <a class="category col-lg-6" href="<?php echo get_the_permalink()?>"><?php echo $obj->labels->name?></a>
            <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
            <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
            <p class="col-lg-12"><?php echo $summary?></p>

          </aside>
          <?php endif?>
          <?php wp_reset_query(); ?>
        </section>
          <hr>
        </section>
        <section class="two-col col-lg-12">
          <ul class="row">
          <?php 
            if ($select->have_posts()) : $select->the_post();
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
              <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
              <a class="thumb col-lg-12" style="background-image:url(<?php echo $thumbnail?>)" href="<?php echo get_the_permalink()?>"><i></i></a>
              <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
              <p class="col-lg-12"><?php echo $summary?></p>
            </li>
          <?php endif?>
          <?php 
            if ($hot->have_posts()) : $hot->the_post();
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
              <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
              <a class="thumb col-lg-12" style="background-image:url(<?php echo $thumbnail?>)" href="<?php echo get_the_permalink()?>"><i></i></a>
              <h5 class="col-lg-12"><a href="<?php echo get_the_permalink()?>"><?php the_title()?></a></h5>
              <p class="col-lg-12"><?php echo $summary?></p>
            </li>
          <?php endif?>
          <?php wp_reset_query(); ?>
          </ul>
          <hr>
        </section>
        <?php endif?>

        <section class="three-col col-lg-12">
          <section class="row">
            <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="row">
                <?php 
                  if($tax == '' || $tax == null){
                    $args =  array();
                  }else{
                    $args =  array(
                        array(
                          'taxonomy'  => $tax,
                          'field'     => 'slug',
                          'terms'     => $term->name
                        )
                    );
                  }
                  $wp_query = new WP_Query (array (
                      'post_type' => $posttype,
                      'tax_query' => $args,
                      'posts_per_page' => 6,
                      'orderby' => 'date',
                      'order' => 'desc',
                      'paged' => $paged,
                      'post__not_in' => $list_exclude
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
                  <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="<?php echo get_the_permalink()?>"><?php echo ($term == null ? $obj->labels->name : $term->name)?></a> 
                  <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg"><?php echo getPostViews(get_the_id())?></i>
                  <aside>
                    <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="<?php echo get_the_permalink()?>" style="background-image:url(<?php echo $thumbnail?>)"><i></i></a>
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
        <?php get_template_part('pagination'); ?><!-- /.pagination -->
      </section>
    </section>
  </div>
  
</section>

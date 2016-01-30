<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
  $posttype = get_post_type();
  $post_id = get_the_id();
?>
<?php while (have_posts()) : the_post(); ?>
<section class="page interview-list">
  <div class="container">
    <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
    <section class="row">
      <section class="col-lg-12  header-buff">
        
        <article class="col-lg-12 text-left">
          <span><?php print_r($obj->labels->name)?></span><img class="view-count" src="<?php echo $theme_path?>images/common/eye.svg"><span><?php echo getPostViews(get_the_id())?></span>
          <h3><?php the_title()?></h3>
        </article>
        <article class="col-lg-8 text-left">
          <?php the_content()?>
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
          <ul class="tags">
            <?php $tags = array();$posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {
              array_push($tags, $tag->name);
              ?>
            <li><a href="<?php echo get_tag_link($tag->term_id)?>"><?php echo  $tag->name?></a></li>
            <?php }}?>
            <?php $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));?>
          </ul>
          <section class="recommended">
            <h5>YOU MAY ALSO LIKE</h5>
            <ul class="row">
            <?php

            $tq = array(
              array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     =>  $tags,
              )
            );
            $args = array (
              'post_type' => array('interview','customs','report','inspired','vendor','event'),
              'tax_query' => $tq,
              'posts_per_page' => 3,
              'orderby' => 'date',
              'order' => 'desc',
              'post__not_in' => array($post_id),
              'paged' => 1
            );

            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post );
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
              } ?>
              <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo get_the_permalink();?>" style="background-image:url(<?php echo $thumbnail?>)">
                  <span class="col-lg-12"><?php the_title()?></span><i></i>
                </a>
              </li>
            <?php endforeach; 
            wp_reset_postdata();?>
            </ul>
          </section> 
          <div class="fb-like" data-href="<?php echo get_the_permalink()?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
          <hr class="comments-top">
          <div class="fb-comments" data-href="<?php echo get_the_permalink()?>" data-width="100%" data-numposts="5"></div>
        </article>
        <aside class="side col-lg-4">
          <?php 
          $wp_query = new WP_Query (array (
            'pagename' => $posttype.'-sidebar',
          ));
          if (have_posts()) : the_post(); 
          $cfs = CFS();
          $side = $cfs->get('top');
          if(count($side)): foreach ($side as $top): ?>
          <?php if($top['title'] !='' && $top['title'] != null):?><div class="box"><?php echo $top['title']?></div><?php endif?>
          <div>
            <?php echo $top['content']?>
          </div>
          <?php endforeach;endif; endif?>
          <?php wp_reset_query(); ?>
          <div class="box">popular</div>
          <div class="popular">
            <ul>
              <?php 
              $args =  array(
                array(
                    'taxonomy'  => 'Popular',
                    'field'     => 'slug',
                    'terms'     => 'no1',
                    )
              );
              $wp_query = new WP_Query (array (
                  'post_type' => $posttype,
                  'tax_query' => $args,
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));
              if ($wp_query->have_posts()) : $wp_query->the_post();
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
              <li class="popular col-lg-12">
                <a class="row" href="<?php echo get_the_permalink()?>">
                  <aside class="col-lg-4">
                    <span style="background-image:url(<?php echo $thumbnail?>)"><i></i></span>
                  </aside>
                  <aside class="col-lg-8 row">
                    <strong class="col-lg-12">NO. 1</strong>
                    <span class="col-lg-12"><?php the_title()?></span>
                    <ol class="col-lg-12">
                      <?php if ($terms) {foreach($terms as $term) {?>
                      <li><?php echo  $term->name?></li>
                      <?php }}?>
                    </ol>
                  </aside>
                </a>
              </li>
              <?php endif?>
              <?php wp_reset_query(); ?>
              <?php 
              $args =  array(
                array(
                    'taxonomy'  => 'Popular',
                    'field'     => 'slug',
                    'terms'     => 'no2',
                    )
              );
              $wp_query = new WP_Query (array (
                  'post_type' => $posttype,
                  'tax_query' => $args,
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              if ($wp_query->have_posts()) : $wp_query->the_post();
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
              <li class="popular col-lg-12">
                <a class="row" href="<?php echo get_the_permalink()?>">
                  <aside class="col-lg-4">
                    <span style="background-image:url(<?php echo $thumbnail?>)"><i></i></span>
                  </aside>
                  <aside class="col-lg-8 row">
                    <strong class="col-lg-12">NO. 2</strong>
                    <span class="col-lg-12"><?php the_title()?></span>
                    <ol class="col-lg-12">
                      <?php if ($terms) {foreach($terms as $term) {?>
                      <li><?php echo  $term->name?></li>
                      <?php }}?>
                    </ol>
                  </aside>
                </a>
              </li>
              <?php endif?>
              <?php wp_reset_query(); ?>
              <?php 
              $args =  array(
                array(
                    'taxonomy'  => 'Popular',
                    'field'     => 'slug',
                    'terms'     => 'no3',
                    )
              );
              $wp_query = new WP_Query (array (
                  'post_type' => $posttype,
                  'tax_query' => $args,
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              if ($wp_query->have_posts()) : $wp_query->the_post();
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
              <li class="popular col-lg-12">
                <a class="row" href="<?php echo get_the_permalink()?>">
                  <aside class="col-lg-4">
                    <span style="background-image:url(<?php echo $thumbnail?>)"><i></i></span>
                  </aside>
                  <aside class="col-lg-8 row">
                    <strong class="col-lg-12">NO. 3</strong>
                    <span class="col-lg-12"><?php the_title()?></span>
                    <ol class="col-lg-12">
                      <?php if ($terms) {foreach($terms as $term) {?>
                      <li><?php echo  $term->name?></li>
                      <?php }}?>
                    </ol>
                  </aside>
                </a>
              </li>
              <?php endif?>
              <?php wp_reset_query(); ?>
              <?php 
              $args =  array(
                array(
                    'taxonomy'  => 'Popular',
                    'field'     => 'slug',
                    'terms'     => 'no4',
                    )
              );
              $wp_query = new WP_Query (array (
                  'post_type' => $posttype,
                  'tax_query' => $args,
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              if ($wp_query->have_posts()) : $wp_query->the_post();
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
              <li class="popular col-lg-12">
                <a class="row" href="<?php echo get_the_permalink()?>">
                  <aside class="col-lg-4">
                    <span style="background-image:url(<?php echo $thumbnail?>)"><i></i></span>
                  </aside>
                  <aside class="col-lg-8 row">
                    <strong class="col-lg-12">NO. 4</strong>
                    <span class="col-lg-12"><?php the_title()?></span>
                    <ol class="col-lg-12">
                      <?php if ($terms) {foreach($terms as $term) {?>
                      <li><?php echo  $term->name?></li>
                      <?php }}?>
                    </ol>
                  </aside>
                </a>
              </li>
              <?php endif?>
              <?php wp_reset_query(); ?>
              <?php 
              $args =  array(
                array(
                    'taxonomy'  => 'Popular',
                    'field'     => 'slug',
                    'terms'     => 'no5',
                    )
              );
              $wp_query = new WP_Query (array (
                  'post_type' => $posttype,
                  'tax_query' => $args,
                  'posts_per_page' => 1,
                  'orderby' => 'date',
                  'order' => 'desc',
                  'paged' => 1
              ));

              if ($wp_query->have_posts()) : $wp_query->the_post();
                $thumbnail = types_render_field("thumbnail",array("raw"=>true));
                $terms = wp_get_post_terms($post->ID, $obj->labels->name, array("fields" => "all"));
                if($thumbnail == null || $thumbnail == ""){
                  $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
                }
              ?>
              <li class="popular col-lg-12">
                <a class="row" href="<?php echo get_the_permalink()?>">
                  <aside class="col-lg-4">
                    <span style="background-image:url(<?php echo $thumbnail?>)"><i></i></span>
                  </aside>
                  <aside class="col-lg-8 row">
                    <strong class="col-lg-12">NO. 5</strong>
                    <span class="col-lg-12"><?php the_title()?></span>
                    <ol class="col-lg-12">
                      <?php if ($terms) {foreach($terms as $term) {?>
                      <li><?php echo  $term->name?></li>
                      <?php }}?>
                    </ol>
                  </aside>
                </a>
              </li>
              <?php endif?>
              <?php wp_reset_query(); ?>
            </ul>
          </div>
          <?php 
          $wp_query = new WP_Query (array (
            'pagename' => $posttype.'-sidebar',
          ));
          if (have_posts()) : the_post(); 
          $cfs = CFS();
          $side = $cfs->get('bottom');
          if(count($side)): foreach ($side as $bottom): ?>
          <?php if($bottom['title'] !='' && $bottom['title'] != null):?><div class="box"><?php echo $bottom['title']?></div><?php endif?>
          <div>
            <?php echo $bottom['content']?>
          </div>
          <?php endforeach;endif; endif?>
          <?php wp_reset_query(); ?>
        </aside>
      </section>
    </section>
  </div>
  
</section>
<?php endwhile; ?>

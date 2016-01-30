<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<section class="page interview-list">
  <div class="container">
  <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
    <section class="row">
      <section class="col-lg-12">
        <section class="col-lg-12 pre">
          <h2><img src="<?php echo $theme_path?>images/common/<?php echo get_post_type() ?>.svg"></h2>
        </section>
        <section class="sm-three-col col-lg-12">
          <ul class="row text-left">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php 
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
          </ul>
        </section>
        <?php get_template_part('pagination'); ?><!-- /.pagination -->
      </section>
    </section>
  </div>
</section>
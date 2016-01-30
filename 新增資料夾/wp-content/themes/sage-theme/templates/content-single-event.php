<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page event">
    <div class="container">
       <?php the_content(); ?>
    </div>
  </section>
<?php endwhile; ?>

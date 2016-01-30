<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
?>
<section class="page terms">
  <div class="container">
    <div class="col-lg-12">
      <div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div>
      <?php the_content(); ?>
    </div>
  </div>
  
</section>
<?php
/**
 * Template Name: 關於我們
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'about'); ?>
<?php endwhile; ?>

<?php
/**
 * Template Name: 自訂頁面
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'custom'); ?>
<?php endwhile; ?>

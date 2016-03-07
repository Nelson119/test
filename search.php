<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php else : ?>
<?php 
?>
<nav class="taxonomy columns">
	<ul>
		<li><a href="<?php echo get_site_url(). '/?s=' . get_search_query()?>" titile="ALL">ALL</a></li>
		<li><a href="<?php echo get_site_url(). '/?s=' . get_search_query().'&post_type=videos'?>" titile="聽場演講">聽場演講</a></li>
		<li><a href="<?php echo get_site_url(). '/?s=' . get_search_query().'&post_type=columns'?>" titile="來點專欄">來點專欄</a></li>
	</ul>
</nav>
<section class="container">
	<section class="row">
		<?php while (have_posts()) : the_post(); ?>
			<aside class="nopadding col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<?php get_template_part('templates/content', 'search'); ?>
			</aside>
			<aside class="nopadding col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<?php get_template_part('templates/content', 'search'); ?>
			</aside>
			<aside class="nopadding col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<?php get_template_part('templates/content', 'search'); ?>
			</aside>
			<aside class="nopadding col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<?php get_template_part('templates/content', 'search'); ?>
			</aside>
		<?php endwhile; ?>
	</section>
	<aside class="more">
		<a href="javascript:">
			更多結果
		</a>	
	</aside>
</section>
<?php endif; ?>


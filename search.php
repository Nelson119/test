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
		<?php echo do_shortcode('[ajax_load_more repeater="template_1" post_type="videos, columns, events" search="'.get_search_query().'" posts_per_page="8" pause="true" scroll="false" transition_container="false" images_loaded="true" button_label="更多結果" button_loading_label="載入中…" container_type="ul" css_classes="list-container row"]');?>
	</section>
	<aside class="more">
		<a href="javascript:">
			更多結果
		</a>	
	</aside>
</section>
<?php endif; ?>


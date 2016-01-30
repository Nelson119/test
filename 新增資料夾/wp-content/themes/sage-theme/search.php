<?php get_template_part('templates/page', 'header'); ?>
<?php 
 	$theme_path = get_template_directory_uri() . '/dist/';

?>
<?php if (!have_posts()) : ?>
<section class="page AOA">
	<aside class="container">
		<section class="row">
			<section class="col-lg-12">
				<img src="<?php echo get_template_directory_uri()?>/dist/images/common/404.png">
				<p>對不起，您要的頁無法找到喔！</p>
				<a href="<?php echo get_site_url()?>">返回首頁</a>
			</section>			
		</section>
	</aside>
</section>
<?php else:?>
<section class="page search">
	<div class="container">
		<div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
		<section class="row">
		  <section class="col-lg-12">
		    <div class="col-lg-12"><h2><img src="<?php echo $theme_path?>images/common/search-result.svg"><sub>搜尋結果</sub></h2></div>
		    <div class="row">
				<ul class="col-lg-12">
					<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('templates/content', 'search'); ?>
					<?php endwhile; ?>
				</ul>
		    </div>
		    <?php get_template_part('pagination'); ?><!-- /.pagination -->
			<?php wp_reset_query(); ?>
		</section>
	</div>
</section>
<?php endif?>

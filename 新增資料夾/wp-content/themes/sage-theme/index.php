<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php get_template_part('templates/page', 'header'); ?>

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
<?php else : ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endif; ?>
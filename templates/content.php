<?php 
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  $tax = get_query_var( 'taxonomy' );
  $term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); 
  $paged = (get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
?>
<aside class="kv">
	<i class="fade"></i>
	<figure class="background">
		<ul>
			<?php 
				$new = new WP_Query (array (
				'post_type' => $posttype,
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'desc',
				'paged' => 1
			));
			?>
			<?php 
			while (have_posts()) : the_post();
			?>
			<li style="background-image: url(<?php echo types_render_field("kv", array("raw"=>true))?>)"></li>
			<?php endwhile?>
		</ul>
	</figure>
	<section class="fit">
		<nav>
			<ul>
				<?php 
					$new = new WP_Query (array (
					'post_type' => $posttype,
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'desc',
					'paged' => 1
				));
				?>
				<?php 
					$i = 3;
					while (have_posts() && $i--) : the_post(); 
						if($posttype == 'videos'):
		  					$post_terms = wp_get_post_terms( get_the_id(), '聽場演講', $args );
						elseif ($posttype == 'columns') :
		  					$post_terms = wp_get_post_terms( get_the_id(), '來點專欄', $args );
						endif;
						$view = getPostViews(get_the_id());
				?>
				<li>
					<article>
						<span class="date"><span class="day">15</span> OCT 2015</span>
						<span class="category">
							<?php foreach ($post_terms as $term) :?>
							<svg viewBox="0 0 13 13">
								<path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
								L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
								S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
								C12.2,7.4,12.2,7.2,12.1,7z"/>
							</svg><?php echo  $term->name?>
							<?php endforeach?>
						</span>
						<h3><?php echo get_the_title(); ?></h3>
						<p class="visible-lg"><?php the_excerpt(); ?></p>
						<section class="info">
							<span class="cast">
								<svg viewBox="0 0 13 13">
								<path d="M10.9,11.5L10.9,11.5h0.6c-0.2-2-1.6-3.6-3.5-4.1c1-0.5,1.6-1.5,1.6-2.7c0-1.7-1.4-3.1-3.2-3.1
									c-1.7,0-3.2,1.4-3.2,3.1C3.3,5.8,4,6.8,5,7.4c-1.9,0.6-3.2,2.2-3.5,4.1h0.6h0.1"/>
								</svg>
								<?php echo types_render_field("post-casting", array("raw"=>true))?>
							</span>
							<?php if($posttype == 'videos'):?>
							<span class="place">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,0.5C4,0.5,2,2.6,2,5c0,1.2,0.5,2.3,1.2,3.1l3.3,4.4l3.3-4.4C10.5,7.3,11,6.2,11,5
										C11,2.6,9,0.5,6.5,0.5z M6.5,6.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C8.1,5.7,7.4,6.4,6.5,6.4z"/>
								</svg>
								<?php echo types_render_field("place-title", array("raw"=>true))?>
							</span>
							<?php endif?>
							<span class="viewcount">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,2.6c-2.6,0-4.9,1.6-6,3.8c0,0.1,0,0.1,0,0.2c1,2.3,3.3,3.8,6,3.8s4.9-1.6,6-3.8
										c0-0.1,0-0.1,0-0.2C11.4,4.1,9.1,2.6,6.5,2.6z M6.5,9.2C5,9.2,3.8,8,3.8,6.5C3.8,5,5,3.8,6.5,3.8C8,3.8,9.2,5,9.2,6.5
										S8,9.2,6.5,9.2z"/>
									<circle cx="6.5" cy="6.5" r="1.7"/>
								</svg>
								<?php echo $view;?>
							</span>
						</section>
						<a class="link" href="<?php echo get_the_permalink()?>"><img src="<?php theme_asset('images/common/goto.svg')?>"></a>
					</article>
				</li>
				<?php endwhile?>
				<?php wp_reset_query(); ?>
			</ul>
		</nav>
	</section>
</aside>
<?php if($posttype == 'videos'):?>
<nav class="taxonomy videos">
	<ul>
		<li><a href="<?php echo get_post_type_archive_link( $posttype )?>" titile="ALL">ALL</a></li>
		<?php 
			$terms = get_terms( '聽場演講' );
			foreach ($terms as $term) :
		?>
	
		<li><a href="<?php echo get_term_link($term->term_id)?>" titile="<?php echo $term->name?>"><?php echo $term->name?></a></li>
		<?php endforeach?>
	</ul>
</nav>
<?php elseif ($posttype == 'columns') :?>
<nav class="taxonomy columns">
	<ul>
		<li><a href="<?php echo get_post_type_archive_link( $posttype )?>" titile="ALL">ALL</a></li>
		<?php 		
			$terms = get_terms( '來點專欄' );
			foreach ($terms as $term) :
		?>
	
		<li><a href="<?php echo get_term_link($term->term_id)?>" titile="<?php echo $term->name?>"><?php echo $term->name?></a></li>
		<?php endforeach?>
	</ul>
</nav>
<?php endif?>
<div class="row">
	<div class="container">
		<?php if($posttype == 'videos'):?>
		<?php echo do_shortcode('[ajax_load_more post_type="videos" offset="3" posts_per_page="8" scroll="false" transition_container="false" images_loaded="true" button_label="更多演講" button_loading_label="載入中…" container_type="ul" css_classes="list-container row"]');?>
		<?php elseif ($posttype == 'columns') :?>
		<?php echo do_shortcode('[ajax_load_more post_type="columns" offset="3" posts_per_page="8" scroll="false" transition_container="false" images_loaded="true" button_label="更多專欄" button_loading_label="載入中…" container_type="ul" css_classes="list-container row"]');?>
		<?php endif?>
	</div>
</div>

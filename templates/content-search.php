<?php 
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  $view = getPostViews(get_the_id());
  switch ($posttype) {
  	case 'videos':
  		$taxonomy = '聽場演講';
  		break;
  	case 'columns':
  		$taxonomy = '來點專欄';
  		break;
  	
  	default:
  		$taxonomy = 'null';
  		break;
  }
  $terms = wp_get_post_terms( get_the_id(), $taxonomy, array() );
?>
<article <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<figure class="thumb" style="background-image: url(<?php theme_asset('images/search/thumb.png')?>)">
		</figure>
		<section class="detail">
			<aside class="normal">
				<span class="category">
					<?php foreach($terms as $tag):?>
					<svg viewBox="0 0 13 13">
						<path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
						L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
						S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
						C12.2,7.4,12.2,7.2,12.1,7z"/>
					</svg><?php echo $tag->name?>
					<?php endforeach;?>
				</span>
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<p class="entry-summary visible-lg visible-md"><?php the_excerpt(); ?></p>
				<section class="info">
					<span class="cast">
						<svg viewBox="0 0 13 13">
						<path d="M10.9,11.5L10.9,11.5h0.6c-0.2-2-1.6-3.6-3.5-4.1c1-0.5,1.6-1.5,1.6-2.7c0-1.7-1.4-3.1-3.2-3.1
							c-1.7,0-3.2,1.4-3.2,3.1C3.3,5.8,4,6.8,5,7.4c-1.9,0.6-3.2,2.2-3.5,4.1h0.6h0.1"/>
						</svg>
						<?php echo types_render_field("post-casting",array("raw"=>true))?>
					</span>
					<span class="place">
						<svg viewBox="0 0 13 13">
							<path d="M6.5,0.5C4,0.5,2,2.6,2,5c0,1.2,0.5,2.3,1.2,3.1l3.3,4.4l3.3-4.4C10.5,7.3,11,6.2,11,5
								C11,2.6,9,0.5,6.5,0.5z M6.5,6.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C8.1,5.7,7.4,6.4,6.5,6.4z"/>
						</svg>
						<?php echo types_render_field("place-title",array("raw"=>true))?>
					</span>
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
			</aside>
			<span class="link">
				<svg viewBox="0 0 19 14">
					<path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
				</svg>
			</span>
		</section>
	</a>
	<span class="date"><span class="day"><?php echo get_the_date('j')?></span> <?php echo get_the_date('M Y')?></span>
	<span class="posttype"><?php echo $obj->labels->name ?></span>
</article>

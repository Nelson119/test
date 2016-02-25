<?php 
  $wp_query->the_post(); 
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  $tax = get_query_var( 'taxonomy' );
  $term = get_term_by( 'slug', get_query_var( 'term' ), $tax ); 
  $paged = (get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
  // $wp_query = new WP_Query (array (
  //     'post_type' => $posttype,
  //     'posts_per_page' => 1,
  //     'orderby' => 'date',
  //     'order' => 'desc',
  //     'paged' => $paged
  // ));
  // if ($wp_query->have_posts()) : $wp_query->the_post(); endif;
  $link = get_the_permalink();
  // echo $link;
?>
<aside class="kv">
	<i class="fade"></i>
	<figure class="background">
		<ul>
			<?php $i = 3?>
			<?php while($i--):?>
			<li style="background-image: url(<?php theme_asset('images/videos/kv.png')?>)"></li>
			<?php endwhile?>
		</ul>
	</figure>
	<section class="fit">
		<nav>
			<ul>
				<?php $i = 3?>
				<?php while($i--):?>
				<li data-background-image="<?php theme_asset('images/videos/kv.png?i='.$i)?>">
					<article>
						<span class="date"><span class="day">15</span> OCT 2015</span>
						<span class="category">
							<svg viewBox="0 0 13 13">
								<path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
								L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
								S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
								C12.2,7.4,12.2,7.2,12.1,7z"/>
							</svg>2014 荊艷
						</span>
						<h3>如果覺得世界不夠好，你應該去打造一個好的世界</h3>
						<p class="visible-lg">台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
						<section class="info">
							<span class="cast">
								<svg viewBox="0 0 13 13">
								<path d="M10.9,11.5L10.9,11.5h0.6c-0.2-2-1.6-3.6-3.5-4.1c1-0.5,1.6-1.5,1.6-2.7c0-1.7-1.4-3.1-3.2-3.1
									c-1.7,0-3.2,1.4-3.2,3.1C3.3,5.8,4,6.8,5,7.4c-1.9,0.6-3.2,2.2-3.5,4.1h0.6h0.1"/>
								</svg>
								邵定國
							</span>
							<span class="place">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,0.5C4,0.5,2,2.6,2,5c0,1.2,0.5,2.3,1.2,3.1l3.3,4.4l3.3-4.4C10.5,7.3,11,6.2,11,5
										C11,2.6,9,0.5,6.5,0.5z M6.5,6.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C8.1,5.7,7.4,6.4,6.5,6.4z"/>
								</svg>
								中正大學演藝廳
							</span>
							<span class="viewcount">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,2.6c-2.6,0-4.9,1.6-6,3.8c0,0.1,0,0.1,0,0.2c1,2.3,3.3,3.8,6,3.8s4.9-1.6,6-3.8
										c0-0.1,0-0.1,0-0.2C11.4,4.1,9.1,2.6,6.5,2.6z M6.5,9.2C5,9.2,3.8,8,3.8,6.5C3.8,5,5,3.8,6.5,3.8C8,3.8,9.2,5,9.2,6.5
										S8,9.2,6.5,9.2z"/>
									<circle cx="6.5" cy="6.5" r="1.7"/>
								</svg>
								610
							</span>
						</section>
						<a class="link" href="<?php echo $link?>"><img src="<?php theme_asset('images/common/goto.svg')?>"></a>
					</article>
				</li>
				<?php endwhile?>
			</ul>
		</nav>
	</section>
</aside>
<nav class="taxonomy videos">
	<ul>
		<li><a href="javascript:" titile="ALL">ALL</a></li>
		<li><a href="javascript:" titile="2015 觸動">2015 觸動</a></li>
		<li><a href="javascript:" titile="2014 荊艷">2014 荊艷</a></li>
	</ul>
</nav>
<nav class="taxonomy columns">
	<ul>
		<li><a href="javascript:" titile="ALL">ALL</a></li>
		<li><a href="javascript:" titile="策展點">策展點</a></li>
		<li><a href="javascript:" titile="諸羅記">諸羅記</a></li>
		<li><a href="javascript:" titile="Let’s Talk">Let’s Talk</a></li>
		<li><a href="javascript:" titile="行動派">行動派</a></li>
	</ul>
</nav>
<div class="row">
	<div class="container">
	    <section class="row">
			<?php $i = 8?>
			<?php while($i--):?>
			<section class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure>
					<a href="<?php echo $link?>" title="TED 是一個跨界的智庫，是一個對話的平台，更是實現 ideas 的舞台。TED 分別代表的是科技 (technology)、娛樂 (entert-
ainment)、設計 (design)，是一年一度的創新盛會。1984 年由 Richard Wurman 在加州創立，原本只是一群朋友間的腦力
大激盪，他們來自不同的領域，他們有些是建築師、科學家、教育家、詩人、劇作家、創業家、設計師等等。他們對未來充
滿熱情，又有一些叛逆，聚在一起討論最新最酷的點子，和如何可以改變這個世界。" style="background-image: url(<?php theme_asset('images/videos/thumb.png')?>)"></a>
				</figure>
				<section class="detail">
					<aside class="hover visible-lg">
						<p>台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
					</aside>
					<aside class="normal">
						<span class="date"><span class="day">15</span> OCT 2015</span>
						<span class="category">
							<svg viewBox="0 0 13 13">
								<path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
								L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
								S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
								C12.2,7.4,12.2,7.2,12.1,7z"/>
							</svg>2014 荊艷
						</span>
						<h3>如果覺得這世界不夠好，你應該去打造一個好的世界</h3>
						<section class="info">
							<span class="cast">
								<svg viewBox="0 0 13 13">
								<path d="M10.9,11.5L10.9,11.5h0.6c-0.2-2-1.6-3.6-3.5-4.1c1-0.5,1.6-1.5,1.6-2.7c0-1.7-1.4-3.1-3.2-3.1
									c-1.7,0-3.2,1.4-3.2,3.1C3.3,5.8,4,6.8,5,7.4c-1.9,0.6-3.2,2.2-3.5,4.1h0.6h0.1"/>
								</svg>
								邵定國
							</span>
							<span class="place">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,0.5C4,0.5,2,2.6,2,5c0,1.2,0.5,2.3,1.2,3.1l3.3,4.4l3.3-4.4C10.5,7.3,11,6.2,11,5
										C11,2.6,9,0.5,6.5,0.5z M6.5,6.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C8.1,5.7,7.4,6.4,6.5,6.4z"/>
								</svg>
								中正大學演藝廳
							</span>
							<span class="viewcount">
								<svg viewBox="0 0 13 13">
									<path d="M6.5,2.6c-2.6,0-4.9,1.6-6,3.8c0,0.1,0,0.1,0,0.2c1,2.3,3.3,3.8,6,3.8s4.9-1.6,6-3.8
										c0-0.1,0-0.1,0-0.2C11.4,4.1,9.1,2.6,6.5,2.6z M6.5,9.2C5,9.2,3.8,8,3.8,6.5C3.8,5,5,3.8,6.5,3.8C8,3.8,9.2,5,9.2,6.5
										S8,9.2,6.5,9.2z"/>
									<circle cx="6.5" cy="6.5" r="1.7"/>
								</svg>
								610
							</span>
						</section>
					</aside>
					<a class="link" href="<?php echo $link?>">
						<svg viewBox="0 0 19 14">
							<path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
						</svg>
					</a>
				</section>
			</section>
			<?php endwhile?>
			<?php $k = 8?>
			<?php while($k--):?>
				<aside class="hide page">
					<?php $i = 8?>
					<?php while($i--):?>
					<section class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<figure>
							<a href="<?php echo $link?>" title="TED 是一個跨界的智庫，是一個對話的平台，更是實現 ideas 的舞台。TED 分別代表的是科技 (technology)、娛樂 (entert-
ainment)、設計 (design)，是一年一度的創新盛會。1984 年由 Richard Wurman 在加州創立，原本只是一群朋友間的腦力
大激盪，他們來自不同的領域，他們有些是建築師、科學家、教育家、詩人、劇作家、創業家、設計師等等。他們對未來充
滿熱情，又有一些叛逆，聚在一起討論最新最酷的點子，和如何可以改變這個世界。" style="background-image: url(<?php theme_asset('images/videos/thumb.png')?>)"></a>
						</figure>
						<section class="detail">
							<aside class="hover visible-lg">
								<p>台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
							</aside>
							<aside class="normal">
								<span class="date"><span class="day">15</span> OCT 2015</span>
								<span class="category">
									<svg viewBox="0 0 13 13">
										<path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
										L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
										S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
										C12.2,7.4,12.2,7.2,12.1,7z"/>
									</svg>2014 荊艷
								</span>
								<h3>如果覺得這世界不夠好，你應該去打造一個好的世界</h3>
								<section class="info">
									<span class="cast">
										<svg viewBox="0 0 13 13">
										<path d="M10.9,11.5L10.9,11.5h0.6c-0.2-2-1.6-3.6-3.5-4.1c1-0.5,1.6-1.5,1.6-2.7c0-1.7-1.4-3.1-3.2-3.1
											c-1.7,0-3.2,1.4-3.2,3.1C3.3,5.8,4,6.8,5,7.4c-1.9,0.6-3.2,2.2-3.5,4.1h0.6h0.1"/>
										</svg>
										邵定國
									</span>
									<span class="place">
										<svg viewBox="0 0 13 13">
											<path d="M6.5,0.5C4,0.5,2,2.6,2,5c0,1.2,0.5,2.3,1.2,3.1l3.3,4.4l3.3-4.4C10.5,7.3,11,6.2,11,5
												C11,2.6,9,0.5,6.5,0.5z M6.5,6.4c-0.9,0-1.6-0.7-1.6-1.6c0-0.9,0.7-1.6,1.6-1.6c0.9,0,1.6,0.7,1.6,1.6C8.1,5.7,7.4,6.4,6.5,6.4z"/>
										</svg>
										中正大學演藝廳
									</span>
									<span class="viewcount">
										<svg viewBox="0 0 13 13">
											<path d="M6.5,2.6c-2.6,0-4.9,1.6-6,3.8c0,0.1,0,0.1,0,0.2c1,2.3,3.3,3.8,6,3.8s4.9-1.6,6-3.8
												c0-0.1,0-0.1,0-0.2C11.4,4.1,9.1,2.6,6.5,2.6z M6.5,9.2C5,9.2,3.8,8,3.8,6.5C3.8,5,5,3.8,6.5,3.8C8,3.8,9.2,5,9.2,6.5
												S8,9.2,6.5,9.2z"/>
											<circle cx="6.5" cy="6.5" r="1.7"/>
										</svg>
										610
									</span>
								</section>
							</aside>
							<a class="link" href="<?php echo $link?>">
								<svg viewBox="0 0 19 14">
									<path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
								</svg>
							</a>
						</section>
					</section>
					<?php endwhile?>
				</aside>
			<?php endwhile?>
	    </section>
		<aside class="more"><a href="javascript:">更多演講</a></aside>
	</div>
</div>

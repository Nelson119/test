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
<aside class="kv" style="background-image:url(<?php theme_asset('images/events/kv.png')?>) ">
</aside>
<nav class="taxonomy events">
  <ul>
    <li><a href="javascript:" titile="ALL">ALL</a></li>
    <li><a href="javascript:" titile="Gathering">Gathering</a></li>
    <li><a href="javascript:" titile="短講Workshop">短講Workshop</a></li>
    <li><a href="javascript:" titile="校園TED Talk">校園TED Talk</a></li>
    <li><a href="javascript:" titile="年會Event">年會Event</a></li>
    <li><a href="javascript:" titile="其他">其他</a></li>
  </ul>
</nav>
<section class="container">
  <section class="cd-timeline">
    <i class="start-point"></i>
    <h6 class="year">2016</h6>
    <?php $i = 10; $active = true;?>
    <?php while($i--):?>
    <div class="cd-timeline-block">
      <div class="cd-timeline-img"></div> <!-- cd-timeline-img -->
   
      <div class="cd-timeline-content">
        <a href="<?php echo $link?>">
          <figure style="background-image:url(<?php theme_asset('images/events/event01.png')?>)"></figure>
          <article>
            <aside class="hover visible-lg">
              <p>台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
            </aside>
            <aside class="normal">
              <span class="category">
                <svg viewBox="0 0 13 13">
                  <path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
                  L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
                  S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
                  C12.2,7.4,12.2,7.2,12.1,7z"/>
                </svg>短講Workshop
              </span>
              <h3>TEDxTaipeiED: FUN學後</h3>
              <?php if($active):?>
              <span class="active">活動熱烈報名中</span>
              <?php else:?>
              <span class="past">活動內容與花絮</span>          
              <?php endif; $active = false; ?>
            </aside>
            <span class="date"><span class="day">15</span> OCT 2015</span>
            <span class="link" href="<?php echo $link?>">
              <svg viewBox="0 0 19 14">
                <path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
              </svg>
            </span>
          </article>
        </a>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    <?php endwhile?>
  </section>
  <section class="cd-timeline dark">
    <i class="start-point"></i>
    <h6 class="year">2015</h6>
    <?php $i = 5?>
    <?php while($i--):?>
    <div class="cd-timeline-block">
      <div class="cd-timeline-img"></div> <!-- cd-timeline-img -->
   
      <div class="cd-timeline-content">
        <a href="<?php echo $link?>">
          <figure style="background-image:url(<?php theme_asset('images/events/event01.png')?>)"></figure>
          <article>
            <aside class="hover visible-lg">
              <p>台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
            </aside>
            <aside class="normal">
              <span class="category">
                <svg viewBox="0 0 13 13">
                  <path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
                  L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
                  S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
                  C12.2,7.4,12.2,7.2,12.1,7z"/>
                </svg>短講Workshop
              </span>
              <h3>TEDxTaipeiED: FUN學後</h3>
              <?php if($active):?>
              <span class="active">活動熱烈報名中</span>
              <?php else:?>
              <span class="past">活動內容與花絮</span>          
              <?php endif; $active = false; ?>
            </aside>
            <span class="date"><span class="day">15</span> OCT 2015</span>
            <span class="link" href="<?php echo $link?>">
              <svg viewBox="0 0 19 14">
                <path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
              </svg>
            </span>
          </article>
        </a>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    <?php endwhile?>
  </section>
  <section class="cd-timeline">
    <i class="start-point"></i>
    <h6 class="year">2014</h6>
    <?php $i = 5?>
    <?php while($i--):?>
    <div class="cd-timeline-block">
      <div class="cd-timeline-img"></div> <!-- cd-timeline-img -->
   
      <div class="cd-timeline-content">
        <a href="<?php echo $link?>">
          <figure style="background-image:url(<?php theme_asset('images/events/event01.png')?>)"></figure>
          <article>
            <aside class="hover visible-lg">
              <p>台灣冷門景點復甦計劃發起者「如果覺得這世界不夠好，你應該去打造一個好的世界。」歐北來，由一群有想法有行動的青年組成。為了使台灣更好，他們用最單純最在地的方式去認識這塊土地；他們出走，感受，然後傳遞，為更好的台灣。他們是歐北來，超越想像的歐北來。</p>
            </aside>
            <aside class="normal">
              <span class="category">
                <svg viewBox="0 0 13 13">
                  <path d="M0,2.3L0,5c0,0.6,0.4,1.5,0.8,2l4.5,4.5C5.8,12,6.5,12,7,11.5l3.4-3.4c0.4-0.4,0.4-1.2,0-1.6
                  L5.8,2c-0.4-0.4-1.3-0.8-2-0.8H1.2C0.5,1.2,0,1.7,0,2.3z M1.5,3.9c0-0.6,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2C3.9,4.5,3.3,5,2.7,5
                  S1.5,4.5,1.5,3.9z M12.1,7L6.2,1.2c0.6,0,1.5,0.4,2,0.8l4.5,4.5c0.4,0.4,0.4,1.2,0,1.6l-3.4,3.4c-0.4,0.4-0.9,0.4-1.4,0.2l4.1-4.1
                  C12.2,7.4,12.2,7.2,12.1,7z"/>
                </svg>短講Workshop
              </span>
              <h3>TEDxTaipeiED: FUN學後</h3>
              <?php if($active):?>
              <span class="active">活動熱烈報名中</span>
              <?php else:?>
              <span class="past">活動內容與花絮</span>          
              <?php endif; $active = false; ?>
            </aside>
            <span class="date"><span class="day">15</span> OCT 2015</span>
            <span class="link" href="<?php echo $link?>">
              <svg viewBox="0 0 19 14">
                <path d="M18.7,6.4l-5.7-5.7c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2L16,6.1H0.9 C0.4,6.1,0,6.5,0,7c0,0.5,0.4,0.9,0.9,0.9H16L11.8,12c-0.3,0.3-0.3,0.9,0,1.2c0.2,0.2,0.4,0.3,0.6,0.3c0.2,0,0.5-0.1,0.6-0.3 l5.7-5.7C19.1,7.3,19.1,6.7,18.7,6.4z"/>
              </svg>
            </span>
          </article>
        </a>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    <?php endwhile?>
  </section>

  <a href="javascript:" class="readmore">更多活動</a>
</section>

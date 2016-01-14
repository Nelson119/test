<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $posttype = get_post_type();
  $obj = get_post_type_object( $posttype );
  
?>
    <section class="page report-list">
      <div class="container">
		<div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
        <section class="row">
          <section class="col-lg-12">
            <div class="col-lg-12"><h2><img src="<?php echo $theme_path?>images/common/<?php echo $posttype?>.svg"></h2></div>
            <section class="highlight col-lg-12">
            <section class="row">
              <?php 
                $wp_query = new WP_Query (array (
                    // 'post_type' => $posttype,

                    // 'post_per_page' => 1,
                    // 'order_by' => 'date',
                    // 'order' => 'desc',
                    // 'paged' => 1,
                    // 'meta_key'   => 'highlight',

                     'meta_key' => 'highlight',
                     'meta_value' => '1'
                ));
                if ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <?php print_r(get_post())?>
              <a href="<?php echo get_the_permalink()?>" class="col-lg-8">
                <aside class="visual">
                  <img src="<?php echo $theme_path?>images/articles/customs.png"><i></i>
                </aside>
              </a>
              <aside class="col-lg-4 text-content">
                <a class="category col-lg-6" href="custom-list.html">結婚禮俗</a>
                <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                <h5 class="col-lg-12"><a href="customs.html">誰能突破Galia Lahav的性感？就交給他了!</a></h5>
                <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在春在春夏的超大膽系...</p>

              </aside>
              <?php endif?>
            </section>
              <hr>
            </section>
            <section class="two-col col-lg-12">
              <ul class="row">
                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <a class="category col-lg-6" href="customs.html">編輯精選<img src="<?php echo $theme_path?>images/common/crown.svg"></a>
                  <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                  <a class="thumb col-lg-12" href="customs.html"><img src="<?php echo $theme_path?>images/articles/2-col-thumb.png"><i></i></a>
                  <h5 class="col-lg-12"><a href="customs.html">誰能突破Galia Lahav的性感？就交給他了!</a></h5>
                  <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在春在春夏的超大膽系...</p>
                </li>
                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <a class="category col-lg-6" href="customs.html">網友最愛<img src="<?php echo $theme_path?>images/common/heart.svg"></a>
                  <i class="fa view-counter text-right col-lg-6"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                  <a class="thumb col-lg-12" href="customs.html"><img src="<?php echo $theme_path?>images/articles/2-col-thumb.png"><i></i></a>
                  <h5 class="col-lg-12"><a href="customs.html">誰能突破Galia Lahav的性感？就交給他了!</a></h5>
                  <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在春在春夏的超大膽系...</p>

                </li>
              </ul>
              <hr>
            </section>
            <section class="three-col col-lg-12">
              <section class="row">
                <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="row">
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                      <a class="category col-lg-6 col-md-6 col-sm-6 col-xs-6" href="customs.html">婚禮音樂</a>
                      <i class="fa view-counter col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right"><img class="eye" src="<?php echo $theme_path?>images/common/eye.svg">4063</i>
                      <aside>
                        <a class="thumb col-lg-12 col-md-12 col-sm-12 col-xs-12" href="customs.html"><i></i><img src="<?php echo $theme_path?>images/articles/thumb-1.png"></a>
                        <h5 class="col-lg-12"><a href="javascript:">誰能突破Galia Lahav的性感？就交給Galia Lahav秋冬高..</a></h5>
                        <p class="col-lg-12">每次都帶給人耳目一新的設計感的婚紗女王又出招啦還記得她在春夏的超大膽系列嗎？秋冬系列還記得她在2016春夏...</p>
                      </aside>
                    </li>
                  </ul>
                </section>
                
              </section>
            </section>
            <aside class="text-center">
              <aside class="pagination">
                <a href="customs-list.html" class="prev"><img src="<?php echo $theme_path?>images/common/dual-prev.png"></a>
                <ul>
                  <li><a href="customs-list.html">1</a></li>
                  <li><a href="customs-list-next.html">2</a></li>
                  <li><a href="customs-list-next.html">3</a></li>
                </ul>
                <a>...</a>
                <a href="customs-list-next.html"><img src="<?php echo $theme_path?>images/common/next.png"></a>
                <a href="customs-list-next.html">Last</a>
                <a href="customs-list-next.html" class="next"><img src="<?php echo $theme_path?>images/common/dual-next.png"></a>
              </aside>
            </aside>
          </section>
        </section>
      </div>
      
    </section>

<?php the_posts_navigation(); ?>
<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page vendors">
    <div class="container main-content">
      <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
      <div class="col-lg-12 header-buff">
        <section class="row">
          <section class="col-lg-12">
            <span class="category">拍婚紗</span>
            <h3><?php the_title(); ?></h3>
          </section>
        </section>
        <section class="row">
          <article class="col-lg-9">
            <section id="gallery">
              <a class="zoom" href="javascript:"><img src="<?php echo $theme_path?>images/common/zoom.png"></a>
              <ul class="slides">
              <?php 
                $cfs = CFS();
                $pictures = $cfs->get('gallery');
                if(count($pictures)) {
                  foreach ($pictures as $picture) {
                    ?>
                      <li><figure><img src="<?php echo $picture['image']?>"></figure></li>
                  <?php }

                }?>
              </ul>
              <ol class="slide-thumb">
                <?php 
                  if(count($pictures)) {
                    foreach ($pictures as $picture) {
                      ?>
                      <li><figure><img src="<?php echo $picture['image']?>"></figure></li>
                    <?php }

                  }?>
              </ol>
            </section>
            <?php the_content();?>
            <aside class="text-center">
              <aside class="pagination">
                <a class="prev"><img src="<?php echo $theme_path?>images/common/dual-prev.png"></a>
                <ul>
                  <li><a href="javascript:">1</a></li>
                  <li><a href="javascript:">2</a></li>
                  <li><a href="javascript:">3</a></li>
                </ul>
                <a>...</a>
                <a><img src="<?php echo $theme_path?>images/common/next.png"></a>
                <a>Last</a>
                <a class="next"><img src="<?php echo $theme_path?>images/common/dual-next.png"></a>
              </aside>
            </aside>
          </article>
          <aside class="side col-lg-3 col-md-12 col-sm-12 col-xs-12 pull-right text-left">
            <section class="row">
              <div class="vendor-about">
                <hr>
                <span class="tagline">ABOUT US</span>
                <img class="logo" src="<?php echo $theme_path?>images/vendors/vendor-logo.png">
                <hr>
                <p class="description text-left">我們希望，每位新娘都能擁有一輩子的夢想．ＷＨＩＴＥ手工婚紗秉持優質的服務．ＷＨＩＴＥ手工婚紗秉持優質的服務．每位新娘都能擁有一輩子的夢想．ＷＨＩＴＥ手工婚紗秉持優質的服務</p>
                <hr>
                <span class="tagline">ABOUT US</span>
                <p class="detail text-left">營業時間 13:00 ~ 21:00</p>
                <p class="detail text-left">休假時間  週日休</p>
                <p class="detail text-left">高級手工婚紗出租服務，預約制。</p>
                <p class="detail text-left">聯絡電話： 0978-833-511</p>
                <p class="detail text-left"><a href="http://whitestudio.pixnet.net/blog">網址：http://whitestudio.pixnet.net/blog</a>
                <p class="detail text-left">地址：大安區和平東路二段257號7樓</p>
              <div class="box text-center">
                <span class="tagline">ABOUT US</span>
                <hr>
                <p>你沒看錯，White3週年了！！<br>
在這特別的時刻，感謝大家對於我們的支持，我們推出有史以來最優惠的活動，即日起全館全館6 5折起﹒非常謝謝這一年來大家給了我在這特別的時刻，感謝大家對於我們的支持，我們推出有史以來最優惠的活動，即日起全館全館6 5折起﹒非常謝謝這一年來大家給了我們很多鼓勵與建議，讓我們能持續的進步。</p>
              </div>
            </section>
          </aside>
        </section>
        <section class="row">
          <article class="col-lg-9">
            <div class="fb-like" data-href="https://google.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            <hr class="comments-top">
            <div class="comments">
              <div class="fb-comments" data-href="http://google.com/" data-width="100%" data-numposts="5"></div>
            </div>
          </article>
        </section>
      </div>
    </div>
      
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev icon-left-open-big"></a>
        <a class="next icon-right-open-big"></a>
        <a class="close"><i class="icon-right-open-big"></i><i class="icon-left-open-big"></i></a>
        <ol class="indicator"></ol>
    </div>
  </section>
<?php endwhile; ?>

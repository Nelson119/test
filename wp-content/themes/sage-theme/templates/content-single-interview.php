<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page interview-list">
    <div class="container">
      <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
      <section class="row">
        <section class="col-lg-12 header-buff">
          <article class="col-lg-12 text-left">
            <span><?php echo $obj->labels->singular_name?></span><img class="view-count" src="<?php echo $theme_path?>images/common/eye.svg"><span>xxx</span>
            <h3><?php the_title(); ?></h3>
          </article>
          <article class="col-lg-8 text-left">
            <figure><?php the_post_thumbnail()?></figure>
            <?php the_content(); ?>
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
            <ul class="tags">
              <?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {?>
              <li><a href="<?php echo get_tag_link($tag->term_id)?>"><?php echo  $tag->name?></a></li>
              <?php }}?>
              <?php $terms = wp_get_post_terms($post->ID, '人物專訪', array("fields" => "all"));if ($terms) {foreach($terms as $term) {?>
              <li><a href="<?php echo get_term_link($term, '人物專訪')?>"><?php echo  $term->name?></a></li>
              <?php }}?>
            </ul>
            <section class="author row">
              <aside class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><img src="<?php echo $theme_path?>images/articles/author.png"></aside>
              <aside class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <h4>Hāusenn 可畏工作</h4>
                <p>獨立Ｘ婚紗Ｘ平面設計Ｘ動態影像Ｘ服裝設計，我們的服裝品牌，設計師張佑豪歷年來打造許多國內外藝人包括：張惠妹，濱崎步，蔡依林，蕭亞軒，田馥甄，藍心湄等知名藝人的表演定製服，一起與攝影師劉美力合作開發更新穎的婚紗市場，糅合時尚與婚禮，一起與發更新穎的婚紗與婚禮，一起與攝影師劉美力合作與攝影師劉美力合作開發更是把高端時尚的元素帶進婚紗體驗中。」</p>
              </aside>
            </section>
            <div class="fb-like" data-href="https://google.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            <hr class="comments-top">
            <div class="comments">
              <div class="fb-comments" data-href="http://google.com/" data-width="100%" data-numposts="5"></div>
            </div>
          </article>
          <aside class="side col-lg-4">
            <div class="box">must read</div>
            <div><img src="<?php echo $theme_path?>images/articles/mustread.png"></div>
            <div>永恆的浪漫與優雅浪漫與優雅浪漫與優雅..</div>
            <div class="box">popular</div>
            <div class="popular">
              <ul>
                <li class="popular col-lg-12">
                  <a class="row" href="javascript:">
                    <aside class="col-lg-4">
                      <span><img src="<?php echo $theme_path?>images/articles/popular-thumb.png"><i></i></span>
                    </aside>
                    <aside class="col-lg-8 row">
                      <strong class="col-lg-12">NO. 1</strong>
                      <span class="col-lg-12">永恆的浪漫與優雅浪漫與優雅浪漫優雅..</span>
                      <ol class="col-lg-12">
                        <li>婚禮佈置</li>
                      </ol>
                    </aside>
                  </a>
                </li>
                <li class="popular col-lg-12">
                  <a class="row" href="javascript:">
                    <aside class="col-lg-4">
                      <span><img src="<?php echo $theme_path?>images/articles/popular-thumb.png"><i></i></span>
                    </aside>
                    <aside class="col-lg-8 row">
                      <strong class="col-lg-12">NO. 2</strong>
                      <span class="col-lg-12">永恆的浪漫與優雅浪漫與優雅浪漫優雅..</span>
                      <ol class="col-lg-12">
                        <li>婚禮佈置</li>
                      </ol>
                    </aside>
                  </a>
                </li>
                <li class="popular col-lg-12">
                  <a class="row" href="javascript:">
                    <aside class="col-lg-4">
                      <span><img src="<?php echo $theme_path?>images/articles/popular-thumb.png"><i></i></span>
                    </aside>
                    <aside class="col-lg-8 row">
                      <strong class="col-lg-12">NO. 3</strong>
                      <span class="col-lg-12">永恆的浪漫與優雅浪漫與優雅浪漫優雅..</span>
                      <ol class="col-lg-12">
                        <li>婚禮佈置</li>
                      </ol>
                    </aside>
                  </a>
                </li>
                <li class="popular col-lg-12">
                  <a class="row" href="javascript:">
                    <aside class="col-lg-4">
                      <span><img src="<?php echo $theme_path?>images/articles/popular-thumb.png"><i></i></span>
                    </aside>
                    <aside class="col-lg-8 row">
                      <strong class="col-lg-12">NO. 4</strong>
                      <span class="col-lg-12">永恆的浪漫與優雅浪漫與優雅浪漫優雅..</span>
                      <ol class="col-lg-12">
                        <li>婚禮佈置</li>
                      </ol>
                    </aside>
                  </a>
                </li>
                <li class="popular col-lg-12">
                  <a class="row" href="javascript:">
                    <aside class="col-lg-4">
                      <span><img src="<?php echo $theme_path?>images/articles/popular-thumb.png"><i></i></span>
                    </aside>
                    <aside class="col-lg-8 row">
                      <strong class="col-lg-12">NO. 5</strong>
                      <span class="col-lg-12">永恆的浪漫與優雅浪漫與優雅浪漫優雅..</span>
                      <ol class="col-lg-12">
                        <li>婚禮佈置</li>
                      </ol>
                    </aside>
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <a href="javascript:">
                <img src="<?php echo $theme_path?>images/articles/ad.png">
              </a>
            </div>
          </aside>
        </section>
      </section>
    </div>
  </section>
<?php endwhile; ?>

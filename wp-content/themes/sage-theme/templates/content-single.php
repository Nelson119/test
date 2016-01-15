<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="page interview-list">
      <div class="container">
        <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
        <section class="row">
          <section class="col-lg-12  header-buff">
            
            <article class="col-lg-12 text-left">
              <span><?php print_r($obj->labels->name)?></span><img class="view-count" src="<?php echo $theme_path?>images/common/eye.svg"><span>4063</span>
              <h3><?php the_title()?></h3>
            </article>
            <article class="col-lg-8 text-left">
              <?php the_content()?>
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
              <section class="recommended">
                <h5>YOU MAY ALSO LIKE</h5>
                <ul class="row">
                  <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6"><a href="customs.html"><img src="<?php echo $theme_path?>images/articles/recommended.png"><i></i></a></li>
                  <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6"><a href="customs.html"><img src="<?php echo $theme_path?>images/articles/recommended.png"><i></i></a></li>
                  <li class="col-lg-4 col-md-4 hidden-sm hidden-xs"><a href="customs.html"><img src="<?php echo $theme_path?>images/articles/recommended.png"><i></i></a></li>
                </ul>
              </section> 
              <div class="fb-like" data-href="https://google.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              <hr class="comments-top">
              <div class="fb-comments" data-href="http://google.com/" data-width="100%" data-numposts="5"></div>
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

<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
?>
<section class="page contact">
  <div class="container">
    <div class="col-lg-12"><ul class="breadcrumbs col-lg-12">
      <li><a href="javascript:">HOME</a></li>
      <li><a href="javascript:">人物專訪</a></li>
      <li><a href="javascript:">婚禮專家</a></li>
    </ul></div>
    <section class="row">
      <section class="col-lg-12">

        <section class="col-lg-12">
          <p>請留下想要諮詢的訊息，我們將會盡快回復您！請留下想要諮詢的訊息，我們將會盡快回復您！請留下想要諮詢的訊息，我們將會盡快回復您！請留下想要諮詢的訊息，我們將會盡快回復您！請留下想要諮詢的訊息，我們將會盡快回復您！</p>
          <form class="row">
            <section class="form-group col-lg-12">
              <label class="control-label" for="userName">Name / 姓名 </label>
              <input class="form-control col-lg-12" name="userName">
            </section>
            <section class="form-group col-lg-12">
              <label class="control-label" for="email">Email / 信箱 </label>
              <input class="form-control col-lg-12" name="email">
            </section>
            <section class="form-group col-lg-12">
              <label class="control-label" for="phone">Phone / 聯絡電話 </label>
              <input class="form-control col-lg-12" name="phone">
            </section>
            <section class="form-group col-lg-12">
              <label class="control-label" for="subject">Subject / 主題 </label>
              <select class="form-control col-lg-12" name="subject">
                <option>廠商諮詢</option>
              </select>
            </section>
            <section class="form-group col-lg-12">
              <label class="control-label" for="attachment">Attachment / 上傳圖片 </label>
              <input type="file" class="file" data-show-upload="false" data-show-preview="false" data-show-caption="true">
            </section>
            <section class="form-group col-lg-12">
              <label class="control-label" for="message">Message / 訊息 </label>
              <textarea class="form-control col-lg-12" rows="5" cols="50" name="message"></textarea>
            </section>
            <section class="form-group col-lg-12 text-right">
              <button class="btn-shine">send message</button>
            </section>
          </form>
        </section>
      </section>  
    </section>
  </div>
  
</section>
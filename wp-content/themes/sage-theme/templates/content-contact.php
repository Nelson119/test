<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
?>
<section class="page contact">
  <div class="container">
    <div class="col-lg-12"><div class="breadcrumbs col-lg-12"><?php instant_breadcrumb(); ?></div></div>
    <section class="row">
      <section class="col-lg-12">

        <section class="col-lg-12">
          <p>請留下想要諮詢的訊息，我們將會盡快回復您！<div><span style="color:#e33">*</span>請務必填寫</div></p>
          <section class="form row">
            <?php echo do_shortcode('[contact-form-7 id="165" title="contact"]');?>
          </section>
        </section>
      </section>  
    </section>
  </div>
  
</section>
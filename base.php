<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      // e.src='https://www.google-analytics.com/analytics.js';
      // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      // ga('create','UA-72716951-1');ga('send','pageview');
      var headJS = {};
      headJS.ajaxurl = '<?php echo admin_url( 'admin-ajax.php' )?>';
      headJS.templateurl = '<?php echo get_template_directory_uri()?>';
      headJS.posts_per_page = '<?php echo get_option('posts_per_page') ?>';
      window.headJS = headJS
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=489266664463439";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  </body>
</html>

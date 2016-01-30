<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
?>
<div class="footer">
  <section class="container">
    <aside calss="col-lg-12">
      <a class="logo" href="./"><img class="svg" alt="" src="<?php echo $theme_path?>images/common/logo.svg"></a>
      <p>&copy; COPYRIGHT BY GET MARRY唯婚誌2015.</p>
      <ol>
        <li><a href="http://instagram.com" target="_blank" ><i class="fa fa-instagram"></i></a></li>
        <li><a href="http://facebook.com" target="_blank" ><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://pinsterest.com" target="_blank" ><i class="fa fa-pinterest"></i></a>
      </ol>
      <ul>
        <li><a href="<?php echo get_site_url()?>/關於我們" title="關於我們"></a></li>
        <li><a href="<?php echo get_site_url()?>/vendor" title="合作廠商"></a></li>
        <li><a href="<?php echo get_site_url()?>/免責聲明" title="免責聲明"></a></li>
        <li><a href="<?php echo get_site_url()?>/隱私權政策" title="隱私權政策"></a></li>
        <li><a href="<?php echo get_site_url()?>/公司介紹" title="公司介紹"></a></li>
      </ul>
    </aside>
  </section>
</div>
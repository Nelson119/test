<?php 
  $theme_path = get_template_directory_uri() . '/dist/';
  $obj = get_post_type_object( get_post_type() );
  $keyword = 'Marry,唯婚誌,white style,生活,態度,禮服,婚禮,白紗,美白,婚紗,自助婚紗,自主婚紗,婚紗攝影,結婚,訂婚';
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAY1BMVEUAAAA4NjU4NjU4NjU4NjU4NjU4NjU4NjVGRENFQ0IyMC8/PTxMSklYV1ZlZGNycXB/fn2DgYGMi4qPjo2ZmJelpKSysbG0tLO/vr7My8vZ2Nja2dnl5eXm5uby8vLz8vL///92zTVcAAAACnRSTlMAEDBwgK+/z9/vs/VsWAAAAU5JREFUOMuNU9uWgyAMVKtUY8UbymIt8v9fuYFQpLZbd17MMUMmTEKS7MjygiGKPEs+IM3LXj4M4iH7Mk+P+UslNxOwyeryepyNUdpRRhYVSa/SvEFe0z1/9z+XWYhJYbBqY+6Bwei8Hmq4DaJroBXNbGsw39/o8nMN9eQi1QAIG4yu07Ry/XUAsHgl3RBhq6xI7gQE+FMOq49ljoTSFlgwf4uu0BFhK9Hf3kYtEqaIoDh9+4wUVszD+u6F1Sis/9NBIeBRJMx+ByTwTwTDiMCR0J4Rum+ENpKYucdABNekiHtAzxH1pKlJd01l/+wmQHAFr0lG3aJJGGMJ+mkUWT2/jAKnCcFqPyxss9ZxhX1YNG6ccHBCPX2lcfuF0ViDu3EseItO7wsTVk6hXVwIDnWnSIAdl3b9EULMyivd47X+vvbnD+f86f3j8f75/H8BBSNOlmLtREcAAAAASUVORK5CYII=" rel="apple-touch-icon" />
    <link href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAY1BMVEUAAAA4NjU4NjU4NjU4NjU4NjU4NjU4NjVGRENFQ0IyMC8/PTxMSklYV1ZlZGNycXB/fn2DgYGMi4qPjo2ZmJelpKSysbG0tLO/vr7My8vZ2Nja2dnl5eXm5uby8vLz8vL///92zTVcAAAACnRSTlMAEDBwgK+/z9/vs/VsWAAAAU5JREFUOMuNU9uWgyAMVKtUY8UbymIt8v9fuYFQpLZbd17MMUMmTEKS7MjygiGKPEs+IM3LXj4M4iH7Mk+P+UslNxOwyeryepyNUdpRRhYVSa/SvEFe0z1/9z+XWYhJYbBqY+6Bwei8Hmq4DaJroBXNbGsw39/o8nMN9eQi1QAIG4yu07Ry/XUAsHgl3RBhq6xI7gQE+FMOq49ljoTSFlgwf4uu0BFhK9Hf3kYtEqaIoDh9+4wUVszD+u6F1Sis/9NBIeBRJMx+ByTwTwTDiMCR0J4Rum+ENpKYucdABNekiHtAzxH1pKlJd01l/+wmQHAFr0lG3aJJGGMJ+mkUWT2/jAKnCcFqPyxss9ZxhX1YNG6ccHBCPX2lcfuF0ViDu3EseItO7wsTVk6hXVwIDnWnSIAdl3b9EULMyivd47X+vvbnD+f86f3j8f75/H8BBSNOlmLtREcAAAAASUVORK5CYII=" rel="shortcut icon" type="image/x-icon" />

	<meta property="fb:app_id" content="176185156077379" />
	<meta property="fb:admins" content="1558554981,1591451538,1447149769"/>
	
	<?php if( is_search()):?>
	<!--is_search-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>搜尋結果 / <?php echo $_GET['s']?> - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">

	<?php elseif (!have_posts()):?>
	<!--is_search-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>指定的內容沒有結果 - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
	
	<?php elseif(is_404()):?>
	<!--404-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>Oops - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
	<!--單篇文章-->
	<?php elseif(is_single()):?>

	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
	<!--FACEBOOK OG TAG-->
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?php echo get_permalink();?>">
	<meta property="og:title" content="<?php echo the_title();?>">
	<!--網站首頁-->
	<?php elseif(is_home() || is_front_page()):?>
	<title><?php echo get_bloginfo('name'); ?></title>
	<!--FACEBOOK OG TAG-->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?php echo home_url(); ?>">
	<meta property="og:image" content="<?php echo $path?>img/common/share-img.jpg">
	<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>">
	<?php else:?>
	<!--列表頁-->
	<title><?php echo $obj->labels->name?> - <?php echo get_bloginfo('name'); ?></title>
	<!--FACEBOOK OG TAG-->
	<meta property="og:type" content="object">
	<meta property="og:url" content="<?php echo get_permalink();?>">
	<meta property="og:image" content="<?php echo $path?>img/common/share-img.jpg">
	<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo $keyword?>">
	<?php endif?>

  <?php wp_head(); ?>
  <?php setPostViews(get_the_ID()); ?>
</head>

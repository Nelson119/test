<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php if( is_search()):?>
	<!--is_search-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>搜尋結果 / <?php echo $_GET['s']?> - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo get_the_title()?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">

	<?php elseif (!have_posts()):?>
	<!--is_search-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>指定的內容沒有結果 - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo get_the_title()?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
	
	<?php elseif(is_404()):?>
	<!--404-->
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<title>Oops - <?php echo get_bloginfo('name'); ?></title>

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo get_the_title()?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
	<!--單篇文章-->
	<?php elseif(is_single()):?>

	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">
	<meta property="og:description" content="<?php echo get_the_title().' - '.get_bloginfo('name')?>">

	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="<?php echo get_the_title()?>,<?php $posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; }}?>">
	
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
	<meta name="keywords" content="<?php echo get_the_title()?>">
	<!--列表頁-->
	<?php else:?>
	<title><?php echo get_the_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
	<!--FACEBOOK OG TAG-->
	<meta property="og:type" content="object">
	<meta property="og:url" content="<?php echo get_permalink();?>">
	<meta property="og:image" content="<?php echo $path?>img/common/share-img.jpg">
	<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
	<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 標題為頁面標題加網站標題 -->
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
	<!-- 網頁關鍵字為文章的標籤 -->
	<meta name="keywords" content="">
	<?php endif?>

  <?php wp_head(); ?>
  <?php setPostViews(get_the_ID()); ?>
</head>

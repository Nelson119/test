<?php 
 	$theme_path = get_template_directory_uri() . '/dist/';
	$obj = get_post_type_object( get_post_type() );
?>
<?php 
  $summary = types_render_field("summary",array("raw"=>true));
  if($summary == null || $summary == ""){
    $summary = get_the_content();
    if(strlen($summary) > 42){
      $summary = wp_trim_words( get_the_content(), 41 );
    }
  }
  $thumbnail = types_render_field("thumbnail",array("raw"=>true));
  if($thumbnail == null || $thumbnail == ""){
    $thumbnail = types_render_field("thumbnail-alt",array("raw"=>true));
  }
?>
<li>
	<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4"><a href="<?php echo get_the_permalink()?>" style="background-image:url(<?php echo $thumbnail?>)"><i></i></a></div>
    <aside class="col-lg-10 col-md-8 col-sm-8 col-xs-8">
      <h5><a href="<?php echo get_the_permalink()?>"><?php the_title();?></a></h5>
      <span><?php echo $obj->labels->name?></span><img class="view-count" src="<?php echo $theme_path?>images/common/eye.svg"><span><?php echo getPostViews(get_the_id())?></span>
      <p class="hidden-xs"><?php echo $summary?></p>
    </aside>
</li>
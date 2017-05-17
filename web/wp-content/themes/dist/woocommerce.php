<?php get_header(); ?>
<?php if(get_field('carousel', 142)){
	$idbanner = 142;
}else{
	$idbanner = 5;
}?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
 <?php $i = 0; while(the_repeater_field('carousel', $idbanner)){?>
    <li data-target="#carousel-example-generic" data-slide-to="<?= $i;?>" <?php if($i==0){echo'class="active"';}?>></li>
 <?php $i++; } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
 <?php $i = 0; while(the_repeater_field('carousel', $idbanner)){
 		$id = get_sub_field('image');
 		$img = wp_get_attachment_image_src( $id, 'header' );
 	?>
    <div class="item <?php if($i==0){echo 'active';}?>">
      <img src="<?= $img[0];?>" alt="...">
    </div>
 <?php $i++; } ?>
  </div>
</div>
<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
				<?php woocommerce_content(); ?>
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
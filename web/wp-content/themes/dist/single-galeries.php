<?php get_header(); ?>
<?php if(get_field('carousel')){
	$idbanner = get_the_ID();
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
				<div class="row">
					<div class="col-sm-12">
						<h1 style="text-align: center;"><?php the_title();?></h1>
						<p></p>
						<p></p>
						<?php the_content(); ?>
						<p></p>
						<p></p>
					</div>
				</div>
				<div class="row galeries">
				<?php while(the_repeater_field('photos')){
						$id = get_sub_field('image');
						$img = wp_get_attachment_image_src( $id, 'thumb' );
						$imgfull = wp_get_attachment_image_src( $id, 'full' );
				?>
					<div class="col-sm-4">
						<a href="<?= $imgfull[0];?>" rel="prettyPhoto[]"><img class="img-responsive" src="<?= $img[0];?>" alt="<?php the_title();?>"></a>		
					</div>
				<?php } ?>
				</div>
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
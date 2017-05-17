<?php 
/* Template Name: Photos */
get_header(); ?>
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
					</div>
				</div>
				<div class="row">
					<?php 
						$args = array(
							'post_type' => 'galeries',
							'posts_per_page' => -1
						);
						$query = new WP_Query( $args );
						while ( $query->have_posts() ) {
								$query->the_post();
							$id = get_post_thumbnail_id();
							$img = wp_get_attachment_image_src( $id, 'thumb' );
						?>
						<div class="col-sm-4">
							<a href="<?php the_permalink();?>"><img class="img-responsive" src="<?= $img[0];?>" alt="<?php the_title();?>"></a>
							<h2><a href="<?php the_permalink();?>" alt="<?php the_title();?>"><?php the_title();?></a></h2>			
						</div>
					<?php }
					wp_reset_postdata();
					?>
				</div>  
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
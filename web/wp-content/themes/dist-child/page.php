<?php 

/**
 * Template Name: Default
 *
 * @package WordPress
 * @subpackage dist
 * @since 1.0
 */

get_header(); 
   
    ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php 
                    $pageAccueil = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'accueil.php'));
                        if (count($pageAccueil) !== 0) $pageAccueil = $pageAccueil[0];
                        if (have_posts($pageAccueil->ID)) {
                            $i = 0; while(the_repeater_field('carousel', $pageAccueil->ID)){?>
		<li data-target="#carousel-example-generic" data-slide-to="<?= $i;?>" <?php if($i==0){echo'class="active"';}?>></li>
                        <?php $i++; }} ?>
    </ol>

  <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		<?php $i = 0; while(the_repeater_field('carousel', $pageAccueil->ID)){
		 	$id = get_sub_field('image');
			$img = wp_get_attachment_image_src( $id, 'full' );
		?>
		<div class="item <?php if($i==0){echo 'active';}?>">
			<img src="<?= $img[0];?>" alt="...">
		</div>
	 <?php $i++; } ?>
    </div>
    <div class="carousel-lines carousel-line-top"></div>
    <div class="carousel-lines carousel-line-bottom"></div>  
	<div id='divBanniereOuter'>	
		<div id='divBanniereInner'>		
			<div id="divBanniere"><?php choixBanniere(); ?></div><div id="boutBaniere"></div>
		</div>
	</div>  
</div>

<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
                            <div class="midContent"><?php insererPage(); ?></div>
                        </div>
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
<?php 
/* Template Name: Page Accueil*/ 
get_header(); 
?>
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
			$img = wp_get_attachment_image_src( $id, 'full' );
		?>
		<div class="item <?php if($i==0){echo 'active';}?>">
			<img src="<?= $img[0];?>" alt="...">
		</div>
	 <?php $i++; } ?>
    </div>
	<div id='divBanniereOuter' class='accueil'>	
		<div id='divBanniereInner'>		
			<div id="divBanniere">
				<img class='bigLogo' src='wp-content/themes/dist-child/img/Eltec-Logo-Big.png'>
				<div><?php _e( 'Slogan_accueil', 'html5blankchild' ); ?></div>
			</div><div id="boutBaniere"></div>
		</div>
	</div>  
</div>

<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<?php insererSousMenuAccueil(); ?>
			<div class="discription">
				<div id="distributeurs" class="midContent">
					<div class="sectionGauche">
                                            <h1 class="redText"><?php the_field('titre', 907); ?></h1>
                                            <p> <?php the_field('resume', 907);?> </p> 
                                            <?php
                                            if( have_rows('liste', 907) ): ?>
                                                <ul>
                                                <?php while( have_rows('liste', 907) ): the_row(); ?>
                                                    <li><?php the_sub_field('liste_item'); ?></li>
                                                <?php endwhile; ?>
                                                </ul>

                                            <?php endif; ?>
                                            <a class="more-link" href="<?php the_field('lien', 907); ?>"><?php the_field('text_lien', 907); ?></a>
					</div>
					<div class="sectionDroite">
						<div id="mapMonde"></div>
					</div>
				</div>

				<div id="informationTech">
					<div id="forestier">
                                            <div class="midContent">
                                                <div id="imgForestier"></div>
                                                <div id="txtForestier">
                                                    <h2><?php the_field('titre', 974); ?></h2>
                                                    <h3><?php the_field('sous_titre', 974); ?></h3>
                                                    <p> <?php the_field('resume', 974);?> </p>
                                                    <a class="more-link" href="<?php the_field('lien', 974); ?>"><?php the_field('text_lien', 974); ?></a>
                                                </div>
                                            </div>    
					</div>
					
					<div id="technologie">
						<div id="imgTechnologie">
                                                    <div id="txtTechnologie">
							<h1><?php the_field('titre', 970); ?></h1>
                                                        <h3><?php the_field('sous_titre', 970); ?></h3>
                                                        <p> <?php the_field('resume', 970);?> </p>
                                                        <a class="more-link" href="<?php the_field('lien', 970); ?>"><?php the_field('text_lien', 970); ?></a>
                                                    </div>    
						</div>
					</div>
				</div>

				<div id="nouvellesAccueil">
					<?php insererNouvelles('acceuil'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	// Pour la typo spéciale des menus d'accueil
	$("ul.sousMenuAccueil>li.menu-item>a>span.menu-image-title>span").each(function(){
		var res = $(this).text().toString().split(" ");
		for(var cpt=0;cpt<res.length;cpt++)
			res[cpt] = ((cpt === (res.length-1) && cpt !== 0) ? "<br/>" : "") + "<span>" + res[cpt] + "</span>";
		$(this).html(res.join(" "));
	})	
});
</script>
<?php get_footer(); ?>

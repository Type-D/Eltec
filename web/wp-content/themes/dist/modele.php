<?php 

/**
 * Template Name: Modèle
 *
 * @package WordPress
 * @subpackage dist
 * @since 1.0
 */

get_header(); 
?>

<div class="topPageImage">
	<div>	
            <div id="titreSection">
                <?php choixBanniere(); ?>       
            </div>
            <div id="boutBaniere"></div>
	</div>
</div>

<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
                            <?php insererPage(); ?>   
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
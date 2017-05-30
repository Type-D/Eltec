<?php 

/**
 * Template Name: dist child
 *
 * @package WordPress
 * @subpackage dist
 * @since 1.0
 */

get_header(); ?>
<?php if(get_field('carousel')){
	$idbanner = get_the_ID();
}else{
	$idbanner = 5;
}?>
<div class="topPageImage">
	<div><!-- REM TODO À CODER -->		
            <div id="titreSection">
                <?php 
                $pageName = wp_title('', false);
                $banniereTitre = substr($pageName, 0, (strpos($pageName, '-')-1));
                if ($banniereTitre == "Accueil"){
                    echo "<span class='redText bigText'>Eltec</span>";
                }else {
                    echo "<span class='bigText'>".$banniereTitre."</span>";                }
                ?>
                
            </div>
            <div id="boutBaniere"></div>
	</div>
</div>


<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
                            <?php 
                            if ($banniereTitre == "Accueil"){
                                include_once "sousMenu.php";
                            }
                            if ($banniereTitre == "Distributeurs" || $banniereTitre == 'Accueil'){
                                include_once "distributeurs.php";
                            }                                  
                            if ($banniereTitre == 'Accueil'){
                                include_once "accueil.php";
                                include_once "nouvelles.php";
                            }
                            ?> 
                            <?php //get_sidebar(); ?>   
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
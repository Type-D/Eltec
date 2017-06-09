<?php 

/**
 * Template Name: dist child
 *
 * @package WordPress
 * @subpackage dist
 * @since 1.0
 */

get_header(); 

$nomPage = wp_title('', false);
if (substr($nomPage, 0, (strpos($nomPage, '-')-1)) == 'nous joindre'){
    include_once 'nous_joindre.php';
} else {
    ?>

<div class="topPageImage">
	<div>	
            <div id="titreSection">
                <?php choixBanniere(); ?>       
            </div>
            <div id="boutBaniere"></div>
	</div>
</div>

<?php } ?>

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
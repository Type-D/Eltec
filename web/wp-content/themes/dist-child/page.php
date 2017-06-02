<?php 

/**
 * Template Name: dist child
 *
 * @package WordPress
 * @subpackage dist
 * @since 1.0
 */

get_header(); ?>
<div class="topPageImage">
	<div><!-- REM TODO À CODER -->		
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
                            <?php
                                insererPage();                             
                            ?> 
                            <?php //get_sidebar(); ?>   
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
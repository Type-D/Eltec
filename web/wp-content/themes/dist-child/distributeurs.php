<?php
/* 
 * pages des distributeurs
 */
?>
<div id="distributeurs">
    <div class="sectionGauche">
        <h1 class="redText">Nos Distributeurs</h1>
        <?php 
            $the_query = new WP_Query( array('pagename'=>'Distributeurs') );
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    the_content('Lire la suite');
                }
            }
        ?>
    </div>
    <div class="sectionDroite">
        <div id="mapMonde"></div>
    </div>
</div>
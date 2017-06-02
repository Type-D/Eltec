<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="sousMenuAccueil" class="row">
    <div id="service" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/pieces_service"></a></div>
    <div id="modeles" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/nos_modeles"></a></div>
    <div id="multimedia" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/multimedia"></a></div>
</div>
<?php include_once "distributeurs.php"; ?>

<div id="informationTech">
    <div id="forestier">
        <h2>Construit par des <span class='bigText'>forestiers</span> pour des forestiers</h2>
        <h3> 5 générations de forestiers</h3>
        <?php
            $the_query = new WP_Query( array('pagename'=>'Forestiers') );
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    the_content('Lire la suite');
                }
            }
        ?>
    </div>
    
    
    <div id="technologie">
        <div>
            <h1>technologies</h1>
            <h3> 5 générations de forestiers</h3>
            <?php
                $the_query = new WP_Query( array('pagename'=>'Technologie') );
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        the_content('Lire la suite');
                    }
                }
            ?>
        </div>
    </div>
</div>

<div id="nouvellesAccueil">
    <?php include_once "nouvelles.php"; ?>
</div>


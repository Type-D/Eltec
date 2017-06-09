<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="sousMenuAccueil" class="row">
    <div id="service" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/pieces-service"></a></div>
    <div id="modeles" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/nos-modeles"></a></div>
    <div id="multimedia" class="col-lg-4 col-sm-12 "><a href="http://localhost/Eltec/web/multimedia"></a></div>
</div>
<div id="distributeurs">
    <div class="sectionGauche">
        <h1 class="redText">Nos Distributeurs</h1>
        <?php insererContenuePage('distributeurs'); ?>
    </div>
    <div class="sectionDroite">
        <div id="mapMonde"></div>
    </div>
</div>

<div id="informationTech">
    <div id="forestier">
        <h2>Construit par des <span class='bigText'>forestiers</span> pour des forestiers</h2>
        <h3> 5 générations de forestiers</h3>
        <?php insererContenuePage('forestiers'); ?>
    </div>
    
    
    <div id="technologie">
        <div>
            <h1>technologies</h1>
            <h3> 5 générations de forestiers</h3>
            <?php insererContenuePage('technologie'); ?>
        </div>
    </div>
</div>

<div id="nouvellesAccueil">
    <?php insererNouvelles(); ?>
</div>


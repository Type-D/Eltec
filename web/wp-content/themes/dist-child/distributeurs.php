<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="sectionGauche">
    <h1 class="redText"><?php the_field('titre'); ?></h1>
    <?php
    if( have_rows('liste') ): ?>
        <ul>
        <?php while( have_rows('liste') ): the_row(); ?>
            <li><?php the_sub_field('liste_item'); ?></li>
        <?php endwhile; ?>
        </ul>

    <?php endif; ?>
        
</div>
<div class="sectionDroite">
        <div id="mapMonde"></div>
</div>
<p class="noFloat"> <?php the_field('texte_complet');?> </p> 
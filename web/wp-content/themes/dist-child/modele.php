<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1 class="redText"><?php the_field('titre'); ?></h1>
<p><?php the_field('paragraphe'); ?></p>

<div class="colonneGauche">
    <h1 class="redText"><?php the_field('sous_titre'); ?></h1>
    <p><?php the_field('paragraphe2'); ?></p> 
    
</div>
<div class="colonneDroite">
    
    <?php
    if( have_rows('menu_accordeon') ): ?>
        <ul>
        <?php while( have_rows('menu_accordeon') ): the_row(); ?>
            <li><?php the_sub_field('liste_item'); ?></li>
        <?php endwhile; ?>
        </ul>

    <?php endif; ?>
</div>
    
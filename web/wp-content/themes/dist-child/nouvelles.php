<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="nouvelles">
    <h2>Nouvelles</h2>
    <?php
        query_posts('cat=19');
        if(have_posts()) : while(have_posts()) : the_post();
        ?>
        <div class="nouvelle" >
            <h4 class="titreNouvelle"><?php the_title(); ?></h4>
            <?php the_content('Lire la suite'); ?>
        </div>
    <?php
        endwhile;
        endif;
        wp_reset_query();
    ?>
</div>

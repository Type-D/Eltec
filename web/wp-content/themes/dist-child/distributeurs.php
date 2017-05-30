<?php
/* 
 * pages des distributeurs
 */
?>
<div id="distributeurs">
    <div class="sectionGauche">
        <h1 class="redText">Nos Distributeurs</h1>
        <?php 

        ?>


    </div>
    <div class="sectionDroite">
        <div id="mapMonde"></div>
    </div>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <?php the_content(); ?> 

    <div class="lireSuite">
            <div></div><a>Lire la suite</a>
    </div>

    <?php endwhile; ?>          
    <?php endif; ?> 
</div>


    



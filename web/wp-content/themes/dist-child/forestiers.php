<?php

    $the_query = new WP_Query( array('pagename'=>'forestiers') );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            the_content('Lire la suite');
        }
    }
?>

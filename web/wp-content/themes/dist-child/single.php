<?php get_header(); ?>

<div class="topPageImage">
	<div><!-- REM TODO À CODER -->		
            <div id="titreSection">
                <?php 
                $pageName = wp_title('', false);
                $banniereTitre = substr($pageName, 0, (strpos($pageName, '-')-1));
                if ($banniereTitre == "Accueil"){
                    echo "<span class='redText bigText'>Eltec</span>";
                }else {
                    echo "<span class='bigText'>".$banniereTitre."</span>";                }
                ?>
                
            </div>
            <div id="boutBaniere"></div>
	</div>
</div>
<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
                            <?php
                                echo $banniereTitre;
                                $the_query = new WP_Query( array('pagename'=>$banniereTitre) );
                                echo $the_query;
                                if ( $the_query->have_posts() ) {
                                    echo "if".$the_query;

                                    while ( $the_query->have_posts() ) {
                                        echo "while".$the_query;
                                        $the_query->the_post();
                                        the_content();
                                    }
                                }
                            ?>
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
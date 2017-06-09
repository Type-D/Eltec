<?php get_header(); ?>

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
                                $postId = url_to_postid(get_permalink());
                                $post = get_posts(array('include' => $postId));
                                if ( $post ) {
                                    the_content(); 
                                } 
                                ?>
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
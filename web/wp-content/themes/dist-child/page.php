<?php get_header(); ?>
<?php if(get_field('carousel')){
	$idbanner = get_the_ID();
}else{
	$idbanner = 5;
}?>
<div class="topPageImage">
	<div>
		<div><!-- REM TODO À CODER -->
		</div>
		<div>
		</div>
	</div>
</div>
<div id="outer-content">    
	<div id="inner-content">
		<div id="content" class="container">
			<div class="discription">
				<div class="lireSuite">
					<div></div><a>Lire la suite</a>
				</div>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>            
				<?php endwhile; ?>            
				<?php endif; ?>            
				<?php //get_sidebar(); ?>        
			</div>        
		</div>
	</div>
</div>
<script></script>
<?php get_footer(); ?>
<div id="outer-footer">
	<div id="inner-footer">
		<div id="footer" class="container">
			<div class="footer-logo no-gutter">
				<a href="<?= get_home_url();?>">footer-logo</a>
			</div>
			<div class=" hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('NOS MODÈLES') ?>
			</div>
			<div class=" hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('À PROPOS') ?>
			</div>
			<div class=" hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('AIDE') ?>
			</div>	
			<div class=" hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('SUIVEZ-NOUS') ?>
			</div>
			<div class=" hidden-xs col-sm-2 no-gutter">
				<div class="footerTitle">Contact</div>
				<address>1117, rue des Manufacturiers</address>
				<address>Val-d'Or, Québec J9P 6Y7</address>
			</div>
		</div>
	</div>
	<div id="bottom-footer">
		<div>Tous droits réservés &copy; <a href="<?= get_home_url();?>"><?php bloginfo('name'); ?></a></div>
		<div><span>Une réalisation </span><a class="ozone" href="http://studioozone.com/"><img src="<?= get_template_directory_uri(); ?>/img/footer-logo-2.png" alt=""/></a></div>
	</div>
</div><?php wp_footer(); ?><!-- analytics --><script>    (function (f, i, r, e, s, h, l) {        i['GoogleAnalyticsObject'] = s;        f[s] = f[s] || function () {            (f[s].q = f[s].q || []).push(arguments)        }, f[s].l = 1 * new Date();        h = i.createElement(r),            l = i.getElementsByTagName(r)[0];        h.async = 1;        h.src = e;        l.parentNode.insertBefore(h, l)    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');    ga('send', 'pageview');</script></body></html>
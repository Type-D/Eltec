<div id="outer-footer">
	<div id="inner-footer">
		<div id="footer" class="container">
			<div class="footer-logo no-gutter">
				<a href="<?= get_home_url();?>">footer-logo</a>
			</div>
                    <div id="footerMenu">
                   
			<div class="footerMenu hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('NOS MODÈLES', 'extra-menu') ?>
			</div>
			<div class="footerMenu hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('À PROPOS', 'extra-menu2') ?>
			</div>
			<div class="footerMenu hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('AIDE', 'extra-menu3') ?>
			</div>	
			<div class="footerMenu hidden-xs col-sm-2 no-gutter">
				<?php html5blank_child_nav_footer('SUIVEZ-NOUS', 'extra-menu4') ?>
			</div>
			<div class="footerMenu hidden-xs col-sm-2 no-gutter">
				<div class="footerTitle">CONTACT</div>
                                <div id="footerContact">
                                    <address>1117, rue des Manufacturiers<br>
                                        Val-d'Or, Québec J9P 6Y7</address>
                                    <div id="telephone" class="redText">819 825-1117</div>
                                    <a href="mailto:info@tecelement.com" target="_top" class="redText">info@tecelement.com</a><br>
                                    <a href="http://facebook.com"  class="redText">FACEBOOK</a>
                                </div>
			</div>
                    </div>
		</div>
	</div>
	<div id="bottom-footer">
		<div>Tous droits réservés &copy; <a href="<?= get_home_url();?>"><?php bloginfo('name'); ?></a></div>
		<div><span>Une réalisation </span><a class="ozone" href="http://studioozone.com/"><img src="<?= get_template_directory_uri(); ?>/img/footer-logo-2.png" alt=""/></a></div>
	</div>
</div><?php wp_footer(); ?><!-- analytics --><script>    (function (f, i, r, e, s, h, l) {        i['GoogleAnalyticsObject'] = s;        f[s] = f[s] || function () {            (f[s].q = f[s].q || []).push(arguments)        }, f[s].l = 1 * new Date();        h = i.createElement(r),            l = i.getElementsByTagName(r)[0];        h.async = 1;        h.src = e;        l.parentNode.insertBefore(h, l)    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');    ga('send', 'pageview');</script></body></html>
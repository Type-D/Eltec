<div id="outer-footer">
	<div id="inner-footer">
		<div id="footer" class="container">
			<div class="footer-logo no-gutter">
				<a href="<?= get_home_url();?>">footer-logo</a>
			</div>
            <div id="footerMenu">
				<div class="footerMenu hidden-xs col-sm-2 no-gutter">
					<?php html5blank_child_nav_footer(__( 'Nos_modeles', 'html5blankchild' ), 'extra-menu'); ?>
				</div>
				<div class="footerMenu hidden-xs col-sm-2 no-gutter">
					<?php html5blank_child_nav_footer(__( 'A_propos', 'html5blankchild' ), 'extra-menu2'); ?>
				</div>
				<div class="footerMenu hidden-xs col-sm-2 no-gutter">
					<?php html5blank_child_nav_footer(__( 'Aide', 'html5blankchild' ), 'extra-menu3'); ?>
				</div>	
				<div class="footerMenu hidden-xs col-sm-2 no-gutter">
					<?php html5blank_child_nav_footer(__( 'Suivez_nous', 'html5blankchild' ), 'extra-menu4'); ?>
				</div>
				<div class="footerMenu hidden-xs col-sm-2 no-gutter">
					<div class="footerTitle"><?php _e( 'Contact', 'html5blankchild' ); ?></div>
					<div id="footerContact">
						<address><?php _e( 'Adresse_1', 'html5blankchild' ); ?><br>
							<?php _e( 'Adresse_2', 'html5blankchild' ); ?></address>
						<div id="telephone" class="pictoTelFooter">819 825-1117</div>
						<div class="pictoEmailFooter"><a href="mailto:info@tecelement.com" target="_top">info@tecelement.com</a></div>
						<div class="pictoFBFooter"><a href="http://facebook.com">FACEBOOK</a></div>
					</div>
				</div>
            </div>
		</div>
	</div>
	<div id="bottom-footer">
		<div><?php _e( 'Droits_reserves', 'html5blankchild' ); ?> <a href="<?= get_home_url();?>"><?php bloginfo('name'); ?></a></div>
		<div><span><?php _e( 'Une_realisation', 'html5blankchild' ); ?> </span><a class="ozone" href="http://studioozone.com/"><img src="<?= get_template_directory_uri(); ?>/img/footer-logo-2.png" alt=""/></a></div>
	</div>
</div><?php wp_footer(); ?><!-- analytics --><script>    (function (f, i, r, e, s, h, l) {        i['GoogleAnalyticsObject'] = s;        f[s] = f[s] || function () {            (f[s].q = f[s].q || []).push(arguments)        }, f[s].l = 1 * new Date();        h = i.createElement(r),            l = i.getElementsByTagName(r)[0];        h.async = 1;        h.src = e;        l.parentNode.insertBefore(h, l)    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');    ga('send', 'pageview');</script></body></html>
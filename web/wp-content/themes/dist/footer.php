<div id="outer-footer">
	<div id="inner-footer">
		<div id="footer" class="container">
			<div class="col-sm-2 footer-logo no-gutter">
				<a href="<?= get_home_url();?>">footer-logo</a>
			</div>
			<div class=" hidden-xs col-sm-2 no-gutter">
				<?php html5blank_nav_footer() ?>
			</div>
			<div class="col-xs-12 col-sm-5">
				<div class="studio">
					<div class="col-xs-6">
						<p>
							<a href="<?= get_home_url();?>">Om Gaya </a>est un studio de yoga qui s’adresse à toute personne désirant améliorer sa santé et l’équilibre dans sa vie. </br>  
							<a href="<?= get_permalink(148);?>">Inscription en ligne ici</a>!                        </p>                    </div>                    <div class="col-xs-6">                        <h6>Om Gaya - Studio de Yoga</h6>                        <address>                            781, 6e Avenue Ouest, Amos, QC J9T 3L6                        </address>                        <address>                            tél.:<strong> 819-732-0975</strong>                        </address>                    </div>                </div>            </div>            <div class="col-xs-12 col-sm-3">                <div class="tous">                    <div class="col-sm-12 col-xs-6 no-gutter">                        <p>                            Tous droits réservés &copy;                            <a href="<?= get_home_url();?>"><?php bloginfo('name'); ?></a>                        </p>                    </div>                    <div class="col-sm-12 col-xs-6 no-gutter">                        <span>                            Une réalisation                            <a class="ozone" href="http://studioozone.com/">                                <img src="<?= get_template_directory_uri(); ?>/img/footer-logo-2.png" alt=""/>                            </a>                        </span>                    </div>                </div>            </div>        </div>    </div></div><?php wp_footer(); ?><!-- analytics --><script>    (function (f, i, r, e, s, h, l) {        i['GoogleAnalyticsObject'] = s;        f[s] = f[s] || function () {            (f[s].q = f[s].q || []).push(arguments)        }, f[s].l = 1 * new Date();        h = i.createElement(r),            l = i.getElementsByTagName(r)[0];        h.async = 1;        h.src = e;        l.parentNode.insertBefore(h, l)    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');    ga('send', 'pageview');</script></body></html>
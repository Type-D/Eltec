<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo('charset'); ?>">
			<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="FR">
			<META NAME="revisit-after" CONTENT="30 days">
			<META NAME="robots" CONTENT="all">
			<META NAME="Author" CONTENT="Studio web Ozone">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
			<link href="//www.google-analytics.com" rel="dns-prefetch">
			<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
			<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
			<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<!--[if lt IE 8]>        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ie-hover.js"></script>        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ie-png.js"></script>        <![endif]-->		
			<?php wp_head(); ?>
			<script>        // conditionizr.com        // configure environment tests        conditionizr.config({            assets: '<?php echo get_template_directory_uri(); ?>',            tests: {}        });        </script>
		</head>	
		<body <?php body_class(); ?>>		
			<!-- wrapper -->
			<div id="wrapper">	
				<!-- header -->
                            <div id="outer-header">
                                <div class="container">
                                    <div class="header-top row">                                                    
                                        <div id="header-top-menu">
                                            <a href="Eltec/web/english"><span>English</span></a>
                                            <span>/</span>
                                            <a href="Eltec/web/nous-joindre/"><span>Nous Joindres</span></a>
                                        </div>
                                        <ul class="social">
                                            <li class="facebook">
                                                <a href="http://www.facebook.com/" target="_blank">facebook</a>
                                            </li>
                                            <li class="youTube">
                                                <a href="http://www.youtube.com/" target="_blank">YouTube</a>
                                            </li>
                                        </ul>                                                  	
                                    </div>
                                    <div id="header-main" class="row">

                                        <div class="col-lg-3 col-md-12 ">
                                            <h1 class="logo"><a href="<?php echo home_url('/accueil'); ?>" title="logo"></a></h1>
                                        </div>                        
                                        <div class="col-lg-9 col-md-12">
                                            <div id="navbox">
                                                    <?php html5blank_nav(); ?>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
			</div>
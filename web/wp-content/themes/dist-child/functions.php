<?php
/**
 * Author: Dave Farrell
  * Custom functions, support, custom post types and more.
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
}

function html5blank_child_nav_footer($title)
{
    wp_nav_menu(
    array(
        'theme_location'  => 'extra-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'items_wrap'      => '<div class="footerTitle">'.$title.'</div><ul class="bottom-nav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
        'current_page_item' => 'active'
        )
    );
}

function choixBanniere(){
    $pageName = wp_title('', false);
    $banniereTitre = substr($pageName, 0, (strpos($pageName, '-')-1));
    switch ($banniereTitre){
        case "accueil":
            echo "<div class='avecSousTitre'><img class='bigLogo' src='wp-content/themes/dist-child/img/Eltec-Logo-Big.png'>"
            . "<br/><span class='smallText'>par des forestier pour des forestier</span></div>";
            break;
        case "carrière":
        case "groupe élément":
        case "historique":
        case "notre équipe":
        case "qui nous sommes":
            echo "<div class='avecSousTitre'><span class='titleText'>à propos</span>"
            . "<br/><span class='bigText'>".$banniereTitre."</span></div>";
            break;
        case "série 220":
        case "série 270":
        case "série 310":
            echo "<div class='avecSousTitre'><span class='titleText'>modèle</span>"
            . "<br/><span class='bigText'>".$banniereTitre."</span></div>";
            break;
        case "forestiers":
            echo "<div class='avecSousTitre'><span class='titleText'>construit par des</span>"
            . "<br/><span class='bigText'>".$banniereTitre."</span></div>";
            break;
        default:
            echo "<div class='sansSousTitre'><span class='bigText'>".$banniereTitre."</span></div>";
    }
}

function insererPage(){
    $pageName = wp_title('', false);
    $banniereTitre = substr($pageName, 0, (strpos($pageName, '-')-1));
   
    switch ($banniereTitre){
        case "carrière":
        case "groupe élément":
        case "historique":
        case "notre équipe":
        case "qui nous sommes":
        case "à propos":
            include_once "à_propos.php";
            break;
        case "série 220":
        case "série 270":
        case "série 310":
        case "nos modèles":
            include_once "nos_modèles.php";
            break;
        case "nous joindre":
            include_once "nous_joindre.php";
            break;
        case "pièce et service":
            include_once "pieces_et_service";
            break;
        case "accueil":
            include_once 'accueil';
            break;
        default:
            echo "nom de la page = ".$banniereTitre;
            include_once $banniereTitre.".php"; 
    }
     
}
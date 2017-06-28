<?php
/**
 * Author: Dave Farrell and Anthony Cowe
  * Custom functions, support, custom post types and more.
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
}

function html5blank_child_nav_footer($title, $menuName)
{
    wp_nav_menu(
    array(
        'theme_location'  => $menuName,
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

/*
 * des menus additionnels pour le footer
 */

function register_my_menus() {
  register_nav_menus(
    array(
      'extra-menu2' => __( 'Footer 2' ),
      'extra-menu3' => __( 'Footer 3' ),
      'extra-menu4' => __( 'Footer 4' ),
      'extra-menu5' => __( 'Footer 5' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function choixBanniere(){
    $nomPage = wp_title('', false);
    $banniereTitre = substr($nomPage, 0, (strpos($nomPage, '-')-1));
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
        case "communauté":
            echo "<div class='avecSousTitre'><span class='titleText'>Communauté</span>"
            . "<br/><span class='bigText'>Nouvelles</span></div>";
            break;
        default:
            echo "<div class='sansSousTitre'><span class='bigText'>".$banniereTitre."</span></div>";
    }
}

function insererPage(){
    $nomPage = wp_title('', false);
    $section = substr($nomPage, 0, (strpos($nomPage, '-')-1));
   
    switch ($section){
        case "accueil":
            include_once 'accueil.php';
            break;
        case "carrières":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            insererContenuePage("a-propos/carrieres");
            echo '</div>';
            break;
        case "groupe élément":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            insererContenuePage("a-propos/groupe-element");
            echo '</div>';
            break;
        case "historique":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            insererContenuePage("a-propos/historique");
            echo '</div>';
            break;
        case "notre équipe":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            insererContenuePage("a-propos/notre-equipe");
            echo '</div>';
            break;
        case "qui nous sommes":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            insererContenuePage("a-propos/qui-nous-sommes");
            echo '</div>';
            break;
        case "à propos":
            echo '<div id="propos" class="midContent">';
            insererContenuePage('a-propos');
            echo '</div>';
            break;
        case "série 220":
            echo '<div id="modele" class="midContent">';
            insererContenuePage("nos-modeles/serie-220");
            echo "</div>";
            break;
        case "série 270":
            echo '<div id="modele" class="midContent">';
            insererContenuePage("nos-modeles/serie-270");
            echo "</div>";
            break;
        case "série 310":
            echo '<div id="modele" class="midContent">';
            insererContenuePage("nos-modeles/serie-310");
            echo "</div>";
            break;
        case "nos modèles":
            echo '<div id="modele" class="midContent">';
            insererContenuePage("nos-modeles");
            echo "</div>";
            break;
        case "accessoires":
            echo '<div id="accessoires" class="midContent">';
            insererContenuePage("accessoires");
            echo "</div>";
            break;
        case "nous joindre":
            include_once "nous_joindre.php";
            break;
        case "pièces et service":
            echo '<div id="piecesService" class="midContent">';
            insererContenuePage("pieces-service");
            echo "</div>";
            break;                            
        case "communauté":
            echo '<div id="communaute" class="midContent"><h2>Communauté</h2>';
            insererContenuePage('communaute');
            echo "</div>";
            insererNouvelles();
            break;
        case "distributeurs":
            echo '<div id="distributeurs" class="midContent"><div class="sectionGauche">'
            . '<h1 class="redText">Nos Distributeurs</h1>';
            insererContenuePage('distributeurs');
            echo '</div><div class="sectionDroite"><div id="mapMonde"></div></div></div>';
            break;
        case "multimedia":
            echo '<div id="galerieVideo" class="midContent">';
            insererContenuePage("multimedia");
            echo "</div>";
            break; 
        default:
            echo '<div class="midContent">';
            insererContenuePage($section);
            echo "</div>";
    }
     
}

function insererContenuePage($nomPage){
    $the_query = new WP_Query( array('pagename'=>$nomPage) );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            the_content('Lire la suite');
        }
    }
}

function insererContenuePageAvecTitre($nomPage){
    $the_query = new WP_Query( array('pagename'=>$nomPage) );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo "<h2 class='redText'>";
            the_title();
            echo "</h2>";
            the_content('Lire la suite');
        }
    }
}

function insererNouvelles($nomPage = ''){
    echo '<div id="nouvelles"><h2><a href="http://localhost/Eltec/web/communaute">Nouvelles</a></h2>';
    if ($nomPage == 'acceuil'){
        $arg = array('cat' => '19', 'showposts' => '3');
    } else {
        $arg = array('cat' => '19', 'showposts' => '9');
    }
    $query = new WP_Query($arg);
    if($query->have_posts()){
       while($query->have_posts()){
            $query->the_post();
            echo '<div class="nouvelle" ><h4 class="titreNouvelle">';
            the_title();
            echo '</h4>';
            the_content('Lire la suite');
            echo '</div>';
       }  
    }
    echo '</div>';
}
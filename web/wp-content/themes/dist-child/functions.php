<?php
/**
 * Author: Dave Farrell and Anthony Cowe
 * URL: html5blankchild.com | @html5blankchild
 * Custom functions, support, custom post types and more.
 */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
}

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Localisation Support
    load_theme_textdomain('html5blankchild', get_template_directory() . '-child/languages');
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

/** menu des langues */

function insertLangMenu()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'extra-menu5',
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
        'items_wrap'      => '<ul id="langue">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',//new Bootstrap_walker(),
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
      'extra-menu5' => __( 'Langue' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function choixBanniere(){
	$titrePost = get_the_title(get_post($post->post_parent));
	$titreParent = get_the_title(get_post($post->post_parent)->post_parent);
	if ($titreParent !== $titrePost) printf("<p>%s</p>",$titreParent);
	printf("<p>%s</p>",$titrePost);
}

function insererPage(){
    
    $nomPage = wp_title('', false);
    $section = substr($nomPage, 0, (strpos($nomPage, '-')-1));
    $id= get_the_ID();
    $parentId = "";/*
    switch ($section){
        case "accueil":
            include_once 'accueil.php';
            break;
        case "home page":
            include_once 'accueil.php';
            break;
        case "carrières":
        case "groupe élément":
        case "historique":
        case "notre équipe":
        case "qui nous sommes":
            $parentId = 905;
            break;
        case "nous joindre":
            include_once "nous_joindre.php";
            break;
        case "pièces et service":
            insererContenuePage("pieces-service");
            break;                            
        case "communauté":
            insererContenuePage('communaute');
            insererNouvelles();
            break;
        case "career":
        case "group element":
        case "history":
        case "our team":
        case "who we are":
            $parentId = 1210;
            break;
        
    }
    
    if ($parentId != ""){
        $the_parent_query = new WP_Query( array('page_id'=>$parentId) );
        if ( $the_parent_query->have_posts() ) {
            while ( $the_parent_query->have_posts() ) {
                $the_parent_query->the_post();
                the_content('Lire la suite');
            }
        } 
    }
    $the_query = new WP_Query( array('page_id'=>$id) );
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            the_content('Lire la suite');
        }
    }       
            
    */
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
        case "forestiers":
            $section = "";
            echo '<h1 class="redText">';
            the_field('titre');
            echo '</h1>';
            echo '<h2 class="redTtext">';
            the_field('sous_titre');
            echo '</h2>';
            echo '<p>';
            the_field('texte_complet');
            echo '</p>'; 
            break;
        case "technologie":
            $section = "";
            echo '<h1 class="redText">';
            the_field('titre');
            echo '</h1>';
            echo '<h2 class="redTtext">';
            the_field('sous_titre');
            echo '</h2>';
            echo '<p>';
            the_field('texte_complet');
            echo '</p>'; 
            break;
        default:
            echo '<div class="midContent">';
            insererContenuePage($section);
            echo "</div>";
    }
    if($section !==''){
        include_once $section.'.php';
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
           
            echo '<div class="nouvelle" ><h4 class="titreNouvelle">';
            the_field('titre');
            echo '</h4><img src="';
            the_field('image'); 
            echo '" alt="" /><h5>';
            the_field('date');
            echo '</h5><p>';
            the_field('resume');
            echo '</p></div>';
            
            
            
            /*
            $query->the_post();
            echo '<div class="nouvelle" ><h4 class="titreNouvelle">';
            the_title();
            echo '</h4>';
            the_content('Lire la suite');
            echo '</div>';
            */ 
            $query->the_post();
            //the_content('Lire la suite');

       }  
    }
    echo '</div>';
}

// Sous-menu rouge
/**
function insererSousMenuRouge($lang = 'fr')
{
    $sousMenuRouge = wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => 'Sous-menu rouge ' . $lang,
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => false,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'items_wrap'      => '<ul class="redNav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',//new Bootstrap_walker(),
        'current_page_item' => 'active'
        )
    );
	echo(preg_replace( '/>(\s|\n|\r)+</', '><', $sousMenuRouge));
}
*/

// Sous-menu accueil
function insererSousMenuAccueil($lang = 'fr')
{
    $sousMenuRouge = wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => 'Sous-menu accueil ' . $lang,
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => false,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'items_wrap'      => '<div class="sousMenuAccueilContainer"><ul class="sousMenuAccueil">%3$s</ul></div>',
        'depth'           => 0,
        'walker'          => '',//new Bootstrap_walker(),
        'current_page_item' => 'active'
        )
    );
	echo(preg_replace( '/>(\s|\n|\r)+</', '><', $sousMenuRouge));
}

// Menu images add new size
add_filter( 'menu_image_default_sizes', function($sizes){
  //unset($sizes['menu-36x36']); Remove size from list
  $sizes['Picto modèle (167 x 111)'] = array(167,111);
  return $sizes;
}); 


<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

require_once "modules/is-debug.php";

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{

    add_theme_support( 'woocommerce' );
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
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
        'items_wrap'      => '<ul id="nav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => new Bootstrap_walker(),
        'current_page_item' => 'active'
        )
    );
}
function html5blank_nav_footer()
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
        'items_wrap'      => '<ul class="bottom-nav">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
        'current_page_item' => 'active'
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if (HTML5_DEBUG) {
            // jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_template_directory_uri() . '/bower_components/jquery/dist/jquery.js', array(), '1.11.1');

            // Conditionizr
            wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');

            // Modernizr
            wp_register_script('modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), '2.8.3');

            // Custom scripts
            wp_register_script(
                'html5blankscripts',
                get_template_directory_uri() . '/js/scripts.js',
                array(
                    'conditionizr',
                    'modernizr',
                    'jquery'),
                '1.0.0');

            // Enqueue Scripts
            wp_enqueue_script('html5blankscripts');

        // If production
        } else {
            // Scripts minify
            wp_register_script('html5blankscripts-min', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0');
            // Enqueue Scripts
            wp_enqueue_script('html5blankscripts-min');
        }
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // Conditional script(s)
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scriptname');
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    if (HTML5_DEBUG) {
        // normalize-css
        wp_register_style('normalize', get_template_directory_uri() . '/bower_components/normalize.css/normalize.css', array(), '3.0.1');

        // Custom CSS
        wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

        // Register CSS
        wp_enqueue_style('html5blank');
    } else {
        // Custom CSS
        wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('html5blankcssmin');
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
//add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

add_filter( 'woocommerce_after_order_notes' , 'dc_extra_checkout_fields' );
 
function dc_extra_checkout_fields( $fields ) {
     echo '<div id="my_custom_checkout_field"><br><h2>' . __('État de santé et informations médicales') . '</h2>';

        woocommerce_form_field( 'votre_age', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Votre âge'),
        'placeholder'   => __('Votre âge'),
        'required'      => true,
        ), $fields->get_value( 'votre_age' ));

        woocommerce_form_field( 'votre_travail', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Que faites-vous comme travail et votre position de travail (ex.: assis-debout, ordi., téléphone, mouvements...)?'),
        'placeholder'   => __('Votre travail'),
        'required'      => true,
        ), $fields->get_value( 'votre_travail' ));

        woocommerce_form_field( 'votre_but', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('En choisissant le yoga, quel est votre but?'),
        'placeholder'   => __('Votre but'),
        'required'      => true,
        ), $fields->get_value( 'votre_but' ));
    echo '</div><div><h4>Cochez si vous avez l\'une ou plusieurs de ces conditions:</h4>';

        woocommerce_form_field( 'haute_pression', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-first'), 
          'label' => __('<span>Haute pression</span>'), 
          'required' => false,
        ), $fields->get_value( 'haute_pression' ));

        woocommerce_form_field( 'basse_pression', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-last'), 
          'label' => __('<span>Basse pression</span>'), 
          'required' => false,
        ), $fields->get_value( 'basse_pression' ));

         woocommerce_form_field( 'migraine', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-first'), 
          'label' => __('<span>Maux de tête / migraine</span>'), 
          'required' => false,
        ), $fields->get_value( 'migraine' ));

         woocommerce_form_field( 'fibromyalgie', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-last'), 
          'label' => __('<span>Fibromyalgie</span>'), 
          'required' => false,
        ), $fields->get_value( 'fibromyalgie' ));

         woocommerce_form_field( 'insomnie', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-first'), 
          'label' => __('<span>Insomnie</span>'), 
          'required' => false,
        ), $fields->get_value( 'insomnie' ));

         woocommerce_form_field( 'grossesse', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-last'), 
          'label' => __('<span>Grossesse</span>'), 
          'required' => false,
        ), $fields->get_value( 'grossesse' ));

         woocommerce_form_field( 'semaine_grossesse', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Grossesse: # de la semaine'),
        'placeholder'   => __('Semaine de grossesse'),
        'required'      => false,
        ), $fields->get_value( 'semaine_grossesse' ));

    echo '</div><div><h4>Affection du système nerveux:</h4>';

        woocommerce_form_field( 'evanouissements', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-first'), 
          'label' => __('<span>Je souffre d\'évanouissements.</span>'), 
          'required' => false,
        ), $fields->get_value( 'evanouissements' ));

        woocommerce_form_field( 'epilepsie', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-last'), 
          'label' => __('<span>Je souffre d\'épilepsie.</span>'), 
          'required' => false,
        ), $fields->get_value( 'epilepsie' ));
        echo '<br style="clear:both;">';
        woocommerce_form_field( 'traumatisme_cranien', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row'), 
          'label' => __('<span> J\'ai souffert de traumatisme crânien dernièrement.</span>'), 
          'required' => false,
        ), $fields->get_value( 'traumatisme_cranien' ));

        woocommerce_form_field( 'desordrese_cervicaux', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row'), 
          'label' => __('<span>Je souffre de désordrese cervicaux ou neurologique autre que ceux mentionnées ci-haut.</span>'), 
          'required' => false,
        ), $fields->get_value( 'desordrese_cervicaux' ));

    echo '</div><div><h4>Restrictions alimentaires<br>(à remplir pour les participants aux retraites)</h4>';

         woocommerce_form_field( 'intolerances_allergies_alimentaire', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>Je souffre d\'intolérances ou d\'allergies alimentaires.</span>'), 
          'required' => false,
        ), $fields->get_value( 'intolerances_allergies_alimentaire' ));

         woocommerce_form_field( 'intolerances_allergies_explication', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Si oui, expliquez ici'),
        'placeholder'   => __('Si oui, expliquez ici'),
        'required'      => false,
        ), $fields->get_value( 'intolerances_allergies_explication' ));

        woocommerce_form_field( 'manger_poisson', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>J\'aime le poisson.</span>'), 
          'required' => false,
        ), $fields->get_value( 'manger_poisson' ));
         woocommerce_form_field( 'manger_fruit_de_mer', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>J\'aime les fruits de mer.</span>'), 
          'required' => false,
        ), $fields->get_value( 'manger_fruit_de_mer' ));

    echo '</div><div><h4>Autres conditions:</h4>';

        woocommerce_form_field( 'asthme', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>Je souffre d\'asthme ou de bronchite chronique.</span>'), 
          'required' => false,
        ), $fields->get_value( 'asthme' ));

        woocommerce_form_field( 'maladie_renale', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>Je souffre d\'une maladie rénale quelle qu\'elle soit.</span>'), 
          'required' => false,
        ), $fields->get_value( 'maladie_renale' ));

        woocommerce_form_field( 'limitation_mouvement', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>J\'ai une limitation de mouvement d\'un de mes membres ou de la colonne vertébrale</span>'), 
          'required' => false,
        ), $fields->get_value( 'limitation_mouvement' ));

        woocommerce_form_field( 'faiblesse_musculaire', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-first'), 
          'label' => __('<span>Je souffre de faiblesse musculaire.</span>'), 
          'required' => false,
        ), $fields->get_value( 'faiblesse_musculaire' ));

        woocommerce_form_field( 'diabete', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox form-row form-row-last'), 
          'label' => __('<span>Je souffre de diabète.</span>'), 
          'required' => false,
        ), $fields->get_value( 'diabete' ));
        echo '<br style="clear:both">';
        woocommerce_form_field( 'affection_cardiaque', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>Je souffre d\'une affection cardiaque ou vasculaire.</span>'), 
          'required' => false,
        ), $fields->get_value( 'affection_cardiaque' ));

        woocommerce_form_field( 'medicament_cas_durgence', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Y\'a-t-il des médicaments que le professeur devrait vous donner en cas d\'urgence pendant un cours?'),
        'placeholder'   => __('Médicament en cas d\'urgence'),
        'required'      => false,
        ), $fields->get_value( 'medicament_cas_durgence' ));

        woocommerce_form_field( 'intervention_chirurgicale', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>J\'ai subi une intervention chirurgicale dernièrement</span>'), 
          'required' => false,
        ), $fields->get_value( 'intervention_chirurgicale' ));

        woocommerce_form_field( 'maladie_autre', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>Je souffre de maladie(s) ou affection(s) autres que celle mentionnés.</span>'), 
          'required' => false,
        ), $fields->get_value( 'maladie_autre' ));

        woocommerce_form_field( 'malade_autre_explication', array(
        'type'          => 'text',
        'class'         => array('form-row'),
        'label'         => __('Si oui, expliquez ici'),
        'placeholder'   => __('Si oui, expliquez ici'),
        'required'      => false,
        ), $fields->get_value( 'malade_autre_explication' ));

         woocommerce_form_field( 'accepte_conditions', array( 
          'type' => 'checkbox', 
          'class' => array('input-checkbox'), 
          'label' => __('<span>En cochant cette case, j\'accepte d\'être responsable de ma santé, de ma sécurité et de mon bien-être. Je m\'engage à informer mon professeur de toute activité. qui met en doute ma sécurité et qui est susceptible de me causer une blessure. Ainsi que tout changement à ma santé susceptible de modifier la pratique de yoga.</span>'), 
          'required' => true,
        ), $fields->get_value( 'accepte_conditions' ));
 
     echo '</div>';
}
//woocommerce_checkout_update_order_meta
add_action( 'woocommerce_checkout_update_order_meta', 'dc_billing_fields_save', 10, 1 );
 
function dc_billing_fields_save(){
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;
        update_user_meta( $user_id, 'votre_age', $_POST['votre_age'] );
        update_user_meta( $user_id, 'votre_travail', $_POST['votre_travail'] );
        update_user_meta( $user_id, 'votre_but', $_POST['votre_but'] );
        update_user_meta( $user_id, 'haute_pression', $_POST['haute_pression'] );
        update_user_meta( $user_id, 'basse_pression', $_POST['basse_pression'] );
        update_user_meta( $user_id, 'migraine', $_POST['migraine'] );
        update_user_meta( $user_id, 'fibromyalgie', $_POST['fibromyalgie'] );
        update_user_meta( $user_id, 'insomnie', $_POST['insomnie'] );
        update_user_meta( $user_id, 'grossesse', $_POST['grossesse'] );
        update_user_meta( $user_id, 'semaine_grossesse', $_POST['semaine_grossesse'] );
        update_user_meta( $user_id, 'evanouissements', $_POST['evanouissements'] );
        update_user_meta( $user_id, 'epilepsie', $_POST['epilepsie'] );
        update_user_meta( $user_id, 'traumatisme_cranien', $_POST['traumatisme_cranien'] );
        update_user_meta( $user_id, 'desordrese_cervicaux', $_POST['desordrese_cervicaux'] );
        update_user_meta( $user_id, 'asthme', $_POST['asthme'] );
        update_user_meta( $user_id, 'maladie_renale', $_POST['maladie_renale'] );
        update_user_meta( $user_id, 'limitation_mouvement', $_POST['limitation_mouvement'] );
        update_user_meta( $user_id, 'faiblesse_musculaire', $_POST['faiblesse_musculaire'] );
        update_user_meta( $user_id, 'diabete', $_POST['diabete'] );
        update_user_meta( $user_id, 'affection_cardiaque', $_POST['affection_cardiaque'] );
        update_user_meta( $user_id, 'medicament_cas_durgence', $_POST['medicament_cas_durgence'] );
        update_user_meta( $user_id, 'intervention_chirurgicale', $_POST['intervention_chirurgicale'] );
        update_user_meta( $user_id, 'intolerances_allergies_alimentaire', $_POST['intolerances_allergies_alimentaire'] );
        update_user_meta( $user_id, 'intolerances_allergies_explication', $_POST['intolerances_allergies_explication'] );
        update_user_meta( $user_id, 'manger_poisson', $_POST['manger_poisson'] );
        update_user_meta( $user_id, 'manger_fruit_de_mer', $_POST['manger_fruit_de_mer'] );
        update_user_meta( $user_id, 'maladie_autre', $_POST['maladie_autre'] );
        update_user_meta( $user_id, 'malade_autre_explication', $_POST['malade_autre_explication'] );
        update_user_meta( $user_id, 'accepte_conditions', $_POST['accepte_conditions'] );
}

add_action( 'show_user_profile', 'dc_update_user_profile' );
add_action( 'edit_user_profile', 'dc_update_user_profile' );
 
function checkboxchecked($key, $userid){
    if(esc_attr( get_the_author_meta( $key, $userid ) ) == 1){
        $checked = 'checked="checked"';
    }else{
        $checked = '';
    }
    return $checked;
}

function dc_update_user_profile( $user ){
 ?>
    <h3>ÉTAT DE SANTÉ ET INFORMATIONS MÉDICALES</h3>
     
    <table class="form-table">
        <tr>
            <th><label for="votre_age">Votre âge</label></th>
            <td><input type="text" name="votre_age" value="<?php echo esc_attr( get_the_author_meta( 'votre_age', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="votre_travail">Votre travail</label></th>
            <td><input type="text" name="votre_travail" value="<?php echo esc_attr( get_the_author_meta( 'votre_travail', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="votre_but">Votre but</label></th>
            <td><input type="text" name="votre_but" value="<?php echo esc_attr( get_the_author_meta( 'votre_but', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="haute_pression">Haute pression</label></th>
            <td><input type="checkbox" name="haute_pression" value="1" <?= checkboxchecked('haute_pression',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="basse_pression">Basse pression</label></th>
            <td><input type="checkbox" name="basse_pression" value="1" <?= checkboxchecked('basse_pression',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="migraine">Migraine</label></th>
            <td><input type="checkbox" name="migraine" value="1" <?= checkboxchecked('migraine',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="fibromyalgie">Fibromyalgie</label></th>
            <td><input type="checkbox" name="fibromyalgie" value="1" <?= checkboxchecked('fibromyalgie',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="insomnie">Insomnie</label></th>
            <td><input type="checkbox" name="insomnie" value="1" <?= checkboxchecked('insomnie',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="grossesse">Grossesse</label></th>
            <td><input type="checkbox" name="grossesse" value="1" <?= checkboxchecked('grossesse',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="semaine_grossesse">Grossesse semaine</label></th>
            <td><input type="text" name="semaine_grossesse" value="<?php echo esc_attr( get_the_author_meta( 'semaine_grossesse', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
         <tr>
            <th><label for="evanouissements">Évanouissements</label></th>
            <td><input type="checkbox" name="evanouissements" value="1" <?= checkboxchecked('evanouissements',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="epilepsie">Épilepsie</label></th>
            <td><input type="checkbox" name="epilepsie" value="1" <?= checkboxchecked('epilepsie',  $user->ID);?>/></td>
        </tr>
        <tr>
            <th><label for="traumatisme_cranien">Traumatisme cranien</label></th>
            <td><input type="checkbox" name="traumatisme_cranien" value="1" <?= checkboxchecked('traumatisme_cranien',  $user->ID);?>/></td>
        </tr>
        <tr>
            <th><label for="desordrese_cervicaux">Désordres cervicaux</label></th>
            <td><input type="checkbox" name="desordrese_cervicaux" value="1" <?= checkboxchecked('desordrese_cervicaux',  $user->ID);?> /></td>
        </tr>
         <tr>
            <th><label for="asthme">Asthme</label></th>
            <td><input type="checkbox" name="asthme" value="1" <?= checkboxchecked('asthme',  $user->ID);?>/></td>
        </tr>
        <tr>
            <th><label for="maladie_renale">Maladie rénale</label></th>
            <td><input type="checkbox" name="maladie_renale" value="1" <?= checkboxchecked('maladie_renale',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="limitation_mouvement">Limitation de mouvement</label></th>
            <td><input type="checkbox" name="limitation_mouvement" value="1" <?= checkboxchecked('limitation_mouvement',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="faiblesse_musculaire">Faiblesse musculaire</label></th>
            <td><input type="checkbox" name="faiblesse_musculaire" value="1" <?= checkboxchecked('faiblesse_musculaire',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="diabete">Diabète</label></th>
            <td><input type="checkbox" name="diabete" value="1" <?= checkboxchecked('diabete',  $user->ID);?>/></td>
        </tr>
        <tr>
            <th><label for="affection_cardiaque">Affection cardiaque</label></th>
            <td><input type="checkbox" name="affection_cardiaque" value="1" <?= checkboxchecked('affection_cardiaque',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="medicament_cas_durgence">Médicaments d'urgence</label></th>
            <td><input type="text" name="medicament_cas_durgence" value="<?php echo esc_attr( get_the_author_meta( 'medicament_cas_durgence', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="intervention_chirurgicale">Intervention chirurgicale</label></th>
            <td><input type="checkbox" name="intervention_chirurgicale" value="1" <?= checkboxchecked('intervention_chirurgicale',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="intolerances_allergies_alimentaire">Je souffre d'intolérances ou d'allergies alimentaires.</label></th>
            <td><input type="checkbox" name="intolerances_allergies_alimentaire" value="1" <?= checkboxchecked('intolerances_allergies_alimentaire',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="malade_autre_explication">Si oui expliquez</label></th>
            <td><input type="text" name="malade_autre_explication" value="<?php echo esc_attr( get_the_author_meta( 'malade_autre_explication', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
         <tr>
            <th><label for="manger_poisson">J'aime le poisson.</label></th>
            <td><input type="checkbox" name="manger_poisson" value="1" <?= checkboxchecked('manger_poisson',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="manger_fruit_de_mer">J'aime les fruits de mer.</label></th>
            <td><input type="checkbox" name="manger_fruit_de_mer" value="1" <?= checkboxchecked('manger_fruit_de_mer',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="maladie_autre">Maladie(s) autre(s)</label></th>
            <td><input type="checkbox" name="maladie_autre" value="1" <?= checkboxchecked('maladie_autre',  $user->ID);?> /></td>
        </tr>
        <tr>
            <th><label for="malade_autre_explication">Si oui expliquez</label></th>
            <td><input type="text" name="malade_autre_explication" value="<?php echo esc_attr( get_the_author_meta( 'malade_autre_explication', $user->ID ) ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="accepte_conditions">Accepter les conditions</label></th>
            <td><input type="checkbox" name="accepte_conditions" value="1" <?= checkboxchecked('accepte_conditions',  $user->ID);?> /></td>
        </tr>
    </table>
<?php }

add_action( 'personal_options_update', 'dc_save_extra_fields' );
add_action( 'edit_user_profile_update', 'dc_save_extra_fields' );
 
function dc_save_extra_fields( $user_id ){
        update_user_meta( $user_id, 'votre_age', sanitize_text_field($_POST['votre_age']) );
        update_user_meta( $user_id, 'votre_travail', sanitize_text_field($_POST['votre_travail']) );
        update_user_meta( $user_id, 'votre_but', sanitize_text_field($_POST['votre_but']) );
        update_user_meta( $user_id, 'haute_pression', sanitize_text_field($_POST['haute_pression']) );
        update_user_meta( $user_id, 'basse_pression', sanitize_text_field($_POST['basse_pression']) );
        update_user_meta( $user_id, 'migraine', sanitize_text_field($_POST['migraine']) );
        update_user_meta( $user_id, 'fibromyalgie', sanitize_text_field($_POST['fibromyalgie']) );
        update_user_meta( $user_id, 'insomnie', sanitize_text_field($_POST['insomnie']) );
        update_user_meta( $user_id, 'grossesse', sanitize_text_field($_POST['grossesse']) );
        update_user_meta( $user_id, 'semaine_grossesse', sanitize_text_field($_POST['semaine_grossesse']) );
        update_user_meta( $user_id, 'evanouissements', sanitize_text_field($_POST['evanouissements']) );
        update_user_meta( $user_id, 'epilepsie', sanitize_text_field($_POST['epilepsie']) );
        update_user_meta( $user_id, 'traumatisme_cranien', sanitize_text_field($_POST['traumatisme_cranien']) );
        update_user_meta( $user_id, 'desordrese_cervicaux', sanitize_text_field($_POST['desordrese_cervicaux']) );
        update_user_meta( $user_id, 'asthme', sanitize_text_field($_POST['asthme']) );
        update_user_meta( $user_id, 'maladie_renale', sanitize_text_field($_POST['maladie_renale']) );
        update_user_meta( $user_id, 'limitation_mouvement', sanitize_text_field($_POST['limitation_mouvement']) );
        update_user_meta( $user_id, 'faiblesse_musculaire', sanitize_text_field($_POST['faiblesse_musculaire']) );
        update_user_meta( $user_id, 'diabete', sanitize_text_field($_POST['diabete']) );
        update_user_meta( $user_id, 'affection_cardiaque', sanitize_text_field($_POST['affection_cardiaque']) );
        update_user_meta( $user_id, 'medicament_cas_durgence', sanitize_text_field($_POST['medicament_cas_durgence']) );
        update_user_meta( $user_id, 'intervention_chirurgicale', sanitize_text_field($_POST['intervention_chirurgicale']) );
        update_user_meta( $user_id, 'intolerances_allergies_alimentaire', sanitize_text_field($_POST['intolerances_allergies_alimentaire']) );
        update_user_meta( $user_id, 'intolerances_allergies_explication', sanitize_text_field($_POST['intolerances_allergies_explication']) );
        update_user_meta( $user_id, 'manger_poisson', sanitize_text_field($_POST['manger_poisson']) );
        update_user_meta( $user_id, 'manger_fruit_de_mer', sanitize_text_field($_POST['manger_fruit_de_mer']) );
        update_user_meta( $user_id, 'maladie_autre', sanitize_text_field($_POST['maladie_autre']) );
        update_user_meta( $user_id, 'malade_autre_explication', sanitize_text_field($_POST['malade_autre_explication']) );
        update_user_meta( $user_id, 'accepte_conditions', sanitize_text_field($_POST['accepte_conditions']) );
}

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

     global $wp_query;
     $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
     $class_names = $value = '';
    
        // If the item has children, add the dropdown class for bootstrap
        if ( $args->has_children ) {
            $class_names = "dropdown ";
        }
    
        $classes = empty( $object->classes ) ? array() : (array) $object->classes;
        
        $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
       
    $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
    $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
    $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
    $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

    // if the item has children add these two attributes to the anchor tag
    // if ( $args->has_children ) {
          // $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    // }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
        $item_output .= '</a>';
    }
    else {
        $item_output .= '</a>';
    }

    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}


// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
    if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
    }
  
  return $classes;
}


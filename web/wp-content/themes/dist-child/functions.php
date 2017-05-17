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
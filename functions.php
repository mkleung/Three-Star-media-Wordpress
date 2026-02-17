<?php
/**
 * Theme Functions.
 *
 * @package Algonquin
 */



function algonquin_enqueue_scripts() {
    
    wp_register_style( 'styles-css', get_template_directory_uri() . '/assets/css/styles.css', [], '', 'all' );
    wp_enqueue_style( 'styles-css' );

    wp_register_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.css', [], '', 'all' );
    wp_enqueue_style( 'animate-css' );
    

    // wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', [], filemtime( get_template_directory() . '/assets/js/script.js' ), true );

}
add_action('wp_enqueue_scripts', 'algonquin_enqueue_scripts');



// Add custom logo in backend customizer
add_theme_support('custom-logo', [
    'header_text' => ['site-title', 'site-description'],
    'height' => 100,
    'width' => 400,
    'flex-height' => true,
    'flex-width' => true,
]);


add_editor_style();

add_theme_support( 'wp-block-styles');

/* Use this for images */
add_theme_support('align-wide');


/* post thumbnails */
add_theme_support('post-thumbnails');


/* Menus */

function get_menu_id($location) {
    $locations = get_nav_menu_locations();
    return isset($locations[$location]) ? $locations[$location] : "";
}

function get_child_menu_items($menu_array, $parent_id) {
    $child_menus = [];

    if (!empty($menu_array) && is_array($menu_array)) {
        foreach ($menu_array as $menu) {
            if (intval($menu->menu_item_parent) === intval($parent_id)) {
                array_push($child_menus, $menu);
            }
        }
    }

    return $child_menus;
}

add_action('after_setup_theme', function() {
    register_nav_menus([
        'algonquin-header-menu' => esc_html__( 'algonquin Header Menu', 'algonquin' ),
        'algonquin-footer-menu' => esc_html__( 'algonquin Footer Menu', 'algonquin' )
    ]);
});



// Homepage (front page) fields

function home_meta_fields() {

    // homepage id is 8
    $page_id = 8;

    register_post_meta($page_id, 'my_custom_field', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'home_meta_fields');
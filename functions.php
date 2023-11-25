<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

function planty_logo_setup() {
	$defaults = array(

		'width'                => 201,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'planty_logo_setup' );

/** admin */

// Fonction pour ajouter un élément à la navigation
function ajouter_element_navigation($items) {
    // Vérifier si l'utilisateur est connecté
    if (is_user_logged_in()) {
        // Ajouter un élément à la navigation
        $nouvel_element = '<li><a href="http://localhost:8888/OCWPformation/p6/wordpress/wp-admin/">Admin</a></li>';
        
        // Convertir les éléments de la navigation en tableau
        $menu_items = explode('</li>', $items);

        // Insérer le nouvel élément en avant-dernière position
        array_splice($menu_items, 1, 0, $nouvel_element);

        // Réassembler les éléments en une chaîne de caractères
        $items = implode('</li>', $menu_items);
    }

    return $items;
}

// Filtrer la navigation pour ajouter l'élément personnalisé
add_filter('wp_nav_menu_items', 'ajouter_element_navigation', 10, 1);

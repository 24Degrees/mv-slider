<?php

/** 
 * Plugin Name:       MV Slider
 * Plugin URI:        www.wordpress.org/mv-slider  
 * Description:       A slider plugin for WordPress that creates a slider
 * Version:           1.0
 * Requires at least: 5.6
 * Requires PHP:      7.0
 * Author:            Michael
 * Author URI:        www.wordpress.org/michael
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mv-slider
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    die( 'Forbidden' );
}

if( !class_exists( 'MV_Slider' ) ) {
    class MV_Slider {
        function __construct() {
            $this->define_constants();
            
            require_once( MV_SLIDER_PATH . 'post-types\class.mv-slider-cpt.php' );
            $MV_Slider_Post_Type = new MV_Slider_Post_Type();
        }    

        public function define_constants() {
            define( 'MV_SLIDER_PATH', plugin_dir_path(__FILE__ ) );
            define( 'MV_SLIDER_URL', plugin_dir_url( '', __FILE__ ) );
            define( 'MV_SLIDER_VERSION', '1.0.0' );
        }

        public static function activate() {
            /* need to flush rewrite rules to make sure that the custom post type is registered */
            //flush_rewrite_rules(); //Does not works that good it seems
            update_option( 'rewrite_rules', '' ); // works better than flush_rewrite_rules()
        }

        public static function deactivate() {
            flush_rewrite_rules();
            unregister_post_type( 'mv-slider');
        }

        public static function uninstall() {

        }
        
    }
}

if ( class_exists( 'MV_Slider' ) ) {
    register_activation_hook( __FILE__, array( 'MV_Slider', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'MV_Slider', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'MV_Slider', 'uninstall' ) );

    $mv_slider = new MV_Slider();
}


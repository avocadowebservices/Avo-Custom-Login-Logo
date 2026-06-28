<?php
/**
 * Plugin Name: Avo Custom Login Logo
 * Plugin URI:  https://github.com/avocadowebservices/Avo-Custom-Login-Logo
 * Description: Replace the default WordPress login logo with your own. Lightweight, no settings, just pure simplicity.
 * Version:     1.0.1
 * Author:      Joseph Brzezowski
 * Author URI:  https://avocadoweb.net/
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: avo-custom-login-logo
 * Requires at least: 5.0
 * Tested up to: 6.8
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function avo_custom_login_logo() {
    $logo_url = plugin_dir_url( __FILE__ ) . 'logo.png';
    
    // Check if file exists for debugging
    $logo_path = plugin_dir_path( __FILE__ ) . 'logo.png';
    $file_exists = file_exists( $logo_path ) ? 'true' : 'false';
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>');
            width: 320px;
            height: 80px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            padding: 0;
            margin: 0 auto;
            display: block;
        }
        
        body.login div#login h1 {
            margin-bottom: 24px;
        }
    </style>
    <!-- Debug info (remove after testing) -->
    <!-- Logo URL: <?php echo esc_url( $logo_url ); ?> -->
    <!-- File exists: <?php echo $file_exists; ?> -->
    <?php
}
add_action( 'login_enqueue_scripts', 'avo_custom_login_logo' );

function avo_custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'avo_custom_login_logo_url' );

function avo_custom_login_logo_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'avo_custom_login_logo_title' );

function avo_custom_login_footer() {
    echo '<div style="text-align: center; padding: 20px; font-size: 12px; color: #666;">
        &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.
    </div>';
}
add_action( 'login_footer', 'avo_custom_login_footer' );

<?php
/**
 * Plugin Name: Avo Custom Login Logo
 * Plugin URI:  https://github.com/avocadowebservices/Avo-Custom-Login-Logo
 * Description: Replace the default WordPress login logo with your own. Lightweight, no settings, just pure simplicity.
 * Version:     1.0.0
 * Author:      Joseph Brzezowski
 * Author URI:  https://avocadoweb.net/
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: avo-custom-login-logo
 * Requires at least: 5.0
 * Tested up to: 6.8
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add custom logo CSS to login page.
 */
function avo_custom_login_logo() {
    // Path to logo inside the plugin folder
    $logo_url = plugin_dir_url( __FILE__ ) . 'avo-logo.png';
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>');
            width: 320px;
            height: 80px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 20px;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'avo_custom_login_logo' );

/**
 * Change login logo URL to site home.
 */
function avo_custom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'avo_custom_login_logo_url' );

/**
 * Change login logo title.
 */
function avo_custom_login_logo_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'avo_custom_login_logo_title' );

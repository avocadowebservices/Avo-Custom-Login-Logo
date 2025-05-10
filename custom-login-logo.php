<?php
/*
Plugin Name: Avo Custom Login Logo
Description: Replaces the WordPress login logo with AvocadoWeb branding.
Version: 1.1
Author: Joseph Brzezowski
Requires at least: 5.0
Tested up to: 6.5
*/

function custom_login_logo() {
    echo '
    <style type="text/css">
        #login h1 a {
            background-image: url(https://avocadoweb.net/wp-content/uploads/2025/05/newlogo.png) !important;
            background-size: contain !important;
            width: 100% !important;
            height: 100px !important;
        }
        .avo-login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #555;
        }
    </style>';
}
add_action('login_head', 'custom_login_logo');

// Change login logo link URL
function custom_login_logo_url() {
    return 'https://avocadoweb.net';
}
add_filter('login_headerurl', 'custom_login_logo_url');

// Change logo hover title
function custom_login_logo_url_title() {
    return 'Welcome to AvocadoWeb';
}
add_filter('login_headertext', 'custom_login_logo_url_title');

// Add custom footer text
function custom_login_footer() {
    echo '<div class="avo-login-footer">© AvocadoWeb Services LLC</div>';
}
add_action('login_footer', 'custom_login_footer');

<?php
/*
Plugin Name: KDC Dash
Plugin Author: Vachan Kudmule (_KDC-Labs)
Description: KRAZY DEVIL CREATIONZ - Always a part of eYou : A client dashboard for KDC clients.
Version: 1.0
*/ 

// changing the login page URL
function ws_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('https://kdc.in/img/wp/kdc-login-logo.png?ver=20150617');
            background-image: none, url('https://kdc.in/img/wp/kdc-login-logo.svg?ver=20150617');
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ws_login_logo' );

// changing the login page URL
function ws_login_logo_url() {
    return 'https://ws.ai';
}
add_filter( 'login_headerurl', 'ws_login_logo_url' );

// changing the login page URL hover text
function ws_login_logo_url_title() {
    return 'webWorks by: KDC.in';
}
add_filter( 'login_headertitle', 'ws_login_logo_url_title' );

// add login message
function ws_login_message() {
    return '<center style="padding: 0 10px;">KDC helpline<br/><strong>1800 200 2442</strong> <em>{ext# 14}</em> | KDC.in</center>';
}
add_filter( 'login_message', 'ws_login_message' );

/*
*
* WP ToolBar
*
*/


// function to run before menu is rendered
add_action( 'wp_before_admin_bar_render', 'preload_kdc_toolbar' );

// function to add items to toolbar
add_action( 'admin_bar_menu', 'kdc_toolbar' );

// remove WordPress items from toolbar
function preload_kdc_toolbar() {
  global $wp_admin_bar;
  
  // remove WordPress logo
  $wp_admin_bar->remove_node('wp-logo');

}
 
// add custom items to toolbar
function kdc_toolbar() {
  global $wp_admin_bar;
  
  // add a single link
  $wp_admin_bar->add_node( array(
  	    'id' => 'kdc-site',
  	    'title' => '<img src="https://kdc.in/img/wp/kdc-ab-logo.png" />',
  	    'href' => 'https://kdc.in',
  	    'meta' => array( 'target' => '_kdc' )
      ) );
      
  // add a item to the right of the menu using parent: top-secondary
  $wp_admin_bar->add_node( array(
  	    'id' => 'kdc-assist',
  	    'title' => 'KDC Assist',
  	    'href' => 'https://kdcassist.com',
  	    'meta' => array( 'target' => '_blank' ),		
    	'parent' => 'kdc-site'
      ) );
  
  // add a sub-item
  $wp_admin_bar->add_node( array(
  	    'id' => 'kdc-email',
  	    'title' => 'eMail: assist@kdc.in',
  	    'href' => 'mailto:assist@kdc.in',
  	    'parent' => 'kdc-assist'
      ) );
  
  // add another sub-item
  $wp_admin_bar->add_node( array(
  	    'id' => 'kdc-tf',
  	    'title' => 'IN: 1800 200 2442',
  	    'href' => 'tel:18002002442',
  	    'meta' => array( 'title' => 'Only for INDIA' ),		
  	    'parent' => 'kdc-assist'
      ) );
  
  // add another sub-item
  $wp_admin_bar->add_node( array(
  	    'id' => 'kdc-call',
  	    'title' => 'Call: +91-22-65500532',
  	    'href' => 'tel:+912265500532',
  	    'meta' => array( 'title' => 'Only for INDIA' ),		
  	    'parent' => 'kdc-assist'
      ) );
}
?>
<?php

/***
* Plugin Name: My Badges Page
* Plugin URI: http://dalegreve.com/my-badges-plugin
* Description: Provides list of badges from team treehouse
* Version: 1.0
* Author: Dale Greve
* Author URI: http://dalegreve.com
* License: GPL2
***/

/***
Assign global varibales
**/

$plugin_url = WP_PLUGIN_URL . '/my-badges';
$options = array();

/**
*  Add a link to plugin in the admin menu
* under 'Settings >My Badges Page'
**/

/***
Assign global varibales
**/


function my_badges_menu() {
  /**
  ** Uset the add_options_page function
  ** add_options_page($page_title, $menu_title, $capability, $menu-slug, $function)
  **/

  add_options_page(
    'Treehouse Badges Plugin', //title
    'Treehouse Badges', // menu title
    'manage_options', // permission level
    'my_badges', //menu slug
    'my_badges_options_page'
  );
}
add_action('admin_menu','my_badges_menu');

function my_badges_options_page() {
  if (!current_user_can('manage_options') ) {
    wp_die('You do not have sufficient permission to access this page.');

  }

  global $plugin_url;
  global $options;

  if (isset ($_POST['wptreehouse_form_submitted'])){
    $hidden_field = esc_html( $_POST['wptreehouse_form_submitted'] );

    if( $hidden_field == 'Y') {
      $wptreehouse_username = esc_html($_POST['wptreehouse_username']); //assign html escaped variable

      $wptreehouse_profile = wptreehouse_badges_get_profile( $wptreehouse_username );


        $options['wptreehouse_username'] = $wptreehouse_username;
        $options['wptreehouse_profile']  = $wptreehouse_profile;
        $options['last_updated']         = time();

        update_option( 'my_badges', $options );
    }
  }

  $options = get_option( 'my_badges' );

  if ( $options != '' ) {
    $wptreehouse_username = $options['wptreehouse_username'];
    $wptreehouse_profile = $options['wptreehouse_profile'];
  }

  var_dump ( $wptreehouse_profile );


  require('inc/options-page-wrapper.php');
}

function wptreehouse_badges_get_profile( $wptreehouse_username ) {
  $json_feed_url = 'https://teamtreehouse.com/' . $wptreehouse_username . '.json';
  $args = array( 'timeout' => 120);

  $json_feed = wp_remote_get( $json_feed_url, $args);

  $wptreehouse_profile = json_decode( $json_feed['body']);

  return $wptreehouse_profile;
}


function my_badges_styles() {
  wp_enqueue_style('my_badges_styles', plugins_url('my-badges/my-badges.css')); //function enqueues style and gets url
}
add_action('admin_head','my_badges_styles') //hooks function into admin area

?>

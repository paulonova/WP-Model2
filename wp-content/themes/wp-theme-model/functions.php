<?php

function model_files() {  
  // wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyAxZnrwQqmucz6dcnliwoDJsdkNsHOmAAc', NULL, '1.0', true);
  wp_enqueue_script('main-js', get_theme_file_uri('compiled-scripts.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('main_styles', get_stylesheet_uri());
  wp_localize_script('main-js', 'modelData', array('root_url' => get_site_url(), 'nonce' => wp_create_nonce('wp_rest')));
}
add_action('wp_enqueue_scripts', 'model_files');


function model_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  register_nav_menu("headerMenuLocation", "Header Menu Location");
  register_nav_menu("footerMenuLocation", "Footer Menu Location");
  // add_image_size('modelLandscape', 400, 260, true);
  // add_image_size('modelPortrait', 480, 650, true);
}
add_action('after_setup_theme', 'model_features');
 

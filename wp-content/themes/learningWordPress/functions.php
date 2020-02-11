<?php
function learningWordPress_resources(){
  //represents css files or javascript files that we will need for our theme
  wp_enqueue_style('style', get_stylesheet_uri());
}
//we need to add the function so that it runs
add_action('wp_enqueue_scripts', 'learningWordPress_resources');

//We need to register those 2 new menu locations, so WordPress know they exist
//Navigation menus
//we will provide a few options via an array
register_nav_menus(array(
  'primary' => __('Primary Menu'), //primary is the short key word. Primay Menu is the actual formal name
  'footer'  => __('Footer Menu'),
));
//^We should be able to control the menus from the admin WordPress screen, under -> appearance -> menus
?>

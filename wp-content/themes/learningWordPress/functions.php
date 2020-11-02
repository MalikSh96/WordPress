<?php
function learningWordPress_resources(){
  //represents css files or javascript files that we will need for our theme
  wp_enqueue_style('style', get_stylesheet_uri());
}
//we need to add the function so that it runs
add_action('wp_enqueue_scripts', 'learningWordPress_resources');

//Get top ancestor
function get_top_ancestor_id(){
  //making the $post variable available within this function
  global $post;
  //we want this function to return a value in form of an id number of the top most ancestor page, relative to the current page being viewed
  if($post->post_parent){
    //if the post has a parent, ie. if the child has a parent
    //get_post_ancestors($post->ID); //<-- gets everything (array) (parent id, grandparent id etc etc.)
    //Therefore to specify it a bit more we do the below
    $ancestors = array_reverse(get_post_ancestors($post->ID)); //we store the array inside our variable
    //we use array_reverse so that the top most anestor value is the first value, we reverse the order, ie. getting the last element as the "first" element
    return $ancestors[0];
  }
  return $post->ID;
}

//Does page have children?
function has_children(){
  global $post;
  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}

//Changing excerpt more
function new_excerpt_more($more) {
  global $post;
  return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}
//https://developer.wordpress.org/reference/functions/add_filter/
//The 2nd param is a callback to be run when the filter is applied
add_filter('excerpt_more', 'new_excerpt_more');

//Customizing excerpt word count length
function custom_excerpt_length(){
  return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//Our theme setup
//Anytime you add support to your theme, you should do it in the below function
function learningWordPress_setup(){
  //We need to register those 2 new menu locations, so WordPress know they exist
  //Navigation menus
  //we will provide a few options via an array
  register_nav_menus(array(
    'primary' => __('Primary Menu'), //primary is the short key word. Primay Menu is the actual formal name
    'footer'  => __('Footer Menu'),
  ));
  //^We should be able to control the menus from the admin WordPress screen, under -> appearance -> menus

  //Add featured image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 180, 120, true);
  add_image_size('banner-image', 920, 210, array('left', 'top')); //we use an array to specify what directional portion we want to crop
}
add_action('after_setup_theme', 'learningWordPress_setup');


?>

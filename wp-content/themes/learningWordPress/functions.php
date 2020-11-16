<?php
function learningWordPress_resources(){
  //represents css files or javascript files that we will need for our theme
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);

  wp_enqueue_script('create_js', get_template_directory_uri() . '/js/create.js', NULL, 1.0, true);
  wp_localize_script('create_js', 'magicalData', array(
    //We want the code for the currently signed in user
    'nonce' => wp_create_nonce('wp_rest'),
    'siteurl' => get_site_url()
  ));
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

  //Add Post Format support
  add_theme_support('post-formats', array('aside', 'gallery', 'link')); //The 2nd param we can specify which of the nine post formats we want to support
}
add_action('after_setup_theme', 'learningWordPress_setup');

//Adding widget section to our appearance menu in WordPress admin dashboard, widget locations
function ourWidgetsInit(){
  register_sidebar(array(
    'name' => 'Sidebar', //end-users can see this name, hence human "friendly" name
    'id' => 'sidebar1', //end-users can't see this name, hence does not need "friendly" name but computer friendly
    'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
  //Adding more sidebars
  register_sidebar(array(
    'name' => 'Footer Area 1', //end-users can see this name, hence human "friendly" name
    'id' => 'footer1', //end-users can't see this name, hence does not need "friendly" name but computer friendly
    'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 2', //end-users can see this name, hence human "friendly" name
    'id' => 'footer2', //end-users can't see this name, hence does not need "friendly" name but computer friendly
    'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 3', //end-users can see this name, hence human "friendly" name
    'id' => 'footer3', //end-users can't see this name, hence does not need "friendly" name but computer friendly
    'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'Footer Area 4', //end-users can see this name, hence human "friendly" name
    'id' => 'footer4', //end-users can't see this name, hence does not need "friendly" name but computer friendly
    'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
}
add_action('widgets_init', 'ourWidgetsInit');

//Customize Appearance Options
function learningWordPress_customize_register($wp_customize){
  //To create a setting
  $wp_customize->add_setting('lwp_link_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh', //the transport property controls how WordPress will update the preview of your website when you are on the 'customize' screen
  ));

  $wp_customize->add_setting('lwp_btn_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh', //the transport property controls how WordPress will update the preview of your website when you are on the 'customize' screen
  ));

  $wp_customize->add_setting('lwp_hover_color', array(
    'default' => '#004C87',
    'transport' => 'refresh', //the transport property controls how WordPress will update the preview of your website when you are on the 'customize' screen
  ));

  //To create a section
  $wp_customize->add_section('lwp_standard_colors', array(
    'title' => __('Standard Colors', 'LearningWordPress'), //__ <-- is a WordPress translation/localization feature, also 'title' is the onscreen text for a user, hence human friendly name
    'priority' => 30,
  ));
  //To create a control
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
    'label' => __('Link Color', 'LearningWordPress'), //'label' is a human friendly name as the user sees that
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_link_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_btn_color_control', array(
    'label' => __('Button Color', 'LearningWordPress'), //'label' is a human friendly name as the user sees that
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_btn_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_hover_color_control', array(
    'label' => __('Hover Color', 'LearningWordPress'), //'label' is a human friendly name as the user sees that
    'section' => 'lwp_standard_colors',
    'settings' => 'lwp_hover_color',
  )));
}
add_action('customize_register', 'learningWordPress_customize_register');

//Output Customize CSS
function learningWordPress_customize_css(){
  //Purpose of this function is solely to output css with the new color codes
  ?>
  <style type="text/css">
    a:link,
    a:visited {
      <?php
      /*Instead of including the usual hexadecimal colorcode, we will be making it output dynamic
      colorcode, and this is where your 'settings' will be coming in.
      So when a user chooses a color from the colorpicker control (wordpress dashboard) their
      choice, the colorvalue gets saved into the database with your 'settings' name.

      About get_theme_mod() -> //https://developer.wordpress.org/reference/functions/get_theme_mod/*/ ?>
      color: <?php echo get_theme_mod('lwp_link_color'); ?>
    }

    .site-header nav ul li.current-menu-item a:link,
    .site-header nav ul li.current-menu-item a:visited,
    .site-header nav ul li.current-page-ancestor a:link,
    .site-header nav ul li.current-page-ancestor a:visited {
      background-color: <?php echo get_theme_mod('lwp_link_color'); ?>
    }

    .btn-a,
    .btn-a:link,
    .btn-a:visited,
    div.hd-search #searchsubmit {
      background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>
    }

    .btn-a:hover {
      background-color: <?php echo get_theme_mod('lwp_hover_color'); ?>
    }
  </style>
  <?php
}
add_action('wp_head', 'learningWordPress_customize_css');

/*Add Footer callout section to admin appearance customize screen */
function lwp_footer_callout($wp_customize) {
  //Add Section
  $wp_customize->add_section('lwp-footer-callout-section', array(
    'title' => 'Footer Callout'
  ));

  //Add Settings
  $wp_customize->add_setting('lwp-footer-callout-display', array(
    'default' => 'No'
  ));

  //Add Control
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-display-control', array(
    'label' => 'Display this section?',
    'section' => 'lwp-footer-callout-section',
    'settings' => 'lwp-footer-callout-display',
    'type' => 'select',
    'choices' => array('No' => 'No', 'Yes' => 'Yes')
  )));

  //Add Settings
  $wp_customize->add_setting('lwp-footer-callout-headline', array(
    'default' => 'Example Headline Text!'
  ));

  //Add Control
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
    'label' => 'Headline',
    'section' => 'lwp-footer-callout-section',
    'settings' => 'lwp-footer-callout-headline'
  )));

  //Add Settings
  $wp_customize->add_setting('lwp-footer-callout-text', array(
    'default' => 'Example Paragraph Text!'
  ));

  //Add Control
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
    'label' => 'Text',
    'section' => 'lwp-footer-callout-section',
    'settings' => 'lwp-footer-callout-text',
    'type' => 'textarea' //By default a Control will be a single lined textfield, but for this paragraph we want a multiline textarea
  )));

  //Add Settings
  $wp_customize->add_setting('lwp-footer-callout-link');

  //Add Control
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
    'label' => 'Link',
    'section' => 'lwp-footer-callout-section',
    'settings' => 'lwp-footer-callout-link',
    'type' => 'dropdown-pages'
  )));

  //Add Settings
  $wp_customize->add_setting('lwp-footer-callout-image');

  //Add Control
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
    'label' => 'Image',
    'section' => 'lwp-footer-callout-section',
    'settings' => 'lwp-footer-callout-image',
    'width' => 100, //Cropper width
    'height' => 100, //Cropper height
    'flex_width' => true, //Flexible Width
    'flex_height' => true, // Flexible Heiht
  )));
}
add_action('customize_register', 'lwp_footer_callout');
?>

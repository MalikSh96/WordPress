<?php
/*
Header is not the most exiting file, but one of
the most important file
This is where we include code that all the webpages
need.
*/
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <!--Letting php decide the charset for us-->
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name')?></title>
    <!--
      What wp_head() does is that if we later on add different
      plugins to site or all sort of different things wordpress
      gets to have the final word.
      In that way wordpress can add any other code that it automatically wants
      to add after the code we manually added
    -->
    <?php wp_head() ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="container">
      <!-- site header -->
      <header class="site-header">
        <h1>
          <a href="<?php echo home_url() //dynamically getting the home site name?>">
            <?php
              bloginfo('name'); //name of our site
            ?>
          </a>
        </h1>
        <h5>
          <?php
            bloginfo('description');
          ?>

          <?php
            //Conditional logic
            //if we are currently on a certain page
            if(is_page("contact-us")){
          ?>
            - Thank you for viewing our work
          <?php
            }
          ?>
        </h5>

        <nav class="site-nav">
          <!--We will use a WordPress function to make our navigation menu
            dynamically-->
            <?php
              //wp_nav_menu(); //<-- takes all navigations possible

              $args = array(
                //providing location for this menu
                //we are giving the theme location a name of primary
                'theme_location' => 'primary'
              );
              //To let us control what gets passed to the top menu, we use an array $args
              wp_nav_menu($args);
            ?>
        </nav>
    </header>

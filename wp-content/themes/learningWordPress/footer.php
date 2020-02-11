  <footer class="site-footer">
    <nav class="site-nav">
      <?php
        //wp_nav_menu(); //<-- takes all navigations possible

        $args = array(
          //providing location for this menu
          //we are giving the theme location a name of footer
          'theme_location' => 'footer'
        );
        //To let us control what gets passed to the bottom menu, we use an array $args
        wp_nav_menu($args);
      ?>
    </nav>
      <p>
        <!-- &copy is copyright -->
        <?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?>
      </p>
    </div><!-- for container -->
  </footer>

    <?php wp_footer(); ?>
  </body>
</html>

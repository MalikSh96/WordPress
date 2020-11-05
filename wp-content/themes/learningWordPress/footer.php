  <footer class="site-footer">
    <!--footer widgets-->
    <div class="footer-widgets clearfix">
      <div class="footer-widget-area">
        <!--If a user does not use some of the footers that gets allowed we use a condtion to check them-->
        <?php
            if(is_active_sidebar('footer1')) :
        ?>
        <?php
          dynamic_sidebar('footer1');
        ?>
      </div>
        <?php endif ?>

        <?php
            if(is_active_sidebar('footer2')) :
        ?>
        <?php
          dynamic_sidebar('footer2');
        ?>
      </div>
        <?php endif ?>

        <?php
            if(is_active_sidebar('footer3')) :
        ?>
        <?php
          dynamic_sidebar('footer3');
        ?>
      </div>
        <?php endif ?>

        <?php
            if(is_active_sidebar('footer4')) :
        ?>
        <?php
          dynamic_sidebar('footer4');
        ?>
      </div>
        <?php endif ?>
    </div>
    <!--footer widgets-->
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

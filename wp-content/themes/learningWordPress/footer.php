  <footer class="site-footer">
    <!--footer widgets-->
    <div class="footer-widgets clearfix">
        <!--Optimized the condition for if a footer is active or not by using
        a foor loop to loop through almost dynamically, instead of repeating the code
        over and over again-->
        <?php for ($x = 0; $x <= 5; $x++)
          if(is_active_sidebar('footer' . $x)) : ?>
      <div class="footer-widget-area">
        <?php
            dynamic_sidebar('footer' . $x); ?>
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

<!--
Below is also a conditional loop to check for each of our footers but using
the hardcoded way, the code below is instead replaced by a for loop which is a much more
functional and optimal way of use, that also works dynamically
-->

<!--
    <!--<div class="footer-widget-area">
        <!--If a user does not use some of the footers that gets allowed we use a condtion to check them-->
        <!--<//?php //if(is_active_sidebar('footer1')) : ?>
        <//?php //dynamic_sidebar('footer1'); ?>
      <!--</div>
        <//?php //endif ?>

        <//?php //if(is_active_sidebar('footer2')) : ?>
      <!--<div class="footer-widget-area">
        <//?php //dynamic_sidebar('footer2'); ?>
      </div>
        <//?php //endif ?>

        <//?php //if(is_active_sidebar('footer3')) : ?>
      <div class="footer-widget-area">
        <//?php //dynamic_sidebar('footer3'); ?>
      </div>
        <//?php //endif ?>

        <//?php //if(is_active_sidebar('footer4')) : ?>
      <div class="footer-widget-area">
        <//?php //dynamic_sidebar('footer4'); ?>
      </div>
        <//?php //endif ?>
-->

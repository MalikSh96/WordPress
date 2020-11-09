<?php get_header(); ?>
  <!--site content, we edit the homepage of our theme here-->
  <div class="site-content clearfix">
    <?php
    if(have_posts()) :
      while(have_posts()) :
        the_post();
        the_content();
      endwhile;
        else :
          echo '<p>No content found</p>';
      endif;
      ?>

      <!--Home columns-->
      <div class="home_columns clearfix">
        <!--One half-->
        <div class="one-half">
          <?php
          //Show posts loop begins here
          $showPosts = new WP_Query('cat=4&posts_per_page=2'); //<--class that ships with WordPress out of the box
          //$showPosts = new WP_Query('cat=4&posts_per_page=2&orderby=title&order=ASC');
          //WP_Query returns an object which contains posts from the Shows category that we store in $showPosts

          if($showPosts->have_posts()) :
            while($showPosts->have_posts()) :
              $showPosts->the_post();
              //output content however we please here
          ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
          <?php
            endwhile;

            else :
            //fallback no content message here
          endif;
          wp_reset_postdata(); //<--Prevents our custom WP_Query loops from ever disrupting the main natural url based loops that WordPress runs on its own.
          /*always have/use wp_reset_postdata() when working with WP_Query(),
          as it is relinquishing control of the global post variable, which then gives control
          back to WordPress and does not anylonger disrupt the url based queries, wp_reset_postdata resets the data*/
          ?>
        </div>
        <!--one half-->
        <div class="one-half last">
          <?php
          //MyShows posts loop begins here
          $myShowPosts = new WP_Query('cat=7&posts_per_page=2'); //<--class that ships with WordPress out of the box
          //$showPosts = new WP_Query('cat=4&posts_per_page=2&orderby=title&order=ASC');
          //WP_Query returns an object which contains posts from the Shows category that we store in $showPosts

          if($myShowPosts->have_posts()) :
            while($myShowPosts->have_posts()) :
              $myShowPosts->the_post();
              //output content however we please here
          ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
          <?php
            endwhile;

            else :
            //fallback no content message here
          endif;
          wp_reset_postdata(); //<--Prevents our custom WP_Query loops from ever disrupting the main natural url based loops that WordPress runs on its own.
          /*always have/use wp_reset_postdata() when working with WP_Query(),
          as it is relinquishing control of the global post variable, which then gives control
          back to WordPress and does not anylonger disrupt the url based queries, wp_reset_postdata resets the data*/
          ?>
        </div>
      </div>
    </div>
  <?php get_footer(); ?>

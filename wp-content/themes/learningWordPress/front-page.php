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
      <div class="home-columns clearfix">
        <!--One half-->
        <div class="one-half">
          <h2>Latest about Shows</h2>
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
          <!--Post item-->
          <div class="post-item clearfix">
            <!--Post thumbnail-->
            <div class="square-thumbnail">
              <a href="<?php the_permalink(); ?>">
                <?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										}
                    else {
                ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/BlackClover1.jpg">
								<?php
                    }
                ?>
              </a>
						  </div>
            <!-- /post-thumbnail -->
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>
          <?php the_excerpt(); ?>
          </div>
          <!-- /post-item -->
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
          <span class="horiz-center"><a href="<?php echo get_category_link(4); ?>" class="btn-a">View all Shows Posts</a></span>
        </div>
        <!--one half-->

        <div class="one-half last">
          <h2>Latest about My Shows</h2>
          <?php
          //Show posts loop begins here
          $showPosts = new WP_Query('cat=7&posts_per_page=2'); //<--class that ships with WordPress out of the box
          //$showPosts = new WP_Query('cat=4&posts_per_page=2&orderby=title&order=ASC');
          //WP_Query returns an object which contains posts from the Shows category that we store in $showPosts

          if($showPosts->have_posts()) :
            while($showPosts->have_posts()) :
              $showPosts->the_post();
              //output content however we please here
          ?>
          <!--Post item-->
          <div class="post-item clearfix">
            <!--Post thumbnail-->
            <div class="square-thumbnail">
              <a href="<?php the_permalink(); ?>">
                <?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										}
                    else {
                ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/AkatsukiNoYona1.jpg">
								<?php
                    }
                ?>
              </a>
						  </div>
            <!-- /post-thumbnail -->
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>
          <?php the_excerpt(); ?>
          </div>
          <!-- /post-item -->
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
          <span class="horiz-center"><a href="<?php echo get_category_link(7); ?>" class="btn-a">View all My Shows Posts</a></span>
        </div>
      </div>
    </div>
  <?php get_footer(); ?>

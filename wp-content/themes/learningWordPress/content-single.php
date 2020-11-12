<article class="post">
  <h2>
    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>

  <!--Outputting the date for each post and the author, also using a link for the author name which will redirect to all post by the given author-->
  <!--WordPress has an inbuild function called the_time(), this accepts a param known as a format string-->
  <p class="post-info"><?php the_time('F jS, Y g:i a'); ?>
      | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
        <?php the_author();?></a> | Posted in
        <?php
          //we will output all the different categories the post is assigned to
          //WordPress has the below function, which does most of the heavy lifting for us
          $categories = get_the_category(); //<--returns an array with all of the categories assigned to a post, therefore we store it in our $categories variable
          $separator = ", ";
          $output = '';

          //we will need to loop through our array
          // We use if first to check if we even have data in our array
          //https://wordpress.stackexchange.com/questions/37721/whats-the-difference-between-term-id-and-term-taxonomy-id
          if($categories){
            foreach ($categories as $category) {
              //$category->term_id, essentially we are pssing along a numerical value into get_category_link(), which will return the url for us
              $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator; //$category references to the current item being looped through
            }
            //Once done looping we output the data
            echo trim($output, $separator); //we will remove anything, at start or the end, anything that resemebles our $separator symbol, from our $output
          }
        ?>
  </p>
  <!--<p class="post-info"><?php //the_time('m/d/y'); ?></p>-->


  <?php
    the_post_thumbnail('banner-image');
  ?>

  <?php the_content(); ?> <!-- the_content() function outputs the data within the post-->


  <div class="about-author clearfix">
    <div class="about-author-image">
      <?php echo get_avatar(get_the_author_meta('ID'), 160); ?>
      <p><?php echo get_the_author_meta('nickname'); ?></p>
    </div>

    <?php
      //We will populate $otherAuthorPosts with only the posts we are interested in, ie. posts only from the same author
      $otherAuthorPosts = new WP_Query(array(
      'author' => get_the_author_meta('ID'),
      'posts_per_page' => 3,
      'post__not_in' => array(get_the_ID()) //<-- lets you exclude certain post id's from the results of the search query, we don't want to output the post we are already viewing
      ));
    ?>

    <div class="about-author-text">
      <h3>About the Author</h3>
      <?php echo wpautop(get_the_author_meta('description')); ?>

      <!--Only if the author has more than one post, will we display the below-->
      <?php if($otherAuthorPosts->have_posts()) { ?>
      <div class="other-posts-by">
        <h4>Other posts <?php echo get_the_author_meta('nickname'); ?></h4>
        <ul>
          <!--While $otherAuthorPosts still have_posts() to loop through-->
          <?php while($otherAuthorPosts->have_posts()) {
            $otherAuthorPosts->the_post();
          ?>
          <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>
          <?php } ?>
        </ul>
      </div>
    <?php
      }
      wp_reset_postdata(); //<--Prevents our custom WP_Query loops from ever disrupting the main natural url based loops that WordPress runs on its own.
      /*always have/use wp_reset_postdata() when working with WP_Query(),
      as it is relinquishing control of the global post variable, which then gives control
      back to WordPress and does not anylonger disrupt the url based queries, wp_reset_postdata resets the data*/
    ?>

    <?php if(count_user_posts(get_the_author_meta('ID')) > 3) { ?>
    <a class="btn-a" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
      View all posts by <?php echo get_the_author_meta('nickname'); ?>
    </a>
    <?php } ?>
    </div>
  </div>
</article>

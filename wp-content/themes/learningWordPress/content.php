<article class="post <?php if(has_post_thumbnail()) { ?> has-thumbnail <?php } ?>">

  <!--Post thumbnail-->
  <div class="post-thumbnail">
    <!--Featured image section-->
    <a href="<?php the_permalink(); ?>">
      <?php
        the_post_thumbnail('small-thumbnail');
      ?>
    </a>
  </div>
  <!--Post thumbnail-->


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

  <?php //the_content('Read More &raquo;'); ?> <!-- the_content() function outputs the data within the post-->
  <?php the_excerpt(); ?>
</article>

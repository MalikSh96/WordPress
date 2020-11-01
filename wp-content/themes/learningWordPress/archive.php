<?php
/*
this file is a very flexible powerful file that can control many different views
of our posts.
We need to build conditional logic using if and elseif statements, to output different titles
depending on the type of archive we are viewing.
This lets us in short control many different views for our posts.
*/

//We are going to refer to the loop
/*
The loop is central and we are going to loop through all the different post and
output them to our webpage
*/

//adding header to the layout
get_header();

if(have_posts()) :
?>

<h2><?php
  //We first start by checking if we are in a category

  //WordPress already have all of these functions below that we call/use, so we don't have to make them ourself - we avoid the heavy lifting

  //is_category means it is a category archive
  if(is_category()){
    single_cat_title();
  }
  //What if it is a tag archive
  elseif(is_tag()){
    single_tag_title();
  }
  //What if it is an author archive
  elseif(is_author()){
    //Initializes the first that is being queried in this archive
    the_post();
    //By using ^ above line, the below lone will always function - specially effective when yuo have multiple authors on your website
    echo 'Author Archives: ' . get_the_author();
    /*Below function is used so that our loop can continue on unaffected
      without using rewind_posts() the current post will reset

      https://wordpress.stackexchange.com/questions/119835/rewind-posts-what-actually-the-use-of-it-and-where-using-is-required-or-pre

      rewind_posts() - This does exactly what it sounds like.
      After you've run a loop this function is used to return to the beginning allowing you to run the same loop again
    */
    rewind_posts();
  }
  //What if it is a day archive
  elseif(is_day()){
    echo 'Daily Archives: ' . get_the_date();
  }
  //What if it is a month archive
  elseif(is_month()){
    echo 'Monthly Archives: ' . get_the_date('F Y');
  }
  //What if it is a year archive
  elseif(is_year()){
    echo 'Yearly Archives: ' . get_the_date('Y');
  }
  //if none of the above conditions are met
  else{
    //This is our fallback line
    echo 'Archives:';
  }
?></h2>


<?php
  while(have_posts()) : /*do something with the posts*/ the_post(); ?>
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


    <?php the_excerpt(); ?> <!-- the_excerpt(), An excerpt in WordPress is a term used for article summary with a link to the whole entry-->
  </article>
<?php endwhile;
else :
  echo '<p>No content found</p>';
endif;
//adding footer to the layout
get_footer();
?>

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
  while(have_posts()) : /*do something with the posts*/ the_post();
    get_template_part('content', get_post_format());
  endwhile;

  echo paginate_links();

else :
  echo '<p>No content found</p>';
endif;
//adding footer to the layout
get_footer();
?>

<?php
//We are going to refer to the loop
/*
The loop is central and we are going to loop through all the different post and
output them to our webpage
*/

//adding header to the layout
get_header();

if(have_posts()) :
  while(have_posts()) : /*do something with the posts*/ the_post(); ?>
  <article class="post">
    <h2>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
    <?php the_content(); ?> <!-- the_content() function outputs the data within the post-->
  </article>
<?php endwhile;
else :
  echo '<p>No content found</p>';
endif;
//adding footer to the layout
get_footer();
?>

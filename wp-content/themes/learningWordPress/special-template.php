<!--template for multiple pages-->
<?php
/*
Template Name: Special Layout
*/
/*
^^
This comment is registering the template with WordPress, so that WordPress
is aware that it exists
*/

get_header();

if(have_posts()) :
  while(have_posts()) : /*do something with the posts*/ the_post(); ?>
  <article class="post page">
    <h2>
      <?php the_title(); ?>
    </h2>

    <!-- info box-->
    <div class="info-box">
      <h4>Disclaimer title</h4>
      <p>Dummy text only</p>
    </div> <!-- /info-box -->

    <?php the_content(); ?>
  </article>
<?php endwhile;
else : echo '<p>No content found</p>';
endif;
//adding footer to the layout
get_footer();
?>

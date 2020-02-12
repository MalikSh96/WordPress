<!--Template for the Contact Us page-->
<?php
//adding header to the layout
get_header();

if(have_posts()) :
  while(have_posts()) : /*do something with the posts*/ the_post(); ?>
  <article class="post page">
    <!--column container-->
    <div class="column-container clearfix">
      <div class="title-column">
        <h2>
          <?php the_title(); ?>
        </h2>
      </div>
      <div class="text-column">
        <?php the_content(); ?>
      </div>
    </div>
  </article>
<?php endwhile;
else : echo '<p>No content found</p>';
endif;
//adding footer to the layout
get_footer();
?>

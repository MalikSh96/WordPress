<?php
//We are going to refer to the loop
/*
The loop is central and we are going to loop through all the different post and
output them to our webpage
*/

//adding header to the layout
get_header();
?>
<div class="site-content clearfix">
  <!--<div class="main-column">-->
    <?php
    if(have_posts()) :
      while(have_posts()) : /*do something with the posts*/ the_post();
        the_content();

      endwhile;
      else :
        echo '<p>No content found</p>';
      endif;
    ?>


</div>
<?php
//adding footer to the layout
get_footer();
?>

<article class="post post-link">
  <!--We echo the output of the content, instead of using the_content(), which
  will get us the url that got pasted in and WordPress will not try to format the text by adding
  code for us or anything like that-->
  <a href="<?php echo get_the_content(); ?>">
    <?php
      the_title();
    ?>
  </a>
</article>

<!--We will edit this file to include dynamic content that we want to include-->
<article class="post post-aside">
  <p class="mini-meta">
    <?php
      the_author();
    ?>
    @
    <?php
      the_time('F j, Y');
    ?>
  </p>
    <?php
      the_content();
    ?>
</article>

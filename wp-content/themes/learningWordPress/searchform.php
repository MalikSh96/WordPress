<!-- Anything placed in this file will get output when get_search_form() runs -->
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
  <div>
    <!--<label class="screan-reader-text" for="s">Search for:</label>-->
    <input type="text" name="s" value="" id="s" placeholder="<?php the_search_query(); ?>"/>
    <input type="submit" id="searchsubmit" value="Search">
  </div>
</form>

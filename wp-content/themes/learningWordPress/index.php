<?php
//THIS TEMPLATE FILE CONTAINS THE BLOG LISTING SCREEN

//We are going to refer to the loop
/*
The loop is central and we are going to loop through all the different post and
output them to our webpage
*/
//This file controls the output of our posts
//adding header to the layout
get_header();
?>
<!--When we float columns (in our style.css) we need to clear our floats, and there
exist many different ways to clear a float, but we will use a clearfix on a parent element
so that our module can stay self contained and can easily be moved around-->
<!--parent div, site content-->
<div class="site-content clearfix">
  <!--main column-->
  <div class="main-column">

    <!--Add Post option part-->
    <?php if(current_user_can('administrator')) : ?>
    <div class="admin-quick-add">
      <h3>Quick Add Post</h3>
      <input type="text" name="title" placeholder="Title">
      <textarea name="content" placeholder="Content"></textarea>
      <button id="quick-add-button">Create Post</button>
    </div>
  <?php endif; ?>
  <!--Add Post option part-->

    <?php
    if(have_posts()) :
      while(have_posts()) : the_post(); ?>

    <!--Delete option part-->
    <!--https://www.vandelaydesign.com/delete-a-wordpress-post-using-ajax/-->
    <?php if( current_user_can( 'delete_post' ) ) : ?>
    <?php $nonce = wp_create_nonce('my_delete_post_nonce') ?>
      <!--<button class="delete-btn">-->
        <a href="<?php echo admin_url('admin-ajax.php?action=my_delete_post&id=' . get_the_ID() . '&nonce=' . $nonce ) ?>"
          data-id="<?php the_ID() ?>" data-nonce="<?php echo $nonce ?>" class="delete-post"
        >
          Delete Post
        </a>
      <!--</button>-->
    <?php endif ?>
    <!--Delete option part-->

    <?php
        /*
        Info: get_template_part('content', get_post_format());
        The 1st param which ^ tries to get is our content.php file.
        The 2nd param which ^^ it tries to get is our content-aside.php file from our theme folder.
        */
        get_template_part('content', get_post_format()); //<--responsible for how the webpage is displayed
        ?>
      <?php
      endwhile;

      //For pagination
      //Option 1 for pagination
      //previous_posts_link(); //goes a page backwards
      //next_posts_link(); //goes a page forward
      //Option 2 for pagination (more advanced)
      echo paginate_links();

    else :
      echo '<p>No content found</p>';
    endif;
    ?>
  </div>
  <!--main column-->
  <?php get_sidebar(); ?>
</div>
<?php
//adding footer to the layout
get_footer();
?>

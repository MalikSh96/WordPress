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
  <article class="post page">

    <?php
      if(has_children() OR $post->post_parent > 0) { ?>

      <!--adding a wrapper for the parent and child links-->
      <nav class="site-nav children-links clearfix">
        <!--
        We include a link of the top most parent page
        -->
        <span class="parent-link">
          <a href="<?php echo get_the_permalink(get_top_ancestor_id());?>">
            <?php
              echo get_the_title(get_top_ancestor_id()); //<--wordpress function
            ?>
          </a>
        </span>
        <!--
        we use ul because wp_list_pages outputs the children links each one inside
        a list item, but those list items need to live within an unordered list, ul
        -->
        <ul>
          <?php
            $args = array(
              //'child_of' => $post->ID, //specifying current page being viewed
              'child_of' => get_top_ancestor_id(), //<-- this will take the children list with it whenever you view another children page
              'title_li' => ''
            );

            //wp_list_pages(); //outputs the list of all pages under the pages
            //Therefore we will provide some options/params to make a list of specific items
            wp_list_pages($args); //<-- points towards an array named $args
        ?>
      </ul>
      </nav>
    <?php } ?>

    <h2>
      <?php the_title(); ?>
    </h2>
    <?php the_content(); ?>
    <button id="related-posts-btn">Load related blog posts</button>
    <div id="related-posts-container">
  </article>
<?php endwhile;
else : echo '<p>No content found</p>';
endif; ?>

<!--Below is used to showcase pagination-->
<!--Not necessarily important, might get removed sometime in the future for cleanup-->
<h2>Blog posts about Shows</h2>
<?php
  $ourCurrentPage = get_query_var('paged');

  $aboutShows = new WP_Query(array(
    'category_name' => 'shows',
    'posts_per_page' => 2,
    'paged' => $ourCurrentPage
  ));

  if($aboutShows->have_posts()) :
    while($aboutShows->have_posts()):
      $aboutShows->the_post(); //<-- this prepares the data for each post as the loop runs so that the functions on line 71 can do their jobs
      ?>
      <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </li>
      <?php
    endwhile;
    //previous_posts_link(); //goes a page backwards
    //next_posts_link('Next page', $aboutShows->max_num_pages); //goes a page forward
    echo paginate_links(array(
      'total' => $aboutShows->max_num_pages
    ));
  endif;
?>

<?php
//adding footer to the layout
get_footer();
?>

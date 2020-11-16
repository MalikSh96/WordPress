<?php
//We are going to refer to the loop
/*
The loop is central and we are going to loop through all the different post and
output them to our webpage
*/

//adding header to the layout
get_header(); ?>
	<!-- site-content -->
	<div class="site-content clearfix">
		<!-- main-column -->
		<div class="main-column">
		<?php
			if (have_posts()) :
				while (have_posts()) : the_post();

				if (get_post_format() == false) {
					get_template_part('content', 'single');
				} else {
					get_template_part('content', get_post_format());
				}
			endwhile;
			?>

				<!--Delete option part-->
		    <!--https://www.vandelaydesign.com/delete-a-wordpress-post-using-ajax/-->
		    <?php if( current_user_can( 'delete_post' ) ) : ?>
		    <?php $nonce = wp_create_nonce('my_delete_post_nonce') ?>
		        <a href="<?php echo admin_url('admin-ajax.php?action=my_delete_post&id=' . get_the_ID() . '&nonce=' . $nonce ) ?>"
		          data-id="<?php the_ID() ?>" data-nonce="<?php echo $nonce ?>" class="delete-post"
		        >
		          Delete Post
		        </a>
		    <?php endif ?>
		    <!--Delete option part-->

				<?php
				else :
					echo '<p>No content found</p>';

				endif;
			?>
		</div><!-- /main-column -->
	<?php get_sidebar(); ?>
	</div><!-- /site-content -->

<!--adding footer to the layout-->
<?php get_footer();

?>

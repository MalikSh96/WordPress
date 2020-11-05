<!--secondary column-->
<!--This will act as our sidebar when working with widgets-->
<div class="side-column">
  <?php if (is_active_sidebar('sidebar1')) : ?>

		<?php dynamic_sidebar('sidebar1'); ?>

	<?php endif; ?>
</div>
<!--secondary column-->

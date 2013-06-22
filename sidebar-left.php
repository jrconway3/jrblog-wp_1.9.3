<?php
/**
 * The sidebar containing the left widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="triary" class="widget-area widget-left" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
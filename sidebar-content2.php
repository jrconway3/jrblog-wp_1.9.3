<?php
/**
 * The sidebar containing the content footer widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9
 */
?>

	<?php if ( is_active_sidebar( 'content-4' ) ) : ?>
		<div id="content-footer" class="widget-content content-footer" role="complementary">
			<?php dynamic_sidebar( 'content-4' ); ?>
		</div><!-- #content-footer -->
	<?php endif; ?>
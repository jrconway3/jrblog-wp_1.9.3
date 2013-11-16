<?php
/**
 * The sidebar containing the post footer widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9
 */
?>

	<?php if ( is_active_sidebar( 'content-3' ) ) : ?>
		<div id="post-footer" class="widget-post post-footer" role="complementary">
			<?php dynamic_sidebar( 'content-3' ); ?>
		</div><!-- #post-footer -->
	<?php endif; ?>
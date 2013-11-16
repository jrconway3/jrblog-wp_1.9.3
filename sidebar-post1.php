<?php
/**
 * The sidebar containing the post header widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9
 */
?>

	<?php if ( is_active_sidebar( 'content-2' ) ) : ?>
		<div id="post-header" class="widget-post post-header" role="complementary">
			<?php dynamic_sidebar( 'content-2' ); ?>
		</div><!-- #post-header -->
	<?php endif; ?>
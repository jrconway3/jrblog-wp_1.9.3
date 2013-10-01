<?php
/**
 * The sidebar containing the footer widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9
 */
?>

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div id="footer1" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- #footer1 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div id="footer2" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- #footer2 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div id="footer3" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- #footer3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="footer4" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- #footer4 -->
	<?php endif; ?>
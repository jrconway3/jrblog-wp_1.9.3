<?php
/**
 * The sidebar containing the content banner widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9
 */
?>

	<div class="banner">
		<?php if ( is_active_sidebar( 'banner-1' ) ) : ?>
			<div id="banner1" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'banner-1' ); ?>
			</div><!-- #banner1 -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'banner-2' ) ) : ?>
			<div id="banner2" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'banner-2' ); ?>
			</div><!-- #banner2 -->
		<?php endif; ?>
		<div class="clear">&nbsp;</div>
	</div>

	<?php if ( is_active_sidebar( 'content-1' ) ) : ?>
		<div id="content-header" class="widget-content content-header" role="complementary">
			<?php dynamic_sidebar( 'content-1' ); ?>
		</div><!-- #content-header -->
	<?php endif; ?>
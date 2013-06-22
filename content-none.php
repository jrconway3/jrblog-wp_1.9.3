<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.0
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'jrblog' ); ?></h1>
			<div class="clear">&nbsp;</div>
		</header>

		<div class="entry-content entry-empty">
			<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'jrblog' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

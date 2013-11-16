<?php
/**
 * Template Name: Blank
 *
 * Description: Blank page template virtually identical to default but without even the
 *              page title.
 *
 * @package WordPress
 * @subpackage jrConway.Blog
 * @since jrBlog 1.9.4
 */

get_header(); ?>
<?php get_sidebar('left'); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
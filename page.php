<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.0
 */

get_header(); ?>
<?php get_sidebar('content1'); ?>
<?php get_sidebar('left'); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php get_sidebar('post1'); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

			<?php get_sidebar('post2'); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_sidebar('content2'); ?>
<?php get_footer(); ?>
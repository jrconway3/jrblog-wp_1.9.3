<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9.3
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'The Blog' ); ?></h1>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'jrblog' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'jrblog' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'jrblog' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
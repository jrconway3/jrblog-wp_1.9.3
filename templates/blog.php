<?php
/**
 * Template Name: Blog
 *
 * Description: Page theme for displaying blog posts.
 *
 * @package WordPress
 * @subpackage jrConway.Blog
 * @since jrBlog 1.9.3
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : $page = get_page(); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( $page->post_title ); ?></h1>
			</header>

			<?php
				/* Start the Loop */
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts("post_type=post&paged=$paged&order=DESC");
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'excerpt' ); ?>
			<?php endwhile; ?>

			<?php jrblog_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'jrblog' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'jrblog' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'jrblog' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'jrblog' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
<?php
/**
 * The template for displaying posts with an excerpt.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.0
 */
$id = get_the_ID();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'jrblog' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'jrblog' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<div class="comments-link">
				<?php if ( comments_open() ) : ?>
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'jrblog' ) . '</span>', __( '1 Reply', 'jrblog' ), __( '% Replies', 'jrblog' ) ); ?>
				<?php endif; // comments_open() ?>
			</div><!-- .comments-link -->
			<div class="entry-author">
				<?php jrblog_entry_meta(); ?>
				<?php edit_post_link( __( 'Edit', 'jrblog' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			<div class="clear">&nbsp;</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if (has_post_thumbnail()){?>
				<div class="entry-thumb">
					<?php the_post_thumbnail(array(200, 200)); ?>
				</div>
			<?php } ?>
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'jrblog' ), 'after' => '</div>' ) ); ?>
			<div class="clear">&nbsp;</div>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<div class="entry-social">
				<?php if(jrblog_share_buttons()) {
					echo jrblog_share_buttons(get_permalink($id), get_the_title($id));
				} ?>
			</div>
			<?php
				// If a user has filled out their description and this is a multi-author blog or authorship is enabled, show a bio on their entries.
				if ( is_singular() && get_the_author_meta( 'description' ) && (is_multi_author() || of_get_option('authorship_enable'))) :
			?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'jrblog_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'jrblog' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'jrblog' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

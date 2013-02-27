<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage jrConway.Blog
 * @since jrBlog 1.0
 */
?>
			<div class="clearfix">&nbsp;</div>
		</div><!-- #main .wrapper -->

		<footer id="colophon" role="contentinfo">
			<div class="site-bar">&nbsp;</div><!-- .site-bar -->
			<div class="site-info">
				<div class="copyright-main">
					<?php if(is_active_sidebar('copyright-1')) : ?>
						<?php dynamic_sidebar('copyright-1'); ?>
					<?php elseif(of_get_option('footer_copyright')): ?>
						<?php echo of_get_option('footer_copyright', 'no entry'); ?>
					<?php else: ?>
						<?php do_action( 'jrblog_credits' ); ?>
						<a href="<?php echo esc_url( __( 'http://www.jrconway.net/', 'jrblog' ) ); ?>" title="<?php esc_attr_e( 'Responsive Blog Theme for Wordpress', 'jrblog' ); ?>"><?php printf( __( 'jrBlog Responsive Wordpress Theme &copy; %s', 'jrblog' ), 'jrConway Programming' ); ?></a>
					<?php endif; ?>
				</div>
				<aside class="copyright-aside">

				</aside>
			</div><!-- .site-info -->
			<div class="site-footer">
			</div><!-- .site-footer -->
			<div class="site-footer-bg">

			</div><!-- .site-footer-bg -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
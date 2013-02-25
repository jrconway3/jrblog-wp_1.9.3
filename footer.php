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
			<div class="site-info">
				<?php do_action( 'jrblog_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'jrblog' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'jrblog' ); ?>"><?php printf( __( 'Proudly powered by %s', 'jrblog' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
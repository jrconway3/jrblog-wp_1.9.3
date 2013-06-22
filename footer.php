<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
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
						<a href="<?php echo esc_url( __( 'http://www.jrconway.net/', 'jrblog' ) ); ?>" title="<?php esc_attr_e( 'Responsive Blog Theme for Wordpress', 'jrblog' ); ?>"><?php printf( __( 'jrBlog Responsive Wordpress Theme &copy; %s', 'jrblog' ), 'jrConway Programming' ); ?></a><br />
						Free Social Icons by <a href="<?php echo esc_url( __( 'http://icondock.com/', 'jrblog' ) ); ?>" title="<?php esc_attr_e( 'Icon Dock', 'jrblog' ); ?>">IconDock</a>
					<?php endif; ?>
				</div>
				<aside class="copyright-aside">
					<?php if(is_active_sidebar('copyright-2')) : ?>
						<?php dynamic_sidebar('copyright-2'); ?>
					<?php elseif(jrblog_follow_icons()): ?>
						<?php echo jrblog_follow_icons(); ?>
					<?php endif; ?>
				</aside>
			</div><!-- .site-info -->
			<div class="site-footer">
			</div><!-- .site-footer -->
			<div class="site-footer-bg">

			</div><!-- .site-footer-bg -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<!-- START Google+ API Code -->
	<script type="text/javascript">
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>
	<!-- END Google+ API Code -->

	<!-- START Twitter JS -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<!-- END Twitter JS -->

	<?php wp_footer(); ?>
</body>
</html>
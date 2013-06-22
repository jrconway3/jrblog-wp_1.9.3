<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.0
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/<?php jrblog_schema(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>

	<!--Google+ Metadata /-->
	<meta itemprop="name" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<!-- Google Analytics -->
	<?php if(of_get_option('google_analytics')): ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php echo of_get_option('google_analytics'); ?>', '<?php echo str_replace('www.', '', $_SERVER['SERVER_NAME']); ?>');
		  ga('send', 'pageview');
		</script>
	<?php endif; ?>

	<!-- Google Webmaster -->
	<?php if(of_get_option('google_webmaster')): ?>
		<meta name="google-site-verification" content="<?php echo of_get_option('google_webmaster'); ?>" />
	<?php endif; ?>

	<!--Mobile Viewport Optimized /-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--Set Page Title /-->
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- START Facebook API -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=621195914573310";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- END Facebook API -->

	<!-- START LinkedIn JS -->
	<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
	<!-- END LinkedIn JS -->

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<section class="topbar">
				<div>
					<?php if(is_active_sidebar('header-1')) : ?>
						<?php dynamic_sidebar('header-1'); ?>
					<?php elseif(of_get_option('header_image')):
						$style      = '';
						if(of_get_option('header_width')) {
							$style .= 'width:' . of_get_option('header_width', 'no entry') . 'px;';
						}
						if(of_get_option('header_height')) {
							$style .= 'height:' . of_get_option('header_height', 'no entry') . 'px;';
						}
					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option('header_image', 'no entry'); ?>" class="header-image" style="<?php echo $style; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php else: ?>
						<hgroup>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</hgroup>
					<?php endif; ?>
				</div>
				<?php if(is_active_sidebar('header-2')) : ?>
					<aside class="widget widget-area">
						<?php dynamic_sidebar('header-2'); ?>
					</aside>
				<?php endif; ?>
				<div class="clear">&nbsp;</div>
			</section>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'jrblog' ); ?></h3>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'jrblog' ); ?>"><?php _e( 'Skip to content', 'jrblog' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
		<nav id="sub-navigation" class="sub-navigation" role="navigation">&nbsp;</nav><!-- #sub-navigation -->

		<div id="main" class="wrapper">
<?php
/**
 * jrBlog 1.0 functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, jrconwayresponsiveblog_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * @package Wordpress
 * @subpackage jrConway.jrBlog
 * @since jrBlog 1.9.4
 */


#######################################
## -- START CUSTOMIZATION OPTIONS
#######################################


if ( ! function_exists( 'jrblog_custom_styles' ) ) :
/**
 * Set Custom Stylesheets
 *
 * @since jrBlog 1.9.3
 */
function jrblog_custom_styles() {
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'jrblog-styles', get_template_directory_uri() . '/css/style.less');

	/*
	 * Load jQuery
	 */
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}

	/*
	 * Load Javascript Functions
	 */
	wp_enqueue_script( 'modernizr', dirname(get_template_directory_uri()) . '/js/libs/modernizr-2.0.6.min.js');
	wp_enqueue_script( 'twitter-bootstrap', dirname(get_template_directory_uri()) . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script( 'jrblog-scripts', dirname(get_template_directory_uri()) . '/js/main.js', array('jquery'));

	/*
	 * CHILD THEME:
	 *
	 * Copy this function to the functions.php file in the new child theme.
	 * Copy css/child.less to your child themes css folder and rename it style.less.
	 * Change "child" in the line below to your child theme's directory name.
	 * Uncomment the line below.
	 */
	//wp_enqueue_style( 'jrblog-styles', dirname(get_template_directory_uri()) . '/child/css/style.less');
}
endif;
add_action( 'wp_enqueue_scripts', 'jrblog_custom_styles' );

if ( ! function_exists( 'jrblog_extend_contact' ) ) :
/**
 * Extend Custom Contact Fields
 *
 * @since jrBlog 1.0
 */
function jrblog_extend_contact($fields) {
	/**
	  * CHILD THEME:
	  *
	  * Copy this function to the functions.php of your child theme and 
	  * perform contact field overrides in the same way as the default.
	  *
	  * You can also override the default function, but this is NOT
	  * AT ALL recommended.
	  */

	// Add Array Overrides

	// EXAMPLE: DISABLE FIELD
	/*$fields['skype'] = false;*/

	// EXAMPLE: ADD NEW FIELD
	/*$fields['myspace] = array(
		"name"   => "MySpace",
		"url"    => "http://new.myspace.com/",
		"share"  => false
	);*/

	// Return Contact Fields
	return $fields;
}
endif;

if ( ! function_exists( 'jrblog_custom_contact' ) ) :
/**
 * Set Custom Contact Fields
 *
 * @since jrBlog 1.0
 */
function jrblog_custom_contact() {
	/**
	  * Format in the following way:
	  *
	  * "type" => array(
	  *     "name"   => "Type",    // Full name of contact type
	  *     "url"    => "http://", // URL location to personal profile
	  *     "url"    => "",        // Don't set to disable follow options in theme options
	  *     "share"  => true,      // Enable sharing options in theme options
	  *     "share"  => false,     // Disable sharing options in theme options
	  * ),
	  *
	  *
	  * To disable existing fields:
	  *
	  * "type" => false,           // Set full array to "false" to remove it entirely.
	  */

	// Return Array of Contact Fields
	$fields = array(
		"aim"              => false,
		"yim"              => false,
		"jabber"           => false,
		"skype"            => array(
			"name"   => "Skype",
			"url"    => "",
			"share"  => false
		),
		"facebook"         => array(
			"name"   => "Facebook",
			"url"    => "http://www.facebook.com/",
			"share"  => true
		),
		"twitter"          => array(
			"name"   => "Twitter",
			"url"    => "http://www.twitter.com/",
			"share"  => true
		),
		"googleplus"       => array(
			"name"   => "Google+",
			"url"    => "http://plus.google.com/",
			"share"  => true
		),
		"linkedin"         => array(
			"name"   => "LinkedIn",
			"url"    => "http://www.linkedin.com/pub/",
			"share"  => true
		),
		"tumblr"           => array(
			"name"   => "Tumblr",
			"url"    => "http://www.tumblr.com",
			"share"  => false,
			"sub"    => true
		)
	);

	// Extend Custom Fields
	$fields = jrblog_extend_contact($fields);

	// Return Contact Fields
	return $fields;
}
endif;

if ( ! function_exists( 'jrblog_widgets_extend' ) ) :
/**
 * Extends our page widget areas.
 *
 * @since jrBlog 1.0
 */
function jrblog_widgets_extend() {
	/**
	  * CHILD THEME:
	  *
	  * Copy this function into your child theme's functions.php.
	  *
	  * This will extend the jrBlog sidebar widgets without overwriting
	  * the existing sidebars.
	  *
	  * The commented register_sidebar function below may be used as an example.
	  *
	  * If you wish to overwrite the existing sidebars (NOT RECOMMENDED)
	  * you can also copy the jrblog_widgets_init() function.
	  */
	/*register_sidebar( array(
		'name' => __( 'Right Sidebar', 'jrblog' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar for the page. Can be used in right sidebar and three-column layouts.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/
}
endif;

if ( ! function_exists( 'jrblog_widgets_init' ) ) :
/**
 * Registers our page widget areas.
 *
 * @since jrBlog 1.0
 */
function jrblog_widgets_init() {
	/**
	  * Sidebar Widgets
	  *
	  * These are your typical, every day sidebar widgets. Instead of the usual set up,
	  * we'll enable the ability for a three column layout. There will be page templates
	  * for left sidebar, right sidebar, and two sidebars. These sidebars will be used for
	  * each respective side.
	  */
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'jrblog' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar for the page. Can be used in right sidebar and three-column layouts.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'jrblog' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left sidebar for the page. Can be used in left sidebar and three-column layouts.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/**
	  * Header Widgets
	  *
	  * Header widgets are defined second to avoid the default widgets being inserted into them.
	  *
	  * This could technically go into Theme Options, but what if uses want to do more
	  * advanced features with the header area? We'll still define a header upload in the
	  * common location, but if that isn't enabled it'll default to this.
	  */
	register_sidebar( array(
		'name' => __( 'Header Image', 'jrblog' ),
		'id' => 'header-1',
		'description' => __( 'Header area for the site logo to go.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Header Sidebar', 'jrblog' ),
		'id' => 'header-2',
		'description' => __( 'Header sidebar to the right of the header image.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/**
	  * Copyright Widgets
	  *
	  * The copyright area is a narrow bar at the bottom of the page separate from the main
	  * footer widgets. For this reason we create separate footer widgets.
	  *
	  * This could technically go into Theme Options, but what if uses want to do more
	  * advanced features with the copyright area? Let's allow them to change what's in here
	  * using widgets instead of forcing a simple line of text.
	  */
	register_sidebar( array(
		'name' => __( 'Copyright Footer', 'jrblog' ),
		'id' => 'copyright-1',
		'description' => __( 'Footer area for the copyright.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h6 class="copyright-title">',
		'after_title' => '</h6>',
	) );
	register_sidebar( array(
		'name' => __( 'Copyright Sidebar', 'jrblog' ),
		'id' => 'copyright-2',
		'description' => __( 'Sidebar for the copyright to enable two-column copyright area', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h6 class="copyright-title">',
		'after_title' => '</h6>',
	) );

	/**
	  * Footer Widgets
	  *
	  * Lastly we have our footer widgets. There are four footer widgets, and these will
	  * automatically be resized to fit based on how many widget areas are enabled.
	  *
	  * There will be a theme options page set up, though, to change the effects of how
	  * these will work. For example, these widget areas could go above the copyright or
	  * below the copyright. They also could be set to auto-resize based on how many widget
	  * areas are enabled, or just to sit at the center of the footer area with a fixed width.
	  */
	register_sidebar( array(
		'name' => __( 'Footer 1', 'jrblog' ),
		'id' => 'footer-1',
		'description' => __( 'First widget area of the site footer.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="footer-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer 2', 'jrblog' ),
		'id' => 'footer-2',
		'description' => __( 'Second widget area of the site footer.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="footer-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer 3', 'jrblog' ),
		'id' => 'footer-3',
		'description' => __( 'Third widget area of the site footer.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="footer-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer 4', 'jrblog' ),
		'id' => 'footer-4',
		'description' => __( 'Fourth widget area of the site footer.', 'jrblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="footer-title">',
		'after_title' => '</h4>',
	) );

	// Extend Widgets
	jrblog_widgets_extend();
}
endif;
add_action( 'widgets_init', 'jrblog_widgets_init' );

if ( ! function_exists( 'jrblog_class_extend' ) ) :
/**
 * Extends the default jrBlog body class.
 *
 * @since jrBlog 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function jrblog_class_extend( $classes ) {
	/**
	  * CHILD THEME:
	  *
	  * Copy this function into your child theme's functions.php.
	  *
	  * This will extend the jrBlog body classes without overwriting
	  * the existing classes.
	  *
	  * If you wish to overwrite the existing classes (NOT RECOMMENDED)
	  * you can also copy the jrblog_class_init() function.
	  */


	// Return Classes (DO. NOT. REMOVE.)
	return $classes;
}
endif;


if ( ! function_exists( 'jrblog_class_init' ) ) :
/**
 * Extends the default WordPress body class.
 *
 * @since jrBlog 1.9.4
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function jrblog_class_init( $classes ) {
	// Check if No Sidebars or Full Width Template
	if ((!is_active_sidebar( 'sidebar-1' ) && !is_active_sidebar( 'sidebar-2')) ||
			is_page_template( 'templates/full-width.php' ) ) {
		// Add Full Width Class
		$classes[] = 'full-width';	
	}

	// Check for Only Right Sidebar or Right Sidebar Template
	elseif (( is_active_sidebar( 'sidebar-1' ) && !is_active_sidebar( 'sidebar-2' ) )
			|| is_page_template( 'templates/right-sidebar.php' )) {
		// Add Right Sidebar Class
		$classes[] = 'right-sidebar';
	}

	// Check for Only Left Sidebar or Left Sidebar Template
	elseif (( !is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) )
			|| is_page_template( 'templates/left-sidebar.php' )) {
		// Add Left Sidebar Class
		$classes[] = 'left-sidebar';
	}

	// Check for Two Sidebars or Two Sidebar Template
	elseif (( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) )
			|| is_page_template( 'templates/two-sidebar.php' )) {
		// Add Two Sidebars Class
		$classes[] = 'two-sidebars';
	}

	// Count Footer Areas Available
	$footers = 0;
	if (is_active_sidebar( 'footer-1' )) {
		$footers++;
	}
	if (is_active_sidebar( 'footer-2' )) {
		$footers++;
	}
	if (is_active_sidebar( 'footer-3' )) {
		$footers++;
	}
	if (is_active_sidebar( 'footer-4' )) {
		$footers++;
	}

	// Add Number of Footers Class
	$classes[] = 'footers-'.$footers;

	// Check for Follow Icons or Copyright Sidebar
	if ( is_active_sidebar( 'header-1' ) && is_active_sidebar( 'header-2' ) ) {
		// Add Copyright Columns Class
		$classes[] = 'header-columns';
	}

	// Check for Follow Icons or Copyright Sidebar
	if ( is_active_sidebar( 'copyright-2' ) || jrblog_follow_icons()) {
		// Add Copyright Columns Class
		$classes[] = 'copyright-columns';
	}

	// Check for Share Buttons
	if ( jrblog_share_buttons() ) {
		// Add Share Posts Class
		$classes[] = 'share-posts';
	}

	// Check for Blog Template
	if ( is_page_template( 'blog.php' ) || is_category() || is_search() ||
			is_single() || is_tag() ) {
		// Add Blog Class
		$classes[] = 'blog';
	}

	// Check for Default Template
	if ( is_page_template( 'page.php' ) ) {
		// Add Front Page Class
		$classes[] = 'template-front-page';

		// Check for Post Thumbnail
		if ( has_post_thumbnail() ) {
			// Add Has Post Thumbnail Class
			$classes[] = 'has-post-thumbnail';	
		}
	}

	// Check for Multi Author
	if ( ! is_multi_author() ) {
		// Add Single Author Class
		$classes[] = 'single-author';
	}

	// Extend Body Classes
	$classes = jrblog_class_extend($classes);

	return $classes;
}
endif;
add_filter( 'body_class', 'jrblog_class_init' );

if ( ! function_exists( 'jrblog_excerpt_more' ) ) :
/**
 * Change Read More Text on Excerpts
 *
 * @since jrBlog 1.9.3
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function jrblog_excerpt_more($output) {
	return $output . '<p><a class="moretag" href="'. get_permalink( get_the_ID() ) . '">Read More</a></p>';
}
endif;
add_filter('the_excerpt', 'jrblog_excerpt_more');

#######################################
## -- END CUSTOMIZATION OPTIONS
#######################################



#######################################
## -- START INITIALIZATION FUNCTIONS
#######################################

/**
 * Sets up theme defaults and registers the various WordPress features that
 * jrBlog supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since jrBlog 1.0
 */
function jrblog_setup() {
	/*
	 * Import WP Less
	 *
	 * This will be used for all available stylesheets.
	 */
	require_once( 'wp-less/wp-less.php' );

	/*
	 * Makes Template available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'jrblog', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in five locations.
	register_nav_menu( 'primary', __( 'Primary Menu', 'jrblog' ) );
	register_nav_menu( 'footer-1', __( 'Footer 1', 'jrblog' ) );
	register_nav_menu( 'footer-2', __( 'Footer 2', 'jrblog' ) );
	register_nav_menu( 'footer-3', __( 'Footer 3', 'jrblog' ) );
	register_nav_menu( 'footer-4', __( 'Footer 4', 'jrblog' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'jrblog_setup' );


/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since jrBlog 1.0
 */
function jrblog_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'jrblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'jrblog-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'jrblog' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'jrblog' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'jrblog-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads all required Javascript files.
	 */
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.0.6.min.js', array( 'jquery' ), '2.0.6' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '2.3.0' );
}
add_action( 'wp_enqueue_scripts', 'jrblog_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since jrBlog 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function jrblog_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'jrblog' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'jrblog_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since jrBlog 1.0
 */
function jrblog_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'jrblog_page_menu_args' );


if ( ! function_exists( 'jrblog_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since jrBlog 1.0
 */
function jrblog_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'jrblog' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'jrblog' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'jrblog' ) ); ?></div>
			<div class="clear">&nbsp;</div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'jrblog_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own jrblog_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since jrBlog 1.0
 */
function jrblog_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'jrblog' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'jrblog' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'jrblog' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'jrblog' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'jrblog' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'jrblog' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'jrblog' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'jrblog_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own jrblog_entry_meta() to override in a child theme.
 *
 * @since jrBlog 1.0
 */
function jrblog_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'jrblog' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'jrblog' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'jrblog' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'Posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'jrblog' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'jrblog' );
	} else {
		$utility_text = __( 'Posted on %3$s<span class="by-author"> by %4$s</span>.', 'jrblog' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since jrBlog 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function jrblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'jrblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since jrBlog 1.0
 */
function jrblog_customize_preview_js() {
	wp_enqueue_script( 'jrblog-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'jrblog_customize_preview_js' );

if ( ! function_exists( 'jrblog_schema' ) ):
/**
 * Gets Site Schema From Theme Options
 *
 * @since jrBlog 1.0
 */
function jrblog_schema() {
	// Get Theme Options
	//$theme_options = jrblog_get_theme_options();
	$theme_options = array();

	// Output Schema
	if(!empty($theme_options['schema'])) {
		echo $theme_options['schema'];
	}
	else {
		echo "Blog";
	}
}
endif; // jrblog_schema

/**
 * Add Extra Contact Fields
 *
 * @since jrBlog 1.0
 */
function jrblog_contact_info($contactmethods) {
	// Get Social Sites
	$fields = jrblog_custom_contact();

	// Loop Social Sites
	foreach($fields as $code => $field) {
		// Valid Site?
		if(!empty($field) && is_array($field) && count($field)) {
			// Add to Contact Methods
			$contactmethods[$code] = $field['name'];
		}
		elseif(empty($field['name'])) {
			// Delete from Contact Methods
			unset($contactmethods[$code]);
		}
	}

	// Return Contact Methods
	return $contactmethods;
}
add_filter('user_contactmethods', 'jrblog_contact_info');

#######################################
## -- END INITIALIZATION FUNCTIONS
#######################################


#######################################
## -- START SOCIAL FUNCTIONS
#######################################

/**
 * Create Social Share Buttons
 *
 * @author David A Conway Jr.
 * @param string $url  : the url to share; defaults to current page's url
 * @param string $text : the text in the share popup; defaults to current page's title
 * @since jrBlog 1.0
 */
function jrblog_share_buttons($url = '', $text = '') {
	// All Sharing Disabled?
	if(of_get_option('share_disable')) {
		return '';
	}

	// Get Social Sites
	$fields = jrblog_custom_contact();
	$html   = '';

	// Loop Social Sites
	foreach($fields as $code => $field) {
		// Valid Site?
		if(!empty($field) && is_array($field) && count($field)) {
			// Set Unique Variables
			$share = of_get_option($code . '_share');
			$func  = 'jrblog_' . $code . '_button';

			// Add to Contact Methods
			if(!empty($share) && function_exists($func)) {
				// Get Share Button
				$html .= $func($url, $text);
			}
		}
	}

	// Return Share HTML
	return $html;
}

/**
 * Create Facebook Share Button
 *
 * @author David A Conway Jr.
 * @param string $url  : the url to share; defaults to current page's url
 * @param string $text : the text in the share popup; defaults to current page's title
 * @since jrBlog 1.0
 */
function jrblog_facebook_button($url = '', $text = '') {
	// Include HREF?
	$href = '';
	if(!empty($url)) {
		$href = ' data-href="' . $url . '"';
	}

	// Include Text?
	$cont = '';
	if(!empty($text)) {
		$cont = ' data-text="' . $text . '"';
	}

	// Generate HTML
	$html = '<div class="fb-like"' . $href . $prev . ' data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>';

	// Return HTML Code
	return $html;
}

/**
 * Create Twitter Share Button
 *
 * @author David A Conway Jr.
 * @param string $url  : the url to share; defaults to current page's url
 * @param string $text : the text in the share popup; defaults to current page's title
 * @since jrBlog 1.0
 */
function jrblog_twitter_button($url = '', $text = '') {
	// Include HREF?
	$href = '';
	if(!empty($url)) {
		$href = ' data-url="' . $url . '"';
	}

	// Include Text?
	$cont = '';
	if(!empty($text)) {
		$cont = ' data-text="' . $text . '"';
	}

	// Generate HTML
	$html = '<a href="https://twitter.com/share" class="twitter-share-button"' . $href . $cont . '>Tweet</a>';

	// Return HTML Code
	return $html;
}

/**
 * Create Google+ Share Button
 *
 * @author David A Conway Jr.
 * @param string $url  : the url to share; defaults to current page's url
 * @param string $text : the text in the share popup; defaults to current page's title
 * @since jrBlog 1.0
 */
function jrblog_googleplus_button($url = '', $text = '') {
	// Include HREF?
	$href = '';
	if(!empty($url)) {
		$href = ' data-href="' . $url . '"';
	}

	// Include Text?
	$cont = '';
	if(!empty($text)) {
		$cont = ' data-text="' . $text . '"';
	}

	// Generate HTML
	$html = '<div class="g-plus" data-action="share" data-annotation="bubble"' . $href . '></div>';

	// Return HTML Code
	return $html;
}

/**
 * Create LinkedIn Share Button
 *
 * @author David A Conway Jr.
 * @param string $url  : the url to share; defaults to current page's url
 * @param string $text : the text in the share popup; defaults to current page's title
 * @since jrBlog 1.0
 */
function jrblog_linkedin_button($url = '', $text = '') {
	// Include HREF?
	$href = '';
	if(!empty($url)) {
		$href = ' data-url="' . $url . '"';
	}

	// Include Text?
	$cont = '';
	if(!empty($text)) {
		$cont = ' data-text="' . $text . '"';
	}

	// Generate HTML
	$html = '<script type="IN/Share"' . $href . ' data-counter="right"></script>';

	// Return HTML Code
	return $html;
}


/**
 * Create Social Follow Icons
 *
 * @author David A Conway Jr.
 * @since jrBlog 1.0
 */
function jrblog_follow_icons($force = false) {
	// All Links Disabled?
	if(of_get_option('follow_disable') && empty($force)) {
		return '';
	}


	// RSS Follow Enabled?
	$html    = '';
	$code    = 'rss';
	$size    = of_get_option('follow_dims');
	$follow  = of_get_option($code . '_follow');
	if(!empty($follow)) {
		// Set RSS Variables
		$img     = '';
		$rss     = '/feed';
		$url     = 'http://feeds.feedburner.com/';
		$acct    = of_get_option($code . '_acct');
		$icon    = of_get_option($code . '_icon');
		$custom  = of_get_option($code . '_custom');
		$default = '/images/icons/' . $size . '/' . $code . '.png';

		// Feedburner Enabled?
		if(!empty($acct)) {
			// Full URL Provided?
			if(strpos($acct, 'http') !== false) {
				$feed = $acct;
			}
			// Set Feedburner Feed
			else {
				$feed = $url . $acct;
			}
		}
		// Use Internal Feed
		else {
			// Set WP Feed
			$feed = $rss;
		}

		// Use Custom Button?
		if(!empty($custom)) {
			// Set Custom Icon
			$img = $icon;
		}
		// Use Default Button
		else {
			// Set Default Icon
			$img = get_template_directory_uri() . $default;
		}

		// Add Link HTML
		$html .= '<a href="' . $url . $acct . '" target="_blank"><img src="' . $img . '" alt="" width="' . $size . '" height="' . $size . '" /></a>';
	}


	// Get Social Sites
	$fields = jrblog_custom_contact();

	// Loop Social Sites
	foreach($fields as $code => $field) {
		// Valid Site?
		if(!empty($field) && is_array($field) && count($field)) {
			// Set Unique Variables
			$img     = '';
			$href    = '';
			$sub     = $field['sub'];
			$url     = $field['url'];
			$acct    = of_get_option($code . '_acct');
			$icon    = of_get_option($code . '_icon');
			$custom  = of_get_option($code . '_custom');
			$follow  = of_get_option($code . '_follow');
			$default = '/images/icons/' . $size . '/' . $code . '.png';

			// Full URL Provided?
			if(strpos($acct, 'http') !== false) {
				// Set Specific Domain
				$href = $acct;
			}
			// Is a Subdomain?
			elseif(!empty($sub)) {
				// Replace Subdomain
				$href = str_replace('www', $acct, $url);
			}
			// Set Social URL
			else {
				// Set Default Domain
				$href = $url . $acct;
			}

			// Add to Contact Methods
			if(!empty($follow) && !empty($url) && !empty($acct)) {
				// Use Custom Button?
				if(!empty($custom)) {
					// Set Custom Icon
					$img = $icon;
				}
				// Use Default Button
				else {
					// Set Default Icon
					$img = get_template_directory_uri() . $default;
				}

				// Add Link HTML
				$html .= '<a href="' . $href . '" target="_blank"><img src="' . $img . '" alt="" width="' . $size . '" height="' . $size . '" /></a>';
			}
		}
	}

	// Return Share HTML
	return $html;
}

/**
  * Shortcode for jrBlog Social Icons
  *
  * @author David A Conway Jr.
  * @since Real Chords 1.9
  */
function jrblog_socialicon_display( $atts ){
	// Extract Attributes
	extract( shortcode_atts( array(
		'force'     => 'true',
	), $atts ) );

	// Return HTML Code
	return jrblog_follow_icons($force);
}
add_shortcode( 'jrblog_socialicons', 'jrblog_socialicon_display' );

#######################################
## -- END SOCIAL FUNCTIONS
#######################################



#######################################
## -- START SEO FUNCTIONS
#######################################

/**
 * Disable WP Rel
 *
 * @author Whitney Krape
 * @src http://www.whitneykrape.com/2011/07/quick-fix-for-relcategory-tag-in-wordpress/ 
 * @since jrBlog 1.0
 */
function jrblog_norel_cat($text) {
	$text = str_replace('rel="category tag"', "", $text);
	return $text;
}
add_filter('the_category', 'jrblog_norel_cat');

#######################################
## -- END SEO FUNCTIONS
#######################################
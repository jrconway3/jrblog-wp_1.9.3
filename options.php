<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {
	// Initialize Options
	$options = array();



	/** LAYOUT SETTINGS **/

	// Tab Header
	$options[] = array(
		'name'    => __('Layout Settings', 'options_framework_theme'),
		'type'    => 'heading');

	// Header Image
	$options[] = array(
		'name'    => __('Header Image', 'options_framework_theme'),
		'desc'    => __('Choose a header image. Defaults to the site title and slogan if not selected. Can also be overridden with a widget.', 'options_framework_theme'),
		'id'      => 'header_image',
		'type'    => 'upload');

	// Header Height
	$options[] = array(
		'name'    => __('Header Height', 'options_framework_theme'),
		'desc'    => __('Height of the header image in pixels. Only applies if a header image is set.', 'options_framework_theme'),
		'id'      => 'header_height',
		'std'     => '100',
		'class'   => 'mini',
		'type'    => 'text');

	// Header Width
	$options[] = array(
		'name'    => __('Header Width', 'options_framework_theme'),
		'desc'    => __('Width of the header image in pixels. Only applies if a header image is set. Width is not required if height is specified.', 'options_framework_theme'),
		'id'      => 'header_width',
		'std'     => '',
		'class'   => 'mini',
		'type'    => 'text');

	// Copyright Text
	$options[] = array(
		'name'    => __('Copyright Text', 'options_framework_theme'),
		'desc'    => __('The text for the copyright to go in the footer. Can also be replaced by a widget.', 'options_framework_theme'),
		'id'      => 'footer_copyright',
		'std'     => '',
		'class'   => '',
		'type'    => 'text');



	/** SOCIAL SETTINGS **/

	// Tab Header
	$options[] = array(
		'name'    => __('Social Settings', 'options_framework_theme'),
		'type'    => 'heading');


	// Don't Show Social Icons in Footer?
	$options[] = array(
		'name'    => __('Disable Social Icons?', 'options_framework_theme'),
		'desc'    => __('Disable all social follow icon links from appearing in the footer.', 'options_framework_theme'),
		'id'      => 'follow_disable',
		'type'    => 'checkbox');

	// Don't Show Social Share Buttons?
	$options[] = array(
		'name'    => __('Disable Social Share?', 'options_framework_theme'),
		'desc'    => __('Disable all social sharing buttons on posts and pages.', 'options_framework_theme'),
		'id'      => 'share_disable',
		'type'    => 'checkbox');

	// Enable Authorship?
	$options[] = array(
		'name'    => __('Enable Authorship?', 'options_framework_theme'),
		'desc'    => __('Display authorship on every post whether this is a multi-author blog or not?', 'options_framework_theme'),
		'id'      => 'authorship_enable',
		'type'    => 'checkbox');


	// RSS Spacer
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');

	// Follow Dimensions Array
	$follow_dims = array(
		"16" => "16 x 16",
		"24" => "24 x 24",
		"32" => "32 x 32"
	);

	// Set Icon Dimensions
	$options[] = array(
		'name'    => __('Follow Icon Dimensions', 'options_framework_theme'),
		'desc'    => __('Choose the size of follow icon to use.', 'options_framework_theme'),
		'id'      => 'follow_dims',
		'std'     => '16',
		'type'    => 'select',
		'class'   => 'mini social_follow',
		'options' => $follow_dims);


	// RSS Spacer
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer rss_spacer',
		'type'    => 'info');

	// Display RSS Feed
	$options[] = array(
		'name'    => __('Display RSS Feed?', 'options_framework_theme'),
		'desc'    => __('Display follow link to RSS feed in the footer.', 'options_framework_theme'),
		'id'      => 'rss_follow',
		'std'     => '1',
		'class'   => 'social_follow',
		'type'    => 'checkbox');

	// RSS Feedburner Account
	$options[] = array(
		'name'    => __('Feedburner Account', 'options_framework_theme'),
		'desc'    => __('Enter the name of the Feedburner account to replace the feed url with one from Feedburner.', 'options_framework_theme'),
		'id'      => 'rss_acct',
		'std'     => '',
		'class'   => 'social_follow rss_follow',
		'type'    => 'text');

	// Use Custom RSS Icon
	$options[] = array(
		'name'    => __('Use Custom RSS Icon?', 'options_framework_theme'),
		'desc'    => __('Use a custom rss icon instead of the default?', 'options_framework_theme'),
		'id'      => 'rss_custom',
		'class'   => 'social_follow rss_follow',
		'type'    => 'checkbox');

	// Custom RSS Icon
	$options[] = array(
		'name'    => __('Custom RSS Icon', 'options_framework_theme'),
		'desc'    => __('Choose a custom RSS icon. Defaults to a free icon from IconDock.', 'options_framework_theme'),
		'id'      => 'rss_icon',
		'class'   => 'social_follow rss_follow rss_icon',
		'type'    => 'upload');


	// Get Social Sites
	$fields = jrblog_custom_contact();

	// Loop Social Sites
	foreach($fields as $code => $field) {
		// Add Social Option
		$options = optionsframework_social_options($code, $field, $options);
	}

	// Add Social Options
	/*$options = optionsframework_social_options('facebook', $options, true);
	$options = optionsframework_social_options('twitter', $options, true);
	$options = optionsframework_social_options('google plus', $options, true);
	$options = optionsframework_social_options('linked in', $options, true);
	$options = optionsframework_social_options('my space', $options);
	$options = optionsframework_social_options('behance', $options);
	$options = optionsframework_social_options('github', $options);*/



	/** SEO SETTINGS **/

	// SEO Header
	$options[] = array(
		'name'    => __('SEO Settings', 'options_framework_theme'),
		'type'    => 'heading');

	// 
	/*$options[] = array(
		'name'    => __('Copyright Text', 'options_framework_theme'),
		'desc'    => __('The text for the copyright to go in the footer. Can also be replaced by a widget.', 'options_framework_theme'),
		'id'      => 'footer_copyright',
		'std'     => '',
		'class'   => '',
		'type'    => 'text');*/

	return $options;
}


/**
 * Add Social Options
 */
function optionsframework_social_options($type, $settings, $options = array()) {
	// Set Name
	$name = $settings['name'];

	// Not Enabled?
	if(empty($name) || (empty($settings['share']) && empty($settings['url']))) {
		// Return Original Array
		return $options;
	}

	// Social Spacer
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer ' . $type . '_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer ' . $type . '_spacer',
		'type'    => 'info');
	$options[] = array(
		'desc'    => '',
		'class'   => 'social_spacer ' . $type . '_spacer',
		'type'    => 'info');

	// Show Share Options?
	if(!empty($settings['share'])) {
		// Display Social Share
		$options[] = array(
			'name'    => __('Display ' . $name . ' Share?', 'options_framework_theme'),
			'desc'    => __('Display ' . $name . ' sharing button on posts and pages.', 'options_framework_theme'),
			'id'      => '' . $type . '_share',
			'std'     => '1',
			'class'   => 'social_share',
			'type'    => 'checkbox');
	}

	// Show Follow Options?
	if(!empty($settings['url'])) {
		// Display Social Icon
		$options[] = array(
			'name'    => __('Display ' . $name . ' Icon?', 'options_framework_theme'),
			'desc'    => __('Display follow link to ' . $name . ' Account in the footer.', 'options_framework_theme'),
			'id'      => '' . $type . '_follow',
			'class'   => 'social_follow',
			'type'    => 'checkbox');

		// Social Account ID
		$options[] = array(
			'name'    => __('' . $name . ' Account', 'options_framework_theme'),
			'desc'    => __('ID of the webmaster\'s ' . $name . ' account.', 'options_framework_theme'),
			'id'      => '' . $type . '_acct',
			'std'     => '',
			'class'   => 'social_follow ' . $type . '_follow',
			'type'    => 'text');

		// Use Custom Social Icon
		$options[] = array(
			'name'    => __('Use Custom ' . $name . ' Icon?', 'options_framework_theme'),
			'desc'    => __('Use a custom ' . $name . ' icon instead of the default?', 'options_framework_theme'),
			'id'      => '' . $type . '_custom',
			'class'   => 'social_follow ' . $type . '_follow',
			'type'    => 'checkbox');

		// Custom Social Icon
		$options[] = array(
			'name'    => __('Custom ' . $name . ' Icon', 'options_framework_theme'),
			'desc'    => __('Choose a custom ' . $name . ' icon. Defaults to a free icon.', 'options_framework_theme'),
			'id'      => '' . $type . '_icon',
			'class'   => 'social_follow ' . $type . '_follow ' . $type . '_icon',
			'type'    => 'upload');	
	}


	// Return Options
	return $options;
}



/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">

// Social Follow
function toggle_social(type) {
	// Toggle Social Follow
	jQuery('#' + type + '_follow').click(function() {
  		jQuery('.' + type + '_follow:not(.' + type + '_icon)').fadeToggle(400);

		// Set Default Follow
		if(jQuery('#' + type + '_follow:checked').val() !== undefined) {
			// Set Default Icon
			if(jQuery('#' + type + '_custom:checked').val() !== undefined) {
				jQuery('.' + type + '_icon').fadeIn(400);
			}
			else {
				jQuery('.' + type + '_icon').fadeOut(400);
			}
		}
		else {
			jQuery('.' + type + '_icon').fadeOut(400);
		}
	});

	// Toggle Social Icon
	jQuery('#' + type + '_custom').click(function() {
  		jQuery('.' + type + '_icon').fadeToggle(400);
	});

	// Set Default Follow
	if(jQuery('#' + type + '_follow:checked').val() !== undefined) {
		jQuery('.' + type + '_follow').show();
	}
	else {
		jQuery('.' + type + '_follow').hide();
	}

	// Set Default Icon
	if(jQuery('#' + type + '_custom:checked').val() !== undefined) {
		jQuery('.' + type + '_icon').show();
	}
	else {
		jQuery('.' + type + '_icon').hide();
	}
}

// Document Ready?
jQuery(document).ready(function($) {
	// Set Social Toggles
	<?php
		// Get Social Sites
		$fields = jrblog_custom_contact();

		// Loop Social Sites
		foreach($fields as $code => $field) {
			// Add Social Option
			echo "toggle_social('{$code}');\n";
		}
	?>

	// Set Social Toggles
	/*toggle_social('rss');
	toggle_social('facebook');
	toggle_social('twitter');
	toggle_social('googleplus');
	toggle_social('myspace');
	toggle_social('linkedin');
	toggle_social('github');
	toggle_social('behance');*/

});

</script>

<?php
}
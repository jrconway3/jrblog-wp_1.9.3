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


	/** BASIC SETTINGS **/

	// Tab Heading
	$options[] = array(
		'name'  => __('Basic Settings', 'options_framework_theme'),
		'type'  => 'heading');

	// Header Image
	$options[] = array(
		'name'  => __('Header Image', 'options_framework_theme'),
		'desc'  => __('Choose a header image. Defaults to the site title and slogan if not selected. Can also be overridden with a widget.', 'options_framework_theme'),
		'id'    => 'header_image',
		'type'  => 'upload');

	// Header Height
	$options[] = array(
		'name'  => __('Header Height', 'options_framework_theme'),
		'desc'  => __('Height of the header image in pixels. Only applies if a header image is set.', 'options_framework_theme'),
		'id'    => 'header_height',
		'std'   => '100',
		'class' => 'mini',
		'type'  => 'text');

	// Header Width
	$options[] = array(
		'name'  => __('Header Width', 'options_framework_theme'),
		'desc'  => __('Width of the header image in pixels. Only applies if a header image is set. Width is not required if height is specified.', 'options_framework_theme'),
		'id'    => 'header_width',
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text');

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}
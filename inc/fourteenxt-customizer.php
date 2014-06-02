<?php
/**
 * Add and modify the customizer settings and controls.
 *
 * @since Fourteen Extended 1.0.0
 *
 */
function fourteenxt_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'fourteenxt_control_options' , array(
       'title'      => __('TwentyFourteen Start Here','fourteenxt'),
	   'description' => sprintf( __( 'Welcome and thank you for using Fourteen Extended plugin.<br/><br/> The purpose of this plugin is to help you customizer your Twenty Fourteen run website with ease while still giving you much of the control.<br/><br/> Not every option is suitable or required for/by everyone hence why there multiple sections to separate the controls.<br/><br/> Your first control is below and it allows you to disable the CSS output of the plugin without deactivating it while still remaining in the Customizer section adjusting other settings or debugging issues!<br/><br/>Want more options and features? Try the <a href="http://wordpress.org/plugins/styles-twentyfourteen/" target="_blank" />Styles: Twenty Fourteen</a> plugin', 'fourteenxt' )),
       'priority'   => 30,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_general_options' , array(
       'title'      => __('TwentyFourteen General Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set general theme options. Current options are: Center the site, Set Blog feed to full width, Set single post to full width, set content max-width and move content to below the featured image with more to come!', 'fourteenxt' )),
       'priority'   => 31,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_content_options' , array(
       'title'      => __('TwentyFourteen Content Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set content options. A screen refresh may be required to see some of the changes in the customizer!', 'fourteenxt' )),
       'priority'   => 32,
    ) );
		
	$wp_customize->add_section( 'fourteenxt_mobile_options' , array(
       'title'      => __('TwentyFourteen Mobile Options','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to set mobile options. Options are: Show full content on home page on mobile instead of list view. Featured content mobile layout - grid or slider. Please note that the mobile layout will only work if the device is a mobile therefore minimizing the desktop window will have no effect and will show the default layout set in the featured section.', 'fourteenxt' )),
       'priority'   => 34,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_scripts_options' , array(
       'title'      => __('TwentyFourteen Optional Scripts','fourteenxt'),
	   'description' => sprintf( __( 'Use the following settings to load scripts. Only use these when needed i.e for IE8 support.', 'fourteenxt' )),
       'priority'   => 35,
    ) );
	
	$wp_customize->add_section( 'fourteenxt_slider_options' , array(
        'title'      => __('Featured Slider Options','fourteenxt'),
	    'description' => sprintf( __( 'Use the following settings to set slider options. Use wisely - in most cases it is best to leave the width setting as is! Only check the "Remove featured background" box if you have reduced the width setting', 'fourteenxt' )),
        'priority'   => 132,
		'theme_supports' => 'featured-content',
    ) );
		
	// Plugin Control - Enable/Disable
	$wp_customize->add_setting(
        'fourteenxt_disable_style_output', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_disable_style_output',
    array(
        'type'     => 'checkbox',
        'label'    => __('Disable the plugin css output for debugging?', 'fourteenxt'),
        'section'  => 'fourteenxt_control_options',
  		'priority' => 1,
        )
    );
	
	// Lets center the site shall we
    $wp_customize->add_setting(
        'fourteenxt_center_site', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_center_site',
    array(
        'type'     => 'checkbox',
        'label'    => __('Center Align Site Layout?', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_featured_remove', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_featured_remove',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove the featured content section?', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 2,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_maximum_site_width',
    array(
        'default' => '1260',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_maximum_site_width',
    array(
        'label' => __('Set Overall Site max-width (numbers only!) - Default is 1260.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 3,
        'type' => 'text',
    ));
			
	// Primary position switch - float it to the left.
	$wp_customize->add_setting( 'fourteenxt_primary_menu_float', array(
		'default' => 'right',
		'sanitize_callback' => 'fourteenxt_sanitize_menu_float'
	) );
	
	$wp_customize->add_control( 'fourteenxt_primary_menu_float', array(
    'label'   => __( 'Float Primary Menu to the left?', 'fourteenxt' ),
    'section' => 'fourteenxt_general_options',
	'priority' => 4,
    'type'    => 'radio',
        'choices' => array(
            'right' => __( 'Default - Right', 'fourteenxt' ),
            'left'  => __( 'Float Left', 'fourteenxt' ),
        ),
    ));
	
	// Lets center the site shall we
    $wp_customize->add_setting(
        'fourteenxt_hide_left_sidebar', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_hide_left_sidebar',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove Primary (Left) Sidebar? - Hide left sidebar sitewide', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 5,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_primary_sidebar_right', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_primary_sidebar_right',
    array(
        'type'     => 'checkbox',
        'label'    => __('Float Primary (Left) Sidebar To The Right? - Leave unchecked if left sidebar is set to hide above!', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 6,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_overall_content_width',
    array(
        'default' => '1038',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_overall_content_width',
    array(
        'label' => __('Set Overall Content (hentry) max-width (numbers only!) - maximum recommended is 1260 & Default is 1038.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 7,
        'type' => 'text',
    ));
		
	$wp_customize->add_setting(
    'fourteenxt_overall_image_height',
    array(
        'default' => '572',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_overall_image_height',
    array(
        'label' => __('Set Overall Content Image max-height (numbers only!) - maximum recommended is 572.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 8,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
        'fourteenxt_enable_image_width', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_enable_image_width',
    array(
        'type'     => 'checkbox',
        'label'    => __('Make post featured images span 100% width?', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 9,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_remove_image_bg', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_remove_image_bg',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove background image and color?', 'fourteenxt'),
        'section'  => 'fourteenxt_general_options',
		'priority' => 10,
        )
    );
	
	// Set Blog feed to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_blog_feed', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_blog_feed',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to hide the sidebar on the blog feed', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 1,
        )
    );
	
	// Set Single to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_single_post', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_single_post',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width single post', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 2,
        )
    );
	
	// Set Archives to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_archives', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_archives',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width for archives, categories and tags', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 3,
        )
    );
	
	// Set Searches to full width i.e. hide the content sidebar.
	$wp_customize->add_setting(
        'fourteenxt_fullwidth_searches', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_fullwidth_searches',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to show full width for Search results page', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_content_top_padding', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_content_top_padding',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to remove the white space above content', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 5,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_no_featured_image_offset',
    array(
        'default' => '28',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_no_featured_image_offset',
    array(
        'label' => __('Top offset for posts with no featured image - default is 28','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 6,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
        'fourteenxt_home_content_separator', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_home_content_separator',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove the content separator?', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 7,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_content_separator_op',
    array(
        'default' => '0.1',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_separator_op',
    array(
        'label' => __('Content separator line opacity - default is 0.1','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 8,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_content_off_featured_image',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_off_featured_image',
    array(
        'label' => __('Enter 1 or more for padding to move content off featured image (numbers only!) - default is -48','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 9,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_content_width_adjustment',
    array(
        'default' => '474',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_content_width_adjustment',
    array(
        'label' => __('Set Content max-width (numbers only!) - maximum recommended is 874 & Default is 474. Set to 700 when hiding left sidebar only!','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 10,
        'type' => 'text',
    ));
	
	// Blog Feed Category Selector
    $categories = get_categories();
	$cats = array( 'All Categories' );
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('fourteenxt_feed_cat', array(
		'default'  => '',
	));
	$wp_customize->add_control( 'fourteenxt_feed_cat', array(
		'settings' => 'fourteenxt_feed_cat',
		'label'   => __('Select Blog Feed Category:', 'fourteenxt'),
		'section'  => 'fourteenxt_content_options',
		'priority' => 11,
		'type'    => 'select',
		'choices' => $cats,
	));
	
	$wp_customize->add_setting(
        'fourteenxt_feed_excerpts'
    );

    $wp_customize->add_control(
        'fourteenxt_feed_excerpts',
    array(
        'type'     => 'checkbox',
        'label'    => __('Switch blog feed to show excerpts? This includes Archives, Categories, Tags, Author & Search Pages!', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 12,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_excerpt_length',
    array(
        'default' => 55,
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_excerpt_length',
    array(
        'label' => __('Enter desired home excerpt length (numbers only!) - default is 55.','fourteenxt'),
        'section' => 'fourteenxt_content_options',
		'priority' => 13,
        'type' => 'text',
    ));
	
	// Add option to Featured tab to show featured content in blog feed
	if ( get_theme_mod( 'fourteenxt_featured_remove' ) != 1 ) { 
	$wp_customize->add_setting(
        'fourteenxt_featured_visibility', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_featured_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Featured Posts in blog feed?', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 14,
        )
    );
	}
	
	$wp_customize->add_setting(
        'fourteenxt_sidebar_top_border', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_sidebar_top_border',
    array(
        'type'     => 'checkbox',
        'label'    => __('Check to remove widget title top border', 'fourteenxt'),
        'section'  => 'fourteenxt_content_options',
		'priority' => 15,
        )
    );
			
	// Mobile View Options
    $wp_customize->add_setting(
        'fourteenxt_body_class_filters', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_body_class_filters',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show full content on home page?', 'fourteenxt'),
        'section'  => 'fourteenxt_mobile_options',
		'priority' => 1,
        )
    );
	
    $wp_customize->add_setting(
        'fourteenxt_full_content_search', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_full_content_search',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show full content on search page?', 'fourteenxt'),
        'section'  => 'fourteenxt_mobile_options',
		'priority' => 2,
        )
    );
	
    $wp_customize->add_setting(
        'fourteenxt_full_content_archive', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_full_content_archive',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show full content on archive page?', 'fourteenxt'),
        'section'  => 'fourteenxt_mobile_options',
		'priority' => 3,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_full_content_category', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_full_content_category',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show full content on category page?', 'fourteenxt'),
        'section'  => 'fourteenxt_mobile_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting( 
	    'fourteenxt_layout_mobile', 
	    array( 
	        'default' => 'grid',
            'sanitize_callback' => 'fourteenxt_sanitize_mobile_layout',			
	    )
	);

    $wp_customize->add_control( 
        'fourteenxt_layout_mobile', array(
            'label' => __( 'Featured Content layout for mobile devices', 'fourteenxt'),
            'section' => 'fourteenxt_mobile_options',
			'priority' => 5,
            'settings' => 'fourteenxt_layout_mobile',
            'type' => 'select',
            'choices' => array(
                'grid' => 'Grid',
                'slider' => 'Slider',
            ),
        ) 
	);
		
	// Begin Optional Scripts options
	// Add FitVids to site
    $wp_customize->add_setting(
        'fourteenxt_fitvids_enable', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_fitvids_enable',
    array(
        'type'     => 'checkbox',
        'label'    => __('Enable FitVids?', 'fourteenxt'),
        'section'  => 'fourteenxt_scripts_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'fourteenxt_fitvids_selector',
    array(
        'default' => '.post',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_fitvids_selector',
    array(
        'label' => __('Enter a selector for FitVids - i.e. .post','fourteenxt'),
        'section' => 'fourteenxt_scripts_options',
		'priority' => 2,
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
    'fourteenxt_fitvids_custom_selector',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'fourteenxt_fitvids_custom_selector',
    array(
        'label' => __('Enter a custom selector for FitVids - i.e. .content-sidebar','fourteenxt'),
        'section' => 'fourteenxt_scripts_options',
		'priority' => 3,
        'type' => 'text',
    ));
	
	
	$wp_customize->add_setting(
        'fourteenxt_load_selectivizr', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_load_selectivizr',
    array(
        'type'     => 'checkbox',
        'label'    => __('Load Selectivizr.js script?', 'fourteenxt'),
        'section'  => 'fourteenxt_scripts_options',
		'priority' => 4,
        )
    );
	
	$wp_customize->add_setting(
        'fourteenxt_load_respond', array (
			'sanitize_callback' => 'fourteenxt_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'fourteenxt_load_respond',
    array(
        'type'     => 'checkbox',
        'label'    => __('Load Respond.js script?', 'fourteenxt'),
        'section'  => 'fourteenxt_scripts_options',
		'priority' => 5,
        )
    );
}
add_action( 'customize_register', 'fourteenxt_customize_register' );

if ( version_compare( $GLOBALS['wp_version'], '3.9', '<' ) ) {
// For Test purposes only & add support for wp_is_mobile workaround - not required for WP 3.9
if ( ! function_exists( 'wp_is_mobile' ) ) :
function wp_is_mobile() {
	static $is_mobile;

	if ( isset($is_mobile) )
		return $is_mobile;

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}
	return $is_mobile;
}
endif;
}

function fourteenxt_mobile_layout( $value ) {

if ( wp_is_mobile() ){
return get_theme_mod( 'fourteenxt_layout_mobile', 'grid' );
} else {
return $value;
}
}
add_filter( 'theme_mod_featured_content_layout', 'fourteenxt_mobile_layout' );

function fourteenxt_sanitize_mobile_layout( $layout ) {
	if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
		$layout = 'grid';
	}
	return $layout;
}

/**
 * Sanitize primary menu float radio select
 */
 if ( ! function_exists( 'fourteenxt_sanitize_menu_float' ) ) :
function fourteenxt_sanitize_menu_float( $float ) {
	if ( ! in_array( $float, array( 'right', 'left' ) ) ) {
		$float = 'right';
	}
	return $float;
}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'fourteenxt_sanitize_checkbox' ) ) :
	function fourteenxt_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

/**
 * Sanitize slider transition radio select
 */
 if ( ! function_exists( 'fourteenxt_sanitize_transition' ) ) :
function fourteenxt_sanitize_transition( $transition ) {
	if ( ! in_array( $transition, array( 'slide', 'fade' ) ) ) {
		$transition = 'slide';
	}
	return $transition;
}
endif;

// So we don't want the featured section at all - OK, lets remove it!
if ( get_theme_mod( 'fourteenxt_featured_remove' ) != 0 ) { 
function fourteenxt_remove_featured_sections(){
    global $wp_customize;

    $wp_customize->remove_section('featured_content');
	$wp_customize->remove_section('fourteenxt_slider_options');
}

// Priority 20 so that we remove options only once they've been added
add_action( 'customize_register', 'fourteenxt_remove_featured_sections', 20 );
}
<?php
/*
Plugin Name: Fourteen Extended
Plugin URI:  http://wpdefault.com/fourteen-extended/
Description: A functionality plugin for extending the Twenty Fourteen theme without touching code.
Author:      Zulfikar Nore
Author URI:  http://www.wpstrapcode.com/
Version:     1.2.33
License:     GPL
*/

// Only run if theme or parent theme is Twenty Fourteen.
if ( get_template() != 'twentyfourteen' ) {
	return;
}

/** 
 * Loads the plugin textdomain for translations.
 *
 * @since Fourteen Extended 1.0.0
 *
 * @return void
 */
function fourteenxt_extended_load_textdomain() {
	// This will load the WordPress-downloaded language pack if it exists, as languages are not bundled with the plugin.
	load_plugin_textdomain( 'fourteenxt' );
}
add_action( 'plugins_loaded', 'fourteenxt_extended_load_textdomain' );

if ( ! function_exists( 'fourteenxt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function fourteenxt_setup() {	
	// Add support for featured content.
	$layout = get_theme_mod( 'featured_content_layout' );
    $max_posts = get_theme_mod( 'num_posts_' . $layout, 6 );
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => $max_posts,
	) );
}
add_action( 'after_setup_theme', 'fourteenxt_setup', 11 );
endif; // fourteenxt_setup

/*
 * Lets filter the Twenty Fourteen Featured content so that we can use pages or a custom post type instead of posts.
 */
function fourteenxt_get_featured_posts( $posts ){

$fourteenxt_options = get_option( 'featured-content' );

if ( $fourteenxt_options ) {
    $tag_name = $fourteenxt_options['tag-name'];
} else {
    $tag_name = 'featured';
}

// At this point in the filter we are recalling the layout and content count.
$layout = get_theme_mod( 'featured_content_layout' );
$max_posts = get_theme_mod( 'num_posts_' . $layout, 6 );
$orderby = get_theme_mod( 'fourteenxt_featured_orderby' );
$order = get_theme_mod( 'fourteenxt_featured_order' );
// Here we determine what content type we are going to feature - Posts, Pages or a Custom Post Type.
$content_type = get_theme_mod( 'featured_content_custom_type' );

// Now we put it all together before returning it in a new post array ready for output.
$args = array(
    'tag' => $tag_name,
    'posts_per_page' => $max_posts,
    'post_type' => array($content_type),
	'orderby' => $orderby,
    'order' => $order,
    'post_status' => 'publish',
);

$new_post_array = get_posts($args);

if ( count($new_post_array) > 0 ) {
    return $new_post_array;
} else {
    return $posts;
}

}
add_filter( 'twentyfourteen_get_featured_posts', 'fourteenxt_get_featured_posts', 999, 1 );


/*
 * Now lets add the meta box for tags on Page edit screen.
 */
if( ! function_exists('fourteenxt_register_taxonomy') ){

    function fourteenxt_register_taxonomy() {
        register_taxonomy_for_object_type('post_tag', 'page');
    }
    add_action('admin_init', 'fourteenxt_register_taxonomy');
}

// Customizer Moved to inc folder - since v1.0.9
require_once('inc/fourteenxt-customizer.php'); // Include Extended Customizer

function fourteenxt_blog_feed_cat($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display posts in ascending order on the blog feed/archive
        $query->set( 'category_name', get_theme_mod( 'fourteenxt_feed_cat' ));
        return;
    }
}
add_action( 'pre_get_posts', 'fourteenxt_blog_feed_cat', 1 );
 
/**
 * Add filter to the_content.
 *
 * @since Fourteen Extended 1.1.2
 */
if ( get_theme_mod( 'fourteenxt_feed_excerpts' ) != 0 ) {
function fourteenxt_excerpts($content = false) {

// If is the home page, an archive, or search results
	if(is_home() || is_archive() && !is_singular() ) :
		global $post;
		$content = $post->post_excerpt;

	// If an excerpt is set in the Optional Excerpt box
		if($content) :
		$content = apply_filters('the_excerpt', $content);

	// If no excerpt is set
		else :
			$content = $post->post_content;
			if (get_theme_mod( 'fourteenxt_excerpt_length' )) :
			$excerpt_length = get_theme_mod( 'fourteenxt_excerpt_length' );
			else : 
			$excerpt_length = 30;
			endif;
			$words = explode(' ', $content, $excerpt_length + 1);
			$more = ( fourteenxt_read_more() );
			if(count($words) > $excerpt_length) :
				array_pop($words);
				array_push($words, $more);
				$content = implode(' ', $words);
			endif;			
			
		endif;
	endif;

// Make sure to return the content
	return $content;
}
add_filter('the_content', 'fourteenxt_excerpts');

/**
 * Returns a "Continue Reading" link for excerpts
 */
function fourteenxt_read_more() {
    return '&hellip; <a href="' . get_permalink() . '">' . __('Continue Reading &#8250;&#8250;', 'fourteenxt') . '</a><!-- end of .read-more -->';
}
//End filter to the_content
}

if ( get_theme_mod( 'fourteenxt_enable_autoslide' ) != 0 &&  get_theme_mod( 'featured_content_layout' ) == 'slider' ) {

//dequeue/enqueue scripts
function fourteenxt_featured_content_scripts() {
if ( is_front_page() ) :
wp_dequeue_script( 'twentyfourteen-script' );
wp_dequeue_script( 'twentyfourteen-slider' );

wp_enqueue_script( 'fourteenxt-script', plugin_dir_url( __FILE__ ) . 'js/functions.js', array( 'jquery', 'fourteenxt-slider' ), '' , true);

wp_enqueue_script( 'fourteenxt-slider', plugin_dir_url( __FILE__ ) . 'js/jquery.flexslider-min.js', array( 'jquery' ), '' , true);
wp_localize_script( 'fourteenxt-slider', 'featuredSliderDefaults', array(
'prevText' => __( 'Previous', 'fourteenxt' ),
'nextText' => __( 'Next', 'fourteenxt' )
) );

if ( get_theme_mod( 'fourteenxt_slider_transition' ) ==  'slide' ) :
    wp_enqueue_script( 'fourteenxt-slider-slide', plugin_dir_url( __FILE__ ) . 'js/slider-slide.js', array( 'jquery' ), '' , true);

elseif ( get_theme_mod( 'fourteenxt_slider_transition' ) == 'fade' ) :
    wp_enqueue_script( 'fourteenxt-slider-fade', plugin_dir_url( __FILE__ ) . 'js/slider-fade.js', array( 'jquery' ), '' , true);
endif;

endif;
}

add_action( 'wp_enqueue_scripts' , 'fourteenxt_featured_content_scripts' , 210 );
}

/*  IE js header
/* ------------------------------------ */
if ( get_theme_mod( 'fourteenxt_load_selectivizr' ) != 0 ) {
function fourteenxt_ie_support_header() {
    echo '<!--[if (gte IE 6)&(lte IE 8)]>'. "\n";
    echo '<script src="' . esc_url( plugin_dir_url( __FILE__ ) . 'js/selectivizr.js' ) . '"></script>'. "\n";
	echo '<noscript><link rel="stylesheet" href="[fallback css]" /></noscript>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'fourteenxt_ie_support_header' );
}

/*  IE js footer
/* ------------------------------------ */
if ( get_theme_mod( 'fourteenxt_load_respond' ) != 0 ) {
function fourteenxt_ie_support_footer() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( plugin_dir_url( __FILE__ ) . 'js/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_footer', 'fourteenxt_ie_support_footer', 20 );
}

/**
 * Loads the fitvids plugin.
 *
 * @since Fourteen Extended 1.0.9
 */

// add FitVids to site
if ( get_theme_mod( 'fourteenxt_fitvids_enable' ) != 0 ) {

function fourteenxt_fitvids_scripts() {
   	// add fitvids
	wp_register_script( 'jquery-fitvids',plugin_dir_url( __FILE__ ).'js/jquery.fitvids.js','extended-fitvids', array( 'jquery' ), true );
    wp_enqueue_script( 'jquery-fitvids' );
	
} // end fitvids_scripts
add_action('wp_enqueue_scripts','fourteenxt_fitvids_scripts', 210);

// selector script
function fourteenxt_fitthem() { ?>
   	<script type="text/javascript">
   	jQuery(document).ready(function() {
   		jQuery('<?php echo get_theme_mod('fourteenxt_fitvids_selector'); ?>').fitVids({ customSelector: '<?php echo stripslashes(get_theme_mod('fourteenxt_fitvids_custom_selector')); ?>'});
   	});
   	</script>
<?php } // End selector script
add_action( 'wp_footer', 'fourteenxt_fitthem', 220 );
} // End FitVids enable

// Styles Moved to inc folder - since v1.0.9
if ( get_theme_mod( 'fourteenxt_disable_style_output' ) != 1 ) {
   require_once('inc/fourteenxt-styles.php'); // Include Extended Styles
}

if ( get_theme_mod( 'fourteenxt_featured_visibility' ) != 0 ||  get_theme_mod( 'fourteenxt_featured_remove' ) != 0 ) {
	function fourteenxt_remove_pre_get_posts() {
	    remove_action( 'pre_get_posts', array( 'Featured_Content', 'pre_get_posts' ) );
    }
add_action( 'init', 'fourteenxt_remove_pre_get_posts', 31 );
}

/**
 * Extend the default WordPress body classes and run them according to our settings.
 *
 * Adds body classes Index views Full-width content layout.
 * Single views Full-width content layout.
 * Fully centred site
 *
 * @since Fourteen Extended 1.0.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */

$full_content_home = get_theme_mod( 'fourteenxt_body_class_filters' ) != 0;
$full_content_search = get_theme_mod( 'fourteenxt_full_content_search' ) != 0;
$full_content_archive = get_theme_mod( 'fourteenxt_full_content_archive' ) != 0;
$full_content_category = get_theme_mod( 'fourteenxt_full_content_category' ) != 0;

if ( $full_content_home || $full_content_search 
     || $full_content_archive || $full_content_category) {
	function fourteenxt_remove_body_classes() {
	    remove_filter( 'body_class', 'twentyfourteen_body_classes' );
    }
    add_action( 'init', 'fourteenxt_remove_body_classes', 31 );
	
	function fourteenxt_body_classes_reset($classes) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}
	
	global $full_content_archive, $full_content_search, $full_content_category, $full_content_home;
	if ( (is_archive() && !$full_content_archive && !is_category()) 
	    || (is_search() && !$full_content_search)
		|| (is_category() && !$full_content_category)
		|| (is_home() && !$full_content_home)
	   ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() || ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes_reset' );
}


function fourteenxt_body_classes($classes) {
global $content_width;
	
	if (get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
    if (is_home() ) : 
        $classes[] = 'full-width';
	endif;
    }
	
	if (get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
	if (is_singular() && !is_page() ) : 
        $classes[] = 'full-width';
   	endif;
	}
	
	if (get_theme_mod( 'fourteenxt_fullwidth_archives' ) != 0 ) {
	if ( is_archive() ) : 
        $classes[] = 'full-width';
   	endif;
	}
	
	if (get_theme_mod( 'fourteenxt_fullwidth_searches' ) != 0 ) {
	if ( is_search() ) : 
        $classes[] = 'full-width';
   	endif;
	}
		
	return $classes;
}
add_filter( 'body_class', 'fourteenxt_body_classes' );

if ( get_theme_mod( 'fourteenxt_hide_left_sidebar' ) != 0 ) { 
function fourteenxt_remove_widgets(){
	// Remove Primary sidebar from widget area.
	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', 'fourteenxt_remove_widgets', 11 );
}

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
define( 'FOURTEEN_EXTENDED_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Add Theme Custom Meta Boxes.
require FOURTEEN_EXTENDED_PLUGIN_DIR . 'functions/custom.php';

if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require FOURTEEN_EXTENDED_PLUGIN_DIR . 'inc/featured-content.php';
} 

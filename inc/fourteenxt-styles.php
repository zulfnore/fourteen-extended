<?php // Run our custom output from the settings

function fourteenxt_general_css(){

if ( get_theme_mod( 'fourteenxt_primary_menu_float' ) ) {
    $primary_menu_float = get_theme_mod( 'fourteenxt_primary_menu_float' );
	$max_site_width     = esc_html(get_theme_mod( 'fourteenxt_maximum_site_width' ));
	// Apply custom settings to appropriate element ?>
    <style>@media screen and (min-width: 783px){.primary-navigation{float: <?php echo $primary_menu_float; ?>;margin-left: 20px;}a { transition: all .5s ease; }}</style>
<?php }

if ( get_theme_mod( 'fourteenxt_center_site' ) != 0 ) {
 // Apply site layout settings to appropriate element ?>
    <style>.site {margin: 0 auto;max-width: <?php echo $max_site_width; ?>px;width: 100%;}.site-header{max-width: <?php echo $max_site_width; ?>px;}
		@media screen and (min-width: 1110px) {.archive-header,.comments-area,.image-navigation,.page-header,.page-content,.post-navigation,.site-content .entry-header,
	    .site-content .entry-content,.site-content .entry-summary,.site-content footer.entry-meta{padding-left: 55px;}}</style>
<?php }


if ( get_theme_mod( 'fourteenxt_primary_sidebar_right' ) != 0 ) { ?>
<style>
.featured-content,.grid-content{padding-left:0;}
@media screen and (min-width: 673px) {
    .content-area {float: left;width: 100%;}.site-content {margin-right: 33.33333333%;margin-left: 0;}
	.content-sidebar {float: left;margin-left: -45.5%;padding: 72px 30px 24px;position: relative;width: 33.33333333%;}
}

@media screen and (min-width: 1008px) {
    .featured-content,.grid-content {padding-right: 182px;}
	.main-content {float: left;}.site-content {margin-right: 29.04761904%;margin-left: 0;}
	.content-sidebar {margin-left: -45.5%;	width: 29.04761904%;}
    .site:before {width: 0;z-index: -20;display: none;}
   	#secondary { background-color: transparent; border: 0;clear: none;float: right;margin: 0 0 0 -100%;min-height: 100vh;padding-top: 10px;}
	.site:after{background-color: #000;content: "";display: block;	height: 100%;min-height: 100%;position: absolute;top: 0;right: 0;width: 182px;z-index: 1;}
}
@media screen and (min-width: 1080px) {
    .site:after {width: 222px; background-color: #000;}
	.featured-content,.site-content,.grid-content {padding-right: 222px;}
}
</style>
<?php }
if ( get_post_meta(get_the_ID(), '_fourteenxt_true_fullwidth', true )) {
if ( is_page_template( 'page-templates/full-width.php' )) :
?>
<style>
.full-width .archive-header,
.full-width .comments-area,
.full-width .image-navigation,
.full-width .page-header,
.full-width .page-content,
.full-width .post-navigation,
.full-width .site-content .entry-header,
.full-width .site-content .entry-content,
.full-width .site-content .entry-summary,
.full-width .site-content footer.entry-meta {
	max-width: 1080px;
	width: 100%;
	padding: 0 !important;
}
.site:before,#secondary{width:0;display:none;}.ie8 .site:before,.ie8 #secondary{width:0px;display:none;}.featured-content{padding-left:0;}.site-content,.site-main .widecolumn{margin-left:0;}.ie8 .site-content,.ie8 .site-main .widecolumn{margin-left:0;}
@media screen and (min-width: 1008px) {.search-box-wrapper{padding-left:0;}}@media screen and (min-width: 1080px) {.search-box-wrapper,.featured-content{padding-left:0;}}
</style>
<?php endif; }
}
add_action( 'wp_head', 'fourteenxt_general_css' );

function fourteenxt_extra_scripts() {
if ( get_theme_mod( 'fourteenxt_content_width_adjustment' ) ) {
    $conten_max_width = esc_html( get_theme_mod( 'fourteenxt_content_width_adjustment' ));
	// Apply site custom settings to appropriate element ?>
    <style>
	    .site-content .entry-header,.site-content .entry-content,.site-content .entry-summary,.site-content .entry-meta,.page-content 
		{max-width: <?php echo $conten_max_width; ?>px;}.comments-area{max-width: <?php echo $conten_max_width; ?>px;}.post-navigation, .image-navigation{max-width: <?php echo $conten_max_width; ?>px;}</style>
<?php }

if ( get_theme_mod( 'fourteenxt_fullwidth_blog_feed' ) != 0 ) {
if ( is_home() ) : 
    ?>
	    <style>.content-sidebar{display:none;}.full-width .site-content .post-thumbnail img{width:100%;}</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_single_post' ) != 0 ) {
if ( is_singular() && !is_page()) : 
    ?>
	<style>.content-sidebar{display:none}.full-width.singular .site-content .hentry .post-thumbnail img{width:100%;}</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_archives' ) != 0 ) {
if ( is_archive() ) : 
    ?>
	<style>.content-sidebar{display:none;}.full-width .post-thumbnail img{width:100%;}</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_fullwidth_searches' ) != 0 ) {
if ( is_search() ) : 
    ?>
	<style>.content-sidebar{display:none;}.full-width .site-content .post-thumbnail img{width:100%;}</style>
<?php 
endif; }

if ( get_theme_mod( 'fourteenxt_content_top_padding' ) != 0 ) {
$no_thumb_offset = esc_html( get_theme_mod( 'fourteenxt_no_featured_image_offset' )); 
if ( has_post_thumbnail() ) : ?>
    <style>.content-area{padding-top:0;}.content-sidebar{padding-top:0;}.full-width.singular .site-content .hentry .post-thumbnail img{margin-top: 72px;}
		@media screen and (min-width: 846px){.content-area, .content-sidebar{padding-top:0;}}@media screen and (max-width: 846px){.full-width.singular .site-content .hentry .post-thumbnail img{margin-top: 48px;}}
	</style>
<?php else : ?>
    <style>.content-area{padding-top: <?php echo $no_thumb_offset; ?>px;}.content-sidebar{padding-top: <?php echo $no_thumb_offset; ?>px;}
		@media screen and (min-width: 846px) {.content-area,.content-sidebar{padding-top: <?php echo $no_thumb_offset; ?>px;}}</style>
<?php endif; 
}

if ( get_theme_mod( 'fourteenxt_sidebar_top_border' ) != 0 ) { ?>
    <style>.content-sidebar .widget .widget-title{border-top: 0;}</style>
<?php }
 
if ( get_theme_mod( 'fourteenxt_content_off_featured_image' ) ) {
    $conten_padding_top = esc_html( get_theme_mod( 'fourteenxt_content_off_featured_image' ));
	// Apply custom settings to appropriate element ?>
    <style>@media screen and (min-width: 594px) {.site-content .has-post-thumbnail .entry-header{margin-top: <?php echo $conten_padding_top; ?>px !important;}}
		@media screen and (min-width: 846px) {.site-content .has-post-thumbnail .entry-header {margin-top: <?php echo $conten_padding_top; ?>px !important;}}
		@media screen and (min-width: 1040px) {.site-content .has-post-thumbnail .entry-header{margin-top: <?php echo $conten_padding_top; ?>px !important;}}
	</style>
<?php }


if ( get_theme_mod( 'fourteenxt_hide_left_sidebar' ) != 0 ) { 
?>
    <style>.site:before,#secondary{width:0;display:none;}.ie8 .site:before,.ie8 #secondary{width:0px;display:none;}
	    .featured-content{padding-left:0;}.site-content,.site-main .widecolumn{margin-left:0;}.ie8 .site-content,.ie8 .site-main .widecolumn{margin-left:0;}
		@media screen and (min-width: 1008px) {.search-box-wrapper{padding-left:0;}}
		@media screen and (min-width: 1080px) {.search-box-wrapper,.featured-content{padding-left:0;}}
		@media screen and (min-width: 1080px) {.grid-content{padding-left:0;}}
	</style>
<?php } 

if ( get_theme_mod( 'fourteenxt_overall_content_width' ) ) { 
$overall_conten_width  = esc_html( get_theme_mod( 'fourteenxt_overall_content_width' ));
$overall_image_height  = esc_html( get_theme_mod( 'fourteenxt_overall_image_height' ));
?>
    <style>.hentry{max-width: <?php echo $overall_conten_width; ?>px;}
	    img.size-full,img.size-large,.wp-post-image,.post-thumbnail img,.site-content .post-thumbnail img{max-height: <?php echo $overall_image_height; ?>px;}
	</style>
	
<?php }

if ( get_theme_mod( 'fourteenxt_enable_image_width' ) != 0 ) : ?>
    <style>
	    .site-content .post-thumbnail{background:none;}.site-content a.post-thumbnail:hover{background-color:transparent;}
		.site-content .post-thumbnail img{width:100%;}
	</style>
<?php endif;

if ( get_theme_mod( 'fourteenxt_remove_image_bg' ) != 0 ) : ?>
    <style>
	     .site-content .post-thumbnail{background:none;}.site-content a.post-thumbnail:hover{background-color:transparent;}
	</style>
<?php endif;

if ( get_theme_mod( 'fourteenxt_slider_width' ) ) { 
$overall_slider_width  = esc_html( get_theme_mod( 'fourteenxt_slider_width' ));
$overall_slider_height = esc_html( get_theme_mod( 'fourteenxt_slider_height' ));
$slider_margin_top     = esc_html( get_theme_mod( 'fourteenxt_slider_topmargin' ));
?>
    <style>
		.slider .featured-content .hentry{max-height: <?php echo $overall_slider_height; ?>px;}.slider .featured-content{max-width: <?php echo $overall_slider_width; ?>px;
		margin: <?php echo $slider_margin_top; ?>px auto;}.slider .featured-content .post-thumbnail img{max-width: <?php echo $overall_slider_width; ?>px;width: 100%;}
		.slider .featured-content .post-thumbnail{background:none;}.slider .featured-content a.post-thumbnail:hover{background-color:transparent;}
	</style>
<?php
if ( get_theme_mod( 'fourteenxt_featured_bg_visibility' ) != 0 ) { ?>
    <style>.featured-content{background:none;}</style>
<?php } }

if ( get_theme_mod( 'fourteenxt_num_grid_columns' ) ) {
	// Apply custom settings to appropriate element ?>
    <style>
	    @media screen and (min-width: 1008px) {
		    .grid .featured-content .hentry {
		        width: 24.999999975%;
	        }
	        .grid .featured-content .hentry:nth-child( 3n+1 ) {
		        clear: none;
	        }
	        .grid .featured-content .hentry:nth-child( 4n+1 ) {
		        clear: both;
	        }
	    }
	</style>
<?php }

if ( get_theme_mod( 'fourteenxt_featured_remove' ) != 0 ) { ?>
    <style>.featured-content{display:none; visibility: hidden;}</style>
<?php }

if ( get_theme_mod( 'fourteenxt_home_content_separator' ) != 1 ) {
$separator_opacity = esc_html( get_theme_mod( 'fourteenxt_content_separator_op' ));
if ( is_home() ) : ?>
    <style>.site-content .hentry{border-top: 1px solid rgba(0, 0, 0, <?php echo $separator_opacity; ?>);}
	.site-content .hentry:first-child{border-top: 0;}</style>
<?php endif; }
}
add_action( 'wp_head', 'fourteenxt_extra_scripts' );
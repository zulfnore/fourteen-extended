fourteen-extended
=================

Contributors: Zulfikar Nore
Tags: Twenty Fourteen, Custom Options, Custom, Options, Theme Customizer, Twenty Fourteen Theme, Default Theme, 2014, Center Site, Full Width Post Feed, Full Width Single Posts, FitVids
Requires at least: 3.6
Tested up to: 3.9.1
Stable tag: 1.2.31
Description: Customize the layout of the Twenty Fourteen Theme, directly within the Theme Customizer.
License: GPLv2

== Description ==
NOTE: To multisite users:- Plugin should only be activated on per site basis and not as Network Activated!

NEW Option: control the number of posts that appear in the grid/slider plus switch grid content between 3 & 4 columns

Fourteen Extended is the most efficient way to re-configure the Twenty Fourteen theme without touching a single line of code.

Don't like the site alignment? 

No clue how to get the blog feed to display in the glorious Twenty Fourteen full width? 

Want your single posts displayed in a full width format?

Prefer the menu on the left?

Want to move the content below the featured image?

Increase the content width for full width blog feed/posts/archives/searches? 

Then wait no more! Stop fumbling with child themes and code - all it takes is a few check boxes, make a couple of entries, save and you are done and dusted.

Current options are:

1. Center align the entire site.

2. Set Blog feed to full width.

3. Set Single posts to full width.

4. Set Archives to full width.

5. Set Search results to full width.

6. Set content off the featured image i.e. move content below the post featured image.

7. Adjust the content max-width up to 874px for that uniform look - default is 474px.

8. Float the Primary menu to the left.

9. Include FitVids script for true responsive videos - Enable/Disable script plus set default and custom selectors.

10. Set slider to auto slide with options for slider transition fade/slide.

11. Set Featured content mobile layout view i.e. set desktop to grid and mobile to slider.

Now with complete width control - go full screen at 3200px or go boxed down to 940px. Unlimited width control!

* Plus many more inside...

Fourteen Extended will help you center align your entire site, set your blog feed to the glorious Twenty Fourteen full width look plus an option to set the single posts to full width too! Please report any issues on the support forums.

For better and quick responses to your support request please use the plugin forum at: [Support] (http://wpdefault.com/forums/forum/fourteen-extended/)

Need more customization features? Try the [Styles: Twenty Fourteen] (http://wordpress.org/plugins/styles-twentyfourteen/) plugin

== Installation ==

1. Take the easy route and install through the WordPress plugin adder OR
2. Download the .zip file and upload the unzipped folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to the Theme Customizer (Appearance -> Customize) and check the required boxes in the newly added TwentyFourteen General Options tab

== Screenshots ==

1. Fourteen Extended Customizer section
2. Fourteen Extended front end site output

== Frequently Asked Questions ==
= I tried using Fourteen Extended with a theme other than Twenty Fourteen and ... =
Don't. There is a known bug where the plugin may be applied to other themes when live previewing them, but Fourteen Extended will prevent itself from functioning when the current theme is not Twenty Fourteen or a child.

= Child Themes =
Fourteen Extended is a plugin, not a child theme, because it is primarily programmatic (ie, it would only consist of a functions.php file), and for flexibility.

You can use Fourteen Extended with both the default Twenty Fourteen and its child themes. Be aware that the Fourteen Extended settings are stored with the active theme, so if you switch to a child theme or switch child themes, you'll need to re-set the configurations. Child theme compatibility depends on the extent of changes made by the child theme.

== Changelog ==

= 1.2.31 =
* Reworked the Featured Order by options to fix the bug encountered in the initial addition.

= 1.2.3 =
* Reintroducing the featured-content.php template - Jetpack conflict can not be recreated and the two works fine together.
* NEW: Added option to switch Primary (Left) Sidebar to the right of content-sidebar {Experimental}.
* NEW: Added option to select featured order by - By Date Order | Random Order | Title Menu Order | Order By Post Name
* NEW: Added options to switch featured display order - Descending Order | Ascending Order.
* Fixed Undefined index Notice reported here: http://wordpress.org/support/topic/undefined-index-25?replies=4
* Merged FitVids in to Optional Scripts section.

= 1.2.2 =
* Amended: Excerpt settings now includes the archives, categories, tags, searches and author pages.
* Removed featured-content.php from plugin as it was causing conflict with Jetpack on some installs
* Minor adjustments to code and css. 

= 1.2.1 =
* NEW: Added options for finer Featured content control - number of posts for grid/slider plus switch between 3 and 4 column grid layout.
* NEW: Added option to set full width page to true full width by removing the left sidebar on per page basis.

= 1.2.0 =
* NEW: Added option to remove the featured content altogether from front end as well as the customizer section.
* Moved the option to show featured content in the blog feed to the TwentyFourteen Content Options section where it makes more sense.
* NEW: Added Option to include (optional) Selectivizr and Respond javascripts for better IE support.
* NEW: Beefed up security check on data input.
* NEW: Added pause on hover effect to slider.
* NEW: Added check box to enable image resize to 100% width.
* NEW: Added separate check box for removing the post thumbnail background image/color.

= 1.1.9 =
* Added support for IE8 on left sidebar visibility
* Compacted the dynamic CSS output for a somewhat cleaner header source code
* NEW: Added option to hide the content separator - see: http://wpdefault.com/forums/topic/plugin-activation-adjusts-spacing-on-blogroll/ for what & why!

= 1.1.8 =
* Fixed the bug that caused a gap to appear above the featured content on last update.
* NEW: Added option to control the content area padding when posts have no thumbnail image.
* Minor fixes and adjustments.

= 1.1.7 =
* Fixed bug that was causing part of post thumbnail to pull up behind the navbar.
* Fixed bug where single post was missing top padding when no feature image was attached.
* Minor CSS adjustments to fix various small bugs.

= 1.1.6 =
* Reworked the auto slide option to use the original FlexSlider script.
* NEW: Added options to select either slide or fade for the auto slide settings.
* NEW: Added option to select featured layout for mobile devices - only works when viewed on a mobile device!
* Minor CSS adjustments
* Moved screenshots in to the assets folder to reduce plugin overall size

= 1.1.5 =
* NEW: Added option to set maximum site width.
* NEW: Added option to set overall image height.
* NEW: Added option to remove white space above content.
* NEW: Added option to remove widget title top border.
* NEW: Added option to show full content instead of the list view on mobile devices - home/blog index only.
* Adjusted the excerpt option to show first video as the excerpt.

= 1.1.4 =
* NEW: Added options to adjust overall content area width when left sidebar is disabled.
* NEW: Added option to adjust slider width, height and top margin.
* NEW: Added option to remove the featured section background for that uniform look on smaller slider settings.
* NEW: Added option to enable/disable Auto Slide for the featured slider.  

= 1.1.3 =
* NEW: Added option to hide left sidebar sitewide.
* NEW: Added option to include featured posts in the main blog feed/index

= 1.1.2 =
* NEW: Added option to switch home blog feed to show excerpts instead of full content.
* Separated Content options from general options - new tab: TwentyFourteen Content Options added.

= 1.1.1 =
* NEW: Added option to set Archive pages to Full Width (Affects the Archives, Categories and Tags pages).
* NEW: Added option to set Search results page to Full Width.

= 1.1.0 =
* Reverted changes made to content width so that pages too can be true full width.

= 1.0.9 =
* NEW: Added FitVids script for better video handling across all medias
* Separated Styles and Customizer from functions in to their own files for easy code reference.
* Adjusted settings for better option output where and when required.
* Minor CSS adjustments

= 1.0.8 =
* Fixed bug on Primary menu not displaying correctly on small screens/Smartphones

= 1.0.7 =
* Fixed wrong plugin home page url.

= 1.0.6 =
* Fixed bug that was causing post header/title to be out of place on Smartphones.

= 1.0.5 =
* Added options to revert to all categories with "All Categories" option.

= 1.0.4 =
* NEW: Added option to select category for the Blog Feed

= 1.0.3 =
* Fixed bug where setting for full width single post was also affecting pages
* Polishing up on documentation
* Added screenshots

= 1.0.2 =
* NEW: Added option to move Primary navigation to the left close to the Site title. 

= 1.0.1 =
* Fixed bug on sidebar not showing when box not checked.
* NEW: Added option to move content off the featured image and below it
* NEW: Added option to set max-width content to accommodate the full width implementation.

= 1.0.0 =
* Initial release

== TODO List ==
1 - Add options to change grid/slider number of posts plus option to change grid between 3 and 4 columns


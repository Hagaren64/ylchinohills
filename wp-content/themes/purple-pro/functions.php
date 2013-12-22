<?php
if ( ! isset( $content_width ) )
$content_width = 620;
add_action( 'after_setup_theme', 'purple_pro_setup' );
function purple_pro_setup() {
add_editor_style();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 200, 200, true ); // Default size
// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('purple_pro', get_template_directory() . '/languages');	
	
register_nav_menus(
	array(
	  'primary' => __('Header Menu', 'purple_pro'),
	  'secondary' => __('Footer Menu', 'purple_pro')
	)
)	
}
function purple_pro_widgets() {
register_sidebar(array(
	'name' => __( 'Sidebar Widget Area', 'purple_pro'),
	'id' => 'sidebar-widget-area',
	'description' => __( 'The sidebar widget area', 'purple_pro'),
	'before_widget' => '<div class="widget"><div>',
	'after_widget' => '</div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));	
}
add_action ( 'widgets_init', 'purple_pro_widgets' );
//Multi-level pages menu
function purple_pro_page_menu() {
if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
echo '<ul class="menu">';
wp_list_pages('sort_column=menu_order&title_li=&link_before=&link_after=&depth=3');
echo '</ul>';
}
//Where the post has no post title, but must still display a link to the single-page post view.
add_filter('the_title', 'purple_pro_title');

function purple_pro_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}
function purple_pro_filter_wp_title( $title ) {
	global $page, $paged;
    // Get the Site Name
    $site_name = get_bloginfo( 'name' );
    // Prepend name
    $filtered_title = $title .' | '. $site_name;
    
    // Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ){
		$filtered_title = $site_name .' | '.$site_description;       
    }
    // Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) $filtered_title .= ' | ' . sprintf( __( 'Page %s', 'purple_pro'), max( $paged, $page ) );
    // Return the modified title
    return $filtered_title;
}
// Hook into 'wp_title'
add_filter( 'wp_title', 'purple_pro_filter_wp_title' );
//Enqueued scripts
function purple_pro_scripts(){
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
}
add_action( 'wp_enqueue_scripts', 'purple_pro_scripts' );
?>
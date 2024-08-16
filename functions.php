<?php

/**
 * WPThemeE functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPThemeE
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.4.20');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function WPThemeE_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WPThemeE, use a find and replace
		* to change 'WPThemeE' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('WPThemeE', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'WPThemeE'),
			'menu-2' => esc_html__('Footer', 'WPThemeE'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'WPThemeE_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'WPThemeE_setup');

function footer_customization( $wp_customize ) {
    // Adding a new section in the Customizer
    $wp_customize->add_section('WPThemeE_footer_options', array(
        'title'    => __('Footer Settings', 'WPThemeE'),
        'priority' => 120, // Adjust the priority to fit where you want it in the lineup
    ));

    // Adding setting for footer logo
    $wp_customize->add_setting('footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Adding control for the footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'WPThemeE'),
        'section'  => 'WPThemeE_footer_options',
        'settings' => 'footer_logo',
    )));

    // Adding setting for second footer logo
    $wp_customize->add_setting('service_provider_badge', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Adding control for the second footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'service_provider_badge', array(
        'label'    => __('Service Provider Badge', 'WPThemeE'),
        'section'  => 'WPThemeE_footer_options',
        'settings' => 'service_provider_badge',
    )));

    // Adding setting for third footer logo
    $wp_customize->add_setting('hippa_compliance_seal', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Adding control for the third footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hippa_compliance_seal', array(
        'label'    => __('HIPPAcomplianceseal', 'WPThemeE'),
        'section'  => 'WPThemeE_footer_options',
        'settings' => 'hippa_compliance_seal',
    )));
	 // Adding setting for fourth footer logo
    $wp_customize->add_setting('louisiana', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Adding control for the third footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'louisiana', array(
        'label'    => __('LOUISIANA', 'WPThemeE'),
        'section'  => 'WPThemeE_footer_options',
        'settings' => 'louisiana',
    )));
    
    
    
        // Adding setting for fifth footer logo
    $wp_customize->add_setting('inc', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Adding control for the third footer logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'inc', array(
        'label'    => __('INC', 'WPThemeE'),
        'section'  => 'WPThemeE_footer_options',
        'settings' => 'inc',
    )));
}

add_action('customize_register', 'footer_customization');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function WPThemeE_content_width()
{
	$GLOBALS['content_width'] = apply_filters('WPThemeE_content_width', 640);
}
add_action('after_setup_theme', 'WPThemeE_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function WPThemeE_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'WPThemeE'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'WPThemeE'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'WPThemeE_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function WPThemeE_scripts()
{
	wp_enqueue_style('WPThemeE-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('WPThemeE-style', 'rtl', 'replace');

	wp_enqueue_script('WPThemeE-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

 
	wp_enqueue_style('slick', get_template_directory_uri() . '/libs/slick-1.8.1/slick/slick.css', array(), '1.8.1');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/libs/slick-1.8.1/slick/slick-theme.css', array(), '1.8.1');

	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0');
	wp_enqueue_style('slick-carousl', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '5.13.0');
	wp_enqueue_style('font-awesome', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', array(), '5.13.0');

	wp_enqueue_style('slick-theme-carousl', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '5.13.0');
	wp_enqueue_style('font-myriad', 'https://fonts.cdnfonts.com/css/myriad-pro', array(), '5.13.0');


	// Enqueue your custom CSS file
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/style-main.css', array(), _S_VERSION);

	// Enqueue Slick JavaScript
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/libs/slick-1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
	 

	// Enqueue additional JavaScript file
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/script.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_page('contact')) { // Replace 'your-page-slug' with the actual slug of your page
		// Dequeue the script
		wp_dequeue_style('cloudflare-carousl');
	}
}
add_action('wp_enqueue_scripts', 'WPThemeE_scripts');
 


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Check if acf plugin active or not

// Add this code to your theme's functions.php file

// Function to check if ACF plugin is active
function is_acf_active()
{
	return class_exists('acf');
}

// Function to display message if ACF plugin is not active
function display_acf_activation_message()
{
?>
	<div class="notice notice-error">
		<p><?php esc_html_e('Please activate the Advanced Custom Fields (ACF) plugin to fully utilize this theme.', 'WPThemeE'); ?></p>
	</div>
<?php
}

// Function to check ACF plugin activation on theme activation
function check_acf_plugin_on_theme_activation()
{
	if (!is_acf_active() && is_admin()) {
		add_action('admin_notices', 'display_acf_activation_message');
	}
}
add_action('after_switch_theme', 'check_acf_plugin_on_theme_activation');



class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
	// Start Level
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	// Start Element
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$class_names = $value = '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'header__navbar--nav__navitem';

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts = array();
		$atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = !empty($item->target)     ? $item->target     : '';
		$atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
		$atts['href']   = !empty($item->url)        ? $item->url        : '';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . ' class="header__navbar--nav__navitem--link">';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}


class Custom_Footer_Nav_Walker extends Walker_Nav_Menu
{
	// Start Level
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	// Start Element
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$class_names = $value = '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'footer__content--nav__item';

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts = array();
		$atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = !empty($item->target)     ? $item->target     : '';
		$atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
		$atts['href']   = !empty($item->url)        ? $item->url        : '';

		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . ' class="footer__content--nav__item--link">';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

// Register Custom Post Type
function create_multimedia_post_type()
{
	$labels = array(
		'name'                  => _x('Multimedia', 'Post Type General Name', 'WPThemeE'),
		'singular_name'         => _x('Multimedia', 'Post Type Singular Name', 'WPThemeE'),
		'menu_name'             => __('Multimedia', 'WPThemeE'),
		'name_admin_bar'        => __('Multimedia', 'WPThemeE'),
		'archives'              => __('Multimedia Archives', 'WPThemeE'),
		'attributes'            => __('Multimedia Attributes', 'WPThemeE'),
		'parent_item_colon'     => __('Parent Multimedia:', 'WPThemeE'),
		'all_items'             => __('All Multimedia', 'WPThemeE'),
		'add_new_item'          => __('Add New Multimedia', 'WPThemeE'),
		'add_new'               => __('Add New', 'WPThemeE'),
		'new_item'              => __('New Multimedia', 'WPThemeE'),
		'edit_item'             => __('Edit Multimedia', 'WPThemeE'),
		'update_item'           => __('Update Multimedia', 'WPThemeE'),
		'view_item'             => __('View Multimedia', 'WPThemeE'),
		'view_items'            => __('View Multimedia', 'WPThemeE'),
		'search_items'          => __('Search Multimedia', 'WPThemeE'),
		'not_found'             => __('Not found', 'WPThemeE'),
		'not_found_in_trash'    => __('Not found in Trash', 'WPThemeE'),
		'featured_image'        => __('Featured Image', 'WPThemeE'),
		'set_featured_image'    => __('Set featured image', 'WPThemeE'),
		'remove_featured_image' => __('Remove featured image', 'WPThemeE'),
		'use_featured_image'    => __('Use as featured image', 'WPThemeE'),
		'insert_into_item'      => __('Insert into multimedia', 'WPThemeE'),
		'uploaded_to_this_item' => __('Uploaded to this multimedia', 'WPThemeE'),
		'items_list'            => __('Multimedia list', 'WPThemeE'),
		'items_list_navigation' => __('Multimedia list navigation', 'WPThemeE'),
		'filter_items_list'     => __('Filter multimedia list', 'WPThemeE'),
	);
	$args = array(
		'label'                 => __('Multimedia', 'WPThemeE'),
		'description'           => __('Post Type Description', 'WPThemeE'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type('multimedia', $args);
}
add_action('init', 'create_multimedia_post_type', 0);

function create_case_studies_post_type()
{
	register_post_type(
		'case_studies',
		array(
			'labels' => array(
				'name' => __('Case Studies'),
				'singular_name' => __('Case Study')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'case-study'),
		)
	);
}
add_action('init', 'create_case_studies_post_type');



// Custom type podcast


// Register Custom Post Type
function create_podcast_post_type() {
    $labels = array(
        'name' => _x( 'Podcasts', 'Post Type General Name', 'WPThemeE' ),
        'singular_name' => _x( 'Podcast', 'Post Type Singular Name', 'WPThemeE' ),
        'menu_name' => _x( 'Podcasts', 'Admin Menu text', 'WPThemeE' ),
        'name_admin_bar' => _x( 'Podcast', 'Add New on Toolbar', 'WPThemeE' ),
        'archives' => __( 'Podcast Archives', 'WPThemeE' ),
        'attributes' => __( 'Podcast Attributes', 'WPThemeE' ),
        'parent_item_colon' => __( 'Parent Podcast:', 'WPThemeE' ),
        'all_items' => __( 'All Podcasts', 'WPThemeE' ),
        'add_new_item' => __( 'Add New Podcast', 'WPThemeE' ),
        'add_new' => __( 'Add New', 'WPThemeE' ),
        'new_item' => __( 'New Podcast', 'WPThemeE' ),
        'edit_item' => __( 'Edit Podcast', 'WPThemeE' ),
        'update_item' => __( 'Update Podcast', 'WPThemeE' ),
        'view_item' => __( 'View Podcast', 'WPThemeE' ),
        'view_items' => __( 'View Podcasts', 'WPThemeE' ),
        'search_items' => __( 'Search Podcast', 'WPThemeE' ),
        'not_found' => __( 'Not found', 'WPThemeE' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'WPThemeE' ),
        'featured_image' => __( 'Featured Image', 'WPThemeE' ),
        'set_featured_image' => __( 'Set featured image', 'WPThemeE' ),
        'remove_featured_image' => __( 'Remove featured image', 'WPThemeE' ),
        'use_featured_image' => __( 'Use as featured image', 'WPThemeE' ),
        'insert_into_item' => __( 'Insert into podcast', 'WPThemeE' ),
        'uploaded_to_this_item' => __( 'Uploaded to this podcast', 'WPThemeE' ),
        'items_list' => __( 'Podcasts list', 'WPThemeE' ),
        'items_list_navigation' => __( 'Podcasts list navigation', 'WPThemeE' ),
        'filter_items_list' => __( 'Filter podcasts list', 'WPThemeE' ),
    );
    $args = array(
        'label' => __( 'Podcast', 'WPThemeE' ),
        'description' => __( 'Podcast Description', 'WPThemeE' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'category', 'post_tag' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-microphone',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'podcast', $args );
}
add_action( 'init', 'create_podcast_post_type', 0 );

function enqueue_custom_scripts() {
    // Enqueue your custom JavaScript file
    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/custom-ajax-script.js', array('jquery'), _S_VERSION, true);

    // Localize the script with the AJAX URL and HubSpot API key
    $ajax_url = admin_url('admin-ajax.php');
    // Replace with your actual HubSpot API key
    wp_localize_script('custom-ajax-script', 'ajax_object', array(
        'ajax_url' => $ajax_url,
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');





require get_template_directory() . '/inc/hubspot-form.php';

 
add_action('wp_ajax_fetch_posts_by_category', 'fetch_posts_by_category');
add_action('wp_ajax_nopriv_fetch_posts_by_category', 'fetch_posts_by_category'); // Allow for non-logged in users

function fetch_posts_by_category() {
    $category_id = $_POST['category_id'];

    $post_args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => 1,
        'cat' => $category_id // Filter posts by category ID
    );

    $post_query = new WP_Query($post_args);
    
    $msg = '';

    if ($post_query->have_posts()) {
        while ($post_query->have_posts()) {
            $post_query->the_post();

            // Get post data
            $post_id = get_the_ID();
            $post_title = get_the_title();
            $post_permalink = get_permalink();
            $post_thumbnail = get_the_post_thumbnail();
            $post_date = get_the_date();

            // Construct HTML for each post
            $msg .= "<a href='{$post_permalink}' class='insights-blog__content--main__right--cards__card'>
                <div class='insights-blog__content--main__right--cards__card--img'>
                    {$post_thumbnail}
                </div>
                <div class='insights-blog__content--main__right--cards__card--text-content'>
                    <h3 class='insights-blog__content--main__right--cards__card--text-content-h3'>
                        {$post_title}
                    </h3>
                    <p class='insights-blog__content--main__right--cards__card--text-content-p'>
                        {$post_date}
                    </p>
                </div>
            </a>";
        }
        wp_reset_postdata();
    } else {
        $msg = 'No posts found';
    }

    echo $msg;
    die(); // Always end with die() to prevent extra output
}


add_action('wp_ajax_fetch_all_posts', 'fetch_all_posts');
add_action('wp_ajax_nopriv_fetch_all_posts', 'fetch_all_posts'); // Allow for non-logged in users





function fetch_all_posts() {

   
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get current page number
 
 
 $post_args = array(
    'posts_per_page' => 8, // Number of posts to retrieve
    'post_status' => 'publish', // Only retrieve published posts
    'orderby' => 'date', // Order by date
    'order' => 'DESC' // Descending order (latest posts first)
);

    $post_query = new WP_Query($post_args);
    
    $msg = '';

    if ($post_query->have_posts()) {
        while ($post_query->have_posts()) {
            $post_query->the_post();

            // Get post data
            $post_id = get_the_ID();
            $post_title = get_the_title();
            $post_permalink = get_permalink();
            $post_thumbnail = get_the_post_thumbnail();
            $post_date = get_the_date();

            // Construct HTML for each post
            $msg .= "<a href='{$post_permalink}' class='insights-blog__content--main__right--cards__card'>
                <div class='insights-blog__content--main__right--cards__card--img'>
                    {$post_thumbnail}
                </div>
                <div class='insights-blog__content--main__right--cards__card--text-content'>
                    <h3 class='insights-blog__content--main__right--cards__card--text-content-h3'>
                        {$post_title}
                    </h3>
                    <p class='insights-blog__content--main__right--cards__card--text-content-p'>
                        {$post_date}
                    </p>
                </div>
            </a>";
        }
        wp_reset_postdata();
    } else {
        $msg = 'No posts found';
    }

    echo $msg;
    die(); // Always end with die() to prevent extra output
}



function add_blog_rewrite_rule() {
    add_rewrite_rule('^blog/([^/]+)/?$', 'index.php?name=$matches[1]', 'top');
}
add_action('init', 'add_blog_rewrite_rule');

function modify_blog_post_permalink($post_link, $post) {
    if (is_object($post) && $post->post_type == 'post') {
        return home_url('/blog/' . $post->post_name . '/');
    }
    return $post_link;
}
add_filter('post_link', 'modify_blog_post_permalink', 10, 2);

function convertembedLink($url) {
    // Parse the URL and get the query string components
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $queryParams);

    // Get the video ID from the query string
    if (isset($queryParams['v'])) {
        $videoId = $queryParams['v'];
    } else {
        // If no video ID is found, return an empty string or handle the error
        return '';
    }

    // Construct the embed URL
    $embedUrl = "https://www.youtube.com/embed/" . $videoId;
    
    return $embedUrl;
}

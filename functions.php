<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
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

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}


/* ------------------------------- Shades of Sleep 2017 Custom Code ------------------------------- */

// Add thumbnail support (preset image sizes)
/*
add_theme_support( 'post-thumbnails' );
add_image_size( 'feature-full', 2560, 1600 );
add_image_size( 'bedding-full', 1920, 660, true );
add_image_size( 'bedding-thumb', 1920, 660, true );
add_image_size( 'sleepwear-full', 298, 102, true );
add_image_size( 'sleepwear-thumb', 1000, 1000, true );
add_image_size( 'bridal-full', 1920, 660, true );
add_image_size( 'bridal-thumb', 1920, 660, true );
add_image_size( 'bathbody-full', 298, 102, true );
add_image_size( 'bathbody-thumb', 1000, 1000, true );
*/
/* ------------------------------- Custom Post Types ------------------------------- */

// Add Bootstrap CSS to admin


// Bedding CPT 
//add_action( 'init', 'create_bedding_cpt' );
function create_bedding_cpt() {
	register_post_type( 'bedding',
		array(
			'labels' => array(
				'name' => __( 'Bedding' ),
				'singular_name' => __( 'Bedding Page' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
		'show_in_nav_menus' => true
		)
	);
}

// Sleepwear & Lingerie CPT 
//add_action( 'init', 'create_sleepwear_cpt' );
function create_sleepwear_cpt() {
	register_post_type( 'sleepwear',
		array(
			'labels' => array(
				'name' => __( 'Sleepwear & Lingerie' ),
				'singular_name' => __( 'Sleepwear & Lingerie Page' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
		)
	);
}

// Bridal Lingerie CPT 
//add_action( 'init', 'create_bridal_cpt' );
function create_bridal_cpt() {
	register_post_type( 'bridal',
		array(
			'labels' => array(
				'name' => __( 'Bridal Lingerie' ),
				'singular_name' => __( 'Bridal Lingerie Page' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
		)
	);
}

// Bath & Body CPT 
//add_action( 'init', 'create_bathbody_cpt' );
function create_bathbody_cpt() {
	register_post_type( 'bathbody',
		array(
			'labels' => array(
				'name' => __( 'Bath & Body' ),
				'singular_name' => __( 'Bath & Body Page' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
		)
	);
}

// Lounge Wear CPT 
//add_action( 'init', 'create_loungewear_cpt' );
function create_loungewear_cpt() {
	register_post_type( 'everyday-lounge-wear',
		array(
			'labels' => array(
				'name' => __( 'Everyday & Lounge Wear' ),
				'singular_name' => __( 'Everyday & Lounge Wear Page' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
		)
	);
}

// FAQ CPT 
add_action( 'init', 'create_faq_cpt' );
function create_faq_cpt() {
	register_post_type( 'questions',
		array(
			'labels' => array(
				'name' => __( 'FAQ' ),
				'singular_name' => __( 'FAQ Item' ),
				'_edit_link' => 'post.php?post=%d',
			),
		'public' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'supports' => array('title', 'editor'),
		)
	);
}

/* ----------------------------------- Create Meta Boxes  ----------------------------------- */

// Content Area 2
add_action( 'add_meta_boxes', 'add_content2_meta');
add_action( 'save_post', 'save_content2_meta');

function add_content2_meta( $post ) {
    $post_types = array('page');
    foreach ( $post_types as $post_type ) {
        add_meta_box(
            'Content Area 2', // ID, should be a string
            'Content Area 2', // Meta Box Title
            'content2_meta_cnt', // Your call back function, this is where your form field will go
            $post_type, // The post type you want this to show up on, can be post, page, or custom post type
            'normal', // The placement of your meta box, can be normal or side
            'high' // The priority in which this will be displayed
        );
    }
}

function content2_meta_cnt( $post ) {
	$content2_meta = get_post_meta($post->ID, '_content2_meta', true);
	wp_editor( $content2_meta, 'content2_meta' );
}

function save_content2_meta(){

        global $post;
	
        // Get our form field
        if( $_POST ) :
             $content2_meta = $_POST['content2_meta'];
             update_post_meta($post->ID, '_content2_meta', $content2_meta);
        endif;
}

// Thumbnail Size
add_action( 'add_meta_boxes', 'add_thumbnail_size');
add_action( 'save_post', 'save_thumbnail_size');

function add_thumbnail_size( $post ) {
    $post_types = array('bedding', 'sleepwear', 'bridal', 'bathbody');
    foreach ( $post_types as $post_type ) {
        add_meta_box(
            'Thumbnail Height', // ID, should be a string
            'Thumbnail Height', // Meta Box Title
            'thumbnail_cnt', // Your call back function, this is where your form field will go
            $post_type, // The post type you want this to show up on, can be post, page, or custom post type
            'side', // The placement of your meta box, can be normal or side
            'high' // The priority in which this will be displayed
        );
    }
}

function thumbnail_cnt( $post ) {
	$thumb_height = get_post_meta($post->ID, '_thumb_height', true);
?>
	<input type="text" name="thumb_height" value="<?php echo $thumb_height; ?>" />
<?php 
}

function save_thumbnail_size(){

        global $post;
	
        // Get our form field
        if( $_POST ) :
             $thumb_height = $_POST['thumb_height'];
             update_post_meta($post->ID, '_thumb_height', $thumb_height);
        endif;
}	

//Product Repeater

add_action( 'add_meta_boxes', 'add_product_repeater' );
add_action( 'save_post', 'save_product_repeater' );

function add_product_repeater( $post ) {
    $post_types = array('bedding', 'sleepwear', 'bridal', 'bathbody', 'everyday-lounge-wear');
    foreach ( $post_types as $post_type ) {
        add_meta_box(
            'Products', // ID, should be a string
            'Products', // Meta Box Title
            'product_repeater_cnt', // Your call back function, this is where your form field will go
            $post_type, // The post type you want this to show up on, can be post, page, or custom post type
            'normal', // The placement of your meta box, can be normal or side
            'high' // The priority in which this will be displayed
        );
    }
}

function product_repeater_cnt( $post ) {
if($_GET['var'] == 'import'):
	$product_meta_cnt = array(array('image'=>'/images/bath-body/abyss4.png', 'title'=>''), array('image'=>'/images/bath-body/abyss2.png', 'title'=>''), array('image'=>'/images/bath-body/abyss3.png', 'title'=>''), array('image'=>'/images/bath-body/pillow-spray.jpg', 'title'=>''), array('image'=>'/images/bath-body/abyss5.png', 'title'=>''), array('image'=>'/images/bath-body/abyss6.png', 'title'=>''), array('image'=>'/images/bath-body/abyss7.png', 'title'=>''), array('image'=>'/images/bath-body/abyss8.png', 'title'=>''), array('image'=>'/images/bath-body/acca1.png', 'title'=>''), array('image'=>'/images/bath-body/lambs1.png', 'title'=>''), array('image'=>'/images/bath-body/lambs2.png', 'title'=>''), array('image'=>'/images/bath-body/lambs3.png', 'title'=>''));
else:
	$product_meta_cnt = get_post_meta($post->ID, '_product_meta_cnt', true);
endif; 
$product_count = count($product_meta_cnt);
$p_count = 0; 

?>
	<style type="text/css">
		.product_tbl .product{ margin-bottom: 20px; border-bottom: 1px solid #efefef; padding-bottom:20px;}
		.product_tbl .product_input input{ width:100%; padding: 8px; }
		.product_tbl .product_thumb{ margin-bottom:12px;}
		.product_tbl .product_thumb img{ width:100%; height:auto;}
		.product_tbl .product_thumb .upload_image_button{ width:150px; font-size:14px; border-radius:4px; cursor:pointer; text-align:center; padding:8px 0; background: #0085ba;
    border-color: #0073aa #006799 #006799;
    -webkit-box-shadow: 0 1px 0 #006799;
    box-shadow: 0 1px 0 #006799;
    color: #fff;
    text-decoration: none;
    text-shadow: 0 -1px 1px #006799, 1px 0 1px #006799, 0 1px 1px #006799, -1px 0 1px #006799;
} 
		.product_tbl .product_delete{ color:#000; font-size:22px; cursor:pointer; }
		.product_tbl .product_delete:hover{ color:#f00; }
		.product_tbl .product_new{ padding:8px 20px 12px 20px; }
		.product_tbl .product_new .product_new_btn{ background:#008ec2; padding:6px 12px; color:#fff; width:120px; text-align:center; float:right; border-radius:4px; -moz-border-radius:4px; -webkit-border-radius:4px; cursor:pointer;}
		.product_tbl .new_top{ border-bottom: 1px solid #efefef; margin-bottom:20px}
	</style>
	<div class="product_tbl">
    	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right text-right product_new new_top">
        	<div class="product_new_btn" style="float:right">New Product <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            <div class="alpha_order" style="float:right; margin-right:20px;"><input type="checkbox" name="product_sort" value="true" /> Alphabatize Products</div>
        </div>
        <div id="product_lst">
    	<?php foreach($product_meta_cnt as $product):?>
    	<div id="productid_<?php echo $p_count; ?>" class="product col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="product_thumb col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" /><input type="hidden" name="product_img[]" id="product_img<?php echo $p_count; ?>" value="<?php echo $product['image']; ?>" /></div>
            <div class="product_input col-lg-6 col-md-6 col-sm-6 col-xs-10 pull-left"><input type="text" name="product_ttl[]" id="product_ttl<?php echo $p_count;?>" class="product_meta_ttl" value="<?php echo $product['title']; ?>" /></div>
            <div class="product_delete col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left" id="product_dlt<?php echo $p_count; ?>" data-filter="<?php echo $p_count; ?>"><i class="fa fa-trash" aria-hidden="true"></i></div>
        </div>
        <?php $p_count++; ?>
        <?php endforeach; ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right text-right product_new new_btm">
        	<div class="product_new_btn">New Product <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
        </div>
        </div>        
    </div>
    <script type="text/javascript">
		jQuery(document).ready(function($){
		  var pcount = <?php echo $product_count - 1; ?>;
		  $('.new_top .product_new_btn').click(function(){
			  pcount++;
			  $('#product_lst').prepend('<div id="productid_'+pcount+'" class="product col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="product_thumb col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left"><div class="upload_image_button" data-filter="product_img'+pcount+'">Upload Image <i class="fa fa-plus-circle" aria-hidden="true"></i></div><input type="hidden" name="product_img[]" id="product_img'+pcount+'" /></div><div class="product_input col-lg-6 col-md-6 col-sm-6 col-xs-10 pull-left"><input type="text" name="product_ttl[]" id="product_ttl'+pcount+'" class="product_meta_ttl" value="" /></div><div class="product_delete col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left" id="product_dlt'+pcount+'" data-filter="'+pcount+'"><i class="fa fa-trash" aria-hidden="true"></i></div></div>');
			  deletebuttons();
			  productimg_upload();
		  });
		  $('.new_btm .product_new_btn').click(function(){
			  pcount++;
			  $('#product_lst').append('<div id="productid_'+pcount+'" class="product col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="product_thumb col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left"><div class="upload_image_button" data-filter="product_img'+pcount+'">Upload Image <i class="fa fa-plus-circle" aria-hidden="true"></i></div><input type="hidden" name="product_img[]" id="product_img'+pcount+'" /></div><div class="product_input col-lg-6 col-md-6 col-sm-6 col-xs-10 pull-left"><input type="text" name="product_ttl[]" id="product_ttl'+pcount+'" class="product_meta_ttl" value="" /></div><div class="product_delete col-lg-2 col-md-2 col-sm-2 col-xs-2 pull-left" id="product_dlt'+pcount+'" data-filter="'+pcount+'"><i class="fa fa-trash" aria-hidden="true"></i></div></div>');
			  deletebuttons();
			  productimg_upload();
		  });
		  function deletebuttons(){
		  	$('.product_delete').click(function(){
				 var productid = $(this).attr('data-filter');
				 $("#productid_"+productid).remove();
		  	});
		  }
		  function productimg_upload(){
        	$('.upload_image_button').click(function(){
				 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				 var upload_field = $(this).attr('data-filter');
				 var url;
				 window.send_to_editor = function(html){
					url = jQuery(html).attr('href');
					$('#'+upload_field).val(url);	
					var image_url = '<img src="'+url+'" alt="test" />';
				 	$('[data-filter='+upload_field+']').html(image_url);
					tb_remove();			 
				 };	
				 return false;	
			});
		  }
		  deletebuttons();
		  productimg_upload();
		});
		
	</script>
<?php
	
 }

function save_product_repeater(){

        global $post;

        // Get our form field
        if( $_POST ) :
             $product_ttl = $_POST['product_ttl'];
			 $product_img = $_POST['product_img'];
			 $product_sort = $_POST['product_sort'];
			 $count = count($product_ttl);
			 $product_data = array();
			 foreach($product_ttl as $key => $ttl){
				$product_data[] = array('image' => $product_img[$key], 'title' => $ttl); 
			 }
			 if($product_sort == true){
				 function cmp($a, $b){
    				if ($a["title"] == $b["title"]){
						return 0;
					}
					return ($a["title"] < $b["title"]) ? -1 : 1;
					}
					usort($product_data, "cmp");
			 }
			 //dd($product_data);
			 //console.log('Product TTL: '.$product_ttl);
             // Update post meta
             update_post_meta($post->ID, '_product_meta_cnt', $product_data);
        endif;
}
	
function pre($data){
echo "<pre>" . print_r ($data, true) . "</pre>";
}
function dd($data){
echo '<pre>';
pre($data);
echo '</pre>';
die;
}

function admin_scripts()
{
   wp_enqueue_script('media-upload');
   wp_enqueue_script('thickbox');
}
 
function admin_styles()
{
   wp_enqueue_style('thickbox');
}
 
add_action('admin_print_scripts', 'admin_scripts');
add_action('admin_print_styles', 'admin_styles');

/* Add Manufaturer Taxonomy */
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires 
/*
add_action( 'init', 'create_manufacturer_taxonomy', 0 ); 
function create_manufacturer_taxonomy() { 
// Labels part for the GUI 
  $manLabels = array(
    'name' => _x( 'Manufacturer', 'taxonomy general name' ),
    'singular_name' => _x( 'Manufacturer', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Manufacturers' ),
    'all_items' => __( 'All Manufacturers' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Manufacturer' ), 
    'update_item' => __( 'Update Manufacturer' ),
    'add_new_item' => __( 'Add New Manufacturer' ),
    'new_item_name' => __( 'New Manufacturer' ),
    'menu_name' => __( 'Manufacturer' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('manufacturer','product',array(
    'hierarchical' => false,
    'labels' => $manLabels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'manufacturer' ),
  ));
}
*/
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Remove Category Description Field
function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 

add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

/* Remove Sorting Dropdown Woocommerce */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/* Custom Sort FAQ CPT */
add_action( 'pre_get_posts', 'my_change_sort_order'); 
    function my_change_sort_order($query){
        if(is_archive('questions')):
         //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
           //Set the order ASC or DESC
           $query->set( 'order', 'ASC' );
        endif;    
    };


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
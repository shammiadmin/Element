<?php
/**
 * Twenty Sixteen functions and definitions
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
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	wp_enqueue_style( 'testimonial', get_theme_file_uri( 'ultimate-page-builder/preview-css/testimonial.css' ), array( ), '20160816' );

	wp_enqueue_style( 'testimonial', get_theme_file_uri( 'ultimate-page-builder/preview-css/carousel.css' ), array( ), '20160816' );

	wp_enqueue_style( 'theme', get_theme_file_uri( 'ultimate-page-builder/preview-css/docs.theme.min.css' ), array( ), '20160816' );

	wp_enqueue_style( 'carousel', get_theme_file_uri( 'ultimate-page-builder/preview-css/owl.carousel.min.css' ), array( ), '20160816' );

	wp_enqueue_style( 'owl-theme', get_theme_file_uri( 'ultimate-page-builder/preview-css/owl.theme.default.css' ), array( ), '20160816' );

	//wp_enqueue_script( 'testimonial', get_theme_file_uri( 'ultimate-page-builder/preview-js/testimonial.js' ), array(), '20160816', true );

	wp_enqueue_script( 'owlCarousel', get_theme_file_uri( 'ultimate-page-builder/preview-js/owl.carousel.js' ), array(), '20160816' );




	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );



// Button
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Button Name',' ', 'Button'),

		 
		array(
			'id'    => 'link',
			'title' => esc_html__( 'linkable', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),

		array(
			'id'    => 'url',
			'title' => esc_html__( 'URL', '' ),
			'desc'  => wp_kses_post( __( 'Enter Button Link', 'ultimate-page-builder' )),
			'type'  => 'text',
   			'value' => '#', // true | false
    		'required'=> array(

    		   array('link', '=', true )
    	)
    ),

		array(
			'id'    => 'curved',
			'title' => esc_html__( 'curve', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),

		array(
			'id'    => 'show-icon',
			'title' => esc_html__( 'Show Icon', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),
		array(
			'id'    => 'icon',
			'title' => esc_html__( 'icon select', '' ),
			'desc'  => wp_kses_post( __( 'Description', 'ultimate-page-builder' )),
			'type'  => 'ajax-icon-select',
            'value' =>  '',  // true | false

			'hooks'=>array(  
			'search'=>'_upb_material_icon_search', // wp_ajax__upb_material_icon_search
			'load'=>'_upb_material_icon_load' // wp_ajax__upb_material_icon_load
			),
		    'settings'=>array(
		        'allowClear'=>true,
		        ),
		    'ajaxOptions'=>array(
		        'type'  => 'GET', // POST
		        'cache'=>true
		        ),
		    'required'=> array(
    		   array('show-icon', '=', true )
    		)
    ),
		array(
			'id'    => 'reveal',
			'title' => esc_html__( 'reveal', '' ),
			'desc'  => wp_kses_post( __( 'Description', 'ultimate-page-builder' )),
			'type'  => 'toggle',
   			'value' => true, // true | false
   			'required'=> array(
    		   array('icon', '!=', '' )

    	) 
    		 
    ),
		array(
			'id'    => 'effect',
			'title' => esc_html__( 'Icon Reveal Effect', '' ),
			'desc'  => wp_kses_post( __( 'Select Icon Hover Effect', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => '', // true | false
            'placeholder'=> esc_html__( 'Enter Hover Effect', 'ultimate-page-builder' ),
            'options' => array(
			    'ileft' => esc_html__( 'Left Reveal', 'ultimate-page-builder' ),
			    'iright' => esc_html__( 'Right Reveal', 'ultimate-page-builder' ),
			    
    	),
    	'required'=> array(
    		   array('icon', '!=', '' )

    	) 

	),
  
		array(
			'id'    => 'color',
			'title' => esc_html__( 'color', '' ),
			'desc'  => wp_kses_post( __( 'Choose Button Color', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
    ),
		
		array(
			'id'    => 'size',
			'title' => esc_html__( 'size', '' ),
			'desc'  => wp_kses_post( __( 'Select Button Size', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => 'button-default', // true | false

            'options' => array(
			    'button-default' => esc_html__( 'Default Buttons', 'ultimate-page-builder' ),
			    'button-mini' => esc_html__( 'Mini Buttons', 'ultimate-page-builder' ),
			    'button-small' => esc_html__( 'Small Buttons', 'ultimate-page-builder' ),
			    'button-large' => esc_html__( 'Large Buttons', 'ultimate-page-builder' ),
			    'button-xlarge' => esc_html__( 'Extra Large Buttons', 'ultimate-page-builder' ) 
			    ),
    ),


		);

    $contents =  false ; // false or array()

    $_upb_options = array(

    	'element' => array(
    		'name' => 'Button',
    		'icon' => 'mdi mdi-panorama-wide-angle'
    		),

    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/button.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);



    $element->register( 't16-button', $attributes, $contents, $_upb_options );

});

// Call Us
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Call Us Title',' ','Call Us Ttile'),

		 
		 
		 array(
            'id'      => 'align',
            'title'   => esc_html__( 'Button Align', 'ultimate-page-builder' ),
            'type'    => 'radio-icon',
            'value'   => 'center',
            'options' => array(
                'right'   => array(
                    'title' => esc_html__( 'Left Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-center',
                ),
                'left'  => array(
                    'title' => esc_html__( 'Right Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-right',
                ),
            ),
        ),

		 array(
			'id'    => 'button-text',
			'title' => esc_html__( 'Button Text', '' ),
			'desc'  => wp_kses_post( __( 'Enter Button Name', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => 'More Button', // true | false
            
    	),
 
	    array(
				'id'    => 'link',
				'title' => esc_html__( 'Linkable', '' ),
				'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
				'type'  => 'toggle',
	            'value' => true, // true | false
	            
	    	),

		array(
			'id'    => 'url',
			'title' => esc_html__( 'URL', '' ),
			'desc'  => wp_kses_post( __( 'Enter Button Link', 'ultimate-page-builder' )),
			'type'  => 'text',
   			'value' => '#', // true | false
    		'required'=> array(
    		   array('link', '=', true )
    		    
    		)
   	 	),
		
		array(
			'id'    => 'color',
			'title' => esc_html__( 'Button Color', '' ),
			'desc'  => wp_kses_post( __( 'Choose Button Color', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
    	), 

		array(
			'id'    => 'curved',
			'title' => esc_html__( 'Curve', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
              
    	),
        array(
			'id'    => 'size',
			'title' => esc_html__( 'Button size', '' ),
			'desc'  => wp_kses_post( __( 'Select Button Size', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => 'button-default', // true | false

            'options' => array(
			    'button-default' => esc_html__( 'Default Buttons', 'ultimate-page-builder' ),
			    'button-mini' => esc_html__( 'Mini Buttons', 'ultimate-page-builder' ),
			    'button-small' => esc_html__( 'Small Buttons', 'ultimate-page-builder' ),
			    'button-large' => esc_html__( 'Large Buttons', 'ultimate-page-builder' ),
			    'button-xlarge' => esc_html__( 'Extra Large Buttons', 'ultimate-page-builder' ),
			     
			    )
    	), 

	);
	$attributes = array_merge( $attributes, upb_background_input_group() );

     

    $_upb_options = array(

    	'element' => array(
    		'name' => 'Call Us',
    		'icon' => 'mdi mdi-call-made'
    		),
    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/call-us.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

	$contents = '';

    $element->register( 't16-call-out', $attributes, $contents, $_upb_options );

});

// Counter
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Counter Title','', 'Counter Title'),

		 
	 	array(
			'id'    => 'show-icon',
			'title' => esc_html__( 'Show Icon', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),
	 	 array(
            'id'      => 'align',
            'title'   => esc_html__( 'Icon Align', 'ultimate-page-builder' ),
            'type'    => 'radio-icon',
            'value'   => true,

            'options' => array(
                'left'   => array(
                    'title' => esc_html__( 'Left Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-left',
                ),
                'top' => array(
                    'title' => esc_html__( 'Center Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-center',
                ),
            ),

            'required'=> array(
    		   array('show-icon', '=', true )
    		)
        ),
	 	 
	 	 array(
			'id'    => 'icon',
			'title' => esc_html__( 'icon select', '' ),
			 
			'type'  => 'ajax-icon-select',
            'value' =>  '',  // true | false
            'placeholder'=> esc_html__( 'Enter Icon Name', 'ultimate-page-builder' ),
			'hooks'=>array(  
			'search'=>'_upb_material_icon_search', // wp_ajax__upb_material_icon_search
			'load'=>'_upb_material_icon_load' // wp_ajax__upb_material_icon_load
			),
		    'settings'=>array(
		        'allowClear'=>true,
		        ),
		    'ajaxOptions'=>array(
		        'type'  => 'GET', // POST
		        'cache'=>true
		        ),
		    'required'=> array(
    		   array('show-icon', '=', true )
    		)
		    
    ),
	 	 array(
			'id'    => 'counter-value',
			'title' => esc_html__( 'Counter Value', '' ),
			'desc'  => wp_kses_post( __( 'Enter Counter Number', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => '', // true | false
    ),
	 	 
	 	 array(
			'id'    => 'box',
			'title' => esc_html__( 'Box', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),
	 	 
	 	  array(
			'id'    => 'color',
			'title' => esc_html__( 'Box Color', '' ),
			'desc'  => wp_kses_post( __( 'Choose Box Background', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
            'required'=> array(
	    		   array('box', '=', true )
	    		)
    	), 
	);
	 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Counter',
    		'icon' => 'mdi mdi-counter'
    		),

    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/counter.css' ),
                    'js'  => upb_templates_uri( 'ultimate-page-builder/preview-js/jquery.counterup.js' ),
                    'js'  => upb_templates_uri( 'uultimate-page-builder/preview-js/counter.js' ),
                    'js'  => upb_templates_uri( 'ultimate-page-builder/preview-js/waypoints.min.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

     $contents = false;
 
    $element->register( 't16-counter', $attributes, $contents, $_upb_options );

});

// Icon

add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Icon Title',' ', 'Icon Title'),
 
	 	array(
			'id'    => 'show-icon',
			'title' => esc_html__( 'Show Icon', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
    ),
	 	 array(
            'id'      => 'align',
            'title'   => esc_html__( 'Icon align', 'ultimate-page-builder' ),
            'type'    => 'radio-icon',
            'value'   => 'center',

            'options' => array(
                'left'   => array(
                    'icon-left' => esc_html__( 'Left Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-left',
                ),
                'center' => array(
                    'icon-top' => esc_html__( 'Center Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-center',
                ),
            ),

            'required'=> array(
    		   array('show-icon', '=', true )
    		)
        ),
	 	 
	 	 array(
			'id'    => 'icon',
			'title' => esc_html__( 'icon select', '' ),
			 
			'type'  => 'ajax-icon-select',
            'value' =>  '',  // true | false
            'placeholder'=> esc_html__( 'Enter Icon Name', 'ultimate-page-builder' ),
			'hooks'=>array(  
			'search'=>'_upb_material_icon_search', // wp_ajax__upb_material_icon_search
			'load'=>'_upb_material_icon_load' // wp_ajax__upb_material_icon_load
			),
		    'settings'=>array(
		        'allowClear'=>true,
		        ),
		    'ajaxOptions'=>array(
		        'type'  => 'GET', // POST
		        'cache'=>true
		        ),
		    'required'=> array(
    		   array('show-icon', '=', true )
    		)
		    
    ),
	 	 array(
			'id'    => 'effect',
			'title' => esc_html__( 'Icon Hover Effect', '' ),
			'desc'  => wp_kses_post( __( 'Select Icon Hover Effect', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => '', // true | false
            'placeholder'=> esc_html__( 'Enter Hover Effect', 'ultimate-page-builder' ),
            'options' => array(
			    'fbox-large' => esc_html__( 'Zoom', 'ultimate-page-builder' ),
			    'fbox-border' => esc_html__( 'Border', 'ultimate-page-builder' ),
			    'fbox-half-border' => esc_html__( 'Half Border', 'ultimate-page-builder' ),
			    'icon-plain' => esc_html__( 'None', 'ultimate-page-builder' ),

    	),
    	'required'=> array(
    		   array('show-icon', '=', true )
    		) 

	),
 
	 	 array(
			'id'    => 'button',
			'title' => esc_html__( 'Show Button', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false

    ),
	    array(
				'id'    => 'link',
				'title' => esc_html__( 'Linkable', '' ),
				'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
				'type'  => 'toggle',
	            'value' => true, // true | false
	            'required'=> array(
	    		   array('button', '=', true )
	    		) 
	    ),

		array(
			'id'    => 'url',
			'title' => esc_html__( 'URL', '' ),
			'desc'  => wp_kses_post( __( 'Enter Button Link', 'ultimate-page-builder' )),
			'type'  => 'text',
   			'value' => '#', // true | false
    		'required'=> array(
    		   array('link', '=', true),
    		   array('button', '=', true )
    		   
    	)
    		 
    ),

		array(
			'id'    => 'curved',
			'title' => esc_html__( 'Curve', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
             'required'=> array(
    		   array('button', '=', true )
    		) 
    ), 
	 	 array(
			'id'    => 'button-text',
			'title' => esc_html__( 'Button Text', '' ),
			'desc'  => wp_kses_post( __( 'Enter Button Name', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => 'More Button', // true | false
            'required'=> array(
    		   array('button', '=', true )
    		) 
    ),
        array(
			'id'    => 'color',
			'title' => esc_html__( 'Button Color', '' ),
			'desc'  => wp_kses_post( __( 'Select Button Color', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
            'required'=> array(
    		   array('button', '=', true )
    		) 
    ),

        array(
			'id'    => 'size',
			'title' => esc_html__( 'Button size', '' ),
			'desc'  => wp_kses_post( __( 'Select Button Size', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => '', // true | false

            'options' => array(
			    'button-default' => esc_html__( 'Default Buttons', 'ultimate-page-builder' ),
			    'button-mini' => esc_html__( 'Mini Buttons', 'ultimate-page-builder' ),
			    'button-small' => esc_html__( 'Small Buttons', 'ultimate-page-builder' ),
			    'button-large' => esc_html__( 'Large Buttons', 'ultimate-page-builder' ),
			    'button-xlarge' => esc_html__( 'Extra Large Buttons', 'ultimate-page-builder' ) 
			    ),
            'required'=> array(
    		   array('button', '=', true )
    		) 

    	) 
	 	  
		);
	 
 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Icon',
    		'icon' => 'mdi mdi-lumx'
    		),


    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/icon.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $contents = '';



    $element->register( 't16-icon', $attributes, $contents, $_upb_options );

});

// Image Box

add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Image Box Title',' ', 'Image Box Title'),

		 
		array(
			'id'    => 'title-url',
			'title' => esc_html__( 'Title URL', '' ),
			'desc'  => wp_kses_post( __( 'Enter Title Link', 'ultimate-page-builder' )),
			'type'  => 'text',
   			'value' => '#', // true | false
    		  
    ),

		 array(
	    'type'  => 'media-image',
	    'id'    => 'image',
	    'title' => esc_html__( 'Image', 'ultimate-page-builder' ),
	    'desc'  => wp_kses_post( __( 'Choose Thumbnail Images', 'ultimate-page-builder' )),
	    'value' => '',
	    // 'attribute'=>'src' // id, src
	    // 'size'=>'full' // large, medium, thumbnail etc...
	),
		 array(
			'id'    => 'url',
			'title' => esc_html__( 'Image URL', '' ),
			'desc'  => wp_kses_post( __( 'Enter Image Link', 'ultimate-page-builder' )),
			'type'  => 'text',
   			'value' => '#', // true | false
    		  
    ),

		 array(
            'id'      => 'align',
            'title'   => esc_html__( 'Image Align', 'ultimate-page-builder' ),
            'type'    => 'radio-icon',
            'value'   => 'left',

            'options' => array(
                'left'   => array(
                    'left' => esc_html__( 'Left Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-left',
                ),
                'right' => array(
                    'right' => esc_html__( 'Right Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-right',
                ),
            ),
        ),
		 	 
	 	   
		);
	 
 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Image Box',
    		'icon' => 'mdi mdi-folder-image'
    		),


    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/imagebox.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $contents = '';



    $element->register( 't16-image-box', $attributes, $contents, $_upb_options );

});


// Team
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Member Name',' ', 'Member Name'),

		  array(
			'id'    => 'designation',
			'title' => esc_html__( 'Designation', '' ),
			'desc'  => wp_kses_post( __( 'Enter Member Designation', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => 'Designation', // true | false
              
    ),

		  array(
		    'type'  => 'media-image',
		    'id'    => 'image',
		    'title' => esc_html__( 'Image', 'ultimate-page-builder' ),
		    'desc'  => wp_kses_post( __( 'Choose Thumbnail Images', 'ultimate-page-builder' )),
		    'value' => '',
		    // 'attribute'=>'src' // id, src
		    // 'size'=>'full' // large, medium, thumbnail etc...
	),
		  
        
	 	  
		);
	 
 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Team',
    		'icon' => 'mdi mdi-account-multiple'
    		),


    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/team.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $contents = false;



    $element->register( 't16-team', $attributes, $contents, $_upb_options );

});

// Heading
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Heading Title',' ', 'Heading Title'),

		   array(
			'id'    => 'size',
			'title' => esc_html__( 'Heading Type', '' ),
			'type'  => 'select2-icon',
            'value' => 'h1', // true | false

            'options'  => array(
                'h1' => array(
                    'title' => esc_html__( 'Heading 1', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-1',
                ),
                'h2' => array(
                    'title' => esc_html__( 'Heading 2', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-2',
                ),
                'h3' => array(
                    'title' => esc_html__( 'Heading 3', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-3',
                ),
                'h4' => array(
                    'title' => esc_html__( 'Heading 4', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-4',
                ),
                'h5' => array(
                    'title' => esc_html__( 'Heading 5', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-5',
                ),
                'h6' => array(
                    'title' => esc_html__( 'Heading 6', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-header-6',
                ),
            ),
    	),

		   array(
			'id'    => 'textcolor',
			'title' => esc_html__( 'Heading color', '' ),
			'desc'  => wp_kses_post( __( 'Choose Heading color', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
             
    ),

		   array(
            'id'      => 'align',
            'title'   => esc_html__( 'Heading Align', 'ultimate-page-builder' ),
            'type'    => 'radio-icon',
            'value'   => 'text-left',
            'options' => array(
                'text-left'   => array(
                    'title' => esc_html__( 'Left Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-left',
                ),
                'text-center' => array(
                    'title' => esc_html__( 'Center Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-center',
                ),
                'text-right'  => array(
                    'title' => esc_html__( 'Right Align', 'ultimate-page-builder' ),
                    'icon'  => 'mdi mdi-format-align-right',
                ),
            ),
        ),

		   array(
			'id'    => 'design-align',
			'title' => esc_html__( 'Heading Design Align', '' ),
			'type'  => 'select',
            'value' => 'border-inline', // true | false

            'options' => array(
			    'border-inline' => esc_html__( 'Inline Design', 'ultimate-page-builder' ),
			    'border-bottom' => esc_html__( 'Bottom Design', 'ultimate-page-builder' ),
			    'border-left-block' => esc_html__( 'Left Block Design', 'ultimate-page-builder' ),
			    'border-bottom-block' => esc_html__( 'Bottom Block Design', 'ultimate-page-builder' )
			      
			    ),
    	), 
		   array(
			'id'    => 'design',
			'title' => esc_html__( 'Select Design', '' ),
			'type'  => 'select',
            'value' => 'dashed', // true | false

            'options' => array(
            	'single' => esc_html__( 'Single', 'ultimate-page-builder' ),
			    'dashed' => esc_html__( 'Dashed', 'ultimate-page-builder' ),
			    'double-dashed' => esc_html__( 'Double Dashed', 'ultimate-page-builder' ),
			    'dotted' => esc_html__( 'Dotted', 'ultimate-page-builder' ),
			    'hash' => esc_html__( 'Hash', 'ultimate-page-builder' ),
			    'arrow' => esc_html__( 'Arrow', 'ultimate-page-builder' ),
			    'gradient' => esc_html__( 'Gradient', 'ultimate-page-builder' ),
			    'shadow' => esc_html__( 'Shadow', 'ultimate-page-builder' ) 
			),
  
    		'required'=> array(
    		   array('design-align', '=',  array('border-inline', 'border-bottom'  ) )
    		    
    	),
    	 	 
    	),

    	array(
			'id'    => 'icon',
			'title' => esc_html__( 'icon select', '' ),
			'type'  => 'ajax-icon-select',
            'value' =>  '',  // true | false
            'placeholder'=> esc_html__( 'Enter Icon Name', 'ultimate-page-builder' ),
			'hooks'=>array(  
			'search'=>'_upb_material_icon_search', // wp_ajax__upb_material_icon_search
			'load'=>'_upb_material_icon_load' // wp_ajax__upb_material_icon_load
			),
		    'settings'=>array(
		        'allowClear'=>true,
		        ),
		    'ajaxOptions'=>array(
		        'type'  => 'GET', // POST
		        'cache'=>true
		        ),
		    'required'=> array(
    		   array('design-align', '=', 'border-bottom-block' ) 
    		)
		    
    ), 

    	array(
			'id'    => 'color',
			'title' => esc_html__( 'color', '' ),
			'desc'  => wp_kses_post( __( 'Choose Left Block Color', 'ultimate-page-builder' )),
			'type'  => 'color',
            'value' => '#C02942', // true | false
            'required'=> array(
    		   array('design-align', '=', 'border-left-block' ) 
    		)
    ),


        
	 	  
		);
	 
 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Heading',
    		'icon' => 'mdi mdi-format-header-pound'
    		),


    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/heading.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $contents = false;



    $element->register( 't16-heading', $attributes, $contents, $_upb_options );

});

// Single Testimonial
add_action( 'upb_register_element', function ( $element ) {

	$attributes = array(


		upb_title_input('Testimonial Title',' ', 'Testimonial Name'),

		  array(
			'id'    => 'company',
			'title' => esc_html__( 'Company Name', '' ),
			'desc'  => wp_kses_post( __( 'Enter Company Name', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => 'Designation', // true | false
              
    ),

		  array(
		    'type'  => 'media-image',
		    'id'    => 'image',
		    'title' => esc_html__( 'Image', 'ultimate-page-builder' ),
		    'desc'  => wp_kses_post( __( 'Choose Thumbnail Images', 'ultimate-page-builder' )),
		    'value' => '',
		    // 'attribute'=>'src' // id, src
		    // 'size'=>'full' // large, medium, thumbnail etc...
	),
		  
        
	 	  
		);
	 
 
    $_upb_options = array(

    	'element' => array(
    		'name' => 'Single Testimonial',
    		'icon' => 'mdi mdi-account-outline'
    		),


    	'assets' => array(
                'preview'   => array(
                    'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/single-testimonial.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $contents = '';

    $element->register( 't16-single-testimonial', $attributes, $contents, $_upb_options );

});

// Testimonial

add_action( 'upb_register_element', function ( $element ) {

	// Testimonial Item

	$attributes = array();
	
	array_push( $attributes, upb_title_input( esc_html__( 'Testimonial Item Title', 'ultimate-page-builder' ), '', esc_html__( 'Testimonial Item 1', 'ultimate-page-builder' ) ) );

        array_push( $attributes, array( 
    		'id' => 'active', 
    		'title' => esc_html__( 'Default Active', 'ultimate-page-builder' ), 
    		'type' => 'toggle', 
    		'value' => FALSE ) 
        );

        array_push( $attributes, array(
			'id'    => 'company',
			'title' => esc_html__( 'Company Name', '' ),
			'desc'  => wp_kses_post( __( 'Enter Company Name', 'ultimate-page-builder' )),
			'type'  => 'text',
            'value' => 'Company Name', // true | false 
            )
        );
        array_push( $attributes, array(
		    'type'  => 'media-image',
		    'id'    => 'image',
		    'title' => esc_html__( 'Image', 'ultimate-page-builder' ),
		    'desc'  => wp_kses_post( __( 'Choose Thumbnail Images', 'ultimate-page-builder' )),
		    'value' => '',
		    // 'attribute'=>'src' // id, src
		    // 'size'=>'full' // large, medium, thumbnail etc...
	)
         );

	 
 	$contents = wp_kses_post( '<p>Testimonial Contents</p>' );
    
    $_upb_options = array(

    	'element' => array(
                'name'  => esc_html__( 'Testimonial Item', 'ultimate-page-builder' ),
                'icon'  => 'mdi mdi-account-settings',
                'child' => TRUE
            ),
    	
    	'meta' => array(
                'contents' =>  array(
                    'help' => '<h2>Want to add contents?</h2><p>Choose a section and drag elements</p>',
                ),

                'settings' => array(
                    'help' => '<h2>Text Settings?</h2><p>section settings</p>',
                )
            ),
    	 

    	'assets' => array(
                'preview'   => array(
                   //'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/testimonial.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $element->register( 't16-testimonial-item', $attributes, $contents, $_upb_options );

    	// Testimonials

   $attributes = array( 
   	);

   array_push( $attributes, upb_title_input( esc_html__( 'Testimonial Title', 'ultimate-page-builder' ), '', esc_html__( 'Testimonial', 'ultimate-page-builder' ) ) );

   array_push( $attributes, array(
			'id'    => 'dots',
			'title' => esc_html__( 'Dots', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
              
    	)
    ); 
   array_push( $attributes, array(
			'id'    => 'autoscroll',
			'title' => esc_html__( 'Auto Scroll', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
              
    	)
    );

    array_push( $attributes, array(
			'id'    => 'design',
			'title' => esc_html__( 'Testimonial Design', '' ),
			'desc'  => wp_kses_post( __( 'Select Testimonial Design', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => 'bubble', // true | false

            'options' => array(
			    'bubble' => esc_html__( 'Bubble Layout', 'ultimate-page-builder' ),
			    'ticker' => esc_html__( 'Ticker Layout', 'ultimate-page-builder' ),
			    'box' => esc_html__( 'Box Layout', 'ultimate-page-builder' ) 
			    ),
 
    	)  
    );
    array_push( $attributes, array(
			'id'    => 'grid',
			'title' => esc_html__( 'Box Column', '' ),
			'desc'  => wp_kses_post( __( 'Select Testimonial Design', 'ultimate-page-builder' )),
			'type'  => 'number',
            'value' => 'nuber', // true | false

           'required'=> array(
    		   array('design', '=', 'box' )
    		)    
             
    	)  
    );

    array_push( $attributes, upb_enable_input( esc_html__( 'Enable / Disable', 'ultimate-page-builder' ), '' ) );

    array_push( $attributes, upb_responsive_hidden_input() );

    $attributes = array_merge( $attributes, upb_css_class_id_input_group() );


   $contents = array(
            upb_elements()->generate_element( 't16-testimonial-item', '<p>Authoritatively formulate one-to-one interfaces with sustainable information. Collaboratively impact value-added meta-services rather than superior growth.</p>', array( 'active' => TRUE, 'title' => esc_html__( 'Testimonial 1', 'ultimate-page-builder' ) ) ),
            upb_elements()->generate_element( 't16-testimonial-item', '<p>Holisticly customize top-line leadership skills for wireless solutions. Appropriately actualize principle-centered products rather than sustainable.</p>', array( 'active' => FALSE, 'title' => esc_html__( 'Testimonial 2', 'ultimate-page-builder' ) ) )
        );

    $_upb_options = array(

    	'element' => array(
                'name'  => esc_html__( 'Testimonials', 'ultimate-page-builder' ),
                'icon'  => 'mdi mdi-account-settings',
                 
            ),



    	'tools' => array(
                'contents' => array(
                    array(
                        'id'     => 'add-new',
                        'title'  => esc_html__( 'Add New', 'ultimate-page-builder' ),
                        'icon'   => 'mdi mdi-shape-plus',
                        'action' => 'addNew',
                        'data'   => upb_elements()->generate_element( 't16-testimonial-item', '<p>Testimonial Item</p>', array( 'title' => esc_html__( 'Testimonial %s', 'ultimate-page-builder' ) ) )
                    ),
                    array(
                        'id'     => 'settings',
                        'title'  => esc_html__( 'Settings', 'ultimate-page-builder' ),
                        'icon'   => 'mdi mdi-settings',
                        'action' => 'showSettingsPanel'
                    )
                ),
            ),

    	'meta' => array(
                'contents' =>  array(
                    'help' => '<h2>Want to add contents?</h2><p>Choose a section and drag elements</p>',
                  ),

                'settings' =>  array(
                    'help' => '<h2>Text Settings?</h2><p>section settings</p>',
                  ),

                'messages' => array(
                    'addElement' => esc_html__( 'Add Testimonials Item', 'ultimate-page-builder' )
                )
            ),
    	 

    	'assets' => array(
                'preview'   => array(
                   //'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/testimonial.css' ),
                    //'js'        => upb_templates_uri( 'shortcode-js/upb-tab.js' ), 
                   'inline_js' => ';(function ($, upb) {
                   	$("."+upb.attributes.design).trigger("destroy.owl.carousel");
 
                    $("."+upb.attributes.design).owlCarousel({
				      loop: true,
				      center: true,
				      items: 1,
				      margin: 0,
				      dots:true,
				      singleItem: true,
				      autoPlay: true
  					});
 
                }(jQuery, _UPB_PREVIEW_DATA[upbComponentId]));',

                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $element->register( 't16-testimonial', $attributes, $contents, $_upb_options );
	 
});

// Carousel

add_action( 'upb_register_element', function ( $element ) {

	// Carousel Item

	$attributes = array();
	
	array_push( $attributes, upb_title_input( esc_html__( 'Carousel Item Title', 'ultimate-page-builder' ), '', esc_html__( 'Carousel Item 1', 'ultimate-page-builder' ) ) );

		array_push( $attributes, array( 
    		'id' => 'active', 
    		'title' => esc_html__( 'Default Active', 'ultimate-page-builder' ), 
    		'type' => 'toggle', 
    		'value' => FALSE ) 
        );

		array_push( $attributes, array(
		    'type'  => 'media-image',
		    'id'    => 'logoimage',
		    'title' => esc_html__( 'Image', 'ultimate-page-builder' ),
		    'desc'  => wp_kses_post( __( 'Choose Thumbnail Images', 'ultimate-page-builder' )),
		    'value' => '',
		    // 'attribute'=>'src' // id, src
		    // 'size'=>'full' // large, medium, thumbnail etc...
			)
    	);
 
 	$contents = false;
    
    $_upb_options = array(

    	'element' => array(
                'name'  => esc_html__( 'Carousel Item', 'ultimate-page-builder' ),
                'icon'  => 'mdi mdi-account-settings',
                'child' => TRUE
            ),
    	'meta' => array(
                'contents' => apply_filters( 'upb_carousel-item_contents_panel_meta', array(
                    'help' => '<h2>Want to add contents?</h2><p>Choose a section and drag elements</p>',
                ) ),

                'settings' => apply_filters( 'upb_carousel-item_settings_panel_meta', array(
                    'help' => '<h2>Text Settings?</h2><p>section settings</p>',
                ) )
            ),
    	
    	 
    	'assets' => array(
                'preview'   => array(
                   //'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/testimonial.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )

    	);

    $element->register( 't16-carousel-item', $attributes, $contents, $_upb_options );

    	// carousels

   $attributes = array();
   
	array_push( $attributes, upb_title_input( esc_html__( 'Carousel Title', 'ultimate-page-builder' ), '', esc_html__( 'Carousel Logo', 'ultimate-page-builder' ) ) );
	array_push( $attributes, array(
			'id'    => 'dots',
			'title' => esc_html__( 'Dots', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
              
    	)
    ); 
   array_push( $attributes, array(
			'id'    => 'autoscroll',
			'title' => esc_html__( 'Auto Scroll', '' ),
			'desc'  => wp_kses_post( __( 'Enable or Disable Element', 'ultimate-page-builder' )),
			'type'  => 'toggle',
            'value' => true, // true | false
              
    	)
    );
    array_push( $attributes, array(
			'id'    => 'design',
			'title' => esc_html__( 'Testimonial Design', '' ),
			'desc'  => wp_kses_post( __( 'Select Testimonial Design', 'ultimate-page-builder' )),
			'type'  => 'select',
            'value' => 'logocarousel', // true | false

            'options' => array(
			    'logocarousel' => esc_html__( 'Carousel', 'ultimate-page-builder' ),
			     
			    ),
 
    	)  
    );
 

	array_push( $attributes, upb_enable_input( esc_html__( 'Enable / Disable', 'ultimate-page-builder' ), '' ) );

    array_push( $attributes, upb_responsive_hidden_input() );

    $attributes = array_merge( $attributes, upb_css_class_id_input_group() );
   
 
   $contents = array(
            upb_elements()->generate_element( 't16-carousel-item', ' ', array( 'active' => TRUE, 'title' => esc_html__( 'Carousels Logo 1', 'ultimate-page-builder' ) ) ),

            upb_elements()->generate_element( 't16-carousel-item', '', array( 'active' => FALSE, 'title' => esc_html__( 'Carousels Logo 2', 'ultimate-page-builder' ) ) ),

            upb_elements()->generate_element( 't16-carousel-item', '', array( 'active' => FALSE, 'title' => esc_html__( 'Carousels Logo 3', 'ultimate-page-builder' ) ) ),

            upb_elements()->generate_element( 't16-carousel-item', '', array( 'active' => FALSE, 'title' => esc_html__( 'Carousels Logo 4', 'ultimate-page-builder' ) ) ),

            upb_elements()->generate_element( 't16-carousel-item', '', array( 'active' => FALSE, 'title' => esc_html__( 'Carousels Logo 5', 'ultimate-page-builder' ) ) )

        );

    $_upb_options = array(

    	'element' => array(
                'name'  => esc_html__( 'Carousel Logo', 'ultimate-page-builder' ),
                'icon'  => 'mdi mdi-view-carousel',
                 
            ),

    	'tools' => array(
                'contents' => array(
                    array(
                        'id'     => 'add-carousel-item',
                        'title'  => esc_html__( 'Add New', 'ultimate-page-builder' ),
                        'icon'   => 'mdi mdi-shape-plus',
                        'action' => 'addNew',
                        'data'   =>  upb_elements()->generate_element( 't16-carousel-item', '<p>Carousel Contents</p>', array( 'title' => esc_html__( 'Carousel Logo %s', 'ultimate-page-builder' ) ) )  
                    ),
                    array(
                        'id'     => 'carousel-setting',
                        'title'  => esc_html__( 'Settings', 'ultimate-page-builder' ),
                        'icon'   => 'mdi mdi-settings',
                        'action' => 'showSettingsPanel'
                    )
                ),
            ),

    	'meta' => array(
                'contents' => apply_filters( 'upb_carousel_contents_panel_meta', array(
                    'help' => '<h2>Want to add contents?</h2><p>Choose a section and drag elements</p>',
                ) ),

                'settings' =>  array(
                    'help' => '<h2>Text Settings?</h2><p>section settings</p>',
                ),

                'messages' => array(
                    'addElement' => esc_html__( 'Add Carousel Item', 'ultimate-page-builder' )
                )
            ),
 

    	 'assets' => array(
                'preview'   => array(
                   //'css' => get_theme_file_uri( 'ultimate-page-builder/preview-css/testimonial.css' ),
                    //'js'        => upb_templates_uri( 'shortcode-js/upb-tab.js' ), 

                   'inline_js' => ';(function ($, upb) {
                   	  
 					 $("."+upb.attributes.design).trigger("destroy.owl.carousel");
                     $("."+upb.attributes.design).owlCarousel({
				      	 
				      	items: 5,
				        loop: true,
				        margin: 0,
				        nav:false,
				        autoplay: true,
  					});
 
                }(jQuery, _UPB_PREVIEW_DATA[upbComponentId]));',

                    //'inline_js' => 'console.log( upbComponentId );',
                ),
                'shortcode' => array(
                    //'css' => upb_templates_uri( 'preview-css/sections.css' ),
                    //'js'  => upb_templates_uri( 'preview-js/sections.js' ),
                )
            )


    	);

    $element->register( 't16-carousel', $attributes, $contents, $_upb_options );
	 
});





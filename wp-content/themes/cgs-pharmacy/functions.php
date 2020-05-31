<?php
if ( ! function_exists( 'cgs_pharmacy_setup' ) ) :
	function cgs_pharmacy_setup(){
        require get_template_directory() . '/includes/about-themes.php';
        require_once get_template_directory() . '/includes/bs4navwalker.php';
        require get_template_directory() . '/includes/customizer.php';
        require get_template_directory() . '/includes/bs4shortcodes.php';
        require get_template_directory() . '/includes/tgmp/class-tgm-plugin-activation.php';
        require_once get_template_directory() . '/includes/metaboxes.php';
        require get_template_directory() . '/includes/class_cgs_themes_admin_importer.php';

        if ( ! isset( $content_width ) ) {
            $content_width = 725;
        }

        add_theme_support( 'woocommerce' );
        add_theme_support( 'bbpress' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

        add_theme_support( 'custom-background', apply_filters( 'basic_custom_background_args', array( 'default-color' => 'ffffff' ) ) );
        add_theme_support( 'custom-header', array(
            'width'       => 1080,
            'height'      => 190,
            'flex-height' => true,
            'flex-width' => true,
        ) );
        add_image_size( 'img_348_201', 348, 201, true );

        $args = array();
        $lpos = esc_html(get_theme_mod( 'display_logo_and_title' ));
        if ( false === $lpos || 'image' == $lpos ) {
            $args['header-text'] = array( 'blog-name' );
        }
        add_theme_support( 'custom-logo', $args );

        load_theme_textdomain( 'cgs-pharmacy', get_template_directory() . '/languages' );

		register_nav_menus( array(
			'primary'    	=> __( 'Main Menu', 'cgs-pharmacy' ),
			'footer_menu'   => __('Footer Menu', 'cgs-pharmacy')
		) );
		/* translators: %s: search term */
		register_sidebar( array(
			'name' => __('Footer Widget 1', 'cgs-pharmacy'),
			'id' => 'footer-widget-1',
			'before_widget' => '<div id="%1$s" class="widget_box cgs_widget_box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="side_title">',
			'after_title' => '</h3>',
		) );
		/* translators: %s: search term */
		register_sidebar( array(
			'name' => __('Footer Widget 2', 'cgs-pharmacy'),
			'id' => 'footer-widget-2',
			'before_widget' => '<div id="%1$s" class="widget_box cgs_widget_box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="side_title">',
			'after_title' => '</h3>',
		) );
		/* translators: %s: search term */
		register_sidebar( array(
			'name' => __('Footer Widget 3', 'cgs-pharmacy'),
			'id' => 'footer-widget-3',
			'before_widget' => '<div id="%1$s" class="widget_box cgs_widget_box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="side_title">',
			'after_title' => '</h3>',
		) );
		/* translators: %s: search term */
		register_sidebar( array(
			'name' => __('Contant Page Sidebar', 'cgs-pharmacy'),
			'id' => 'contact-page-sidebar',
			'before_widget' => '<div id="%1$s" class="widget_box cgs_widget_box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="side_title">',
			'after_title' => '</h3>',
		) );
		/* translators: %s: search term */
		register_sidebar( array(
			'name' => __('Primary Sidebar', 'cgs-pharmacy'),
			'id' => 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget_box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="side_title">',
			'after_title' => '</h3>',
		) );
	}
endif;
add_action( 'after_setup_theme', 'cgs_pharmacy_setup' );
add_action( 'tgmpa_register', 'cgs_pharmacy_require_plugins' );
function cgs_pharmacy_require_plugins(){
	$config = array(
		'id'           => 'cgs-fashion-trend-tgmpa', // your unique TGMPA ID
		'default_path' => get_stylesheet_directory() . '/includes/plugins/', // default absolute path
		'menu'         => 'cgs-fashion-trend-require-plugins', // menu slug
		'has_notices'  => true, // Show admin notices
		'dismissable'  => false, // the notices are NOT dismissable
		'dismiss_msg'  => '', // this message will be output at top of nag
		'is_automatic' => true, // automatically activate plugins after installation
		'message'      => '<!--Hey there.-->', // message to output right before the plugins table
		'strings'      => array() // The array of message strings that TGM Plugin Activation uses
	);

	$plugins = array(
		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'required'           => true, // this plugin is required
			'force_activation'   => true, // this plugin is going to stay activated unless the user switches to another theme
		),
		array(
			'name'               => 'Easy Google Fonts',
			'slug'               => 'easy-google-fonts',
			'required'           => true, // this plugin is required
			'force_activation'   => true, // this plugin is going to stay activated unless the user switches to another theme
		),
		array(
			'name'               => 'Newsletter',
			'slug'               => 'newsletter',
			'required'           => true, // this plugin is required
			'force_activation'   => true, // this plugin is going to stay activated unless the user switches to another theme
		),
		array(
			'name'               => 'Smart Slider 3',
			'slug'               => 'smart-slider-3',
			'required'           => false, // this plugin is required
			'force_activation'   => false, // this plugin is going to stay activated unless the user switches to another theme
		),
	);
	tgmpa( $plugins, $config );
}

function cgs_pharmacy_enqueue_scripts() {
	wp_enqueue_style( 'cgs-fashion-trend-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Open+Sans:400,600,700&display=swap', array(), true );
	wp_enqueue_style( 'cgs-fashion-trend-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), true );
    wp_enqueue_style( 'cgs-fashion-trend-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), true );
	wp_enqueue_style( 'cgs-fashion-trend-infinite-slider-style', get_stylesheet_directory_uri() . '/assets/css/infinite-slider.css');
	wp_enqueue_style( 'cgs-fashion-trend-bxslider', get_stylesheet_directory_uri() . '/assets/css/jquery.bxslider.min.css');
    wp_enqueue_style( 'cgs-fashion-trend-style', get_stylesheet_uri(), array(), true );

    wp_enqueue_script( 'cgs-fashion-trend-html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', false, '3.7.3', true );
    wp_script_add_data( 'cgs-fashion-trend-html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'cgs-fashion-trend-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'cgs-fashion-trend-slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'cgs-fashion-trend-bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'cgs-fashion-trend-bootstrap-masonry', get_template_directory_uri() . '/assets/js/bootstrap4.masonry.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'cgs-fashion-trend-parallax-min-js', get_template_directory_uri() . '/assets/js/parallax.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'cgs-fashion-trend-themescript', get_template_directory_uri() . '/assets/js/themescript.js', array( 'jquery' ), true, true );
}
add_action( 'wp_enqueue_scripts', 'cgs_pharmacy_enqueue_scripts' );

add_action( 'init', 'cgs_create_post_type' );
function cgs_create_post_type() {
	$our_team_labels = array(
		'name' => esc_html__('Our Team', 'cgs-pharmacy'),
		'singular_name' => esc_html__('Our Team', 'cgs-pharmacy'),
		'add_new' => esc_html__('Add New', 'cgs-pharmacy'),
		'add_new_item' => esc_html__('Add New Team', 'cgs-pharmacy'),
		'edit_item' => esc_html__('Edit Team', 'cgs-pharmacy'),
		'new_item' => esc_html__('New Team', 'cgs-pharmacy'),
		'view_item' => esc_html__('View Team', 'cgs-pharmacy'),
		'search_items' => esc_html__('Search Team', 'cgs-pharmacy'),
		'not_found' => esc_html__('Nothing found', 'cgs-pharmacy'),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', 'cgs-pharmacy'),
		'parent_item_colon' => ''
	);
	$our_team_args = array(
		'labels' => $our_team_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'cgs-our-team' , $our_team_args );

	$our_clients_labels = array(
		'name' => esc_html__('Our Clients', 'cgs-pharmacy'),
		'singular_name' => esc_html__('Our Client', 'cgs-pharmacy'),
		'add_new' => esc_html__('Add Client', 'cgs-pharmacy'),
		'add_new_item' => esc_html__('Add New Client', 'cgs-pharmacy'),
		'edit_item' => esc_html__('Edit Client', 'cgs-pharmacy'),
		'new_item' => esc_html__('New Client', 'cgs-pharmacy'),
		'view_item' => esc_html__('View Client', 'cgs-pharmacy'),
		'search_items' => esc_html__('Search Client', 'cgs-pharmacy'),
		'not_found' => esc_html__('Nothing found', 'cgs-pharmacy'),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', 'cgs-pharmacy'),
		'parent_item_colon' => ''
	);
	$our_clients_args = array(
		'labels' => $our_clients_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'cgs-our-clients' , $our_clients_args );

	$testimonial_labels = array(
		'name' => esc_html__('Testimonials', 'cgs-pharmacy'),
		'singular_name' => esc_html__('Testimonial', 'cgs-pharmacy'),
		'add_new' => esc_html__('Add New', 'cgs-pharmacy'),
		'add_new_item' => esc_html__('Add New Testimonial', 'cgs-pharmacy'),
		'edit_item' => esc_html__('Edit Testimonial', 'cgs-pharmacy'),
		'new_item' => esc_html__('New Testimonial', 'cgs-pharmacy'),
		'view_item' => esc_html__('View Testimonial', 'cgs-pharmacy'),
		'search_items' => esc_html__('Search Testimonial', 'cgs-pharmacy'),
		'not_found' => esc_html__('Nothing found', 'cgs-pharmacy'),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', 'cgs-pharmacy'),
		'parent_item_colon' => ''
	);
	$testimonial_args = array(
		'labels' => $testimonial_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type( 'cgs-testimonials' , $testimonial_args );

	$services_labels = array(
		'name' => esc_html__('Services', 'cgs-pharmacy'),
		'singular_name' => esc_html__('Service', 'cgs-pharmacy'),
		'add_new' => esc_html__('Add New', 'cgs-pharmacy'),
		'add_new_item' => esc_html__('Add New Service', 'cgs-pharmacy'),
		'edit_item' => esc_html__('Edit Service', 'cgs-pharmacy'),
		'new_item' => esc_html__('New Service', 'cgs-pharmacy'),
		'view_item' => esc_html__('View Service', 'cgs-pharmacy'),
		'search_items' => esc_html__('Search Service', 'cgs-pharmacy'),
		'not_found' => esc_html__('Nothing found', 'cgs-pharmacy'),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', 'cgs-pharmacy'),
		'parent_item_colon' => ''
	);
	$services_args = array(
		'labels' => $services_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	);
	register_post_type( 'cgs-services' , $services_args );

	$cgs_pricing_table_labels = array(
		'name' => esc_html__('Pricing Table', 'cgs-pharmacy'),
		'singular_name' => esc_html__('Pricing Table', 'cgs-pharmacy'),
		'add_new' => esc_html__('Add New', 'cgs-pharmacy'),
		'add_new_item' => esc_html__('Add New Pricing Table', 'cgs-pharmacy'),
		'edit_item' => esc_html__('Edit Pricing Table', 'cgs-pharmacy'),
		'new_item' => esc_html__('New Pricing Table', 'cgs-pharmacy'),
		'view_item' => esc_html__('View Pricing Table', 'cgs-pharmacy'),
		'search_items' => esc_html__('Search Pricing Table', 'cgs-pharmacy'),
		'not_found' => esc_html__('Nothing found', 'cgs-pharmacy'),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', 'cgs-pharmacy'),
		'parent_item_colon' => ''
	);
	$cgs_pricing_table_args = array(
		'labels' => $cgs_pricing_table_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	);
	register_post_type( 'cgs-pricing-table' , $cgs_pricing_table_args );
}

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

add_action('admin_enqueue_scripts', 'cgs_pharmacy_admin_theme_style');
function cgs_pharmacy_admin_theme_style() {
    wp_enqueue_style('cgs-theme-admin-style', get_template_directory_uri() . '/assets/css/admin_style.css');
}
add_action( 'admin_init', function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );
add_filter( 'woocommerce_helper_suppress_admin_notices', 'filter_function_name_3027' );
function filter_function_name_3027( $false ){
	return $false;
}
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', 'wc_subscriber_auto_redirect', 20, 1 );
function wc_subscriber_auto_redirect( $boolean ) {
	return true;
}
function iap_wc_bootstrap_form_field_args ($args, $key, $value) {
	$args['input_class'][] = 'form-control';
	return $args;
}
add_filter('woocommerce_form_field_args','iap_wc_bootstrap_form_field_args', 10, 3);

//add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
//add_action( 'wp_head', 'dcwd_cart_count_styles' );
//add_filter( 'wp_nav_menu_main-menu_items', 'am_append_cart_icon', 10, 2 );

function iconic_cart_count_fragments( $fragments ) {
    $fragments['li.cart'] = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-bag"></i>'.WC()->cart->get_cart_contents_count().'</a></li>';
    return $fragments;
}
function dcwd_cart_count_styles() {
    ?>
    <style>
        #menu-main-menu .cart { position: relative; }
        #menu-main-menu .count { background: #666; color: #fff; border-radius: 2em; height: 18px; line-height: 18px; position: absolute; right: 5px; text-align: center; top: 75%; transform: translateY(-100%) translateX(15%); width: 18px; }
    </style>
    <?php
}
function am_append_cart_icon( $items, $args ) {
    $cart_item_count = WC()->cart->get_cart_contents_count();
    $cart_count_span = '';
    if ( $cart_item_count ) {
        $cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
    }
    $cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a></li>';
    // Add the cart link to the end of the menu.
    $items = $items . $cart_link;
    return $items;
}
function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
} 

add_action('admin_menu', 'wpso_custom_links_admin_menu');
function wpso_custom_links_admin_menu() {
    global $submenu;
    $submenu['index.php'][] = array( 'Contact us', 'read', 'http://localhost/newsite/wordpress/wp-admin/admin.php?page=formidable-entries&form=4&frm_action=list&_wpnonce=3c3347c983&_wp_http_referer&paged=1' );

    $submenu['index.php'][] = array( 'Refill request', 'read', 'http://localhost/newsite/wordpress/wp-admin/admin.php?page=formidable-entries&form=3&frm_action=list&_wpnonce=3c3347c983&_wp_http_referer&paged=1' );

    $submenu['index.php'][] = array( 'Transfer Prescription', 'read', 'http://localhost/newsite/wordpress/wp-admin/admin.php?page=formidable-entries&form=2&frm_action=list&_wpnonce=3c3347c983&_wp_http_referer&paged=1' );
}
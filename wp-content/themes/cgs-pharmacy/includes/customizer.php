<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';
require get_template_directory() . '/includes/Cgs_Themes_Customizer_Image_Radio_Control.php';
function cgs_pharmacy_customize_register( $wp_customize ) {
	/* Primary Color */
	$wp_customize->add_setting( 'cgs_pharmacy_primary_color', array(
		'default'   => '#2ea3f2',
		'transport' => 'refresh',
		'sanitize_callback'  => 'sanitize_hex_color'
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,'cgs_pharmacy_primary_color',array(
				'label' => __('Primary Color', 'cgs-pharmacy'),
				'section' => 'colors',
				'settings' => 'cgs_pharmacy_primary_color',
				'priority' => 1,
			)
		)
	);

	/* H1, H2, H3, H4, H5, H6 Tag Color */
	$wp_customize->add_setting( 'cgs_pharmacy_header_color', array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback'  => 'sanitize_hex_color'
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,'cgs_pharmacy_header_color',array(
				'label' => __('H1, H2, H3, H4, H5, H6 Tag Color', 'cgs-pharmacy'),
				'section' => 'colors',
				'settings' => 'cgs_pharmacy_header_color',
				'priority' => 1,
			)
		)
	);

	/* p tag Color */
	$wp_customize->add_setting( 'cgs_pharmacy_p_color', array(
		'default'   => '#948d8d',
		'transport' => 'refresh',
		'sanitize_callback'  => 'sanitize_hex_color'
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,'cgs_pharmacy_p_color',array(
				'label' => __('P Tag Color', 'cgs-pharmacy'),
				'section' => 'colors',
				'settings' => 'cgs_pharmacy_p_color',
				'priority' => 1,
			)
		)
	);

    $wp_customize->add_setting( 'cgs_pharmacy_banner_setting', array(
		'sanitize_callback'  => 'sanitize_text_field',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_banner_text',array(
				'label' => __('Banner Text Heading', 'cgs-pharmacy'),
				'section' => 'header_image',
				'settings' => 'cgs_pharmacy_banner_setting',
				'type' => 'text',
				'priority' => 30,
			)
		)
	);
	
	$wp_customize->add_setting( 'cgs_pharmacy_banner_setting2', array(
		'sanitize_callback'  => 'sanitize_text_field',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_banner_text2',array(
				'label' => __('Banner Text content', 'cgs-pharmacy'),
				'section' => 'header_image',
				'settings' => 'cgs_pharmacy_banner_setting2',
				'type' => 'text',
				'priority' => 30,
			)
		)
	);

	$wp_customize->add_setting( 'cgs_pharmacy_slider_setting', array(
		'sanitize_callback'  => 'sanitize_text_field',
		'type'              => 'theme_mod',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_slider_shortcode',array(
				'label' => __('Slider Shortcode', 'cgs-pharmacy'),
				'section' => 'header_image',
				'settings' => 'cgs_pharmacy_slider_setting',
				'type' => 'text',
				'priority' => 30,
			)
		)
	);

	/* Footer Copyright */
	$wp_customize->add_section( 'cgs_pharmacy_section_footer_copyright', array(
		'priority'          => 505,
		'title'             => esc_html__( 'Footer Copyright', 'cgs-pharmacy' ),
	) );
	$wp_customize->add_setting( 'cgs_pharmacy_setting_footer_copyright', array(
		'default'           => '',
		'type'              => 'theme_mod',
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		//'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_control_footer_copyright',array(
				'label' => esc_html__('Footer Copyright Text', 'cgs-pharmacy'),
				'section' => 'cgs_pharmacy_section_footer_copyright',
				'settings' => 'cgs_pharmacy_setting_footer_copyright',
				'type' => 'textarea',
				'priority' => 1
			)
		)
	);

	/* Social Icons */
	/*$wp_customize->add_section( 'cgs_pharmacy_section_social_icons', array(
		'priority'          => 505,
		'title'             => esc_html__( 'Social Icons', 'cgs-pharmacy' ),
	) );
	$wp_customize->add_setting( 'cgs_pharmacy_setting_social_icons_facebook', array(
		'default'           => '#',
		'type'              => 'theme_mod',
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_control_social_icons_facebook',array(
				'label' => esc_html__('Facebook', 'cgs-pharmacy'),
				'section' => 'cgs_pharmacy_section_social_icons',
				'settings' => 'cgs_pharmacy_setting_social_icons_facebook',
				'type' => 'text',
				'priority' => 1
			)
		)
	);
	$wp_customize->add_setting( 'cgs_pharmacy_setting_social_icons_twitter', array(
		'default'           => '#',
		'type'              => 'theme_mod',
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_control_social_icons_twitter',array(
				'label' => esc_html__('Twitter', 'cgs-pharmacy'),
				'section' => 'cgs_pharmacy_section_social_icons',
				'settings' => 'cgs_pharmacy_setting_social_icons_twitter',
				'type' => 'text',
				'priority' => 1
			)
		)
	);
	$wp_customize->add_setting( 'cgs_pharmacy_setting_social_icons_linkedin', array(
		'default'           => '#',
		'type'              => 'theme_mod',
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_control_social_icons_linkedin',array(
				'label' => esc_html__('LinkedIn', 'cgs-pharmacy'),
				'section' => 'cgs_pharmacy_section_social_icons',
				'settings' => 'cgs_pharmacy_setting_social_icons_linkedin',
				'type' => 'text',
				'priority' => 1
			)
		)
	);
	$wp_customize->add_setting( 'cgs_pharmacy_setting_social_icons_pinterest', array(
		'default'           => '#',
		'type'              => 'theme_mod',
		'transport'         => 'refresh',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => '',
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,'cgs_pharmacy_control_social_icons_pinterest',array(
				'label' => esc_html__('Pinterest', 'cgs-pharmacy'),
				'section' => 'cgs_pharmacy_section_social_icons',
				'settings' => 'cgs_pharmacy_setting_social_icons_pinterest',
				'type' => 'text',
				'priority' => 1
			)
		)
	);*/
	function cgs_pharmacy_select_sanitize( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	/* Customizer "Header Layout" */
	$wp_customize->add_panel( 'cgs_pharmacy_design_options', array(
		'capabitity' => 'edit_theme_options',
		'priority'   => 505,
		'title'      => esc_html__( 'Header Layout', 'cgs-pharmacy' ),
	) );
	$wp_customize->add_section( 'cgs_pharmacy_header_layout_setting', array(
		'priority' => 1,
		'title'    => esc_html__( 'Default layout', 'cgs-pharmacy' ),
		'panel'    => 'cgs_pharmacy_design_options',
	) );
	$wp_customize->add_setting( 'cgs_pharmacy_header_default_layout', array(
		'default'           => 'style_1',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cgs_pharmacy_select_sanitize',
	) );
	$wp_customize->add_control( new Cgs_Themes_Customizer_Image_Radio_Control( $wp_customize,'cgs_pharmacy_header_default_layout', array(
		'type'     => 'radio',
		'label'    => esc_html__( 'Select default layout for header.', 'cgs-pharmacy' ),
		'section'  => 'cgs_pharmacy_header_layout_setting',
		'settings' => 'cgs_pharmacy_header_default_layout',
		'choices'  => array(
			'style_1' => get_template_directory_uri(). '/includes/img/style_1.jpg',
			'style_2' => get_template_directory_uri(). '/includes/img/style_2.jpg',
			'style_3' => get_template_directory_uri(). '/includes/img/style_3.jpg',
		),
	) ) );
}
add_action( 'customize_register', 'cgs_pharmacy_customize_register' );

function cgs_pharmacy_custom_css() {
	?>
	<style>
		<?php
		// Primary Color
		$cgs_pharmacy_primary_color = get_theme_mod('cgs_pharmacy_primary_color');
		$cgs_pharmacy_header_color = get_theme_mod('cgs_pharmacy_header_color');
		$cgs_pharmacy_p_color = get_theme_mod('cgs_pharmacy_p_color');
		$cgs_pharmacy_background_color = get_theme_mod('background_color');

		if(!empty($cgs_pharmacy_primary_color)){
			echo 'a{color: '.esc_html($cgs_pharmacy_primary_color).';} input[type="submit"]{ background: '.esc_html($cgs_pharmacy_primary_color).' !important; border: 1px solid '.esc_html($cgs_pharmacy_primary_color).' !important;color: #FFFFFF;border-radius: 3px;} input[type="submit"]{border: none; border-radius: 4px; padding: 5px 15px; color: #FFF;background:'.$cgs_pharmacy_primary_color.';} input[type="submit"]:hover{opacity:0.8;} .bx-pager-link.active{background: '.esc_html($cgs_pharmacy_primary_color).' !important;} .short-post-meta{color: '.esc_html($cgs_pharmacy_primary_color).' !important;}';
		}
		if(!empty($cgs_pharmacy_header_color)){
			echo 'h1{color: '.esc_html($cgs_pharmacy_header_color).' !important;} h2{color: '.esc_html($cgs_pharmacy_header_color).' !important;} h3{color: '.esc_html($cgs_pharmacy_header_color).' !important;} h4{color: '.esc_html($cgs_pharmacy_header_color).' !important;} h5{color: '.esc_html($cgs_pharmacy_header_color).' !important;} h6{color: '.esc_html($cgs_pharmacy_header_color).' !important;}';
		}
		if(!empty($cgs_pharmacy_p_color)){
			echo 'p{color: '.esc_html($cgs_pharmacy_p_color).' !important;} .post-content p, .search-results p, .main-content-wrapper p{color: '.esc_html($cgs_pharmacy_p_color).' !important;} .post-content li{color: '.esc_html($cgs_pharmacy_p_color).' !important;}';
		}
		if(!empty($cgs_pharmacy_background_color)){
			echo 'body{background:#'.esc_html($cgs_pharmacy_background_color).' !important;}.main-content-wrapper{background:#'.esc_html($cgs_pharmacy_background_color).' !important;}';
		}
		if (display_header_text()==true){
			echo '.header-wrapper ul.menu{padding: 10px 0 0 0};';
		}
		?>
	</style>
	<?php
}
add_action('wp_head', 'cgs_pharmacy_custom_css');

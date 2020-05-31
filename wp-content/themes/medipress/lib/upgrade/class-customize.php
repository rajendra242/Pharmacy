<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class medipress_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/lib/upgrade/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'medipress_Customize_Section_Pro' );

		 
	 
		// upgrade sections.
		$manager->add_section(
			new medipress_Customize_Section_Pro(
				$manager,
				'upgrade-pro',
				array(
					'title'    => esc_html__( 'Upgrade To Pro', 'medipress'),
					'pro_text' => esc_html__( 'View Pro', 'medipress'),
					'pro_url'  => 'https://digitaltemplatemarket.com/items/medicorp-premium-wordpress-theme/',
					'priority'  => 2
				)
			)
		);
		
		// upgrade sections.
		$manager->add_section(
			new medipress_Customize_Section_Pro(
				$manager,
				'upgrade-pross',
				array(
					'title'    => esc_html__( 'More Detail', 'medipress'),
					'pro_text' => esc_html__( 'View', 'medipress'),
					'pro_url'  => 'http://digitaltemplatemarket.com/wp/medicorp-pro/',
					'priority'  => 500
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'medipress-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'medipress-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/upgrade/customize-controls.css' );
	}
}

// Doing this customizer thang!
medipress_Customize::get_instance();
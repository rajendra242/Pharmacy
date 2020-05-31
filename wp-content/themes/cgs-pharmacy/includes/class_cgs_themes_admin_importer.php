<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'class_cgs_themes_admin_importer' ) ) {
    class class_cgs_themes_admin_importer {
        public function __construct() {
	        add_action( 'after_switch_theme', array( $this,'cgs_theme_deactivate') );
            add_action( 'wp_loaded', array( $this, 'cgs_themes_admin_notice' ) );
            add_action( 'wp_loaded', array( $this, 'cgs_themes_hide_notices' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'cgs_themes_ajax_enqueue_scripts' ) );
            add_action( 'wp_ajax_get_started_import_site', array( $this, 'cgs_themes_ajax_import_button_handler' ) );
        }
        public function cgs_theme_deactivate(){
            $successfully_imported = get_option('successfully_imported');
            if($successfully_imported == 1 || empty($successfully_imported)){
                update_option('successfully_imported', 0);   
            }
        }
        public function cgs_themes_admin_notice(){
            $notice_nag = get_option( 'welcome_notice_hide_welcome' );
            if ( ! $notice_nag ) {
                add_action( 'admin_notices', array( $this, 'cgs_themes_welcome_notice' ) );
            }
        }
        public function cgs_themes_welcome_notice(){
	        $successfully_imported = get_option('successfully_imported');
            ?>
            <div class="admin_welcome_notice">
                <a class="admin_welcome_notice_close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'admin-welcome-notice-hide-notice', 'welcome' ) ), 'admin_welcome_notice_hide_notices_nonce', 'admin_welcome_notice_nonce' ) ); ?>">
                    <?php esc_html_e( 'Dismiss', 'cgs-pharmacy' ); ?>
                </a>
                <div class="notice_logo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/includes/img/cgs-logo.png"></div>
            <?php if($successfully_imported == 0){ ?>
                <p>
                    <?php /* translators: 1: Anchor tag start, 2: Anchor tag end. */ ?>
                    <?php $arg_1 = '<a href="' . esc_url( admin_url( 'themes.php?page=cgs-yoga-studio-about' ) ) . '">Welcome Page</a>'; ?>
                    <?php esc_html(printf( 'Welcome! Thank you for choosing CGS Theme! Please visit our %1$s to take full advantage of our theme can offer.', $arg_1), 'cgs-pharmacy'); ?>
                </p>
                <p><?php esc_html_e('Clicking the button below will install and activate the demo importer plugin.', 'cgs-pharmacy'); ?></p>
                <p><?php esc_html_e('Please take a backup of your existing website before running importer plugin. It may remove your existing pages.', 'cgs-pharmacy'); ?></p>
                <div class="spacer"></div>
                <p class="loading"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/includes/img/loading1.gif"></p>
                <p><a href="#" id="get_started" class="button button-primary"><?php esc_html_e('Get started with demo importer', 'cgs-pharmacy'); ?></a></p>
            <?php } else { ?>
                <p><?php esc_html_e('Demo data has been imported successfully. Please click below for live preview.', 'cgs-pharmacy'); ?></p>
                <p><a href="<?php echo home_url(); ?>" class="button button-primary" target="_blank"><?php esc_html_e('Live Preview', 'cgs-pharmacy'); ?></a></p>
            <?php } ?>
            </div>
            <?php
        }
        public function cgs_themes_hide_notices(){
            if ( isset( $_GET['admin-welcome-notice-hide-notice'] ) && isset( $_GET['admin_welcome_notice_nonce'] ) ) {
                if ( ! current_user_can( 'manage_options' ) ) {
                    wp_die( esc_html_e( 'Cheatin&#8217; huh?', 'cgs-pharmacy' ) );
                }

                $hide_notice = sanitize_text_field( wp_unslash($_GET['admin-welcome-notice-hide-notice']));
                //update_option( 'welcome_notice_hide_' . $hide_notice, 1 );

                // Hide.
                if ( 'welcome' === $_GET['admin-welcome-notice-hide-notice'] ) {
                    //update_option( 'welcome_notice_hide_' . $hide_notice, 1 );
                } else { // Show.
                    //delete_option( 'welcome_notice_hide_' . $hide_notice );
                }
            }
        }
        public function cgs_themes_ajax_enqueue_scripts(){
            wp_enqueue_script( 'cgs-admin-js', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'));
            wp_localize_script( 'cgs-admin-js', 'cgsadminajax_obj', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
        }
        
        public function cgs_themes_ajax_import_button_handler(){
            $result = '';
            $state = '';
            
            wp_enqueue_script( 'plugin-install' );

            /**
             * Install Plugin.
             */
            load_template(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
            load_template(ABSPATH . 'wp-admin/includes/plugin-install.php');

            $api = plugins_api( 'plugin_information', array(
                'slug'   => sanitize_key( wp_unslash( 'wordpress-importer' ) ),
                'fields' => array(
                    'sections' => false,
                ),
                'external' => true
            ) );

            
            $skin     = new WP_Ajax_Upgrader_Skin();
            $upgrader = new Plugin_Upgrader( $skin );
            
            // install Elementor plugin
			
            if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
                if ( !is_plugin_active( 'elementor/elementor.php' ) ) {
                    activate_plugin('elementor/elementor.php');
                }
            } else {
                $plugin_zip = 'https://downloads.wordpress.org/plugin/elementor.latest-stable.zip';
                $result = $upgrader->install($plugin_zip);
                activate_plugin('elementor/elementor.php'); 
            }

            // install Woocommercce plugin

            if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
                if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                    activate_plugin('woocommerce/woocommerce.php');
                }
            } else {
                $plugin_zip = 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip';
                $result = $upgrader->install($plugin_zip);
                activate_plugin('woocommerce/woocommerce.php');
            }

            /*#############################*/
            // install Newsletter plugin
       
            if ( file_exists( WP_PLUGIN_DIR . '/newsletter/plugin.php' ) ) {
                if ( !is_plugin_active( 'newsletter/plugin.php' ) ) {
                    activate_plugin('newsletter/plugin.php');
                }
            } else {
                $plugin_zip = 'https://github.com/gitCGSThmes/free_themes/raw/master/custom_newsletter.zip';
                $result = $upgrader->install($plugin_zip);
                activate_plugin('newsletter/plugin.php'); 
            }

            /*#############################*/
            // install Bootstrap plugin
            
            if ( file_exists( WP_PLUGIN_DIR . '/bootstrap-3-shortcodes/bootstrap-shortcodes.php' ) ) {
                if ( !is_plugin_active( 'bootstrap-3-shortcodes/bootstrap-shortcodes.php' ) ) {
                    activate_plugin('bootstrap-3-shortcodes/bootstrap-shortcodes.php');
                }
            } else {
                $plugin_zip = 'https://downloads.wordpress.org/plugin/bootstrap-3-shortcodes.latest-stable.zip';
                $result = $upgrader->install($plugin_zip);
                activate_plugin('bootstrap-3-shortcodes/bootstrap-shortcodes.php'); 
            }

            /*#############################*/
            
            if ( file_exists( WP_PLUGIN_DIR . '/contact-form-7/wp-contact-form-7.php' ) ) {
                if ( !is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
                    activate_plugin('contact-form-7/wp-contact-form-7.php');
                }
            } else {
                $plugin_zip = 'https://downloads.wordpress.org/plugin/contact-form-7.latest-stable.zip';
                $result = $upgrader->install($plugin_zip);
                activate_plugin('contact-form-7/wp-contact-form-7.php'); 
            }

            $response['result'] = $result;
            
            if ( is_wp_error( $result ) ) {
                $response['errorCode']    = $result->get_error_code();
                $response['errorMessage'] = $result->get_error_message();
            } else {
                $post_args = array(
            		'post_type' => 'any',
            		'post_status' => 'any',
            		'posts_per_page' => -1
            	);
            
            	$post_data = new WP_Query($post_args);
            	while($post_data->have_posts()) : $post_data->the_post();
            		wp_delete_post(get_the_ID(), true);
            	endwhile;
            	wp_reset_postdata();
            	
            	$terms = get_terms( array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ) );
            
                foreach($terms as $term){
                    wp_delete_category($term->term_id);
                }
            	
            	$locations = get_theme_mod( 'nav_menu_locations' );
            	if(!empty($locations)){
            	    foreach($locations as $location_id){
            		    wp_delete_nav_menu($location_id);
                    }
                }
                /*#################################*/
                require_once ABSPATH . 'wp-admin/includes/import.php';
                require_once ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                include_once TEMPLATEPATH.'/includes/importer/class-wxr-importer.php';
                include_once TEMPLATEPATH.'/includes/importer/class-wxr-parsers.php';

                $import_status = get_option('import_status');
                
                $import_file = 'https://github.com/gitCGSThmes/data/raw/master/pharmacy/site-data.zip';
                
                $current_theme = wp_get_theme();
                $local_file = $current_theme->theme_root . '/site-data.zip';
                
                $copy = copy( $import_file, $local_file );
    			if ( ! $copy ) {
    				echo "Doh! failed to copy file...\n";
    			} else {
    				$path = pathinfo( realpath( $local_file ), PATHINFO_DIRNAME );
    				//print_r($path);
    				$zip = new ZipArchive;
    				$res = $zip->open( $local_file );
    				if ( $res === true ) {
    					$zip->extractTo( $path );
    					$zip->close();
    					//update_option( 'stylesheet', 'cgs-lite' );
    					//unlink($local_file) or die("Couldn't delete file");
    				} else {
    					echo "Doh! I couldn't open $local_file";
    				}
    			}
    			
    			$xml_path = ABSPATH.'wp-content/themes/site-data.xml';

                $wp_import = new TG_WXR_Importer();
                $wp_import->fetch_attachments = true;
                ob_start();
                $response = $wp_import->import( $xml_path );
                ob_end_clean();
                flush_rewrite_rules();
                
    			$customizer_file = ABSPATH.'wp-content/themes/customizer-data.dat';
                
                $data = maybe_unserialize( file_get_contents( $customizer_file ) );
        		if (!is_array($data) && (!isset($data['template']) || !isset($data['mods']))){
        			echo 'The customizer import file is not in a correct format. Please make sure to use the correct customizer import file.';
        		}
        		
        		// Use a static front page
                $home = get_page_by_title( 'Home' );
                update_option( 'page_on_front', $home->ID );
                update_option( 'show_on_front', 'page' );
        		
        		// If wp_css is set then import it.
        		if(isset($data['wp_css']) && !empty($data['wp_css'])){
        			wp_update_custom_css_post( $data['wp_css'] );
        		}
        		
        		// Loop through theme mods and update them.
        		if (!empty($data['mods'])) {
        			foreach ( $data['mods'] as $key => $value ) {
        				set_theme_mod( $key, $value );
        			}
        		}
        		
        		// Import custom options.
        		if ( isset( $data['options'] ) ) {
        			foreach ( $data['options'] as $key => $value ) {
        				set_theme_mod( $key, $value );
        			}
        		}
        		
        		$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
                $footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
                set_theme_mod( 'nav_menu_locations' , array(
                    'primary'   => $main_menu->term_id,
                    'footer_menu' => $footer_menu->term_id
                ));
                
                	
        		// Import widgets
        		$widget_file = ABSPATH.'wp-content/themes/widgets-data.wie';
    			$widget_data = file_get_contents( $widget_file );
    			if ( ! empty( $widget_data ) ) {
    				$widget_data_object = json_decode( $widget_data, true );
    				foreach ( $widget_data_object as $widget_key => $widget_value ) {
    					$sidebar_id                    = $widget_key;
    					$add_to_sidebar[ $sidebar_id ] = array();
    					foreach ( $widget_value as $key => $value ) {
    						$key         = explode( '-1', $key );
    						$key         = explode( '-2', $key[0] );
    						$key         = explode( '-3', $key[0] );
    						$key         = explode( '-4', $key[0] );
    						$widget_id   = $key[0];
    						$widget_data = $value;
    						$temp_array  = array(
    							'id_base'  => $widget_id,
    							'instance' => $widget_data
    						);
    						array_push( $add_to_sidebar[ $sidebar_id ], $temp_array );
    					}
    				}
    				
    				if ( ! empty( $add_to_sidebar[ $sidebar_id ] ) ) {
    					if(empty($add_to_sidebar)){
                    		return;
                    	}
                    	$sidebar_options = get_option('sidebars_widgets');
                    	$ignore_sidebar_with_content = true;
                    	foreach($add_to_sidebar as $sidebar_id => $widgets){
                    	    if ( ! empty( $sidebar_options[$sidebar_id] ) && $ignore_sidebar_with_content) {
                    			continue;
                    		}
                    		foreach ($widgets as $index => $widget){
                    			$widget_id_base      = $widget['id_base'];
                    			$widget_instance  = $widget['instance'];
                    			$widget_instances = get_option('widget_'.$widget_id_base);
                    			if(!is_array($widget_instances)){
                    				$widget_instances = array();
                    			}
                    			$count = count($widget_instances)+1;
                    			$sidebar_options[$sidebar_id][] = $widget_id_base.'-'.$count;
                    			$widget_instances[$count] = $widget_instance;
                    			//** save widget options
                    			update_option('widget_'.$widget_id_base,$widget_instances);
                    		}
                    		//** save sidebar options:
                    	    update_option('sidebars_widgets',$sidebar_options);
                    	}
    				}
    			}
    			
    			$footer_copyright = 'Copyright © '.date('Y').' <a href="'.home_url().'">CGS Themes</a>. Theme: <a href="https://www.cgsthemes.com/product-category/free-wordpress-themes/" target="_blank">CGS Pharmacy</a> By CGS Themes. Powered by <a href="https://wordpress.org/" target="_blank">WordPress</a>';
                set_theme_mod('cgs_pharmacy_section_footer_copyright', $footer_copyright);
	            update_option('footer_copyright', $footer_copyright);
        		
        		$cart_page_id = get_id_by_slug('cart');
        		update_option('woocommerce_cart_page_id', $cart_page_id);
        		
        		$checkout_page_id = get_id_by_slug('checkout');
        		update_option('woocommerce_checkout_page_id', $checkout_page_id);
        		
        		$myaccount_page_id = get_id_by_slug('my-account');
        		update_option('woocommerce_myaccount_page_id', $myaccount_page_id);
        		
        		/*$terms_page_id = get_id_by_slug();
        		update_option('woocommerce_terms_page_id', $terms_page_id);*/
        		update_option('woocommerce_enable_myaccount_registration', 'yes');

                /*#################################*/
				$tmp = dirname(__FILE__);
	            if (strpos($tmp, '/', 0)!==false) {
		            define('WINDOWS_SERVER', false);
	            } else {
		            define('WINDOWS_SERVER', true);
	            }

	            if (!WINDOWS_SERVER) {
					$import_file = ABSPATH.'wp-content/themes/site-data.zip';
	                $customizer_file = ABSPATH.'wp-content/themes/customizer-data.dat';
	                $widget_file = ABSPATH.'wp-content/themes/widgets-data.wie';
	                $xml_path = ABSPATH.'wp-content/themes/site-data.xml';
					
		            unlink($import_file) or die("Couldn't delete import file");
		            unlink($customizer_file) or die("Couldn't delete customizer file");
		            unlink($widget_file) or die("Couldn't delete widget file");
		            unlink($xml_path) or die("Couldn't delete xml file");
	            }
	            update_option('successfully_imported', 1);
                $response['redirect'] = admin_url( 'edit.php?post_type=page' );
            }

            wp_send_json( $response );
            die();
        }
        
    }
}
return new class_cgs_themes_admin_importer();

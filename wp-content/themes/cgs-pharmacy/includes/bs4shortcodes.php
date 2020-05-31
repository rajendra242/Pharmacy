<?php
// Section
function cgs_section_shortcode( $atts, $content = null ){
	$attribute = extract( shortcode_atts( array(
		'class' => '',
        'style' => '',
        'data_parallax' => '', //scroll
        'data_image_src' => '',
        'data_parallax_text' => '',
        'data_parallax_btn_text' => '',
        'data_parallax_btn_link' => '',
	), $atts ) );

	if(!empty($style)){
	    $cgs_style = ' style="'.$style.'"';
    } else {
		$cgs_style = '';
    }
	if(!empty($data_parallax)){
		$cgs_data_parallax = ' data-parallax="'.$data_parallax.'"';
	} else {
		$cgs_data_parallax = '';
    }
	if(!empty($data_image_src)){
		$cgs_data_image_src = ' data-image-src="'.$data_image_src.'"';
	} else {
		$cgs_data_image_src = '';
    }
	if(!empty($data_parallax_text)){
		$cgs_data_parallax_text = '<p>'.$data_parallax_text.'</p>';
	} else {
		$cgs_data_parallax_text = '';
	}

	$attributes = $cgs_style.$cgs_data_parallax.$cgs_data_image_src;
	if(!empty($data_parallax_text)) {
		$html = '<div class="' . esc_attr( $class ) . '" ' . $attributes . '>' .$cgs_data_parallax_text. '</div>';
	} else {
		$html = '<div class="' . esc_attr( $class ) . '" ' . $attributes . '>' . do_shortcode( $content ) . '</div>';
	}
	return $html;
}
add_shortcode('section', 'cgs_section_shortcode');

// Sub Section
function cgs_subsection_shortcode( $atts, $content = null ){
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );

	$html = '<div class="'. esc_attr($class) .'">' . do_shortcode($content) . '</div>';
	return $html;
}
add_shortcode('sub-section', 'cgs_subsection_shortcode');

function cgs_testimonials_shortcode($atts, $content = null){
	ob_start();
	extract( shortcode_atts( array(
		'title' => '',
	), $atts ) );
	$testimonial_args = array(
		'post_type' => 'cgs-testimonials',
		'post_status' => 'publish',
		'posts_per_page' => 6
	);
	$testimonial_data = new WP_Query($testimonial_args);
	if($testimonial_data->have_posts()){
		$return_string = '<div class="testimonial-wrapper">';
		$return_string .= '<div class="text-align"><h3 style="text-align:center;">'.$title.'</h3></div>';
		$return_string .= '<div class="testimonial-slider">';

		while($testimonial_data->have_posts()) : $testimonial_data->the_post();
			$return_string .= '<div>';
			$return_string .= '<div class="row">';
			$return_string .= '<div class="col-2"></div>';
			$return_string .= '<div class="col-8">';
			$content = apply_filters( 'the_content', get_the_content(), get_the_ID() );
			$return_string .= '<p class="testimonial-content">'.$content.'</p>';
			$testimonial_by = get_post_meta(get_the_ID(), 'testimonial-by', true);
			if(!empty($testimonial_by)){
				$return_string .= '<p class="testimonial-by">'.$testimonial_by.'</p>';
			}
			$testimonial_designation = get_post_meta(get_the_ID(), 'testimonial-designation', true);
			if(!empty($testimonial_designation)){
				$return_string .= '<p class="testimonial-designation">- '.$testimonial_designation.'</p>';
			}
			$return_string .= '</div>';
			$return_string .= '<div class="col-2"></div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		endwhile;
		$return_string .= '</div>';
	$return_string .= '</div>';
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-testimonial', 'cgs_testimonials_shortcode');

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
	return MY_ACF_URL;
}
add_filter('acf/settings/save_json', function() {
	return dirname(__FILE__) . '/acf';
});
add_filter('acf/settings/load_json', function($paths) {
	$paths[] = dirname(__FILE__) . '/acf';
	return $paths;
});

// (Optional) Hide the ACF admin menu item.
/*add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
	return false;
}*/
function cgs_pharmacy_our_clients_shortcode(){
	ob_start();
	$return_string = '';
	$clients_args = array(
		'post_type' => 'cgs-our-clients',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$clients_data = new WP_Query($clients_args);
	if($clients_data->have_posts()){
		$return_string .= '<div class="client-wrapper">';
		$return_string .= '<div class="container">';
		$return_string .= '<div class="text-align"><h2 style="text-align:center;">Our Clients</h2></div>';
		$return_string .= '<section class="customer-logos slider">';
		while($clients_data->have_posts()) : $clients_data->the_post();
			$cgs_pharmacy_client_logo = get_field('cgs_pharmacy_client_logo');
			$cgs_pharmacy_client_url = get_field('cgs_pharmacy_client_url');
			$return_string .= '<div class="slide"><img src="'.$cgs_pharmacy_client_logo.'"></div>';
		endwhile;
		$return_string .= '</section>';
		$return_string .= '</div>';
		$return_string .= '</div>';
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-our-clients', 'cgs_pharmacy_our_clients_shortcode');

function cgs_pharmacy_our_team_shortcode(){
	ob_start();
	$return_string = '';
	$team_args = array(
		'post_type' => 'cgs-our-team',
		'post_status' => 'publish',
		'posts_per_page' => 3
	);
	$team_data = new WP_Query($team_args);
	if($team_data->have_posts()){
		$return_string .= '<div class="team-wrapper">';
		$return_string .= '<div class="container">';
		$return_string .= '<div class="row">';
		while($team_data->have_posts()) : $team_data->the_post();
			$cgs_pharmacy_profile_picture = get_field('cgs_pharmacy_profile_picture');
			$cgs_pharmacy_profile_name = get_field('cgs_pharmacy_profile_name');
		    $cgs_pharmacy_designtion = get_field('cgs_pharmacy_designtion');
		    $cgs_pharmacy_about_team = get_field('cgs_pharmacy_about_team');
		    $facebook_url = get_field('facebook_url');
		    if(empty($facebook_url)){
			    $facebook_url = '#';
		    }
		    $twitter_url = get_field('twitter_url');
			if(empty($twitter_url)){
				$twitter_url = '#';
			}
		    $linkedin_url = get_field('linkedin_url');
			if(empty($linkedin_url)){
				$linkedin_url = '#';
			}
			$return_string .= '<div class="col-md-4">';
			$return_string .= '<div class="team">';
			$return_string .= '<img src="'.$cgs_pharmacy_profile_picture.'" alt="" class="alignnone size-full wp-image-74">';
			$return_string .= '<h4>'.$cgs_pharmacy_profile_name.'</h4>';
		    $return_string .= '<h5>'.$cgs_pharmacy_designtion.'</h5>';
		    if(!empty($cgs_pharmacy_about_team)){
			    $return_string .= '<p>'.$cgs_pharmacy_about_team.'</p>';
		    }
			$return_string .= '<div class="cgs-social-connects">';
			$return_string .= '<ul>';
			$return_string .= '<li>';
			$return_string .= '<a href="'.$facebook_url.'"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
			$return_string .= '</li>';
			$return_string .= '<li>';
			$return_string .= '<a href="'.$twitter_url.'"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
			$return_string .= '</li>';
			$return_string .= '<li>';
			$return_string .= '<a href="'.$linkedin_url.'"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
			$return_string .= '</li>';
			$return_string .= '</ul>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		endwhile;
		$return_string .= '</div>';
		$return_string .= '</div>';
		$return_string .= '</div>';
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-our-team', 'cgs_pharmacy_our_team_shortcode');

function cgs_pharmacy_services_shortcode(){
	ob_start();
	$return_string = '';
	$team_args = array(
		'post_type' => 'cgs-services',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$team_data = new WP_Query($team_args);
	if($team_data->have_posts()){
		$return_string .= '<div class="services-wrapper">';
		$return_string .= '<div class="container">';
		$return_string .= '<div class="row row2">';
		while($team_data->have_posts()) : $team_data->the_post();
			$cgs_pharmacy_service_icon = get_field('cgs_pharmacy_service_icon');
			$cgs_pharmacy_description = get_field('cgs_pharmacy_service_short_description');
			$cgs_pharmacy_service_url = get_field('cgs_pharmacy_service_url');
			$return_string .= '<div class="col-md-3">';
			$return_string .= '<div class="team">';
			if(!empty($cgs_pharmacy_service_icon)){
				$return_string .= '<a href="'.$cgs_pharmacy_service_url.'"><img src="'.$cgs_pharmacy_service_icon.'" alt="" class="alignnone size-full wp-image-74"></a>';
			}
			$return_string .= '<h3>'.get_the_title().'</h3>';
			$return_string .= '<p>'.$cgs_pharmacy_description.'</p>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		endwhile;
		$return_string .= '</div>';
		$return_string .= '</div>';
		$return_string .= '</div>';
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-services', 'cgs_pharmacy_services_shortcode');

function cgs_pharmacy_latest_blog($atts){
	ob_start();
	$return_string = '';
	extract( shortcode_atts( array(
		'blog_style' => '',     // '', 'masonry', 'masonry2', 'fullwide', 'columnview'
		'number_of_posts' => '-1',      // -1 == all posts
		'category_id' => '',      // '' == all category
		'post__not_in' => array(1),
	), $atts ) );

	if(!empty($category_id)){
		$blog_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => array(1),
			'posts_per_page' => $number_of_posts,
			'cat' => $category_id
		);
	} else {
		$blog_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => array(1),
			'posts_per_page' => $number_of_posts
		);
	}

	$blog_data = new WP_Query($blog_args);
	if($blog_style == 'masonry'){
		if($blog_data->have_posts()){
			$return_string .= '<div class="masonry-wrapper">';
			$return_string .= '<div class="container">';
			$return_string .= '<div class="row masonry" data-target=".item" data-col-xs="12" data-col-sm="6" data-col-md="3" data-col-lg="3" data-col-xl="3">';
			while($blog_data->have_posts()) : $blog_data->the_post();
				$return_string .= '<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">';
				$return_string .= '<div class="item">';
				if(has_post_thumbnail()){
					$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'alignleft' ) );
				} else {
					$post_thumbnail = '';
				}
				$return_string .= '<a href="'.get_permalink().'">'.$post_thumbnail.'</a>';

				$return_string .= '<div class="hotels">';
				$return_string .= '<div class="short-post-meta">'.get_the_category_list(', ').' | '.get_the_time('M j, Y').'</div>';
				$return_string .= '<h2>'.get_the_title().'</h2>';
				$return_string .= '<p>'.excerpt(40).'</p>';
				$return_string .= '<div class="readmore"><a href="'.get_permalink().'">Read More &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>';

				$return_string .= '</div>';
				$return_string .= '</div>';
				$return_string .= '</div>';
			endwhile;
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
	} elseif ($blog_style == 'masonry2'){
		if($blog_data->have_posts()){
			$return_string .= '<div class="masonry-wrapper2">';
			$return_string .= '<div class="container">';
			$return_string .= '<div class="masonry2">';
				while($blog_data->have_posts()) : $blog_data->the_post();
					$return_string .= '<div class="item">';
					if(has_post_thumbnail()){
						$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'alignleft' ) );
					} else {
						$post_thumbnail = '';
					}
					$return_string .= '<a href="'.get_permalink().'">'.$post_thumbnail.'</a>';


					$return_string .= '<div class="contentpadding">';
					$return_string .= '<div class="short-post-meta">'.get_the_category_list(', ').' | '.get_the_time('M j, Y').'</div>';
					$return_string .= '<h2>'.get_the_title().'</h2>';
					$return_string .= '<p>'.excerpt(40).'</p>';
					$return_string .= '<div class="readmore"><a href="'.get_permalink().'">Read More &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>';
					$return_string .= '</div>';

					$return_string .= '</div>';
				endwhile;
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
	} elseif($blog_style == 'fullwide') {
		if($blog_data->have_posts()){
			$return_string .= '<div class="latestblog-wrapper3">';
			$return_string .= '<div class="container">';
			$return_string .= '<div class="row">';
			$return_string .= '<div class="col-xl-12">';
			while($blog_data->have_posts()) : $blog_data->the_post();
				$return_string .= '<div class="item">';
				if(has_post_thumbnail()){
					$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'alignleft' ) );
				} else {
					$post_thumbnail = '';
				}
				$return_string .= '<a href="'.get_permalink().'">'.$post_thumbnail.'</a>';


				$return_string .= '<div class="contentpadding">';
				$return_string .= '<div class="short-post-meta">'.get_the_category_list(', ').' | '.get_the_time('M j, Y').'</div>';
				$return_string .= '<h2>'.get_the_title().'</h2>';
				$return_string .= '<p>'.excerpt(80).'</p>';
				$return_string .= '<div class="readmore"><a href="'.get_permalink().'">Read More &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>';
				$return_string .= '</div>';

				$return_string .= '</div>';
			endwhile;
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
	} elseif($blog_style == 'columnview') {
		if($blog_data->have_posts()){
			$return_string .= '<div class="latestblog-wrapper">';
			$return_string .= '<div class="container">';
			$return_string .= '<div class="row">';
			while($blog_data->have_posts()) : $blog_data->the_post();
				if($number_of_posts == 3){
					$return_string .= '<div class="col-xl-4">';
				} else {
					$return_string .= '<div class="col-xl-3">';
				}
				if(has_post_thumbnail()){
					$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'aligncenter' ) );
				} else {
					$post_thumbnail = '';
				}
				$return_string .= '<a href="'.get_permalink().'">'.$post_thumbnail.'</a>';
				$return_string .= '<h5>'.get_the_title().'</h5>';
				$return_string .= '<p>'.excerpt(60).'</p>';
				$return_string .= '</div>';
			endwhile;
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
	} else {
		if($blog_data->have_posts()){
			$return_string .= '<div class="latestblog-wrapper">';
			$return_string .= '<div class="container">';
			$return_string .= '<div class="row row2">';
			$return_string .= '<div class="col-xl-12">';
			$return_string .= '<ul>';
			while($blog_data->have_posts()) : $blog_data->the_post();
				$return_string .= '<li>';
				$return_string .= '<ul>';
				$return_string .= '<li>';
				$return_string .= '<h5>'.get_the_title().'</h5>';
				//$content = apply_filters( 'the_content', get_the_content(), get_the_ID() );
				$return_string .= excerpt(20);
				$return_string .= '</li>';
				$return_string .= '<li>';
				if(has_post_thumbnail()){
					$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'alignleft' ) );
				} else {
					$post_thumbnail = '';
				}
				$return_string .= $post_thumbnail;
				$return_string .= '</li>';
				$return_string .= '</ul>';
				$return_string .= '</li>';
			endwhile;
			$return_string .= '</ul>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-latest-blog', 'cgs_pharmacy_latest_blog');

function cgs_pharmacy_product_slideshow($atts){
	ob_start();
	$return_string = '';
	extract( shortcode_atts( array(
		'product_show' => '4',
		'title' => 'Products'
	), $atts ) );

	$product_args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => $product_show
	);
	$product_data = new WP_Query($product_args);
	if($product_data->have_posts()){
		$return_string .= '<div class="common-wrapper">';
		$return_string .= '<h2>'.$title.'</h2>';
		$return_string .= '<div class="cgs-product-slider">';
		while ($product_data->have_posts()) : $product_data->the_post();
			$return_string .= '<div>';
			$return_string .= '<div class="row">';
			$return_string .= '<div class="col-xl-12">';
			if(has_post_thumbnail()){
				$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'medium', array( 'class' => 'aligncenter' ) );
			} else {
				$post_thumbnail = '';
			}
			$return_string .= '<a href="'.get_permalink().'">'.$post_thumbnail.'</a>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		endwhile;
		$return_string .= '</div>';
		$return_string .= '</div>';
	}
	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-product-slideshow', 'cgs_pharmacy_product_slideshow');

function cgs_pharmacy_pricing_table($atts){
	ob_start();
	$return_string = '';

	extract( shortcode_atts( array(
		'title' => 'Pricing Table'
	), $atts ) );

	$table_args = array(
		'post_type' => 'cgs-pricing-table',
		'post_status' => 'publish',
		'posts_per_page' => 3,
	);
	$table_data = new WP_Query($table_args);
	if($table_data->have_posts()) {
		$return_string .= '<div class="common-wrapper">';
		$return_string .= '<h2>' . $title . '</h2>';
		$return_string .= '<div class="row">';
		while ($table_data->have_posts()) : $table_data->the_post();
			$return_string .= '<div class="col-xl-4">';
			$return_string .= '<div class="pricing-table" style="background: '.get_field('cgs_pricing_table_table_background').'">';
			$return_string .= '<h3 style="color:'.get_field('pricing_table_heading_color').'; background:'.get_field('pricing_table_heading_background').'">'.get_the_title().'</h3>';
			$return_string .= '<div class="pricing"><span>'.get_field('cgs_pricing_table_currency').'</span>'.get_field('cgs_pricing_table_price').'</div>';
			$return_string .= '<div class="features">';
			$return_string .= get_field('cgs_pricing_table_features');
			$return_string .= '<div class="pricing-table-btn"><a href="#" style="background: '.get_field('cgs_pricing_table_button_background_color').'; color:'.get_field('cgs_pricing_table_button_text_color').' !important;">'.get_field('cgs_pricing_table_button_name').'</a></div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
			$return_string .= '</div>';
		endwhile;
		$return_string .= '</div>';
		$return_string .= '</div>';
	}

	wp_reset_postdata();
	return $return_string;
}
add_shortcode('cgs-lite-pricing-table', 'cgs_pharmacy_pricing_table');

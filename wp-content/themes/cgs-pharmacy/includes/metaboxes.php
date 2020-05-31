<?php
add_action( 'add_meta_boxes', 'cgs_pharmacy_page_layout_metabox' );
add_action( 'save_post', 'save_cgs_pharmacy_page_layout_meta', 10, 2 );
function cgs_pharmacy_page_layout_metabox(){
	add_meta_box(
		'cgs_pharmacy_page_layout_id', //Unique ID
		esc_html__( 'Select Layout', 'cgs-pharmacy' ), //Title
		'cgs_pharmacy_page_layout_metabox_callback', //Callback function
		array('page', 'post'), //for pages
		'side', //Context
		'default' //priority
	);
}
function cgs_pharmacy_page_layout_metabox_callback($post){
	$value = get_post_meta($post->ID, 'cgs_pharmacy_page_layout', true);
?>
	<input class="post-format" type="radio" name="cgs_pharmacy_page_layout" value="default_layout" <?php if($value == 'default_layout' || $value == ''){ echo 'checked="checked"'; } ?>> Default Layout<br>
	<input class="post-format" type="radio" name="cgs_pharmacy_page_layout" value="right_sidebar" <?php if($value == 'right_sidebar'){ echo 'checked="checked"'; } ?>> Right Sidebar<br>
	<input class="post-format" type="radio" name="cgs_pharmacy_page_layout" value="left_sidebar" <?php if($value == 'left_sidebar'){ echo 'checked="checked"'; } ?>> Left Sidebar<br>
	<input class="post-format" type="radio" name="cgs_pharmacy_page_layout" value="no_sidebar_full_width" <?php if($value == 'no_sidebar_full_width'){ echo 'checked="checked"'; } ?>> No Sidebar Full Width<br>
	<input class="post-format" type="radio" name="cgs_pharmacy_page_layout" value="no_sidebar_content_centered" <?php if($value == 'no_sidebar_content_centered'){ echo 'checked="checked"'; } ?>> No Sidebar Content Centered<br>
<?php
}
function save_cgs_pharmacy_page_layout_meta($post_id){
	if (array_key_exists('cgs_pharmacy_page_layout', $_POST)) {
		update_post_meta($post_id,'cgs_pharmacy_page_layout', filter_var(wp_unslash($_POST['cgs_pharmacy_page_layout']), FILTER_SANITIZE_EMAIL));
	}
}

/*if ( is_page_template( 'template_contact_us.php' ) ) {
	echo 'ok';
	add_action( 'add_meta_boxes', 'cgs_pharmacy_contact_us_address_metabox' );
	add_action( 'save_post', 'save_cgs_pharmacy_contact_us_address_meta', 10, 2 );
	function cgs_pharmacy_contact_us_address_metabox(){
		add_meta_box(
			'cgs_pharmacy_contact_us_address_id', //Unique ID
			esc_html__( 'Address', 'cgs-pharmacy' ), //Title
			'cgs_pharmacy_contact_us_address_metabox_callback', //Callback function
			'page', //for pages
			'context', //Context
			'default' //priority
		);
	}
	function cgs_pharmacy_contact_us_address_metabox_callback($post){

	}
	function save_cgs_pharmacy_contact_us_address_meta($post_id){

	}
}*/
?>

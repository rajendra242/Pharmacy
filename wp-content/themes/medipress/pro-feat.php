<?php
$medipress_view_demo = esc_html( __( 'View Demo', 'medipress'));
$medipress_upgrade_to_pro = esc_html( __( 'Upgrade To Pro', 'medipress' ));

 
function medipress_theme_page() {
	$title = esc_html(__('Medipress Theme','medipress'));
	add_theme_page( 
		esc_html(__( 'Upgrade To Medipress Pro','medipress')),
		$title.'', 
		'edit_theme_options',
		'medipress_upgrade',
		'medipress_display_upgrade'
	);
}

add_action('admin_menu','medipress_theme_page');


function medipress_display_upgrade() {
  $theme_data = wp_get_theme('medipress'); 
    
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    } 
     
    $pro_theme_url = 'https://digitaltemplatemarket.com/items/medicorp-premium-wordpress-theme/';
    $pro_theme_demo = 'http://digitaltemplatemarket.com/wp/medicorp-pro/';
    $support_url = 'https://wordpress.org/support/theme/medipress';   
    $rating_url = 'https://wordpress.org/support/theme/medipress/reviews';   
    
    $current_action_link =  admin_url( 'themes.php?page=medipress_upgrade&tab=pro_features' ); ?>
    <style>
	.about-wrap .about-text {
		margin: 0em 0px 0em 0  !important;;
		margin-bottom: 25px !important;
		min-height: 60px;
		color: #555d66;
	}
	.about-wrap {		
		max-width: 1200px;	
	}
	</style>
	<div class="construction-zone-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'medipress'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
       	printf( __('<div class="about-text"> medipress is the perfect theme for your Web project. Very Lightweight and easily customizable, it fits for any type of website such a blog, corporate, portfolio, business finance, startup website and WooCommerce storefront with a clean and professional design. medipress is SEO Friendly, Load fast, Responsive, WPML, Retina ready, RTL & translation ready.', 'medipress') ); ?>
       <p class="upgrade-btn"><a class="upgrade" href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank"><?php printf( __( 'Check Pro Features', 'medipress'), $theme_data->Name ); ?></a></p>
       <p class="upgrade-btn"><a class="upgrade upgrade-btm" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Premium Demo', 'medipress'), $theme_data->Name ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=medipress_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
<a href="?page=medipress_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Features', 'medipress' );  ?></a>
            <a href="?page=medipress_upgrade&tab=free_vs_pro" class="nav-tab<?php echo $tab == 'free_vs_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free VS PRO', 'medipress' ); ?></a>
	        <?php do_action( 'medipress_admin_more_tabs' ); ?>
	    </h2>      

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'medipress' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'medipress'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'medipress'); ?></a>
                            </p>
                        </div>
                     
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'medipress' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Genex free support ticket system.', 'medipress'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($support_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'medipress'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
						 <div class="theme_link">
                            <h3><?php esc_html_e( 'Please Rate Us', 'medipress' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('We need your help to expand or and portoflio so please rate us on wordpress ', 'medipress'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($rating_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Rate This Theme', 'medipress'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
                       
                    </div>  
                    <div class="theme_info_right">
                        <?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/screenshot.png" alt="%1$s" />',__('Theme screenshot','medipress') ); ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
	
        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content">
			 
				<div class="wrap clearfix">
			   <div class="one-third column clear">
<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3><?php echo esc_html(__( '3 Home Pages', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__('Theme consist 3 Home page designs. You can choose anyone its your choice.', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3><?php echo esc_html(__( '2 Header Preset', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__('Theme have 2 tytpes of header preset so you can change and select your header design', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-check"></i></div>
	<h3><?php echo esc_html( __( 'Demo content', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('Theme includes single click demo content. You can quickly setup the site like our demo and get started easily!', 'medipress' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-envelope"></i></div>
	<h3><?php echo esc_html(__( 'Contact Form 7', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__( 'Gardenings Pro support contact form 7 that mean you can easily add your contact form with theme design ', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-list-alt"></i></div>
	<h3><?php echo esc_html(__( 'Projects Page', 'medipress' )); ?> </h3>
	<p><?php echo esc_html(__( 'Theme have amazing Projects design Grid+ Masonry with you can use 2, 3, or 4 Columns layouts!', 'medipress' )); ?> </p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3><?php echo esc_html(__( 'Typography', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__('Theme loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'medipress' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3><?php echo esc_html(__( 'Unlimited Image Slides', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__('Theme includes Flex slider . You can add unlimited slides on your home page', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-user"></i></div>
	<h3><?php echo esc_html(__( 'Team Page', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__('You can add unlimited team members with team deatil page and also display their social profiles ', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Retina Ready', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__( 'Theme is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!', 'medipress' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3><?php echo esc_html(__( 'Awesome Icons', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__( ' Choose from over 2500+ icons are fully integrated into the theme ', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Excellent Support', 'medipress' )); ?></h3>
	<p><?php echo esc_html(__( 'We truly care about our customers and themes performance. We assure you that you will get the best after sale support like never before!', 'medipress' ));
 ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-desktop"></i></div>
	<h3><?php echo esc_html(__( 'Responsive Layout', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('Theme is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'medipress' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-rocket"></i></div>
	<h3><?php echo esc_html( __( 'Testimonials', 'medipress' ));?></h3>
	<p><?php echo  esc_html( __( 'Display your clients\' glowing comments about your business on your homepage. Showing a specific number of testimonials with use of testimonial widget. ', 'medipress' ));?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-skype"></i></div>
	<h3><?php echo esc_html( __( 'Social Media', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __( 'Want your users to stay in touch? No problem, Theme has Social Media icons all throughout the theme!', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-map-marker"></i></div>
	<h3><?php echo esc_html( __( 'Add Timeline', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('This Theme includes Timeline shortcode, So you can easily display your company history to your visitors or  your clients', 'medipress' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-edit"></i></div>
	<h3><?php echo esc_html( __( 'Customization', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('With advanced theme options, page options & extensive docs, its never been easier to customize a theme!', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-signal"></i></div>
	<h3><?php echo esc_html( __( 'Improvement', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('We love our theme and customers. We are committed to improve and add new features to Theme!', 'medipress' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3><?php echo esc_html( __( 'Custom Widgets', 'medipress' )); ?></h3>
	<p><?php echo esc_html( __('You can display custom widgets in sidebar as well as footer area. ', 'medipress' )); ?></p>
</div>


				</div>
			</div><?php   
		} ?>  

       <!-- Free VS PRO tab -->
        <?php if ( $tab == 'free_vs_pro' ) { ?>
            <div class="free-vs-pro-tab info-tab-content">
	            <div id="free_pro">
	                <table class="free-pro-table">
		                <thead>
			                <tr>
			                    <th></th>  
			                    <th><?php echo esc_html($theme_data->Name); ?> Lite</th>
			                    <th><?php echo esc_html($theme_data->Name); ?> PRO</th>
			                </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td><h3><?php _e('Responsive Design', 'medipress'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                        <td><h3><?php _e('Support', 'medipress'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>		                    
		                    <tr>
		                        <td><h3><?php _e('Custom Logo Option', 'medipress'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                         <td><h3><?php _e('Social Links', 'medipress'); ?></h3></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('Unlimited color option', 'medipress'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('3 Home page', 'medipress'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	 <td><h3><?php _e('Header Presets', 'medipress'); ?></h3></td>
		                    	 <td class="only-pro"><?php _e('1', 'medipress'); ?></td>
		                    	 <td class="only-lite"><?php _e('4', 'medipress'); ?></td>
		                    </tr>	
		                     <tr>
		                    	 <td><h3><?php _e('Pre Defined Page Templates', 'medipress');?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('4 Portfolio Presets', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Team With Detail Page', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Redux Theme Option Panel', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr> 
							 
							<tr>
		                    	<td><h3><?php _e('Sticky Header Option', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Contact Form 7', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('15+ Shortcodes', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Google Fonts', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 
		                     <tr>
		                    	<td><h3><?php _e('Multiple Service Layouts', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	<td><h3><?php _e('Team Page', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Blog Layouts', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Page Animation', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Premium Priority Support', 'medipress');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    
		                    <tr class="ti-about-page-text-center">
		                        <td><a href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( '%1s Pro Demo', 'medipress'), $theme_data->Name ); ?></a></td>
		                    	<td colspan="2"><a href="<?php echo esc_url($pro_theme_url); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( 'Upgrade To %1s Pro', 'medipress'), $theme_data->Name ); ?></a></td>
		                    </tr>
		                </tbody>
	                </table>			    
				</div>
			</div><?php 
		} ?>

    </div><?php
} ?>
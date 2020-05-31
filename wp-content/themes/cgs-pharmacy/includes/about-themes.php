<?php
add_action( 'admin_menu', 'cgs_pharmacy_about_theme' );
function cgs_pharmacy_about_theme() {
	add_theme_page( esc_html__('About Theme', 'cgs-pharmacy'), esc_html__('About Theme', 'cgs-pharmacy'), 'edit_theme_options', 'cgs-fashion-trend-about', 'cgs_pharmacy_about');
}
function cgs_pharmacy_about() {
	$return = add_query_arg( array()) ;
?>
	<div class="wrapper-info">
		<div class="col-left">
			<div class="col-left-area">
				<?php esc_html_e('Theme Information', 'cgs-pharmacy'); ?>
			</div>
			<p><?php esc_html_e('Description: CGS Fashion Trend Theme is a free website theme for fashion enthusiasts. It is a clean, free and modern WordPress theme. The theme is built for creating an attractive blogging website for personal or professional, as well as, for building newspaper, media, magazine related project. The theme focuses on making your blog outstanding among users and search engines with responsive design, speed optimized code, and SEO friendly markup. It is very lightweight and easy to use. The theme can be used to create fashion, lifestyle, beauty, makeup, gossip, food, or a journal blog without writing a single line of code. It is a top choice for newspaper, news portal, news website, magazine, blog, bloggers, photographers, personal portfolio, travel bloggers, small medium and large scale businesses, corporates, lawyers, bloggers, restaurants, weddings, colleges, universities, hotels, churches, salons, fitness, resorts, ecommerce, businesses, creative freelancers, professionals etc. and also supports woocommerce. The theme features advanced, easy-to-use feature that allows you to create a blog as a DIY project-- without hiring a developer.','cgs-pharmacy'); ?></p>
			<!--<div class="comparison-table">
				<table class="table table-bordered table-bordered1">
					<tbody><tr class="title">
						<td rowspan="2"></td>
						<td><?php /*esc_html_e("FREE", 'cgs-pharmacy'); */?> <br> <?php /*esc_html_e("Theme", 'cgs-pharmacy'); */?></td>
						<td><?php /*esc_html_e("PRO", 'cgs-pharmacy'); */?> <br> <?php /*esc_html_e("Theme", 'cgs-pharmacy'); */?></td>
					</tr>
					<tr>
						<td style="border-left: none;"><?php /*esc_html_e("FREE", 'cgs-pharmacy'); */?></td>
						<td><small><?php /*esc_html_e("$", 'cgs-pharmacy'); */?></small><?php /*esc_html_e("39", 'cgs-pharmacy'); */?></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Logo Upload", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Favicon Upload", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Theme Options", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Font Family Limitation", 'cgs-pharmacy'); */?></td>
						<td width="25%"><?php /*esc_html_e("Single Font", 'cgs-pharmacy'); */?></td>
						<td width="25%"><?php /*esc_html_e("Multiple Fonts", 'cgs-pharmacy'); */?></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("SEO Setting", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Page Builder", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Better Responsive", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Blog Setting", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Customizer Setting", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Better Customizer Setting", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Self Created Widget", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Icons Pack", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("WooCommerce Support", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Google Map Support", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Back To Top Button", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Provided Page Layout", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td width="50%"><?php /*esc_html_e("Email Support", 'cgs-pharmacy'); */?></td>
						<td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
						<td width="25%"><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr class="button1">
						<td></td>
						<td></td>
						<td><a href="<?php /*echo esc_url(cgs_pharmacy_THEMES_BUY_NOW); */?>" target="_blank"><?php /*esc_html_e("Buy Now", 'cgs-pharmacy'); */?></a></td>
					</tr>
					</tbody></table>
			</div>-->
            <div class="comparison-table">
                <table class="table table-bordered table-bordered1">
                    <tbody>
                    <tr class="title">
                        <td rowspan="2"></td>
                        <td>FREE <br /> Theme</td>
                        <td>PRO <br /> Theme</td>
                    </tr>
                    <tr>
                        <td style="border-left: none;">FREE</td>
                        <td><small>$</small>39</td>
                    </tr>
                    <tr>
                        <td width="50%">Logo Upload</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Favicon Upload</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Theme Options</td>
                        <td width="25%">Limited</td>
                        <td width="25%">Full</td>
                    </tr>
                    <tr>
                        <td width="50%">Slider</td>
                        <td width="25%">Unlimited</td>
                        <td width="25%">Unlimited</td>
                    </tr>
                    <tr>
                        <td width="50%">Font Family Limitation</td>
                        <td width="25%">Single Font</td>
                        <td width="25%">Multiple Fonts</td>
                    </tr>
                    <tr>
                        <td width="50%">Font Sizes</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Primary Color</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Multiple Color Options</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Business Template(Home Page)</td>
                        <td width="25%">2</td>
                        <td width="25%">5</td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Menu</td>
                        <td width="25%">2</td>
                        <td width="25%">3</td>
                    </tr>
                    <tr>
                        <td width="50%">Layout option</td>
                        <td width="25%">2</td>
                        <td width="25%">10</td>
                    </tr>
                    <tr>
                        <td width="50%">Social Icons</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">RTL Support</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Page Builder</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Woocommerce Compatible</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Footer Widget Area</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Footer Copyright Editor</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Content Demo</td>
                        <td width="25%">Limited</td>
                        <td width="25%">Full</td>
                    </tr>
                    <tr>
                        <td width="50%">Support</td>
                        <td width="25%">Limited</td>
                        <td width="25%">Full</td>
                    </tr>
                    <tr>
                        <td width="50%">Translation Ready</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">WPML Compatible</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Polylang Compatible</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Newsletter</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Our Clients</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Testimonials</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Featured Posts</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Team</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Career Page</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Pricing Table</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Portfolio Section</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Team Section</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Better Responsive</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Blog Setting</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Customizer Setting</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Better Customizer Setting</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">WooCommerce Support</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Email Support</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Bootstrap Support</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Visual Composer Compatible</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">WPBakery Page Builder Compatible</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr class="subtitle">
                        <td width="50%">Elementor</td>
                        <td width="25%">Free Builder</td>
                        <td width="25%">Pro Builder</td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">ESSENTIALS</td>
                    </tr>
                    <tr>
                        <td width="50%">Drag &#038; Drop Editor</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">300+ Designer Made Templates</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">90+ Widgets</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Responsive Editing</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Popup Builder</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Theme Builder</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">WooCommerce Builder</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">WORKFLOW</td>
                    </tr>
                    <tr>
                        <td width="50%">No Coding</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Navigator</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Finder</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Hotkeys</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Shortcut Cheatsheet</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Redo Undo</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Auto Save</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Revision History</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Draft Mode</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Copy Paste</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Copy Style</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">In-line Editing</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Global Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Global Colors &#038; Typography</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Color Picker</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">DESIGN</td>
                    </tr>
                    <tr>
                        <td width="50%">Background Gradients</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Background Videos</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Background Overlay</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Enhanced Background Images</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">CSS Filters</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Blend Modes</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Elementor Canvas</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Shape Divider</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Box Shadow</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Absolute Position</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">One-Page Websites</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Motion Effects</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Icons Library</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">SVG Icons</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">MARKETING</td>
                    </tr>
                    <tr>
                        <td width="50%">Landing Pages</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Form Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Testimonial Carousel Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Countdown Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Rating Star Widget</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Action Links</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Popup Builder</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">TYPOGRAPHY</td>
                    </tr>
                    <tr>
                        <td width="50%">Easy to customize</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Title HTML Tag</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Font Preview</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Fonts</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Google Fonts</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Font size: PX, EM, REM</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> TypeKit Integration</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Drop Cap</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Text Shadow</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Text Editor Columns</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">LAYOUT</td>
                    </tr>
                    <tr>
                        <td width="50%"> Section Width</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Section Height</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Full Width</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Column Width</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Column Gap</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Content Position</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Margin &#038; Padding</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Z-Index</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Vertical &#038; Horizontal Flexbox Alignment</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Inline Elements</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Fixed Position</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">  Nested Columns</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">MOBILE EDITING</td>
                    </tr>
                    <tr>
                        <td width="50%"> 100% Responsive</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Mobile Font Size</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Responsive Column Width</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Padding and Margin</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Reverse Columns</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Hide and Show Elements (Visibillity)</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Breakpoints</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Responsive Sizing</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">THEME BUILDER</td>
                    </tr>
                    <tr>
                        <td width="50%">Theme Elements</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Dynamic Content</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Display Conditions</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Header and Footer</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Sticky Header</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">404 Page</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Archive Page</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Single Post</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Search Results Page</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Fields Integration</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">THEME CONTENT</td>
                    </tr>
                    <tr>
                        <td width="50%">Nav Menu Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Login Form Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Search Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Posts Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">WordPress Comments Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Portfolio Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Yoast Breadcrumbs Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Author Box Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Advanced Query Control</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">ECOMMERCE</td>
                    </tr>
                    <tr>
                        <td width="50%">Price Table Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Price List Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Woo Products Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Woo Categories Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Woo Add To Cart Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Woo Elements Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">FORMS</td>
                    </tr>
                    <tr>
                        <td width="50%">Contact Forms</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Subscription Forms</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Login Form</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Action After Submit</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Confirmation Email</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Email HTML / Plain</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Messages</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Advanced Form Fields</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Hidden Fields</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Acceptance Field</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Honeypot</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">INTEGRATIONS</td>
                    </tr>
                    <tr>
                        <td width="50%">MailChimp</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">ActiveCampaign</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">ConvertKit</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Campaign Monitor</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">HubSpot</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Zapier</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Adobe TypeKit</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Discord</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> GetResponse</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Drip</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> ReCaptcha V3</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Facebook SDK</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> MailerLite</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Slack</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Font Awesome 5</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Custom Icon Libraries</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">SOCIAL MEDIA</td>
                    </tr>
                    <tr>
                        <td width="50%">Share Buttons</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Blockquote</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Social Icons Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Facebook Embed</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Facebook Page</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Facebook Comments</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Facebook Button</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">LIBRARY</td>
                    </tr>
                    <tr>
                        <td width="50%">Templates &#8211; Pages</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Blocks</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Save &#038; Reuse</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Import / Export</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Search &#038; Filter</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Template Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Embed Anywhere</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">MEDIA</td>
                    </tr>
                    <tr>
                        <td width="50%">Media Carousel Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Slides Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Lightbox Overlay</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">5 Video Embed Options</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> SoundCloud</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Font Awesome Icons</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Google Maps</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">INTERACTIONS</td>
                    </tr>
                    <tr>
                        <td width="50%">Scrolling Effects</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Call to Action Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Animated Headlines Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Flip Box Widget</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Hover Animations</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Entrance Animations</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Parallax</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Mouse Effects</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> 3D Tilt Effect</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">ADVANCED</td>
                    </tr>
                    <tr>
                        <td width="50%">Maintenance Mode</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Replace URL</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom CSS</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Version Control</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Safe Mode</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Regenerate CSS</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> HTML Widget</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> HTML Tag</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%"> Image Size</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Role Manager</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">RTL Ready</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Request Parameters</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Custom Attributes</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="3" class="sub-heading">ECOSYSTEM</td>
                    </tr>
                    <tr>
                        <td width="50%">Video Tutorials</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">24/7 Premium Support</td>
                        <td width="25%"><span class="dashicons dashicons-no-alt"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Translation Ready</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Elementor Blog</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Communities</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Weekly Newsletter</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Elementor Add-ons</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td width="50%">Developer API</td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                        <td width="25%"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr class="button1">
                        <td></td>
                        <td></td>
                        <td><a href="<?php echo esc_url(cgs_pharmacy_THEMES_BUY_NOW); ?>" target="_blank"><?php esc_html_e("Buy Now", 'cgs-pharmacy'); ?></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--</div>-->
		<!--</div>--><!-- .col-left -->
		<div class="col-right">
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(cgs_pharmacy_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'cgs-pharmacy'); ?></a> |
				<a href="<?php echo esc_url(cgs_pharmacy_PRO_THEME_URL); ?>" target="_blank"><?php esc_attr_e('Buy Pro', 'cgs-pharmacy'); ?></a> |
				<a href="<?php echo esc_url(cgs_pharmacy_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'cgs-pharmacy'); ?></a>
				<div class="space5"></div>
				<hr />
				<a href="<?php echo esc_url(cgs_pharmacy_URL); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/cgstheme-thumb.jpg" alt="" /></a>
			</div>
		</div><!-- .col-right -->
	</div><!-- .wrapper-info -->
<?php } ?>

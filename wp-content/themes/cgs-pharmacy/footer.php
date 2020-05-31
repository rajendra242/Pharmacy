<?php $show_theme_footer = get_option('show_theme_footer'); ?>
<?php if($show_theme_footer != 1){ ?>
    <?php if(is_active_sidebar('footer-widget-1') || is_active_sidebar('footer-widget-2') || is_active_sidebar('footer-widget-3')){ ?>
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget 1") ) : ?>
                    <?php endif;?>
                </div>
                <div class="col-xl-4">
                    <div class="widget_box cgs_widget_box">
                        <h3 class="side_title">Menu</h3>
                        <div class="menu-footer-container">
                            <?php wp_nav_menu(array('theme_location'  => 'footer_menu')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget 3") ) : ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } ?>
<div class="footer-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xl-8">
				<div class="leftalign">
					<?php
					$footer_copyright = get_theme_mod('cgs_pharmacy_section_footer_copyright');
					if(empty($footer_copyright)){
						echo 'Copyright © '.date('Y').' <a href="'.home_url().'">CGS Themes</a>. Theme: <a href="https://www.cgsthemes.com/product-category/free-wordpress-themes/" target="_blank">CGS Pharmacy</a> By CGS Themes. Powered by <a href="https://wordpress.org/" target="_blank">WordPress</a>';
					} else {
						echo $footer_copyright;
					}
					?>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="rightalign"></div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $cgs_pharmacy_header_default_layout = get_theme_mod('cgs_pharmacy_header_default_layout'); ?>
<div class="header-wrapper">
    <a class="skip-link screen-reader-text" href="#skip_content"><?php esc_html_e( 'Skip to content', 'cgs-pharmacy' ); ?></a>
    <?php if(empty($cgs_pharmacy_header_default_layout) || $cgs_pharmacy_header_default_layout == 'style_1'){ ?>
    <div class="header_style_1">
        <nav class="navbar navbar-expand-md navbar-light" role="navigation">
            <div class="container">
                <a class="navbar-brand logo" href="<?php echo esc_url(get_site_url()); ?>">
                    <?php
                    if (display_header_text()==true){
                        echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
                        echo '<h2>'.esc_html(get_bloginfo('description')).'</h2>';
                    } else {
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
                        } else {
                            echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
                        }
                    }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgsnavmenu" aria-controls="cgsnavmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu([
                    'theme_location'  => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'cgsnavmenu',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav ml-auto',
                    'depth'           => 2,
                    //'fallback_cb'     => 'bs4navwalker::fallback',
                    'fallback_cb'     => '',
                    'walker'          => new bs4navwalker()
                ]);
                ?>
            </div>
        </nav>
    </div>
    <?php } ?>
<?php if($cgs_pharmacy_header_default_layout == 'style_2'){ ?>
<div class="header_style_2">
	<nav class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="container">
			<a class="navbar-brand logo" href="<?php echo esc_url(get_site_url()); ?>">
				<?php
				if (display_header_text()==true){
					echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					echo '<h2>'.esc_html(get_bloginfo('description')).'</h2>';
				} else {
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
					} else {
						echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					}
				}
				?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgsnavmenu" aria-controls="cgsnavmenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu([
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'cgsnavmenu',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav ml-auto',
				'depth'           => 2,
				//'fallback_cb'     => 'bs4navwalker::fallback',
				'fallback_cb'     => '',
				'walker'          => new bs4navwalker()
			]);
			?>
		</div>
	</nav>
</div>
<?php } ?>
<?php if($cgs_pharmacy_header_default_layout == 'style_3'){ ?>
<div class="header_style_3">
	<nav class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="container">
			<?php
			wp_nav_menu([
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'cgsnavmenu',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav ml-auto',
				'depth'           => 2,
				//'fallback_cb'     => 'bs4navwalker::fallback',
				'fallback_cb'     => '',
				'walker'          => new bs4navwalker()
			]);
			?>
			<a class="navbar-brand logo" href="<?php echo esc_url(get_site_url()); ?>">
				<?php
				if (display_header_text()==true){
					echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					echo '<h2>'.esc_html(get_bloginfo('description')).'</h2>';
				} else {
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
					} else {
						echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					}
				}
				?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgsnavmenu" aria-controls="cgsnavmenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>
</div>
<?php } ?>
<div class="header_style_4">
	<nav class="navbar navbar-expand-md navbar-light" role="navigation">
		<div class="container">
			<a class="navbar-brand logo" href="<?php echo esc_url(get_site_url()); ?>">
				<?php
				if (display_header_text()==true){
					echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					echo '<h2>'.esc_html(get_bloginfo('description')).'</h2>';
				} else {
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
					} else {
						echo '<h1>'.esc_html(get_bloginfo( 'name' )).'</h1>';
					}
				}
				?>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cgsnavmenu" aria-controls="cgsnavmenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
			wp_nav_menu([
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'cgsnavmenu',
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'navbar-nav ml-auto',
				'depth'           => 2,
				//'fallback_cb'     => 'bs4navwalker::fallback',
				'fallback_cb'     => '',
				'walker'          => new bs4navwalker()
			]);
			?>
		</div>
	</nav>
</div>
</div>
    <?php $cgs_pharmacy_header_bg_img = get_header_image(); ?>
    <?php if(is_home() || is_front_page()){ ?>
        <?php
        $cgs_pharmacy_banner_text = get_theme_mod('cgs_pharmacy_banner_setting');
        $cgs_pharmacy_banner_text2 = get_theme_mod('cgs_pharmacy_banner_setting2');
        ?>
        <?php if(!empty($cgs_pharmacy_header_bg_img)){ ?>
            <div class="banner-wrapper" style="background-image: url('<?php echo esc_url($cgs_pharmacy_header_bg_img); ?>')">
        <?php } else { ?>
            <div class="banner-wrapper" style="background-image: url('<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/banner.jpg')">
        <?php } ?>
                <div class="container">
                    <div class="banner-height">
                        <div class="cgs_banner_container">
                            <?php if(!empty($cgs_pharmacy_banner_text)){ ?>
                            <div class="banner_text_1"><?php echo $cgs_pharmacy_banner_text; ?></div>
                            <?php } ?>
                            <?php if(!empty($cgs_pharmacy_banner_text2)){ ?>
                            <div class="banner_text_2"><?php echo $cgs_pharmacy_banner_text2; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
    </div>
    <?php } else { ?>
        <?php if(is_front_page()){ ?>
            <div class="slider_shortcode">
                <?php echo do_shortcode($cgs_pharmacy_slider_setting); ?>
            </div>
        <?php } ?>
    <?php } ?>
<div id="skip_content"></div>

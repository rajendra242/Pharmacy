<?php get_header(); ?>
<?php
$cgs_pharmacy_show_inner_banner = get_post_meta(get_the_ID(), 'cgs_pharmacy_show_inner_banner', true);
$cgs_pharmacy_banner_image = get_field('cgs_pharmacy_banner_image');
$cgs_pharmacy_title_on_banner = get_post_meta(get_the_ID(), 'cgs_pharmacy_title_on_banner', true);
$cgs_pharmacy_title_color = get_post_meta(get_the_ID(), 'cgs_pharmacy_title_color', true);
$cgs_pharmacy_title_alignment = get_post_meta(get_the_ID(), 'cgs_pharmacy_title_alignment', true);
?>

<?php if($cgs_pharmacy_show_inner_banner == 'yes' || $cgs_pharmacy_show_inner_banner == ''){ ?>
    <div class="inner-banner" style="background: url('<?php echo $cgs_pharmacy_banner_image; ?>')">
        <div class="container">
            <?php if(!empty($cgs_pharmacy_title_on_banner)){ ?>
                <h1 style="color: <?php echo $cgs_pharmacy_title_color; ?>; text-align: <?php echo $cgs_pharmacy_title_alignment; ?>;"><?php echo $cgs_pharmacy_title_on_banner; ?></h1>
            <?php } else { ?>
                <div style="height: 60px;"></div>
            <?php } ?>
        </div>
    </div>
    <style>
        .inner-banner h1:after{
            border-top: 1px solid <?php echo $cgs_pharmacy_title_color; ?>;
        }
    </style>
<?php } ?>
<div class="main-content-wrapper">
    <div class="container">
		<?php $cgs_pharmacy_page_layout = esc_html(get_post_meta(get_the_ID(), 'cgs_pharmacy_page_layout', true)); ?>
		<?php $cgs_pharmacy_pages_default_layout = get_theme_mod('cgs_pharmacy_pages_default_layout'); ?>
		<?php if($cgs_pharmacy_page_layout == '' || $cgs_pharmacy_page_layout == 'default_layout'){ ?>
			<?php if($cgs_pharmacy_pages_default_layout == 'left_sidebar'){ ?>
                <div class="row">
                    <div class="col-xl-3"><?php get_sidebar(); ?></div>
                    <div class="col-xl-9">
						<?php if(have_posts()){ ?>
                            <div class="row">
                                <div class="col-xl-12">
								<?php while(have_posts()) : the_post(); ?>
									<?php get_template_part( 'content' ); ?>
								<?php endwhile; ?>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
			<?php } elseif($cgs_pharmacy_pages_default_layout == 'no_sidebar_full_width') { ?>
                <div class="row">
                    <div class="col-xl-12">
						<?php if(have_posts()){ ?>
                            <div class="row">
                                <div class="col-xl-12">
								<?php while(have_posts()) : the_post(); ?>
									<?php get_template_part( 'content' ); ?>
								<?php endwhile; ?>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
			<?php } else { ?>
                <div class="row">
                    <div class="col-xl-9">
						<?php if(have_posts()){ ?>
                            <div class="row">
                                <div class="col-xl-12">
								<?php while(have_posts()) : the_post(); ?>
									<?php get_template_part( 'content' ); ?>
								<?php endwhile; ?>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                    <div class="col-xl-3"><?php get_sidebar(); ?></div>
                </div>
			<?php } ?>
		<?php } elseif($cgs_pharmacy_page_layout == 'right_sidebar'){ ?>
            <div class="row">
                <div class="col-xl-9">
					<?php if(have_posts()){ ?>
                        <div class="row">
                            <div class="col-xl-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
							<?php endwhile; ?>
                            </div>
                        </div>
					<?php } ?>
                </div>
                <div class="col-xl-3"><?php get_sidebar(); ?></div>
            </div>
		<?php } elseif($cgs_pharmacy_page_layout == 'left_sidebar'){ ?>
            <div class="row">
                <div class="col-xl-3"><?php get_sidebar(); ?></div>
                <div class="col-xl-9">
					<?php if(have_posts()){ ?>
                        <div class="row">
                            <div class="col-xl-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
							<?php endwhile; ?>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
		<?php } elseif($cgs_pharmacy_page_layout == 'no_sidebar_full_width'){ ?>
            <div class="row">
                <div class="col-xl-12">
					<?php if(have_posts()){ ?>
                        <div class="row">
                            <div class="col-xl-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
							<?php endwhile; ?>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
		<?php } elseif($cgs_pharmacy_page_layout == 'no_sidebar_content_centered'){ ?>
            <div class="row">
                <div class="col-xl-1"></div>
                <div class="col-xl-10">
					<?php if(have_posts()){ ?>
                        <div class="row">
                            <div class="col-xl-12">
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part( 'content' ); ?>
							<?php endwhile; ?>
                            </div>
                        </div>
					<?php } ?>
                </div>
                <div class="col-xl-1"></div>
            </div>
		<?php } ?>
    </div>
</div>
<?php get_footer(); ?>

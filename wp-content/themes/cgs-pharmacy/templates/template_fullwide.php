<?php /* Template Name: Full Wide */ ?>
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
            <h1 style="color: <?php echo $cgs_pharmacy_title_color; ?>; text-align: <?php echo $cgs_pharmacy_title_alignment; ?>;"><?php echo $cgs_pharmacy_title_on_banner; ?></h1>
        </div>
    </div>
    <style>
        .inner-banner h1:after{
            border-top: 1px solid <?php echo $cgs_pharmacy_title_color; ?>;
        }
    </style>
<?php } ?>
    <div class="main-content-wrapper">
		<?php if(have_posts()){ ?>
			<?php while(have_posts()) : the_post(); ?>
                <?php if(empty($cgs_pharmacy_title_on_banner)){ ?>
                <h1><?php the_title(); ?></h1>
				<?php } ?>
				<?php get_template_part( 'content' ); ?>
			<?php endwhile; ?>
		<?php } ?>
    </div>
<?php get_footer(); ?>

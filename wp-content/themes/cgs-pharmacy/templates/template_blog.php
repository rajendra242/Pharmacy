<?php /* Template Name: Blog */ ?>
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
	<div class="container">
		<div class="row">
			<div class="col-xl-9">
				<?php
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 12,
					'post_status' => 'publish',
					'paged' => $paged
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						?>
						<div class="row">
							<div class="col-xl-12 matchheight2">
								<div class="sing_post">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="post_img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a></div>
                                        </div>
                                        <div class="col-xl-8">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <?php
                                            $post_categories = wp_get_post_categories(get_the_ID());
                                            $catname = '';
                                            if(!empty($post_categories)){
                                                foreach($post_categories as $pc){
	                                                $cat = get_category( $pc );
	                                                $catname .= $cat->name.', ';
                                                }
                                            }
                                            ?>
                                            <div class="post-meta"><?php the_time('M j, Y'); ?> | <?php echo $catname; ?> | <?php echo get_the_author_meta('display_name'); ?></div>
	                                        <?php the_excerpt(); ?>
                                            <div class="postReadMorebg"><a href="<?php the_permalink(); ?>">Read More</a></div>
                                        </div>
                                    </div>


								</div>
							</div>
						</div>
					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				<div class="row">
					<div class="col-xl-12">
                        <div class="margin-top-20">
						<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array( 'query' => $the_query )); } ?>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-xl-3"><?php get_sidebar(); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

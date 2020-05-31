<?php get_header(); ?>
<div class="main-content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<h1><strong><?php esc_html_e('Tag:', 'cgs-pharmacy'); ?> </strong><?php single_tag_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-9">
				<?php if(have_posts()){ ?>
					<?php while(have_posts()) : the_post(); ?>
						<div class="row">
							<div class="col-lg-12">
								<div class="sing_post">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
                        <div class="row tagsrow">
                            <div class="col-xl-12">
	                            <?php
	                            esc_html_e('Tags:', 'cgs-pharmacy');
	                            the_tags(' ', ', ', '');
	                            ?>
                            </div>
                        </div>
					<?php endwhile; ?>
                    <div class="row">
                        <div class="col-xl-12">
	                        <?php
	                        the_posts_pagination( array(
		                        'mid_size' => 2,
		                        'prev_text' => esc_html__( 'Back', 'cgs-pharmacy' ),
		                        'next_text' => esc_html__( 'Next', 'cgs-pharmacy' ),
		                        'screen_reader_text' => esc_html__( 'Posts', 'cgs-pharmacy' )
	                        ) );
	                        ?>
                        </div>
                    </div>
				<?php } else { ?>
					<h5><?php esc_html_e( 'Posts not found', 'cgs-pharmacy' ); ?></h5>
					<?php get_search_form(); ?>
				<?php } ?>
			</div>
			<div class="col-xl-3"><?php get_sidebar(); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
	<div class="main-content-wrapper">
		<?php if(have_posts()){ ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part( 'content' ); ?>
			<?php endwhile; ?>
		<?php } ?>
	</div>
<?php get_footer(); ?>
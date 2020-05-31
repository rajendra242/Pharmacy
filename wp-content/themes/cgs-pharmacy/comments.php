<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
        <h2 class="comments-title">
			<?php
			$educational_comment_count = get_comments_number();
			if ( '1' === $educational_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'cgs-pharmacy' ),
					'<span>' . esc_html(get_the_title(),'cgs-pharmacy') . '</span>'
				);
			} else {
				printf( // phpcs:ignore Standard.Category.SniffName.ErrorCode
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $educational_comment_count, 'comments title', 'cgs-pharmacy' ) ),
					esc_html(number_format_i18n( $educational_comment_count ),'cgs-pharmacy'),
					'<span>' . esc_html(get_the_title(),'cgs-pharmacy') . '</span>'
				);
			}
			?>
        </h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

        <ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
        </ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cgs-pharmacy' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->

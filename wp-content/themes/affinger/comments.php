<hr class="hrcss">

<div id="comments">
	<?php if ( have_comments() ): ?>
		<ol class="commets-list">
			<?php wp_list_comments( 'avatar_size=55' ); ?>
		</ol>
	<?php endif; ?>

	<?php
	$comment_text = ( trim( $GLOBALS['stdata381'] ) !== '' ) ? esc_html( $GLOBALS['stdata381'] ) : 'comment';

	$args = array(
		'title_reply'  => $comment_text,
		'label_submit' => __( '送信', 'affinger' ),
	);

	comment_form( $args );
	?>
</div>

<?php if ( $wp_query->max_num_comment_pages > 1 ): ?>
	<div class="st-pagelink">
		<?php
		$args = array(
			'prev_text' => '&laquo; Prev',
			'next_text' => 'Next &raquo;',
		);

		paginate_comments_links( $args );
		?>
	</div>
<?php endif; ?>

<!-- END singer -->

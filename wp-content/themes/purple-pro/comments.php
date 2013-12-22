
<?php
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<div class="comments">
	<?php if ( ! comments_open() & is_single() )  : ?><p><?php _e( 'Comments are currently closed.', 'purple_pro' ); ?></p><?php endif; ?>

	<?php if ($comments) : ?>
		<h3><?php printf( _n(__( 'One thought on &ldquo;%2$s&rdquo;', 'purple_pro' ), __('%1$s thoughts on &ldquo;%2$s&rdquo;', 'purple_pro' ), get_comments_number()),
	number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );?></h3>
		<ul class="commentlist">
		<?php wp_list_comments(); ?>
		</ul>
	<?php endif; ?>

	<p><?php paginate_comments_links(); ?></p>
	<?php comment_form(); ?>
</div>
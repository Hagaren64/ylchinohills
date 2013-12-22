<?php get_header(); ?>
<div class="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><div>
			<h1><?php the_title(); ?> <?php edit_post_link(__('Edit this entry', 'purple_pro'), '', ''); ?></h1>
			<p class="post-meta"><span class="icon date"></span> <?php the_time( get_option( 'date_format' ) ) ?>, <span class="icon author"></span> <?php the_author(); ?>, <span class="icon cats"></span><?php the_category(", "); ?>,  <?php if ( comments_open() ) : ?>, <?php comments_popup_link('<span class="icon comments"></span> 0', '<span class="icon comments"></span> 1', '<span class="icon comments"></span> %'); ?> <?php endif; ?></p>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'purple_pro').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php if(has_tag()): ?><p class="tags"><span class="icon tags"></span><?php the_tags(""); ?></p><?php endif; ?>

			<p><?php posts_nav_link(); ?></p>
			<p class="pagination">
				<span class="prev"><?php previous_post_link('&lsaquo; %link'); ?></span>
				<span class="next"><?php next_post_link('%link  &rsaquo;'); ?></span>
			</p>

			<div id="comments">
				<?php comments_template(); ?>
			</div>
		</div></div>
	<?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

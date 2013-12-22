<?php get_header(); ?>
<div class="main">
	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		  <h1><?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		  <h1><?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		  <h1><?php echo get_the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		  <h1><?php echo get_the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		  <h1><?php echo get_the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		  <h1><?php _e( 'Author Archive', 'purple_pro' ); ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		  <h1><?php _e( 'Blog Archives', 'purple_pro' ); ?></h1>
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
			<!-- Start: Post -->
			<div <?php post_class(); ?>><div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php edit_post_link(__('Edit this entry', 'purple_pro'), '', ''); ?></h2>
				<?php the_post_thumbnail(); ?>
				<p class="post-meta"><span class="icon date"></span> <?php the_time( get_option( 'date_format' ) ) ?>, <span class="icon author"></span> <?php the_author(); ?> <span class="icon cats"></span><?php the_category(", "); ?>, <?php if ( comments_open() ) : ?>, <?php comments_popup_link('<span class="icon comments"></span> 0', '<span class="icon comments"></span> 1', '<span class="icon comments"></span> %'); ?> <?php endif; ?></p>
				<?php the_excerpt(); ?>
				<?php if(has_tag()): ?><p class="tags"><span class="icon tags"></span><?php the_tags(""); ?></p><?php endif; ?>
			</div>
			<p class="more"><a href="<?php the_permalink() ?>"><span><?php _e( ' ', 'purple_pro' );?></span></a></p>
			</div>
			<!-- End: Post -->
		<?php endwhile; ?>

		<p class="pagination">
			<span class="prev"><?php next_posts_link("&lsaquo; ".__('Previous Posts', 'purple_pro')) ?></span>
			<span class="next"><?php previous_posts_link(__('Next posts', 'purple_pro')."&rsaquo;") ?></span>
		</p>

	<?php else : ?>
		<h2><?php _e( 'Not found', 'purple_pro' ); ?></h2>
		<p><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'purple_pro' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>

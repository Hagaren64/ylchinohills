<?php get_header(); ?>

	<div id="content">
<center><img src="/wp-content/themes/PinkOctober/images/middle.png" alt="" /></center>
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<img src="/wp-content/themes/PinkOctober/images/post_title01.png" align="left" alt="" /><font size="4" face="Georgia"><a href="<?php the_permalink() ?>" title="<?php _e('Permanent link to '); ?><?php the_title(); ?>"><?php the_title(); ?></a></font><br/><font size="1" face="georgia"><?php the_time('F jS, Y') ?> @ <?php the_time() ?></font><br/>
				<?php if (is_search()) { ?>
					<?php the_excerpt(); ?>
				<?php } else { ?><br />
					<div align="justify"><?php the_content(__('View the rest of this entry...')); ?></div><br/>
				<?php } ?>
				<img src="/wp-content/themes/PinkOctober/images/comment_on_entry.png" alt="" />
					<?php comments_popup_link(__('Comments'), __('1 Comment'), __('% Comments')); ?><br/>
<img src="/wp-content/themes/PinkOctober/images/filed_in.png" alt="" /> <?php the_category(' &#183;  ') ?><br/>
<img src="/wp-content/themes/PinkOctober/images/lined_broken.png" alt="" />

			</div>
	
		<?php endwhile; ?>
		<div class="postnav">
		<div class="prev"><?php next_posts_link(__('&laquo; Previous Entries')) ?></div>
		<div class="next"><?php previous_posts_link(__('Next Entries &raquo;')) ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="pagetitle"><?php _e('Search Results'); ?></h2>
		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
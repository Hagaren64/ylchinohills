<?php get_header(); ?>

	<div id="content">
<center><img src="/wp-content/themes/PinkOctober/images/middle.png" alt="" /></center>
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<img src="/wp-content/themes/PinkOctober/images/post_title01.png" align="left" /> <font size="4" face="Georgia"><a href="<?php the_permalink() ?>" title="<?php _e('Permanent link to'); ?><?php the_title(); ?>"><?php the_title(); ?></a></font><br/><font size="1" face="georgia"><?php the_time('F jS, Y') ?> @ <?php the_time() ?></font><br/>
									<div align="justify"><?php the_content(__('View the rest of this entry...')); ?></div>
				<?php wp_link_pages(); ?>
<img src="/wp-content/themes/PinkOctober/images/filed_in.png"> <?php the_category(' &#183;  ') ?><br/>
<img src="/wp-content/themes/PinkOctober/images/lined_broken.png">
			</div>
			
			<?php comments_template(); ?>
	
		<?php endwhile; ?>
		
	<?php else : ?>

		<h2 class="pagetitle"><?php _e('Search Results'); ?></h2>
		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>



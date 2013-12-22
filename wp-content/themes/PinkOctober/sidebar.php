<?php /* 
This theme works with widgets, a plugin that allows you to easily modify 
your sidebar without having to bother with any html. Grab it at:
http://automattic.com/code/widgets/
*/ ?>

<div id="sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	<li>
		<h2>Profile</h2>
		<ul>
		Write up a profile here.
		</ul>
	</li>

	<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>' ); ?>
	<ul><li><a href="<?php bloginfo('url'); ?>">Home</a><br/></li></ul>
	


<h2>Recent</h2>

<ul><?php get_archives('postbypost', 10); ?></ul>
	<li id="archives">
		<h2><?php _e('Archives'); ?></h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>



	<li>

	
	<li id="categories">
		<h2><?php _e('Categories'); ?></h2>
		<ul>
		<?php wp_list_cats(); ?>
		</ul>
	</li>
	
	<?php if (function_exists('wp_theme_switcher')) { ?>
	<li id="themeswitcher">
		<h2><?php _e('Themes'); ?></h2>
		<?php wp_theme_switcher(); ?>
	</li>
	<?php } ?>
	
	<?php if ( is_home() ) { get_links_list(); } ?>	
	
	<li id="meta">
		<h2><?php _e('Meta'); ?></h2>
		<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS 2.0'); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://wordpress.org" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
                <li><a href="http://beccary.com" target="_blank" title="Base theme = Dusk by Beccary.com">Beccary.com</a> - Base theme</li> 
                <li><a href="http://scribblescratch.com" target="_blank" title="theme by Teresa Jones">Scribblescratch</a> & <a href="http://herbrokentoy.com" target="_blank" title="theme by Teresa Jones">Herbrokentoy</a></li>
		<?php wp_meta(); ?>
		</ul>
	</li>
	

	
<?php endif; ?>
</ul>
</div>




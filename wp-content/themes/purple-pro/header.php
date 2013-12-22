<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
  	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '', true, 'right' );?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div class="header">
		<div><?php get_search_form(); ?></div>
		<p class="title"><a href="<?php echo home_url(); ?>/" name="top"><?php bloginfo('name'); ?></a></p>
		<p class="tagline"><?php bloginfo('description'); ?></p>
	</div>
	<div class="nav">
		<?php wp_nav_menu( array('fallback_cb' => 'purple_pro_page_menu', 'depth' => '3', 'theme_location' => 'primary', 'link_before' => '', 'link_after' => '', 'container' => false) ); ?>
		<div class="clear"><!-- --></div>
	</div>
	<div class="content"><div>
		
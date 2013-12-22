	</div></div>

	<div class="footer"><div>

<?php if(is_front_page() & !is_paged() ) { ?>
<p class="powered">&copy; <?php echo date(Y); ?> <a href="http://www.jtwebdev.com" target="_blank">JTWebDev</a></p>
<p class="powered" style="display:none;"><?php _e('Theme created by', 'purple_pro'); ?> <a href="http://thememotive.com/">Theme Motive</a>. <?php _e('Powered by', 'purple_pro'); ?> <a href="http://wordpress.org/">WordPress</a>.</p>
<?php } ?>	
	
		<?php wp_nav_menu( array('fallback_cb' => 'purple_pro_page_menu', 'container' => false, 'menu' => 'secondary', 'depth' => '1', 'theme_location' => 'secondary', 'link_before' => '', 'link_after' => '') ); ?>
		
	</div></div>
<?php wp_footer(); ?>	
</body>
</html>
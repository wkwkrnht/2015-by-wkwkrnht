<footer class="entry-footer">
	<h2><?php echo get_option('entryfooter_txt')?></h2>
	<?php if(is_active_sidebar('entry-footer')):dynamic_sidebar('entry-footer');endif;?>
</footer>
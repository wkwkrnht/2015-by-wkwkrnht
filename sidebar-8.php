<footer class="entry-footer">
	<div id="movetop">∧</div>
	<script>jQuery('#movetop').click(function(){jQuery('body,html').animate({scrollTop:0},500);});</script>
	<h2><?php echo get_option('entryfooter_txt')?></h2>
	<?php if(is_active_sidebar('8')):
		dynamic_sidebar('8');
	else:
		get_template_part('parts/snsbutton');get_template_part('parts/related');
	endif;?>
</footer>
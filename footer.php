		<?php if(is_user_logged_in()):echo'<div class="sp_list">';$paged=get_query_var('paged');query_posts(array('paged'=>$paged,'post_status'=>array('publish','future','draft')));echo'</div>';wp_reset_query();endif;?>
	</section>
	<button id="secondary-toggle"><?php _e('Menu and widgets','twentyfifteen');?></button>
</div>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
<script src="<?php echo home_url();?>/wp-content/themes/2015-by-wkwkrnht/js/lity.min.js"></script>
<script>
	jQuery(function(){var $body = $('body');$('#secondary-toggle').on('click',function(){$body.toggleClass('open');});$('#secondary').on('click',function(){$body.removeClass('open');});});
	
	(function($){$(document).on('keydown.twentyfifteen',function(e){var url=false;if(e.which===37){url=$('.nav-previous a').attr('href');}else if(e.which===39){url=$('.nav-next a').attr('href');}if(url&&(!$('textarea,input').is(':focus'))){window.location=url;}});})(jQuery);
    (function(){var doc=document;var wpCss=doc.getElementsByClassName('wpcss');var wpCssL=wpCss.length;for(i=0;i<wpCssL;i++){var wpStyle=doc.createElement('style');wpStyle.textContent=wpCss[i].textContent.replace(/\s{2,}/g,"");doc.head.appendChild(wpStyle);}})()
</script>
<?php wp_footer();?>
</body>
</html>
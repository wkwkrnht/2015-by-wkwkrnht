		<?php if(is_user_logged_in()):echo'<div class="sp_list">';$paged=get_query_var('paged');query_posts(array('paged'=>$paged,'post_status'=>array('publish','future','draft')));echo'</div>';wp_reset_query();endif;?>
	</section>
</div>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
<script src="<?php echo home_uri();?>/wp-content/themes/2015-by-wkwkrnht/js/lity.min.js"></script>
<script> 
    (function(){var doc=document;var wpCss=doc.getElementsByClassName('wpcss');var wpCssL=wpCss.length;for(i=0;i<wpCssL;i++){var wpStyle=doc.createElement('style');wpStyle.textContent=wpCss[i].textContent.replace(/\s{2,}/g,"");doc.head.appendChild(wpStyle);}})()
</script>
<?php wp_footer();?>
</body>
</html>
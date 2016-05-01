<style>.card-list{border-radius:8px;}.card-info{background-color:#f7f7f7;color:#707070;margin-bottom:5px;}.card-thumb{max-width:825px;max-height:510px;}.card-title{font-size:40px;text-align:center;}@media screen and (max-width:55em){.card-list{margin-bottom:15px;}.card-thumb{max-width:825px;max-height:510px;margin-bottom:5px;}.card-title{font-size:27px;}.card-meta{font-size:14px;}}</style>
<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<section class="card-list">
		<div class="card-thumb"><?php twentyfifteen_post_thumbnail();?></div>
		<aside class="card-info">
			<div class="card-title"><?php if(is_single()):the_title();else:the_title(sprintf('<a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a>');endif;?></div>
			<div class="card-meta"><?php twentyfifteen_entry_meta();?></div>
		</aside>
	</section>
</article>
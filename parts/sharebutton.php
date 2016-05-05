<style>.share::before{color:#fff;font-size:40px;font-family:"FontAwesome";position:absolute;top:5%;}.share{width:65px;height:65px;border-radius:50%;margin:8px 12px;box-shadow:0 1px 6px rgba(0,0,0,.12);float:left;position:relative;}.tweet::before{content:"\f099";left:22%;}.tweet{background-color:#00b8ff;}.fb::before{content:"\f164";left:22%;}.fb{background-color:#0033ff;}.g1::before{content:"\f0d5";left:10%;}.printerest,.g1{background-color:#ff0033;}.line{background-color:#2aff00;}.hatebu::before{content:"\f02e";left:26%;}.hatebu{background-color:#3c7dd1;}.pocket::before{content:"\f265";left:19.5%;}.pocket{background-color:#ef3f56;}.tumblr::before{content:"\f173";left:28%;}.tumblr{background-color:#2c4762;}.linkedin::before{content:"\f0e1";left:22.5%;}.linkedin{background-color:#0077b5;}.embedly::before{content:"\f1e0";left:21.5%;}.embedly{background-color:#1d78af;}.printerest::before{content:"\f231";left:28%;}@media screen and (max-width:55em){.share::before{font-size:33px;top:5%;}.share{margin:5px;}.tweet::before{left:20%;}.fb::before{left:20%;}.linkedin::before{left:21%;}.pocket::before{left:17%;}.hatebu::before{left:26%;}.tumblr::before{left:27%;}.printerest::before{left:27%;}.embedly::before{left:20%;}}</style>
<div id="flex" class="snsshare">
	<div class="content">
		<a href="https://twitter.com/share?url=<?php echo get_permalink();?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=<?php the_author_meta('twitter');?>" class="sharewindow tweet share" target="_blank"></a>
		<a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode(get_permalink());?>" class="sharewindow fb button" target="_blank"><div class=""></div></a>
		<a href="http://line.me/R/msg/text/?<?php the_title();?>%0D%0A<?php the_permalink();?>" class="sharewindow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/line.svg" alt="LINEで送る" class="line share"/></a>
		<a href="https://plus.google.com/share?url=<?php echo get_permalink();?>" target="_blank" class="sharewindow g1 share"></a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank" class="sharewindow linkedin share"></a>
	</div>
	<div class="content">
		<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank" class="hatebu share"></a>
		<a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" class="sharewindow" target="_blank" class="pocket share"></a>
		<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>" class="printerest share"></a>
		<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink();?>" class="sharewindow" target="_blank" class="tumblr share"></a>
		<a href="http://cdn.embedly.com/widgets/embed?url=<?php the_permalink();?>" target="_blank" class="sharewindow embedly share"></a>
	</div>
</div>
<script>(function(){var shareButton=document.getElementsByClassName("sharewindow");for(var i=0;i<shareButton.length;i++){shareButton[i].addEventListener("click",function(e){e.preventDefault();window.open(this.href,"SNS_window","width=600,height=500,menubar=no,toolbar=no,scrollbars=yes");},false);}})()</script>
<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
<head>
	<?php if(is_singular()):echo'<link rel="amphtml" href=" . get_permalink() . ?amp=1">';endif;?>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width">
	<meta name="referrer" content="<?php echo get_option('referrer_setting');?>" />
	<meta name="google-site-verification" content="<?php echo get_option('Google_Webmaster');?>">
	<meta name="msvalidate.01" content="<?php echo get_option('Bing_Webmaster');?>">
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileImage" content="<?php echo get_option('ms_icon');?>"/>
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>"/>
	<meta http-equiv="cleartype" content="on">
	<meta name="renderer" content="webkit">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<link rel="fluid-icon" href="<?php echo get_option('icon');?>" title="<?php bloginfo('title');?>">
	<link rel="image_src" href="<?php echo get_option('icon');?>s" />
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<?php if(is_singular()):$category=get_the_category();$catname=$category[0]->cat_name;
		echo'<meta name="category" content="' . $catname . '">';
		echo'<link rel="publisher" href="http://plus.google.com/' . the_author_meta("Googleplus") . '">';
		echo'<link rel="alternate" type="application/json+oembed" href="' . home_url() . '/wp-json/oembed/1.0/embed?url=' . get_permalink() . '" />';
		echo'<link rel="alternate" type="text/xml+oembed" href="' . home_url() . '/wp-json/oembed/1.0/embed?url=' . get_permalink() . ';format=xml" />';
		echo'<link rel="prerender" href="' . home_url() . '">';
		echo'<link rel="dns-prefetch" href="//b.hatena.ne.jp">';
		echo'<link rel="dns-prefetch" href="//getpocket.com">';
		echo'<link rel="dns-prefetch" href="//' . get_option("Disqus_ID") . '.disqus.com">';
		echo'<link rel="dns-prefetch" href="//twitter.com">';
		echo'<link rel="dns-prefetch" href="//www.facebook.com">';
		echo'<link rel="dns-prefetch" href="//line.me">';
		echo'<link rel="dns-prefetch" href="//plus.google.com">';
		echo'<link rel="dns-prefetch" href="//www.linkedin.com">';
		echo'<link rel="dns-prefetch" href="//pinterest.com">';
		echo'<link rel="dns-prefetch" href="//www.tumblr.com">';
		echo'<link rel="dns-prefetch" href="//cdn.embedly.com">';
		echo'<link rel="dns-prefetch" href="//hatenablog.com">';
	else:
		echo'<link rel="prerender" href="' . get_permalink() . '">';
	endif;?>
	<meta property="og:type" content="blog">
	<?php if(is_single()){if(have_posts()):while(have_posts()):the_post();echo'<meta property="og:description" content="';mb_substr(get_the_excerpt(),0,100);echo'">';echo"\n";endwhile;endif;
	  echo'<meta property="og:title" content="';the_title();echo'">';echo"\n";
	  echo'<meta property="og:url" content="';the_permalink();echo'">';echo"\n";
	}else{
	  echo'<meta property="og:description" content="';bloginfo('description');echo'">';echo"\n";
	  echo'<meta property="og:title" content="'; bloginfo('name');echo'">';echo"\n";
	  echo'<meta property="og:url" content="';echo esc_url(home_url());echo'">';echo"\n";}
	$str=$post->post_content;$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
	if(is_single()){if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$image=wp_get_attachment_image_src($image_id,'full');echo'<meta property="og:image" content="';echo$image[0];echo'">';echo"\n";
	}elseif(preg_match($searchPattern,$str,$imgurl) && !is_archive()){echo'<meta property="og:image" content="';echo $imgurl[2];echo'">';echo"\n";
	  }else{echo'<meta property="og:image" content="/img/no-img.png">';echo"\n";}
	}else{if(get_header_image()){echo'<meta property="og:image" content="';get_header_image();echo'">';echo "\n";}else{echo'<meta property="og:image" content="/img/icon.png">';echo"\n";}}?>
	<meta property="og:site_name" content="<?php bloginfo('name');?>">
	<meta property="og:locale" content="ja_JP"/>
	<meta property="fb:admins" content="<?php echo get_option('facebookr_admins');?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebookr_appid');?>">
	<meta name="twitter:card" content="summary">
	<?php if(is_single()){if(have_posts()):while(have_posts()):the_post();echo'<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(),0,100).'">';echo"\n";endwhile;endif;
	  echo'<meta name="twitter:title" content="';the_title();echo'">';echo"\n";
	  echo'<meta name="twitter:url" content="';the_permalink();echo'">';echo"\n";
	}else{
	  echo'<meta name="twitter:description" content="';bloginfo('description');echo'">';echo"\n";
	  echo'<meta name="twitter:title" content="';bloginfo('name'); echo'">';echo"\n";
	  echo'<meta name="twitter:url" content="';echo esc_url(home_url());echo'">';echo"\n";}
	$str=$post->post_content;$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
	if(is_single()){
	  if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$img_url=$image[0];$image=wp_get_attachment_image_src($image_id,'full');echo'<meta name="twitter:image" content="';echo$image[0];echo'">';echo"\n";
	  }elseif(preg_match($searchPattern,$str,$imgurl)&&!is_archive()){$img_url=$imgurl[2];echo'<meta name="twitter:image" content="';echo$imgurl[2];echo'">';echo"\n";
	  }else{echo '<meta name="twitter:image" content="/img/no-img.png">';echo"\n";}
	}else{if(get_header_image()){echo'<meta name="twitter:image" content="'.get_header_image().'">';echo"\n";}else{echo'<meta name="twitter:image" content="/img/icon.png">';echo"\n";}}
	preg_match('/https?:\/\/(.+?)\//i',admin_url(),$results);?>
	<meta name="twitter:domain" content="<?php echo $results[1] ?>">
	<meta name="twitter:image:width" content="825px">
	<meta name="twitter:image:height" content="510px">
	<meta name="twitter:creator" content="@<?php if(is_single()){echo the_author_meta('twitter');}else{echo get_option('Twitter_URL');};?>">
	<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
	<link rel="stylesheet" href="<?php echo home_uri();?>/wp-content/themes/2015-by-wkwkrnht/css/lity.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script>
		(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);
		(function(){var ua=navigator.userAgent.toLowerCase();if((ua.indexOf('webkit')>-1||ua.indexOf('opera')>-1||ua.indexOf('msie')>-1)&&document.getElementById&&window.addEventListener){window.addEventListener('hashchange',function(){var element=document.getElementById(location.hash.substring(1));if(element){if(!/^(?:a|select|input|button|textarea)$/i.test(element.nodeName)){element.tabIndex=-1;}element.focus();}},false);}})();
		function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create',<?php echo get_option('Google_Analytics');?>,'auto');ga('send','pageview');
	</script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content','twentyfifteen');?></a>
	<section id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php twentyfifteen_the_custom_logo();?>
				<button class="secondary-toggle"><?php _e('Menu and widgets','twentyfifteen');?></button>
				<?php if(is_front_page()&&is_home()):?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></h1>
				<?php else:?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></p>
				<?php endif;?>
				<?php $description=get_bloginfo('description','display');if($description||is_customize_preview()):echo'<p class="site-description">' . $description . '</p>';endif;?>
			</div>
		</header>
		<?php get_sidebar();?>
	</section>
	<section id="content" class="site-content">
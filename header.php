<!DOCTYPE html>
<html <?php language_attributes();?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="utf-8">
	<meta name="referrer" content="<?php echo get_theme_mod('referrer_setting','default');?>">
	<meta name="description" content="<?php meta_description();?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="cleartype" content="on">
	<meta name="renderer" content="webkit">
	<?php
	$bing   = false;
	$google = false;
	$pi     = false;
	$txt    = false;
	$bing   = get_option('Bing_Webmaster');
	$google = get_option('Google_Webmaster');
	$pin    = get_option('Pinterest');
	$txt    = get_option('header_txt');
	if($bing!==false){echo'<meta name="msvalidate.01" content="' . $bing . '">';}
	if($google!==false){echo'<meta name="google-site-verification" content="' . $google . '">';}
	if($pin!==false){echo'<meta name="p:domain_verify" content="' . $pin . '">';}?>
	<meta name="theme-color" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta name="msapplication-TileColor" content="<?php echo get_option('GoogleChrome_URLbar');?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebook_appid');?>">
	<meta property="og:type" content="article">
	<?php if(is_home()===false):?><meta property="og:title" content="<?php wp_title('｜',true,'right');bloginfo('name');?>"><?php endif;?>
	<meta property="og:url" content="<?php echo get_meta_url();?>">
	<meta property="og:description" content="<?php meta_description();?>">
	<meta property="og:site_name" content="<?php bloginfo('name');?>">
	<meta property="og:image" content="<?php meta_image();?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:domain" content="<?php echo $_SERVER['SERVER_NAME'];?>">
	<meta name="twitter:title" content="<?php wp_title('');?>">
	<meta name="twitter:description" content="<?php meta_description();?>">
	<meta name="twitter:image" content="<?php meta_image();?>">
	<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<link rel="prerender" href="<?php if(is_home()):echo get_permalink();else:echo site_url();endif;?>">
	<link rel="fluid-icon" href="<?php meta_image();?>" title="<?php bloginfo('name');?>">
	<link rel="image_src" href="<?php meta_image();?>" url="<?php meta_image();?>" height="256" width="256">
	<?php
	include_once(get_template_directory() . '/inc/meta-json.php');
	include_once(get_template_directory() . '/styles.php');
	wp_head();
	if($txt!==false){echo $txt;}?>
</head>
<body <?php body_class();?>>
	<aside id="menu-wrap">
        <?php
    	$site_url  = site_url();
    	$year      = get_first_post_year();
    	$blogname  = get_bloginfo('name');
    	echo'<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">';
    		if(is_404()===true){
    			echo'<a href="' . $site_url . '" tabindex="0" itemprop="url"><h1 class="site-title" itemprop="name headline">404 Not Found｜' . $blogname . '</h1><br><p class="site-description" itemprop="about">このサイトにはお探しのものはございません。お手数を掛けますが、再度お探しください。</p></a>';
    		}elseif(is_category()===true){
    			echo'<h1 class="site-title" itemprop="name headline about">「' . single_cat_title('',false) . '」の記事一覧｜' . $blogname . '</h1>';
    		}elseif(is_tag()===true){
    			echo'<h1 class="site-title" itemprop="name headline about">「' . single_tag_title('',false) . '」の記事一覧｜' . $blogname . '</h1>';
    		}elseif(is_search()===true){
    			global $wp_query;
    			$serachresult = $wp_query->found_posts;
    			$maxpage      = $wp_query->max_num_pages;
    			wp_reset_query();
    			echo'<h1 class="site-title" itemprop="name headline about">「' . get_search_query() . '」の検索結果｜' . $blogname . '</h1><br><p class="site-description">' . $serachresult . ' 件 / ' . $maxpage . ' ページ</p>';
    		}else{
    			echo'<a href="' . $site_url . '" tabindex="0" itemprop="url"><h1 class="site-title" itemprop="name headline">' . $blogname . '</h1></a>';
    		}
    		echo'<br>
    		<span class="copyright"><span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"><span itemprop="name"><b>' . $blogname . '</b></span></span>&nbsp;&nbsp;&copy;<span itemprop="copyrightYear">' . $year . '</span></span>
    	</header>';
    	?>
        <nav id="share-menu" class="block">
            <ul>
    		    <li class="tweet"><a href="https://twitter.com/share?url=<?php echo get_meta_url();?>&amp;text=<?php wp_title('');?><?php if(get_twitter_acount()!==null):echo '&amp;via=' . get_twitter_acount();endif;?>" target="_blank" title="Twitterへの共有リンク"><i class="fa fa-twitter fa-5x" aria-hidden="true"></i></a></li>
                <li class="fb-like"><a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode(get_meta_url());?>" target="_blank" title="Facebookへの共有リンク"><i class="fa fa-thumbs-up fa-5x" aria-hidden="true"></i></a></li>
                <li class="line"><a href="http://lineit.line.me/share/ui?url=<?php echo get_meta_url();?>" target="_blank" title="LINEへの共有リンク"><i class="fa fa-comments fa-5x" aria-hidden="true"></i></a></li>
                <li class="g-plus"><a href="https://plus.google.com/share?url=<?php echo get_meta_url();?>" target="_blank" title="Google+への共有リンク"><i class="fa fa-google-plus-official fa-5x" aria-hidden="true"></i></a></li>
                <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Linkedinへの共有リンク"><i class="fa fa-linkedin-square fa-5x" aria-hidden="true"></i></a></li>
                <li class="buffer"><a href="https://bufferapp.com/add?url<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Bufferへの共有リンク">Buffer</a></li>
                <li class="reddit"><a href="https://www.reddit.com/submit?url=<?php echo get_meta_url();?>" target="_blank" title="Redditへの共有リンク"><i class="fa fa-reddit-alien fa-5x" aria-hidden="true"></i></a></li>
                <li class="vk"><a href="http://vkontakte.ru/share.php?url=<?php echo get_meta_url();?>" target="_blank" title="VKへの共有リンク"><i class="fa fa-vk fa-5x" aria-hidden="true"></i></a></li>
                <li class="stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="StumbleUponの共有リンク"><i class="fa fa-stumbleupon-circle fa-5x" aria-hidden="true"></i></a></li>
                <li class="hatebu"><a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="はてなブックマークへの共有リンク">B!</a></li>
                <li class="pocket"><a href="http://getpocket.com/edit?url=<?php echo get_meta_url();?>&amp;title=<?php wp_title('');?>" target="_blank" title="Pocketへの共有リンク"><i class="fa fa-get-pocket fa-5x" aria-hidden="true"></i></a></li>
                <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_meta_url();?>&amp;media=<?php meta_image();?>" target="_blank" title="Pinterestへの共有リンク"><i class="fa fa-pinterest fa-5x" aria-hidden="true"></i></a></li>
                <li class="instapaper"><a href="http://www.instapaper.com/text?u=<?php echo get_meta_url();?>" target="_blank" title="Instapaperへの共有リンク">I</a></li>
                <li class="tumblr"><a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_meta_url();?>" target="_blank" title="thumblrへの共有リンク"><i class="fa fa-tumblr fa-5x" aria-hidden="true"></i></a></li>
            </ul>
        </nav>
        <div id="main-menu" class="block">
            <?php if(has_nav_menu('social')):?>
                <nav class="social-nav">
                    <?php wp_nav_menu(array('theme_location'=>'social','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>','walker'=>new add_meta_Social_Menu));?>
                </nav>
            <?php endif;?>
            <?php if(has_nav_menu('main')):?>
                <nav class="main-nav">
                    <?php wp_nav_menu(array('theme_location'=>'main','container'=>false,'items_wrap'=>'<ul id="%1$s" class="%2$s" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>','walker'=>new add_meta_Nav_Menu));?>
                </nav>
            <?php endif;?>
            <?php if(is_active_sidebar('floatmenu')):?>
    	        <ul class="widget-area">
    		        <?php dynamic_sidebar('floatmenu');?>
                </ul>
            <?php endif;?>
        </div>
    </aside>
	<main id="site-main">

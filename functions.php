<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 * Twenty Fifteen only works in WordPress 4.1 or later.
 * @since Twenty Fifteen 1.0
 */
if(!isset($content_width)){$content_width = 660;}
if(version_compare($GLOBALS['wp_version'],'4.1-alpha','<')){require get_template_directory() . '/inc/back-compat.php';}
/** 
 * Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
if(!function_exists('twentyfifteen_setup')):
function twentyfifteen_setup(){

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 * Custom template tags for this theme.
 * Customizer additions.
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
//消去(/?ver=|emoji|error action|genericons)&oEmbed(by WPteam)対応
function remove_ver_script($src){if(strpos($src,'ver=')):$src=remove_query_arg('ver',$src);return $src;endif;}
function wkwkrnht_embed_analytics(){ ?>
<script type="text/javascript">
	function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create',<?php echo get_option('Google_Analytics');?>,'auto');ga('send','pageview');
</script>
<?php }
function oficialoembed_support_scripts(){if(is_singular(array('post','page'))):wp_enqueue_style('wp-embed-template-ie');wp_enqueue_style('oficial_wp_embed_style',includes_url('css/wp-embed-template.min.css'));wp_enqueue_script('oficial_oembed_script',includes_url('js/wp-embed-template.min.js'),array(),'',true);endif;}
remove_action('wp_head','wp_generator');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
add_action('embed_head','wkwkrnht_embed_analytics');
add_action('wp_enqueue_scripts','oficialoembed_support_scripts');
add_action('wp_enqueue_scripts',function(){wp_dequeue_style('genericons');},11);
add_action('login_head',function(){remove_action('login_head','wp_shake_js',12);});
add_filter('embed_thumbnail_image_size',function(){return'thmb150';});
add_filter('style_loader_src','remove_ver_script',9999);
add_filter('script_loader_src','remove_ver_script',9999);
//メタとサムネ(標準とAMP)&コピーライト
function twentyfifteen_entry_meta(){if(is_sticky()&&is_home()&&!is_paged()):printf('<span class="sticky-post">%s</span>',__('Featured','twentyfifteen'));endif;//投稿を先頭に固定
  //投稿日|更新日|投稿者|カテゴリー|タグ|画像サイズ(横 x 縦)表示|コメントをどうぞ|コメント数(順同)
  if(in_array(get_post_type(),array('post','attachment'))){
    $time_string='<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if(get_the_time('U')!==get_the_modified_time('U')){$time_string='<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';}
      $time_string=sprintf($time_string,esc_attr(get_the_date('c')),get_the_date(),esc_attr(get_the_modified_date('c')),get_the_modified_date());
      printf('<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',_x('Posted on','Used before publish date.','twentyfifteen'),esc_url(get_permalink()),$time_string);
      echo('<span class="humantime">（');echo human_time_diff(get_the_time('U'), current_time('timestamp'));echo('前）</span>');}
  if('post'==get_post_type()){
    if(is_singular()&&is_multi_author()){printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s</span><a class="url fn n" href="%2$s">%3$s</a></span></span><br />',_x('Author','Used before post author name.','twentyfifteen'),esc_url(get_author_posts_url(get_the_author_meta('ID'))),get_the_author());}
    $categories_list=get_the_category_list(_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($categories_list&&twentyfifteen_categorized_blog()){printf('<span class="cat-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',_x('Categories','Used before category names.','twentyfifteen'),$categories_list);}
    $tags_list=get_the_tag_list('',_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($tags_list){printf('<span class="tags-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',_x('Tags','Used before tag names.','twentyfifteen'),$tags_list);}}
  if(is_attachment()&&wp_attachment_is_image()){$metadata=wp_get_attachment_metadata();printf('<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times;%4$s</a></span>',_x('Full size','Used before full size attachment link.','twentyfifteen'),esc_url(wp_get_attachment_url()),$metadata['width'],$metadata['height']);}
  if(!is_single()&&!post_password_required()&&(comments_open()||get_comments_number())){echo'<span class="comments-link">';comments_popup_link(__('Leave a comment','twentyfifteen'),__('1 Comment','twentyfifteen' ),__('% Comments','twentyfifteen'));echo'</span>';}
}
if(!function_exists('twentyfifteen_post_thumbnail')):function twentyfifteen_post_thumbnail(){if(post_password_required()||is_attachment()||!has_post_thumbnail()){return;}if(is_singular()):?><div class="post-thumbnail"><?php the_post_thumbnail();?></div><?php else:?><a class="post-thumbnail" href="<?php the_permalink();?>" aria-hidden="true"><?php the_post_thumbnail('post-thumbnail',array('alt'=>get_the_title()));?></a><?php endif;}endif;
function amp_entry_meta(){if(in_array(get_post_type(),array('post','attachment'))){$time_string='<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if(get_the_time('U')!==get_the_modified_time('U')){$time_string='<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';}
	$time_string=sprintf($time_string,esc_attr(get_the_date('c')),get_the_date(),esc_attr(get_the_modified_date('c')),get_the_modified_date());
	printf('<span>%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',_x('Posted on','Used before publish date.','twentyfifteen'),esc_url(get_permalink()),$time_string);
	echo('<span>（');echo human_time_diff(get_the_time('U'),current_time('timestamp'));echo('前）</span>');}}
function get_first_post_year(){$year=null;query_posts('posts_per_page=1&order=ASC');if(have_posts()):while(have_posts()):the_post();$year=intval(get_the_time('Y'));endwhile;endif;wp_reset_query();return $year;}
//サムネサイズ追加&Alt属性がないIMGタグにalt=""を追加する&サムネ自動設定
add_image_size('related',150,150,true);
add_filter('the_content',function($content){return preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);});
require_once(ABSPATH . '/wp-admin/includes/image.php');
function fetch_thumbnail_image($matches,$key,$post_content,$post_id){
  $imageTitle='';
  preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i',$post_content,$matchesTitle);
  if(count($matchesTitle) && isset($matchesTitle[1])){$imageTitle=$matchesTitle[1][$key];}
  $imageUrl=$matches[1][$key];$filename=substr($imageUrl,(strrpos($imageUrl,'/'))+1);
  if(!(($uploads=wp_upload_dir(current_time('mysql')))&&false===$uploads['error'])){return null;}
  $filename=wp_unique_filename($uploads['path'],$filename);$new_file=$uploads['path'] . "/$filename";
  if(!ini_get('allow_url_fopen')){$file_data=curl_get_file_contents($imageUrl);
  }else{if(WP_Filesystem()){global $wp_filesystem;$file_data=@$wp_filesystem->get_contents($imageUrl);}}
  if(!$file_data){return null;}
  if(WP_Filesystem()){global $wp_filesystem;$wp_filesystem->put_contents($new_file,$file_data);}
  $stat=stat(dirname($new_file));$perms=$stat['mode']&0000666;
  @ chmod($new_file,$perms);
  $wp_filetype=wp_check_filetype($filename,$mimes);
  extract($wp_filetype);
  if((!$type||!$ext)&&!current_user_can('unfiltered_upload')){return null;}
  $url=$uploads['url'] . "/$filename";
  $attachment=array('post_mime_type'=>$type,'guid'=>$url,'post_parent'=>null,'post_title'=>$imageTitle,'post_content'=>'',);
  $thumb_id=wp_insert_attachment($attachment,$file,$post_id);
  if(!is_wp_error($thumb_id)){wp_update_attachment_metadata($thumb_id,wp_generate_attachment_metadata($thumb_id,$new_file));update_attached_file($thumb_id,$new_file);return $thumb_id;}
  return null;}
function auto_post_thumbnail_image(){global $wpdb;global $post;$post_id=$post->ID;
  if(get_post_meta($post_id,'_thumbnail_id',true) || get_post_meta($post_id,'skip_post_thumb',true)){return;}
  $post=$wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");$matches=array();
  preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i', $post[0]->post_content, $matches);
  if(empty($matches[0])){preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
    if(!empty($match[1])){$matches=array();$matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');}}
  if(count($matches)){foreach($matches[0]as$key=>$image){preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);$thumb_id = $thumb_id[1];
      if(!$thumb_id){$image=substr($image,strpos($image,'"')+1);$result=$wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");$thumb_id=$result[0]->ID;}
      if(!$thumb_id){$thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);}
      if($thumb_id){update_post_meta($post_id,'_thumbnail_id',$thumb_id);break;}
    }
  }
}
add_action('save_post','auto_post_thumbnail_image');
add_action('draft_to_publish','auto_post_thumbnail_image');
add_action('new_to_publish','auto_post_thumbnail_image');
add_action('pending_to_publish','auto_post_thumbnail_image');
add_action('future_to_publish','auto_post_thumbnail_image');
//@hoge→twitterリンク&キーワードハイライト&ルビサポート&ショートコード(スクショ&QRコード&embedly&はてなブログカード)
function ruby_setup(){global $allowedposttags;foreach(array('ruby','rp','rt') as $tag )if(!isset($allowedposttags[$tag]))$allowedposttags[$tag]=array();}
function wps_highlight_results($text){if(is_search()){$sr=get_query_var('s');$keys=explode(" ",$sr);$text=preg_replace('/('.implode('|',$keys) .')/iu','<span class="marker">'.$sr.'</span>',$text);}return $text;}
function twtreplace($content){$twtreplace=preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);return $twtreplace;}
function api_sc_shot($attributes){extract(shortcode_atts(array('url'=>'',),$attributes));$imageUrl=sc_shot($url);if($imageUrl==''){return'';}else{return'<a href="' . $url . '" target="_blank"><img src="' . $imageUrl . '" alt="' . $url . '"/></a>';}}
function sc_shot($url=''){return'http://s.wordpress.com/mshots/v1/' . urlencode(clean_url($url)) . '?w=500';}
function url_to_qrcode($atts){extract(shortcode_atts(array('url'=>'',),$atts));return'<a href="' . $url . '" target="_blank" class="qrcode"><img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=' . $url . '&choe=UTF-8" alt="QR Code"/></a>';}
function url_to_embedly($atts){extract(shortcode_atts(array('url'=>'',),$atts));$content='<a class="embedly-card" href="' . $url . '"></a><script async="" charset="UTF-8" src="//cdn.embedly.com/widgets/platform.js"></script>';return $content;}
function url_to_hatenaBlogcard($atts){extract(shortcode_atts(array('url'=>'',),$atts));$content='<iframe class="hatenablogcard" src="http://hatenablog.com/embed?url=' . $url . '" frameborder="0" scrolling="no"></iframe>';return $content;}
add_shortcode('scshot','api_sc_shot');
add_shortcode('myqrcode','url_to_qrcode');
add_shortcode('embedly','url_to_embedly');
add_shortcode('hatenaBlogcard','url_to_hatenaBlogcard');
add_filter('the_content','twtreplace');
add_filter('comment_text','twtreplace');
add_filter('the_title','wps_highlight_results');
add_filter('the_content','wps_highlight_results');
add_action('after_setup_theme','ruby_setup');
//entry-footerウィジェットエリア化&独自ウィジェットの追加(SNSボタン|Disqus|関連記事|テキストウイジェット(PCのみ表示))&カレンダー短縮
function entry_footer_sidebar(){register_sidebar(array('name'=>'エントリーフッター','id'=>'8','before_widget'=>'<div>','after_widget'=>'</div>','before_title'=>'','after_title'=>'',));}
add_action('widgets_init','entry_footer_sidebar');
class PcTextWidgetItem extends WP_Widget{
  function PcTextWidgetItem(){parent::WP_Widget(false,$name='Text widget（for PC）');}
  function widget($args,$instance){extract($args);$title=apply_filters('widget_title_pc_text',$instance['title_pc_text']);$text=apply_filters('widget_text_pc_text',$instance['text_pc_text']);if(!wp_is_mobile()):echo('<div id="pc-text-widget" class="widget pc_text">');if($title){echo '<h4>'.$title.'</h4>';}echo('<div class="text-pc">');echo $text;echo'</div></div>';endif;}
  function update($new_instance,$old_instance){$instance=$old_instance;$instance['title_pc_text']=strip_tags($new_instance['title_pc_text']);$instance['text_pc_text']=$new_instance['text_pc_text'];return $instance;}
  function form($instance){if(empty($instance)){$instance = array('title_pc_text'=>null,'text_pc_text'=>null,);}
    $title=esc_attr($instance['title_pc_text']);$text=esc_attr($instance['text_pc_text']);?>
    <p>
      <label for="<?php echo $this->get_field_id('title_pc_text');?>"><?php _e('Title');?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title_pc_text');?>" name="<?php echo $this->get_field_name('title_pc_text');?>" type="text" value="<?php echo $title;?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('text_pc_text');?>"><?php _e('Text');?></label>
      <textarea class="widefat" id="<?php echo $this->get_field_id('text_pc_text');?>" name="<?php echo $this->get_field_name('text_pc_text');?>" cols="20" rows="16"><?php echo $text;?></textarea>
    </p>
    <?php
  }
}
add_action('widgets_init',create_function('','return register_widget("PcTextWidgetItem");'));
class author_bio extends WP_Widget{
    function __construct(){parent::__construct('author_bio','著者プロフィール',array('description'=>'著者プロフィール',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/authorbio');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('author_bio');});
class sns_sharebutton extends WP_Widget{
    function __construct(){parent::__construct('sns_sharebutton','SNSシェアボタン',array('description'=>'SNSシェアボタン',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/sharebutton');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('sns_sharebutton');});
class related_posts extends WP_Widget{
    function __construct(){parent::__construct('related_posts','関連記事',array('description'=>'関連記事',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/related');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('related_posts');});
class disqus_widget extends WP_Widget{
    function __construct(){parent::__construct('disqus_widget','Disqus',array('description'=>'Disqus',));}
    public function widget($args,$instance){echo $args['before_widget'];?><div id="disqus_thread"></div><script>(function(){var d=document,s=d.createElement('script');s.src='//<?php echo get_option('Disqus_ID')?>.disqus.com/embed.js';s.setAttribute('data-timestamp',+new Date());(d.head||d.body).appendChild(s);})();</script><noscript><a href="https://disqus.com/?ref_noscript" rel="nofollow">Please enable JavaScript to view the comments powered by Disqus.</a></noscript><?php echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('disqus_widget');});
function my_archives_link($link_html){
    $currentMonth=date('n');
    $currentYear=date('Y');
    $ym=explode('年',$link_html);
    $monthArray=explode('月',$ym[1]);
    $month=$monthArray[0];
    $year=intval(strip_tags($ym[0]));
    $linkMonth=substr('0'.$month,-2);
    $url=site_url('/').$year.'/'.$linkMonth.'/';
    $linkString='%s<a href="'.$url.'" style="white-space: nowrap;">%s</a>'.
    $linkYear='';
    $yearHtml='<span style="font-weight:bold;">%s</span><br />';
    if(($currentMonth == $month)AND($currentYear == $year)){$linkYear=sprintf($yearHtml,$year);
    }else{if((intval($month) == 12)AND($currentYear != $year)){$linkYear='<br/>'.sprintf($yearHtml,$year);}}
    return sprintf($linkString,$linkYear,$ym[1]);}
add_filter('get_archives_link','my_archives_link');
//カテゴリー説明文をメタ化
function get_meta_description_from_category(){$cate_desc=trim(strip_tags(category_description()));if($cate_desc){return $cate_desc;}$cate_desc='「' . single_cat_title('',false) . '」の記事一覧です。' . get_bloginfo('description');return $cate_desc;}
function get_meta_keyword_from_category(){return single_cat_title('',false) . ',ブログ,記事一覧';}
function get_mtime($format){$mtime=get_the_modified_time('Ymd');$ptime=get_the_time('Ymd');if($ptime > $mtime){return get_the_time($format);}elseif($ptime === $mtime){return null;}else{return get_the_modified_time($format);}}
//管理者向けウィジェット
function appbox_parameters_dashboard_widget(){
    echo'パラメータは半角スペースの後に入力<br />フォーマット→simple OR compact<br />スクショ→screenshots(-only)<br />旧価格→フォーマット合わせて入力<br />';
}
function add_dashboard_widgets(){
	wp_add_dashboard_widget('appbox_dashboard_widget','appBoxのパラメータ','appbox_parameters_dashboard_widget');
}
add_action('wp_dashboard_setup','add_dashboard_widgets');
//クイックタグ追加
function appthemes_add_quicktags(){
    if(wp_script_is('quicktags')){ ?>
    <script type="text/javascript">
		QTags.addButton('qt-p','p','<p>','</p>');
		QTags.addButton('qt-h2','h2','<h2>','</h2>');
		QTags.addButton('qt-h3','h3','<h3>','</h3>');
		QTags.addButton('qt-h4','h4','<h4>','</h4>');
		QTags.addButton('qt-marker','マーカー','<span class="marker">','</span>');
		QTags.addButton('qt-scshot','スクショ','[scshot url=',']');
		QTags.addButton('qt-myqrcode','QRコード','[myqrcode url=',']');
		QTags.addButton('qt-embedly','embedly','[embedly url=',']');
		QTags.addButton('qt-hatenablogcard','はてなブログカード','[hatenaBlogcard url=',']');
    </script>
<?php }}
add_action('admin_print_footer_scripts','appthemes_add_quicktags');
//カスタマイザー弄り&投稿記事一覧にアイキャッチ画像を表示
function customize_admin_add_column($column_name,$post_id){if('thumbnail'==$column_name){$thum=get_the_post_thumbnail($post_id,array(100,100));}if(isset($thum)&&$thum){echo $thum;}}
add_filter('manage_posts_columns',function($columns){$columns['thumbnail']=__('Thumbnail');return $columns;});
add_action('manage_posts_custom_column','customize_admin_add_column',10,2);
add_action('customize_register','theme_customize');
function theme_customize($wp_customize){
    $wp_customize->add_section('sns_section',array('title'=>'独自設定','priority'=>1,'description'=>'セクションの詳細',));
	$wp_customize->add_setting('Adminnav_Dsp',array('type'=>'theme_mod',));
    $wp_customize->add_control('Adminnav_Dsp',array('section'=>'sns_section','settings'=>'Adminnav_Dsp','label'=>'管理者向けメニューを表示する','type'=>'checkbox'));
	$wp_customize->add_setting('entryfooter_txt',array('type'=>'option',));
    $wp_customize->add_control('entryfooter_txt',array('section'=>'sns_section','settings'=>'entryfooter_txt','label'=>'エントリーフッターのタイトルを入力する','type'=>'text'));
    $wp_customize->add_setting('GoogleChrome_URLbar',array('type'=>'option',));
    $wp_customize->add_control('GoogleChrome_URLbar',array('section'=>'sns_section','settings'=>'GoogleChrome_URLbar','label'=>'モバイル版GoogleChrome向けURLバーの色コードを指定する','type'=>'text'));
    $wp_customize->add_setting('Google_Webmaster',array('type'=>'option',));
    $wp_customize->add_control('Google_Webmaster',array('section'=>'sns_section','settings'=>'Google_Webmaster','label'=>'サイトのGoogleSerchconsole向けコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Bing_Webmaster',array('type'=>'option',));
    $wp_customize->add_control('Bing_Webmaster',array('section'=>'sns_section','settings'=>'Bing_Webmaster','label'=>'サイトのBingWebmaster向けコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Google_Analytics',array('type'=>'option',));
    $wp_customize->add_control('Google_Analytics',array('section'=>'sns_section','settings'=>'Google_Analytics','label'=>'サイトのGoogleAnalyticsコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Other_Analytics',array('type'=>'option',));
    $wp_customize->add_control('Other_Analytics',array('section'=>'sns_section','settings'=>'Other_Analytics','label'=>'サイトのAnalyticsコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Twitter_URL',array('type'=>'option',));
    $wp_customize->add_control('Twitter_URL',array('section'=>'sns_section','settings'=>'Twitter_URL','label'=>'サイト全体のTwitterアカウントへを指定する','type'=>'text'));
    $wp_customize->add_setting('facebookr_appid',array('type'=>'option',));
    $wp_customize->add_control('facebookr_appid',array('section'=>'sns_section','settings'=>'facebookr_appid','label'=>'facebookのappidを表示する','type'=>'text'));
    $wp_customize->add_setting('facebookr_admins',array('type'=>'option',));
    $wp_customize->add_control('facebookr_admins',array('section'=>'sns_section','settings'=>'facebookr_admins','label'=>'facebookのadminidを指定する','type'=>'text'));
    $wp_customize->add_setting('Pushnotice_URL',array('type'=>'option',));
    $wp_customize->add_control('Pushnotice_URL',array('section'=>'sns_section','settings'=>'Pushnotice_URL','label'=>'プッシュ通知の登録URLを入力する','type'=>'text'));
	$wp_customize->add_setting('Disqus_ID',array('type'=>'option',));
    $wp_customize->add_control('Disqus_ID',array('section'=>'sns_section','settings'=>'Disqus_ID','label'=>'DisqusのIDを入力する','type'=>'text'));
}
function is_adminnav_dsp(){return get_theme_mod('Adminnav_Dsp','false');}
//プロフィール欄追加(the_author_meta('twitter')で表示)
function my_new_contactmethods($contactmethods){
  $contactmethods['TEL']='TEL';
  $contactmethods['FAX']='FAX';
  $contactmethods['Addres']='住所';
  $contactmethods['Graveter']='Graveter';
  $contactmethods['LINE']='LINE';
  $contactmethods['YO']='YO!';
  $contactmethods['twitter']='Twitter';
  $contactmethods['facebook']='Facebook';
  $contactmethods['Linkedin']='Linkedin';
  $contactmethods['Googleplus']='Google+';
  $contactmethods['Github']='Github';
  $contactmethods['Bitbucket']='Bitbucket';
  $contactmethods['Codepen']='Codepen';
  $contactmethods['JSbuddle']='JSbuddle';
  $contactmethods['Quita']='Quita';
  $contactmethods['xda']='xda';
  $contactmethods['hatenablog']='はてなブログ';
  $contactmethods['hatenadiary']='はてなダイアリー';
  $contactmethods['hatebu']='はてなブックマーク';
  $contactmethods['Pocket']='Pocket';
  $contactmethods['ameba']='アメーバ';
  $contactmethods['fc2']='fc2';
  $contactmethods['mixi']='mixi';
  $contactmethods['Instagram']='Instagram';
  $contactmethods['Pinterest']='Pinterest';
  $contactmethods['Flickr']='Flickr';
  $contactmethods['FourSquare']='FourSquare';
  $contactmethods['Swarm']='Swarm';
  $contactmethods['Steam']='Steam';
  $contactmethods['XboxLive']='XboxLive';
  $contactmethods['PSN']='PSN';
  $contactmethods['NINTENDOaccount']='ニンテンドーアカウント';
  $contactmethods['NINTENDONetworkID']='ニンテンドーネットワークID';
  $contactmethods['friendcode']='フレンドコード';
  $contactmethods['UPlay']='UPlay';
  $contactmethods['EAOrigin']='EAOrigin';
  $contactmethods['SQUAREENIXMembers']='SQUAREENIXMembers';
  $contactmethods['BANDAINAMCOID']='BANDAINAMCOID';
  $contactmethods['SEGAID']='SEGAID';
  $contactmethods['vine']='vine';
  $contactmethods['vimeo']='vimeo';
  $contactmethods['YouTube']='YouTube';
  $contactmethods['USTREAM']='USTREAM';
  $contactmethods['Twitch']='Twitch';
  $contactmethods['niconico']='niconico';
  $contactmethods['Skype']='Skype';
  $contactmethods['twitcasting']='ツイキャス';
  $contactmethods['MixCannel']='MixChannel';
  $contactmethods['Slideshare']='Slideshare';
  $contactmethods['Medium']='Medium';
  $contactmethods['note']='note';
  $contactmethods['Pxiv']='Pxiv';
  $contactmethods['Tumblr']='Tumblr';
  $contactmethods['Blogger']='Blogger';
  $contactmethods['livedoor']='livedoor';
  $contactmethods['wordpress.com']='wordpress.com';
  $contactmethods['wordpress.org']='wordpress.org';
  $contactmethods['Adsense']='アドセンス';
  $contactmethods['A8.net']='A8.net';
  $contactmethods['GoogleAdsense']='GoogleAdsense';
  $contactmethods['AmazonAdsense']='Amazonアフィリエイト';
  $contactmethods['Amazonlist']='Amazonの欲しいものリスト';
  $contactmethods['Yahooaction']='Yahoo!オークション';
  $contactmethods['Rakutenaction']='楽天オークション';
  $contactmethods['Rakuma']='ラクマ';
  $contactmethods['Merukari']='メルカリ';
  $contactmethods['Bitcoin']='Bitcoin';
  return $contactmethods;}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
//add pic&©&予約記事 to RSS
function rss_post_thumbnail($content){global $post;if(has_post_thumbnail($post->ID)){$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . $content;}return $content;}
function rss_feed_copyright($content){$content=$content.'<a href="' . home_url() . '"><p>Copyright &copy;' . get_bloginfo('name') . 'All Rights Reserved.</p></a>';return $content;}
add_filter('the_excerpt_rss','rss_feed_copyright');
add_filter('the_content_feed','rss_feed_copyright');
add_filter('the_excerpt_rss','rss_post_thumbnail');
add_filter('the_content_feed','rss_post_thumbnail');
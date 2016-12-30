<style>
    #share-menu ul{list-style:none;display:flex;flex-wrap:wrap;justify-content:flex-start;align-items:center;padding:0;margin:0;}
    #share-menu ul li{height:calc((70vw / 6) - 1vmin);width:calc((70vw / 6) - 1vmin);text-align:center;}
    #share-menu ul li a{position:relative;top:35%;color:#fff;}

    #share-menu .tweet{background-color:#55acee;}
    #share-menu .fb-like{background-color:#3b5998;}
    #share-menu .buffer{background-color:#333;font-size:4rem;font-weight:900;}
    #share-menu .buffer > a{top:28%;}
    #share-menu .line{background-color:#6cc655;}
    #share-menu .g-plus{background-color:#dc4e41;}
    #share-menu .linkedin{background-color:#36465d;}
    #share-menu .reddit{background-color:#ff5700;}
    #share-menu .vk{background-color:#83bad6;}
    #share-menu .stumbleupon{background-color:#ffcc00;}
    #share-menu .hatebu{background-color:#00a5de;font-size:5rem;font-weight:900;}
    #share-menu .hatebu > a{top:25%;}
    #share-menu li.instapaper{background-color:#fff;}
    #share-menu li.instapaper > a{color:#333;font:900 5rem/1.9 serif;top:25%;}
    #share-menu .pinterest{background-color:#bd081c;}
    #share-menu .pocket{background-color:#ef3f56;}
    #share-menu .tumblr{background-color:#36465d;}
</style>
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
<?php if(post_password_required()){return;};?>
<style>
	.comments-area{background-color:#fff;border-top:1px solid #eaeaea;border-top:1px solid rgba(51,51,51,0.1);padding:7.6923%;}
	.comments-area > :last-child{margin-bottom:0;}
	.comment-list + .comment-respond{border-top:1px solid #eaeaea;border-top:1px solid rgba(51,51,51,0.1);}
	.comment-list + .comment-respond,.comment-navigation + .comment-respond{padding-top:1.6em;}
	.comments-title,.comment-reply-title{font-family:"Noto Serif",serif;font-size:18px;font-size:1.8rem;line-height:1.3333;}
	.comments-title{margin-bottom:1.3333em;}
	.comment-list{list-style:none;margin:0;}
	.comment-list article,.comment-list .pingback,.comment-list .trackback{border-top:1px solid #eaeaea;border-top:1px solid rgba(51,51,51,0.1);padding:1.6em 0;}
	.comment-list .children{list-style:none;margin:0;}
	.comment-list .children > li{padding-left:0.8em;}
	.comment-author{color:#707070;color:rgba(51,51,51,0.7);margin-bottom:0.4em;}
	.comment-author a:hover{border-bottom:1px solid #707070;border-bottom:1px solid rgba(51,51,51,0.7);}
	.comment-author .avatar{float:left;margin-right:0.8em;height:24px;width:24px;}
	.bypostauthor > article .fn::after {
		content: "\f304";
		position: relative;
		top: 5px;
		left: 3px;
	}
	.comment-metadata,.pingback .edit-link{color:#707070;color:rgba(51,51,51,0.7);font-family:"Noto Sans",sans-serif;font-size:12px;font-size:1.2rem;line-height:1.5;}
	.comment-metadata a,.pingback .edit-link a{color:#707070;color:rgba(51,51,51,0.7);}
	.comment-metadata a:hover,.pingback .edit-link a:hover{border-bottom:1px solid #333;}
	.comment-metadata a:hover,.comment-metadata a:focus,.pingback .edit-link a:hover,.pingback .edit-link a:focus{color:#333;}
	.comment-metadata{margin-bottom:1.6em;}
	.comment-metadata .edit-link,.pingback .edit-link{margin-left:1em;}
	.pingback .edit-link::before{top:5px;}
	.comment-content ul,.comment-content ol{margin:0 0 1.6em 1.3333em;}
	.comment-content li > ul,.comment-content li > ol,.comment-content > :last-child{margin-bottom:0;}
	.comment-list .reply{font-size:12px;font-size:1.2rem;}
	.comment-list .reply a {
		border: 1px solid #eaeaea;
		border: 1px solid rgba(51, 51, 51, 0.1);
		color: #707070;
		color: rgba(51, 51, 51, 0.7);
		display: inline-block;
		font-family: "Noto Sans", sans-serif;
		font-weight: 700;
		line-height: 1;
		margin-top: 2em;
		padding: 0.4167em 0.8333em;
		text-transform: uppercase;
	}
	.comment-list .reply a:hover,.comment-list .reply a:focus{border-color:#333;color:#333;outline:0;}
	.comment-form{padding-top:1.6em;}
	.comment-form label {
		color: #707070;
		color: rgba(51, 51, 51, 0.7);
		font-family: "Noto Sans", sans-serif;
		font-size: 12px;
		font-size: 1.2rem;
		font-weight: 700;
		display: block;
		letter-spacing: 0.04em;
		line-height: 1.5;
		text-transform: uppercase;
	}
	.comment-form input[type="text"],.comment-form input[type="email"],.comment-form input[type="url"],.comment-form input[type="submit"]{width:100%;}
	.comment-notes,.comment-awaiting-moderation,.logged-in-as,.form-allowed-tags {
		color: #707070;
		color: rgba(51, 51, 51, 0.7);
		font-family: "Noto Sans", sans-serif;
		font-size: 12px;
		font-size: 1.2rem;
		line-height: 1.5;
		margin-bottom: 2em;
	}
	.logged-in-as a:hover{border-bottom:1px solid #333;}
	.no-comments {
		border-top: 1px solid #eaeaea;
		border-top: 1px solid rgba(51, 51, 51, 0.1);
		color: #707070;
		color: rgba(51, 51, 51, 0.7);
		font-family: "Noto Sans", sans-serif;
		font-weight: 700;
		padding-top: 1.6em;
	}
	.comment-navigation + .no-comments{border-top:0;}
	.form-allowed-tags code{font-family:Inconsolata, monospace;}
	.form-submit{margin-bottom:0;}
	.required{color:#c0392b;}
	.comment-reply-title small{font-size:100%;}
	.comment-reply-title small a{border:0;float:right;height:32px;overflow:hidden;width:26px;}
	.comment-reply-title small a::before {
		content: "\f405";
		font-size: 32px;
		position: relative;
		top: -3px;
	}
</style>
<div id="comments" class="comments-area">
	<?php if(have_comments()):?>
		<h2 class="comments-title">
			<?php printf(_nx('One thought on &ldquo;%2$s&rdquo;','%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(),'comments title','twentyfifteen'),number_format_i18n(get_comments_number()),get_the_title());?>
		</h2>
		<?php twentyfifteen_comment_nav();?>
		<ol class="comment-list">
			<?php wp_list_comments(array('style'=>'ol','short_ping'=>true,'avatar_size'=>56,));?>
		</ol>
		<?php twentyfifteen_comment_nav();?>
	<?php endif;?>
	<?php if(!comments_open()&&get_comments_number()&&post_type_supports(get_post_type(),'comments')):?>
		<p class="no-comments"><?php _e('Comments are closed.','twentyfifteen');?></p>
	<?php endif;?>
	<?php comment_form();?>
</div>
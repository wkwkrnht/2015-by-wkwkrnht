<?php get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.','twentyfifteen');?></h1>
					<p>(404 Erorr)</p>
				</header>
				<div class="page-content">
					<h2>検索を試してみませんか？</h2>
					<p><?php _e('It looks like nothing was found at this location. Maybe try a search?','twentyfifteen');?></p>
					<h3>キーワードから</h3>
					<?php get_search_form();?>
					<h3>カテゴリとタグから</h3>
					<?php //wp_tag_cloud('taxonomy'=>array('post_tag','category'),);?>
				</div>
			</section>
		</main>
	</div>
<?php get_footer();?>
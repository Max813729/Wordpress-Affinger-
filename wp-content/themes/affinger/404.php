<?php get_header(); ?>

<div id="content" class="clearfix">
	<div id="contentInner">
		<main <?php st_text_copyck(); ?>>
			<article>
				<div class="post">

					<h1 class="entry-title"> Not Found </h1>

					<?php if ( is_active_sidebar( 24 ) ) : ?>
						<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 24 ) ) : else : //404ウィジェット ?>
						<?php endif; ?>
					<?php else: ?>
						<p class="center">申し訳ありません。お探しのページはありませんでした。</p>
					<?php endif; ?>

				</div>
				<!--/post-->
			</article>
		</main>
	</div>
	<!-- /#contentInner -->
	<?php get_sidebar(); ?>
</div>
<!-- /#content -->
<?php get_footer(); ?>
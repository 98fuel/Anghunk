<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
	<div class="container">
		<div class="main-content">
			<?php if ($this->have()) : ?>
				<div class="place"><?php $this->archiveTitle(array(
										'category'  =>  _t('分类<span> %s </span>下的文章'),
										'search'    =>  _t('包含关键字<span> %s </span>的文章'),
										'date'      =>  _t('在<span> %s </span>发布的文章'),
										'tag'       =>  _t('标签<span> %s </span>下的文章'),
										'author'    =>  _t('<span>%s </span>发布的文章')
									), '', ''); ?></div>
				<?php while ($this->next()) : ?>
					<article>
						<div class="block-title">
							<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
							<div class="posttime"><?php $this->date('Y/m/d'); ?></div>
						</div>

						<div class="article-wrap">
							<div class="article-text">
								<div class="block-content"><?php $this->excerpt(80, '...'); ?></div>
								<div class="block-time">
									<span class="post-tags"><?php $this->tags('', true, ''); ?></span> 
									<span>view: <?php get_post_view($this) ?> · <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>

								</div>
							</div>
							<div class="article-img">
								<a href="<?php $this->permalink() ?>">
									<?php
									if (($this->fields->imgurl)) {
										echo '<img src="' . $this->fields->imgurl . '">';
									} else {
										echo '';
									} ?>
								</a>
							</div>
						</div>

					</article>

				<?php endwhile; ?>
			<?php else : ?>
				<div class="page404">
					<h2>404 - 页面没找到</h2>
					<p>你想查看的页面已被转移或删除了</p>
				</div>
			<?php endif; ?>
			<nav class="blog-nav">
				<?php $this->pageLink('<span>上一页</span>'); ?>
				<?php $this->pageLink('<span>下一页</span>', 'next'); ?>

			</nav>
		</div>
	</div>
	<div class="container">
		<?php $this->need('footer.php'); ?>
	</div>
</div>
</div>

</body>

</html>
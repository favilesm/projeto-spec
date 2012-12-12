
<div id="blog">
<?php foreach ($blog as $post) : ?>
	<div id="post-<?php echo $post->blog_id; ?>" class="post">
		<div class="post-titulo">
			<?php echo $post->titulo_blog; ?>
		</div>
		<div class="post-conteudo">
			<?php echo $post->texto_blog; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>

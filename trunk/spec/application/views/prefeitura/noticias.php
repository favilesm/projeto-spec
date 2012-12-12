
<div id="noticias">
<?php foreach ($noticias as $noticia) : ?>
	<div id="noticia-<?php echo $noticia->noticia_id; ?>" class="noticia">
		<div class="noticia-titulo">
			<?php echo $noticia->titulo_noticia; ?>
		</div>
		<div class="noticia-conteudo">
			<?php echo $noticia->texto_noticia; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>


<div id="dicas">
<?php foreach ($dicas as $dica) : ?>
	<div id="dica-<?php echo $dica->dica_id; ?>" class="dica">
		<div class="dica-titulo">
			<?php echo $dica->titulo_dica; ?>
		</div>
		<div class="dica-conteudo">
			<?php echo $dica->texto_dica; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>


<div id="programas">
<?php foreach ($programas as $programa) : ?>
	<div id="programa-<?php echo $programa->programa_id; ?>" class="programa">
		<div class="programa-titulo">
			<?php echo $programa->titulo_programa; ?>
		</div>
		<div class="programa-conteudo">
			<?php echo $programa->texto_programa; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>

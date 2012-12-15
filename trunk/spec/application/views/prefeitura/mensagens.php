
<div id="mensagens">
	<?php echo anchor('prefeitura/enviarmensagem', 'Enviar mensagem', array('id' => 'linkenviarmensagem')); ?>
	
<?php foreach ($mensagens as $mensagem) : ?>
	<div id="mensagem-<?php echo $mensagem->mensagem_id; ?>" class="mensagem">
		<div class="mensagem-titulo">
			<?php echo $mensagem->titulo_mensagem; ?>
		</div>
		<div class="mensagem-conteudo">
			<?php echo $mensagem->texto_mensagem; ?>
		</div>
	</div>
<?php endforeach; ?>
</div>

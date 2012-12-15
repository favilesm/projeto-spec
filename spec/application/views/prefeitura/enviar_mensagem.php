
<div id="enviarmensagem">
	<h1>Mensagem ao administrador</h1>
	
	<?php echo form_open(current_url()); ?>
		<div id="titulodiv">
			<label for="titulo">Título*:</label><br />
			<input id="titulo" type="text" name="titulo" />
		</div>
		<div id="textodiv">
			<label for="texto">Texto*:</label><br />
			<textarea class="ckeditor" id="texto" name="texto"></textarea>
		</div>
		
		<input type="submit" value="Enviar" />
	<?php echo form_close(); ?>
</div>


<div id="novasenha">
	<h1>Alterar senha</h1>
	
	<?php echo form_open(current_url()); ?>
		<table>
			<tr>
				<td><label for="senhavelha">Senha atual:</label></td>
				<td><input id="senhavelha" type="password" name="senhavelha" /><br /></td>
			</tr>
			<tr>
				<td><label for="senha">Nova senha:</label></td>
				<td><input id="senha" type="password" name="senha" /><br /></td>
			</tr>
			<tr>
				<td><label for="senharepete">Repetir nova senha:</label></td>
				<td><input id="senharepete" type="password" name="senharepete" /><br /></td>
			</tr>
		</table>
		
		<input type="submit" value="Alterar" />
	<?php echo form_close(); ?>
</div>

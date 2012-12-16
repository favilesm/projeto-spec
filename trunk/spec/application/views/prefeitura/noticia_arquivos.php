
<?php if(count($arquivos)) : ?>
<div id="arquivos">
	<h1>Anexos</h1>
	
	<?php foreach($arquivos as $arquivo) : ?>
	<a href="<?php echo base_url().'assets/uploads/files/noticiaAnexo/'.$arquivo->arquivo; ?>"><?php echo $arquivo->arquivo ?></a>
	<?php endforeach; ?>
</div>
<?php endif; ?>

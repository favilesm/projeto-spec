<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
 
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<!-- Beginning header -->
    <div>
        <a href='<?php echo site_url('administrador')?>'>Administradores</a> | 
        <a href='<?php echo site_url('administrador/dica')?>'>Dicas</a> |
        <a href='<?php echo site_url('administrador/noticia')?>'>Notícias</a> |
        <a href='<?php echo site_url('administrador/blog')?>'>Blog</a> |
        <a href='<?php echo site_url('administrador/prefeitura')?>'>Prefeitura</a> |
        <a href='<?php echo site_url('administrador/prefeito')?>'>Prefeito</a> |
        <a href='<?php echo site_url('administrador/programa')?>'>Programa do governo</a> |
        <a href='<?php echo site_url('administrador/mensagem')?>'>Mensagem a um usuário</a> 


    </div>

    <?php
    if(isset($dropdown_setup)) {
            $this->load->view('dependent_dropdown', $dropdown_setup);
    }
    ?>

    <div>
        <a href='<?php echo site_url('login/logout')?>'>Sair</a>
    </div>
<!-- End of header-->

    <div style='height:20px;'></div>  
    <div>
        <?php 
  
        if (isset($erro))
        {
            echo "ERRO AO INSERIR!!!.";
        }
        else
        {
            echo $output; 
        }
 
        ?>
 
    </div>
<!-- Beginning footer -->
<div>em desenvolvimento</div>
<!-- End of Footer -->
</body>
</html>
 
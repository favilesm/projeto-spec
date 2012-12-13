<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=base_url()?>public/css/estilo.css" type="text/css" />
</head>

<?php include("_inc/header.php"); ?>
<!--FINAL HEADER PERSONALIZADO -->


<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
</head>
<body>
<!-- Beginning header -->
    <div id="menu_admin">
        <a href='<?php echo site_url('administrador')?>'>Administradores</a> | 
        <a href='<?php echo site_url('administrador/dica')?>'>Dicas</a> |
        <a href='<?php echo site_url('administrador/noticia')?>'>Notícias</a> |
        <a href='<?php echo site_url('administrador/blog')?>'>Blog</a> |
        <a href='<?php echo site_url('administrador/prefeitura')?>'>Prefeitura</a> |
        <a href='<?php echo site_url('administrador/prefeito')?>'>Prefeito</a> |
        <a href='<?php echo site_url('administrador/programa')?>'>Programa do governo</a> |
        <a href='<?php echo site_url('administrador/mensagem')?>'>Mensagem a um usuário</a> | 
        <a href='<?php echo site_url('login/logout')?>'>Sair</a>

    </div>

    <?php
    if(isset($dropdown_setup)) {
            $this->load->view('dependent_dropdown', $dropdown_setup);
    }
    ?>
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
<!--INICIO FOOTER PERSONALIZADO -->
<?php include("_inc/footer.php"); ?>
 

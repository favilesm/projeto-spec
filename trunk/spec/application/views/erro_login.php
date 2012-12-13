<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=base_url()?>public/css/estilo.css" type="text/css" />
</head>

<?php include("_inc/header.php"); ?>
    
    
    <div id ="borda_login">
        <div class ="login_invalido">
            <?php echo'Login inválido';?>
            <br>    <br>    
            <?php echo anchor(base_url(), 'Voltar', 'title="News title"');?>
        </div>
    </div>
<?php include("_inc/footer.php"); ?>
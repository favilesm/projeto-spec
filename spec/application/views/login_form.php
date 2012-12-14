<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public/css/estilo.css" type="text/css" />
</head>

<?php include("_inc/header.php"); ?>
    
    
    <div id ="borda_login">
        <div class ="login_form">
            <h1>Login!</h1>
            <?php
                echo form_open('login/validar');
                echo form_input('login', 'Login');
                echo form_password('senha', 'Senha');
                echo form_submit('submit', 'Login');
            ?>
        </div>
    </div>
<?php include("_inc/footer.php"); ?>

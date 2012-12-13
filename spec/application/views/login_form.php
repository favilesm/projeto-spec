<head>
    <link rel="stylesheet" href="<?=base_url()?>public/css/estilo.css" type="text/css" />
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
</head>
<body>
    <div id="login_form">
        <h1>Login!</h1>
        <?php
            echo form_open('login/validar');
            echo form_input('login', 'Login');
            echo form_password('senha', 'Senha');
            echo form_submit('submit', 'Login');
        ?>
    </div>    
</body>
</html>
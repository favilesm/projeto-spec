<?php include("_inc/header.php"); ?>
    
    <div id ="borda_top_dente"></div>
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
    <div id ="borda_bottom_dente"></div>    81441332
<?php include("_inc/footer.php"); ?>

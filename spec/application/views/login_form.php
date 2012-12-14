<?php include("_inc/header.php"); ?>    
    
    <div id ="borda_top_dente"></div>
    <div id ="borda_login">
        <div class ="login_form">
            <h1>Login</h1>
            <?php
                echo form_open('login/validar');
                echo form_input('login', 'Login');
                echo form_password('senha', 'Senha');
                echo form_submit('submit', 'Login');
            ?>
        </div>
		<div class="contact_image">
			<img src="<?php echo base_url() ?>public/css/logo-contato.png" alt="Contato">
		</div>
		<div class="contact_text">
			Entre em contato conosco:
			contato@programaseprojetos.com.br
		</div>
    </div>
	
    <div id ="borda_bottom_dente"></div>  
<?php include("_inc/footer.php"); ?>

<?php include("_inc/header.php"); ?>    
    
    <div id="centro">
        <div class ="borda_top_dente"></div>
        
        <div class="cabecalho">
            <div class="centro_faixa">
                <div class="centro_faixa2">
                    <div id="espaco_faixa">
                        <div class="faixa">
                            <div class="titulo">
                                <h1>Login</h1>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id ="borda_login">
            <div class ="login_form">
                <h1></h1>
				<div class="main_login">
					<?php
						echo form_open('login/validar');?>
                                        <div class='login_pass'>
						<div class='label_login_senha'>
                                                        <label for="ilogin">Login</label>
                                                </div>
						<div class='form_login_password'>
							<input id="ilogin" type="login" name="login" value="" style="height: 32px;"/>
						</div>
                                        </div>
                                        <div class='login_pass'>
						<div class='label_login_senha'>
							<label for="isenha">Senha</label>
						</div>
						<div class='form_login_password'>
							<input id="isenha" type="password" name="senha" value="" style="height: 32px;"/>
						</div>
                                        </div>
						<div class='form_submit'>
							<input type="submit" name="submit" value="Entrar"/>
						</div>
				</div>
            </div>
            <div class="contact_image">
                    <img src="<?php echo base_url() ?>public/css/logo-contato.png" alt="Contato">
            </div>
            <div class="contact_text">
                    Entre em contato conosco:
                    contato@programaseprojetos.com.br
            </div>
        </div>
        <div class ="borda_bottom_dente"></div>
    </div>
<?php include("_inc/footer.php"); ?>

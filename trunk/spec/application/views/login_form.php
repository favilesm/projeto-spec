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
						<div class='label_login'>
							
						</div>
						<div class='form_login'>
							<input type="login" name="login" value="" style="height: 32px;"/>
						</div>
						<div class='label_senha'>
							<label for="senha">Senha</label>
						</div>
						<div class='form_password'>
							<input type="password" name="senha" value="" style="height: 32px;"/>
						</div>
						<div class='form_submit'>
							<input type="submit" name="submit" value="Entrar" style="height: 40px; margin-left: -6px; color: white; font-weight: 700; width: 175px; background-color: #9AB4CB; font-size: 17px;"/>
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

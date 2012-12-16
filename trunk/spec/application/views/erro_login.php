<?php include("_inc/header.php"); ?>
    
<div id="centro">
        <div class ="borda_top_dente"></div>
        
        <div class="cabecalho">
            <div class="centro_faixa">
                <div class="centro_faixa2">
                    <div id="espaco_faixa">
                        <div class="faixa">
                            <div class="titulo">
                                <h1>Sistema SPEC</h1>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <div id ="borda_login">
            <div class ="login_invalido">
                <?php echo'Login inválido';?>
                <br>    <br>    
                <?php echo anchor(base_url(), 'Voltar', 'title="News title"');?>
            </div>
        </div>
    </div>
        
<?php include("_inc/footer.php"); ?>
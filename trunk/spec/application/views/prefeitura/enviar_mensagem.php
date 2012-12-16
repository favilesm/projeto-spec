<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/css/estilo.css" type="text/css" />
</head>
    <div id="centro">
        <div class ="borda_top_dente"></div>
         <div class="fundo_centro">
            <div class="cabecalho">
                <div class="centro_faixa">
                    <div class="centro_faixa2">
                        <div id="espaco_faixa">
                            <div class="faixa">
                                <div class="titulo">
                                    <h1>Enviar mensagem</h1>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="enviar_mensagem">
                    <h1>Mensagem ao administrador</h1>

                    <?php echo form_open(current_url()); ?>
                            <div id="titulodiv">
                                    <label for="titulo">Título*:</label><br />
                                    <input id="titulo" type="text" name="titulo" />
                            </div>
                            <div id="textodiv">
                                    <label for="texto">Texto*:</label><br />
                                    <textarea class="ckeditor" id="texto" name="texto"></textarea>
                            </div>

                            <input type="submit" value="Enviar" />
                    <?php echo form_close(); ?>
            </div>
         </div>
        <div class ="borda_bottom_dente"></div>
    </div>


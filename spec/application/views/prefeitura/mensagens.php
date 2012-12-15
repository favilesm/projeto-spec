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
                                    <h1>Dicas</h1>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mensagens">
                    <?php echo anchor('prefeitura/enviarmensagem', 'Enviar mensagem', array('id' => 'linkenviarmensagem')); ?>

            <?php foreach ($mensagens as $mensagem) : ?>
                    <div id="mensagem-<?php echo $mensagem->mensagem_id; ?>" class="mensagem">
                            <div class="mensagem-titulo">
                                    <?php echo $mensagem->titulo_mensagem; ?>
                            </div>
                            <div class="mensagem-conteudo">
                                    <?php echo $mensagem->texto_mensagem; ?>
                            </div>
                    </div>
            <?php endforeach; ?>
            </div>
         </div>
        <div class ="borda_bottom_dente"></div>
    </div>
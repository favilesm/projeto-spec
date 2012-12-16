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
            <div id="text">
                <div id="dicas">
                <?php foreach ($dicas as $dica) : ?>
                        <div id="dica-<?php echo $dica->dica_id; ?>" class="dica">
                                <div class="dica-titulo">
                                        <?php echo $dica->titulo_dica; ?>
                                </div>
                                <div class="dica-conteudo">
                                        <?php echo $dica->texto_dica; ?>
                                </div>
                        </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class ="borda_bottom_dente"></div>
    </div>
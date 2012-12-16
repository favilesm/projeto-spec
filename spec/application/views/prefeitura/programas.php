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
                                    <h1>Programas do governo</h1>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="programas">
            <?php foreach ($programas as $programa) : ?>
                    <div id="programa-<?php echo $programa->programa_id; ?>" class="programa">
                            <div class="programa-titulo">
                                    <?php echo $programa->titulo_programa; ?>
                            </div>
                            <div class="programa-conteudo">
                                    <?php echo $programa->texto_programa; ?>
                            </div>
                    </div>
            <?php endforeach; ?>
            </div>
         </div>
        <div class ="borda_bottom_dente"></div>
    </div>
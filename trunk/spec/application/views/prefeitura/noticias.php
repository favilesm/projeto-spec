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
                                    <h1>Notícias</h1>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="noticias">
            <?php foreach ($noticias as $noticia) : ?>
                    <div id="noticia-<?php echo $noticia->noticia_id; ?>" class="noticia">
                            <div class="noticia-titulo">
                                    <?php echo $noticia->titulo_noticia; ?>
                            </div>
                            <div class="noticia-conteudo">
                                    <?php echo $noticia->texto_noticia; ?>
                            </div>
                    </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class ="borda_bottom_dente"></div>
    </div>


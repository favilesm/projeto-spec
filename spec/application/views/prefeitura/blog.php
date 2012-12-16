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
                                    <h1>Blog</h1>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="blog">
            <?php foreach ($blog as $post) : ?>
                    <div id="post-<?php echo $post->blog_id; ?>" class="post">
                            <div class="post-titulo">
                                    <?php echo $post->titulo_blog; ?>
                            </div>
                            <div class="post-conteudo">
                                    <?php echo $post->texto_blog; ?>
                            </div>
                    </div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class ="borda_bottom_dente"></div>
    </div>
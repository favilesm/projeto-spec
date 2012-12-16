<?php include("_inc/header_old.php"); ?>
<!--FINAL HEADER PERSONALIZADO -->


<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
</head>
<body>
<div id="site">
<!-- Beginning header -->
    <div id="nav">
        <div id="main_menu">
            <ul class="menu">
                <li id="item1"><a href='<?php echo site_url('administrador')?>'>Administradores</a></li>
                <li id="item2"><a href='<?php echo site_url('administrador/dica')?>'>Dicas</a></li>
                <li id="item3"><a href='<?php echo site_url('administrador/noticia')?>'>Notícias</a></li>
                <li id="item4"><a href='<?php echo site_url('administrador/blog')?>'>Blog</a></li>
                <li id="item5"><a href='<?php echo site_url('administrador/prefeitura')?>'>Prefeitura</a></li>
                <li id="item6"><a href='<?php echo site_url('administrador/programa')?>'>Programas do governo</a></li>
                <li id="item7"><a href='<?php echo site_url('administrador/mensagem')?>'>Mensagem a um usuário</a></li>
                <li id="item8"><a href='<?php echo site_url('login/logout')?>'>Sair</a></li>
            </ul>
        </div>
    </div>
        
    <?php if ($this->session->flashdata('mensagem')) : ?>
    <div id="mensagem" class="aviso">
        <?php echo $this->session->flashdata('mensagem'); ?>
    </div>
    <?php endif; ?>
    
    <div class ="borda_top_dente"></div>
        <div class="fundo_centro">
            <div class="cabecalho">
                <div class="centro_faixa">
                    <div class="centro_faixa2">
                        <div id="espaco_faixa">
                            <div class="faixa">
                                <div class="titulo">
                                    <h1><?php echo $titulo; ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    <div id="grocerycrud">
        <?php echo $output; ?>
    </div>
    
    
    </div><!-- end class fundo_centro -->
    <div class ="borda_bottom_dente"></div>
    <div style='height:50px;'></div>

</div>
<!-- Beginning footer -->

<!-- End of Footer -->
</body>
<!--INICIO FOOTER PERSONALIZADO -->
<?php include("_inc/footer.php"); ?>
 

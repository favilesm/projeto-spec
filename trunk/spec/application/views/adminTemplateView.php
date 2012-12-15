<?php include("_inc/header.php"); ?>
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
<!-- Beginning header -->
    <div id="nav">
        <div id="main_menu">
            <ul id="menu">
                <li class="item1"><a href='<?php echo site_url('administrador')?>'>Administradores</a></li>
                <li class="item2"><a href='<?php echo site_url('administrador/dica')?>'>Dicas</a></li>
                <li class="item3"><a href='<?php echo site_url('administrador/noticia')?>'>Notícias</a></li>
                <li class="item4"><a href='<?php echo site_url('administrador/blog')?>'>Blog</a></li>
                <li class="item5"><a href='<?php echo site_url('administrador/prefeitura')?>'>Prefeitura</a></li>
                <li class="item6"><a href='<?php echo site_url('administrador/programa')?>'>Programa do governo</a></li>
                <li class="item7"><a href='<?php echo site_url('administrador/mensagem')?>'>Mensagem a um usuário</a></li>
                <li class="item8"><a href='<?php echo site_url('login/logout')?>'>Sair</a></li>
            </ul>
        </div>
    </div>
    <?php
    if(isset($dropdown_setup)) {
            $this->load->view('dependent_dropdown', $dropdown_setup);
    }
    ?>
<!-- End of header-->

    <div style='height:20px;'></div>  
    <div>
        <?php 
  
        if (isset($erro))
        {
            echo "ERRO AO INSERIR!!!.";
        }
        else
        {
            echo $output; 
        }
 
        ?>
 
    </div>
    <div style='height:130px;'></div>
<!-- Beginning footer -->

<!-- End of Footer -->
</body>
<!--INICIO FOOTER PERSONALIZADO -->
<?php include("_inc/footer.php"); ?>
 

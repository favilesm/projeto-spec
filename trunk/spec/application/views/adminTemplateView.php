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
</div>
<!-- Beginning footer -->

<!-- End of Footer -->
</body>
<!--INICIO FOOTER PERSONALIZADO -->
<?php include("_inc/footer.php"); ?>
 

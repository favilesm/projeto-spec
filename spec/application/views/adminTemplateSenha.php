<?php include("_inc/header.php"); ?>
<!--FINAL HEADER PERSONALIZADO -->

</head>
<body>
    <div id="site">
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
    <div id="novasenha">
        <h1><?php echo ($tipo == 'admin') ? 'Alterando senha do administrador:' : 'Alterando senha da prefeitura de:'; ?></h1>
        <h2><?php echo $nome; ?></h2>
        
        <?php echo form_open(current_url()); ?>
            <label for="senha">Nova senha:</label> <input id="senha" type="password" name="senha" />
            <br />
            <input type="submit" value="Alterar" />
        <?php echo form_close(); ?>
    </div>
    <div style='height:130px;'></div>
    </div>
<!-- Beginning footer -->

<!-- End of Footer -->
</body>
<!--INICIO FOOTER PERSONALIZADO -->
<?php include("_inc/footer.php"); ?>
 

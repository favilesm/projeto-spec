<div id="nav">
        <div id="main_menu">
            <ul class="menu">
                <li class="item1"><a href='<?php echo site_url('prefeitura/noticia')?>'>Notícias</a></li>
                <li class="item2"><a href='<?php echo site_url('prefeitura/dica')?>'>Dicas</a></li>
                <li class="item3"><a href='<?php echo site_url('prefeitura/programa')?>'>Programas do governo</a></li>
                <li class="item4"><a href='<?php echo site_url('prefeitura/blog')?>'>Blog</a></li>
                <li class="item5"><a href='<?php echo site_url('prefeitura/mensagem')?>'>Mensagem ao administrador</a></li>
                <li class="item6"><a href='<?php echo site_url('prefeitura/alterarsenha')?>'>Alterar senha</a></li>
                <li class="item8"><a href='<?php echo site_url('login/logout')?>'>Sair</a></li>
            </ul>
        </div>
    </div>

        <?php if ($this->session->flashdata('mensagem')) : ?>
<div id="mensagem" class="aviso">
    <?php echo $this->session->flashdata('mensagem'); ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('erro')) : ?>
<div id="erro" class="aviso">
    <?php echo $this->session->flashdata('erro'); ?>
</div>
<?php endif; ?>

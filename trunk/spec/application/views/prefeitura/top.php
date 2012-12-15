
<div>
    <a href='<?php echo site_url('prefeitura/noticia')?>'>Notícias</a> |
    <a href='<?php echo site_url('prefeitura/dica')?>'>Dicas</a> |
    <a href='<?php echo site_url('prefeitura/programa')?>'>Programas do governo</a> |
    <a href='<?php echo site_url('prefeitura/blog')?>'>Blog</a> |
    <a href='<?php echo site_url('prefeitura/mensagem')?>'>Mensagem ao administrador</a> |
    <a href='<?php echo site_url('prefeitura/alterarsenha')?>'>Alterar senha</a>
</div>

<div>
    <a href='<?php echo site_url('login/logout')?>'>Sair</a>
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.1 //EN" "http://ww.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/estilo.css" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/grocery_crud/texteditor/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            var full_path = location.href.split("#")[0];
            $("#main_menu ul li a").each(function(){
                var $this = $(this);
                if($this.prop("href").split("#")[0] == full_path) {
                    $this.addClass("active");
                }
            });
        });
    </script>
    </head>
    <body>
        <div id="tudo">
            <div class="header">
                <div class="logo_header">
						<a href="http://www.programaseprojetos.com.br">
							<img src="<?php echo base_url() ?>public/css/logoSPEC.png" alt="SPEC">
						</a>
						<div class="logo_text">
							Informações e orientações simplificadas sobre programas e projetos lançados no governo federal.
                                            </div>
				</div>
				
            </div>


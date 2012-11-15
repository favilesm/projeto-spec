<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Prefeitura</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Prefeitura</h1>
      
	<div id="body">
		<p>Dados da prefeitura.</p>
                <?php 
                    $edit = false;
                     if(isset($prefeito)){
                        $edit = true;
                    }
                    
                    $edit2 = false;
                     if(isset($secretario)){
                         print_r($secretario);
                        $edit2 = true;
                    }
                    
                    
                    echo form_open('main/editar_prefeitura/'.$prefeitura->prefeitura_id);
                    echo form_fieldset('Dados da prefeitura');
                    echo ('Nome');
                    echo form_input('nome_prefeitura',set_value('nome', $prefeitura->nome_prefeitura));     
                    echo ('Município');
                    echo form_input('municipio',set_value('municipio', $prefeitura->municipio));
                    echo ('<br> Endereço');
                    echo form_input('endereco',set_value('endereco', $prefeitura->endereco));
                    echo ('CNPJ');
                    echo form_input('cnpj',set_value('cnpj', $prefeitura->cnpj));
                    echo ('asdf');
                    echo ('<br> Telefone');
                    echo form_input('telefone',set_value('telefone', $prefeitura->telefone));
                    echo ('Nº de Habitantes');
                    echo form_input('num_habitantes',set_value('num_habitantes', $prefeitura->num_habitantes));
                    echo ('<br> Fax');
                    echo form_input('fax',set_value('fax', $prefeitura->fax));
                    echo ('UF');
                    echo form_input('uf',set_value('uf', $prefeitura->uf));
                    echo ('E-mail');
                    echo form_input('email_prefeitura',set_value('email_prefeitura', $prefeitura->email_prefeitura));
                    echo ('Senha');
                    echo form_password('senha');
                    echo ('Ativada');
                    echo form_input('ativada',set_value('ativada', $prefeitura->ativada));
                    echo form_fieldset_close();
                    echo form_submit('submit','Atualizar');
                    echo form_close();
            
                   
                    echo form_open('main/cadastrar_prefeito/'.$prefeitura->prefeitura_id);
                    echo form_fieldset('Dados do prefeito');
                    echo ('Nome do prefeito');
                    echo form_input('nome_prefeito', $edit ? (set_value('nome_prefeito',$prefeito->nome_prefeito)) : ''); 
                    echo ('Celular');
                    echo form_input('celular', $edit ? (set_value('celular', $prefeito->celular)) : ''); 
                    echo ('CPF');
                    echo form_input('cpf',$edit ? (set_value('cpf', $prefeito->cpf)):''); 
                    echo('<br>');
                    echo ('Data de nascimento');
                    echo form_input('data_nacimento', $edit ? (set_value('data_nascimento', $prefeito->data_nascimento)) : ''); 
                    echo ('E-mail');
                    echo form_input('email_prefeito', $edit ? (set_value('email_prefeito', $prefeito->email_prefeito)) : ''); 
                    echo form_fieldset_close();
                    echo form_submit('submit','Cadastrar prefeito');
                    echo form_close();
                    echo form_open('main/cadastrar_secretario/'.$prefeitura->prefeitura_id);
                    echo form_fieldset('Secretários');
                    echo ('Nome do secretário');
                    echo form_input('nome_secretario', $edit2 ? (set_value('nome_secretario', $secretario->nome_secretario)) : '');  
                    echo ('E-mail');
                    echo form_input('email_secretario', $edit2 ? (set_value('email_secretario', $secretario->email_secretario)) : '');
                    echo ('Funcao');
                    echo form_input('funcao', $edit2 ? (set_value('funcao', $secretario->funcao)) : ''); 
                    echo form_fieldset_close();
                    echo form_submit('submit','Cadastrar secretario');
                    echo form_close();
                   
                ?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
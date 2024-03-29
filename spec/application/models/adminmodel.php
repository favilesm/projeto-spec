<?php

class AdminModel extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function crudDica()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('dica');
        $crud->set_subject('Dica');
        $crud->columns('titulo_dica','texto_dica', 'prefeituras');
        $crud->required_fields('titulo_dica','texto_dica','prefeituras');
        
        $crud->set_relation_n_n('prefeituras', 'prefeitura_x_dica', 'prefeitura',
                                'dica_dica_id', 'prefeitura_prefeitura_id', 
                                'ufmunicipio'); 
        
        $crud->display_as('titulo_dica','Título');
        $crud->display_as('texto_dica','Texto');
        
        $crud->order_by('dica_id', 'desc');
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function crudAdmin()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('administrador');
        $crud->set_subject('Administrador');
        $crud->columns('login');
		$crud->field_type('senha', 'password');
        $crud->required_fields('login', 'senha');
       
        if ($this->session->userdata('id') == 0)
            $crud->add_action('Alterar senha',base_url('/assets/uploads/key.png'),'administrador/adminsenha');
        else
        {
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
        }
        
        $crud->unset_edit_fields('senha');
        
        $crud->callback_before_insert(array($this,'crudAdminBeforeInsert'));
        $crud->callback_before_delete(array($this, 'crudAdminBeforeDelete'));
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function getNomeAdmin($id)
    {
        return $this->db->get_where('administrador', array('administrador_id' => $id))->row()->login;
    }
    
    function alteraSenhaAdmin($id, $senha)
    {
        $this->db->where('administrador_id', $id);
        $this->db->update('administrador', array('senha' => md5($senha)));
    }
    
    function crudAdminBeforeInsert($post_array)
    {
        $this->load->helper('security');
        $post_array['senha'] = do_hash($post_array['senha'], 'md5');
        return $post_array;
    }
    
    function crudAdminBeforeDelete($primary_key)
    {
        $this->db->where('administrador_administrador_id', $primary_key);
        $this->db->update('mensagem', array('administrador_administrador_id' => 0));
        
        return true;
    }
    
    function crudBlog()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('blog');
        $crud->set_subject('Post');
        $crud->required_fields('titulo_blog','texto_blog');
        $crud->display_as('titulo_blog','Título')
             ->display_as('texto_blog','Texto');

        $crud->order_by('blog_id', 'desc');
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }


    function crudPrefeitura(){
        $crud = new grocery_CRUD();
 
        $crud->set_table('prefeitura');
        $crud->set_subject('Prefeitura');
        
        $crud->add_action('Ativar',base_url('/assets/uploads/ativada.png'),'administrador/ativar');
        $crud->add_action('Prefeito',base_url('/assets/uploads/mayor.png'),'administrador/prefeito');
        $crud->add_action('Secretarios', base_url('/assets/uploads/secretario.png'),'administrador/secretario');
        $crud->add_action('Telefone', base_url('/assets/uploads/telefone.png'),'administrador/telefone');
        $crud->add_action('Alterar senha',base_url('/assets/uploads/key.png'),'administrador/prefeiturasenha');
        
        $crud->columns('municipio','endereco','cnpj','num_habitantes','fax','uf','email_prefeitura','login','ativada', 'quantidade_secretario');
        $crud->required_fields('municipio','endereco','cnpj','num_habitantes','fax','uf','email_prefeitura','login','senha');
        $crud->unset_add_fields('ativada', 'quantidade_secretario', 'ufmunicipio');
        $crud->unset_edit_fields('senha','ativada', 'quantidade_secretario', 'ufmunicipio');
        
		$crud->set_relation('uf', 'uf', 'nome');
		
        $crud->field_type('senha', 'password');
		
        $crud->display_as('uf','UF')             
             ->display_as('municipio','Município')
             ->display_as('endereco','Endereço')
             ->display_as('cnpj','CNPJ')    
             ->display_as('email_prefeitura','E-mail da prefeitura')
             ->display_as('nome_prefeitura','Nome do prefeito')
             ->display_as('num_habitantes','Número de habitantes')                         
             ->display_as('telefone','Telefone')                         
             ->display_as('nome_prefeito','Nome do prefeito')
             ->display_as('quantidade_secretario','Quantidade de secretários');
       
        $crud->callback_before_insert(array($this,'crudPrefeituraBeforeInsert'));
        $crud->callback_before_delete(array($this,'crudPrefeituraBeforeDelete'));
        
        $crud->callback_after_insert(array($this,'crudPrefeituraAfterInsert'));
        $crud->callback_after_update(array($this,'crudPrefeituraAfterInsert'));
        
        $crud->unset_export();
        $crud->unset_print();
		
        $output = $crud->render();
        return($output);
    }
    
    function getNomePrefeitura($prefeitura_id)
    {
        return $this->db->get_where('prefeitura', array('prefeitura_id' => $prefeitura_id))->row()->ufmunicipio;
    }
    
    function alteraSenhaPrefeitura($prefeitura_id, $senha)
    {
        $this->db->where('prefeitura_id', $prefeitura_id);
        $this->db->update('prefeitura', array('senha' => md5($senha)));
    }
    
    function crudPrefeituraBeforeInsert($post_array)
    {
        $this->load->helper('security');
        $post_array['senha'] = do_hash($post_array['senha'], 'md5');
        return $post_array;
    }
    
    function crudPrefeituraBeforeDelete($primary_key)
    {
        $this->db->delete('mensagem', array('prefeitura_prefeitura_id' => $primary_key));
        $this->db->delete('prefeito', array('prefeitura_prefeitura_id' => $primary_key));
        $this->db->delete('prefeitura_x_dica', array('prefeitura_prefeitura_id' => $primary_key));
        $this->db->delete('prefeitura_x_noticia', array('prefeitura_prefeitura_id' => $primary_key));
        $this->db->delete('secretario', array('prefeitura_prefeitura_id' => $primary_key));
        $this->db->delete('telefone', array('prefeitura_prefeitura_id' => $primary_key));
    }
    
    function crudPrefeituraAfterInsert($post_array, $primary_key)
    {
        $this->db->where('id_uf', $post_array['uf']);
        $ufmunicipio = $this->db->get('uf')->row()->nome.'-'.$post_array['municipio'];
        
        $this->db->where('prefeitura_id', $primary_key);
        $this->db->update('prefeitura', array('ufmunicipio' => $ufmunicipio));
        return true;
    }
    
    function crudSecretario($id)
    {
        $crud = new grocery_CRUD();

        $crud->set_table('secretario');
        $crud->set_subject(
            'Secretário da prefeitura de '.
            $this->db->get_where('prefeitura', array('prefeitura_id' => $id))->row()->ufmunicipio
        );
        $crud->columns('nome_secretario', 'email_secretario', 'funcao');
        $crud->fields('nome_secretario', 'email_secretario', 'funcao');
        $crud->required_fields('nome_secretario', 'email_secretario', 'funcao');
        $crud->where('prefeitura_prefeitura_id', $id);
        
        $crud->display_as('nome_secretario', 'Nome');
        $crud->display_as('email_secretario', 'E-mail');
        $crud->display_as('funcao', 'Função');
        
        $crud->callback_insert(array($this,'crudSecretarioInsert'));
        $crud->callback_after_delete(array($this,'crudSecretarioAfterDelete'));
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }    
    
    function crudSecretarioInsert($post_array)
    {
        // pega o id da prefeitura
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        
        // pega o total de secretarios
        $total_sec = $this->db->get_where(
            'prefeitura', array(
                'prefeitura_id' => $post_array['prefeitura_prefeitura_id']
            )
        )->row()->quantidade_secretario;
        if ($total_sec == 3)
            return;
        
        // aumenta o numero de secretarios e insere
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $this->db->update('prefeitura', array('quantidade_secretario' => $total_sec + 1));
        return $this->db->insert('secretario', $post_array);
    }
    
    function crudSecretarioAfterDelete($primary_key)
    {
        // pega o total de secretarios
        $total_sec = $this->db->get_where(
            'prefeitura', array(
                'prefeitura_id' => $this->uri->segment('3')
            )
        )->row()->quantidade_secretario;
        
        // atualiza a quantidade
        $this->db->where('prefeitura_id', $this->uri->segment('3'));
        return $this->db->update('prefeitura', array('quantidade_secretario' => $total_sec - 1));
    }

    function crudTelefone($id)
    {
        $crud = new grocery_CRUD();
      
        $crud->set_table('telefone');
        $crud->set_subject(
            'Telefone da prefeitura de '.
            $this->db->get_where('prefeitura', array('prefeitura_id' => $id))->row()->ufmunicipio
        );
        $crud->columns('telefone');
        $crud->fields('telefone');
        $crud->required_fields('telefone');
        $crud->callback_insert(array($this,'crudTelefoneInsert'));
        $crud->where('prefeitura_prefeitura_id', $id);
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function crudTelefoneInsert($post_array)
    {
       
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        return $this->db->insert('telefone',$post_array);
    }
     
    function crudPrefeito($id)
    {
        $crud = new grocery_CRUD();
        $crud->set_table('prefeito');
        $crud->set_subject(
            'Prefeito de '.
            $this->db->get_where('prefeitura', array('prefeitura_id' => $id))->row()->ufmunicipio
        );
        $crud->columns('nome_prefeito', 'celular', 'cpf', 'data_nascimento', 'email_prefeito');
        $crud->fields('nome_prefeito', 'celular', 'cpf', 'data_nascimento', 'email_prefeito');
        $crud->required_fields('nome_prefeito', 'celular', 'cpf', 'data_nascimento', 'email_prefeito');
        $crud->where('prefeitura_prefeitura_id', $id);
        $crud->callback_insert(array($this,'crudPrefeitoInsert'));
        
        $crud->display_as('nome_prefeito', 'Nome');
        $crud->display_as('cpf', 'CPF');
        $crud->display_as('data_nascimento', 'Data de nascimento');
        $crud->display_as('email_prefeito', 'E-mail');
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function crudPrefeitoInsert($post_array)
    {
        // pega id da prefeitura
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        
        // impede de criar mais de um prefeito
        $prefeito = $this->db->get_where(
            'prefeito',
            array('prefeitura_prefeitura_id' => $post_array['prefeitura_prefeitura_id'])
        )->row();
        if (count($prefeito))
            return;
        
        // insere
        return $this->db->insert('prefeito', $post_array);
    }
    
    function crudNoticia()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('noticia');
        $crud->set_subject('Notícia');
        $crud->required_fields('titulo_noticia','texto_noticia', 'prefeituras');
        $crud->columns('titulo_noticia','texto_noticia','prefeituras');
        $crud->set_relation_n_n('prefeituras', 'prefeitura_x_noticia', 'prefeitura',
								'noticia_noticia_id', 'prefeitura_prefeitura_id', 
								'ufmunicipio');	
		
        
        $crud->add_action('Arquivos', base_url('/assets/uploads/file.png'),'administrador/noticiaAnexo');
        $crud->display_as('titulo_noticia','Título')
             ->display_as('texto_noticia','Texto');
        
        $crud->callback_before_delete(array($this, 'crudNoticiaBeforeDelete'));
        
        $crud->order_by('noticia_id', 'desc');
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }    
    
    function crudNoticiaBeforeDelete($primary_key)
    {
        // seleciona os nomes dos arquivos da noticia
        $files = $this->db->query(
            'SELECT arquivo FROM arquivos WHERE noticia_noticia_id='.$primary_key
        )->result();
        
        // apaga os registros dos arquivos do banco
        $this->db->delete('arquivos', array('noticia_noticia_id' => $primary_key));
        
        // apaga os arquivos do servidor
        foreach ($files as $file)
            unlink('assets/uploads/files/noticiaAnexo/'.$file->arquivo);
        
        return true;
    }
    
    function crudNoticiaAnexo($noticia_id)
    {
        $crud = new grocery_CRUD();
        
        $crud->set_table('arquivos');
        $crud->set_subject('Anexo da notícia '.$this->db->get('noticia')->row()->titulo_noticia);
        
        $crud->columns('arquivo');
        $crud->fields('arquivo');
        $crud->required_fields('arquivo');
        
        $crud->display_as('arquivo', 'Arquivo');
        
        $crud->set_field_upload('arquivo', 'assets/uploads/files/noticiaAnexo');
        
        $crud->where('noticia_noticia_id', $noticia_id);
        
        $crud->callback_insert(array($this, 'crudNoticiaAnexoInsert'));
        $crud->callback_before_delete(array($this, 'crudNoticiaAnexoBeforeDelete'));
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function crudNoticiaAnexoInsert($post_array)
    {
        $post_array['noticia_noticia_id'] = $this->uri->segment('3');
        return $this->db->insert('arquivos', $post_array);
    }
    
    function crudNoticiaAnexoBeforeDelete($primary_key)
    {
        unlink(
            'assets/uploads/files/noticiaAnexo/'.
            $this->db->get_where('arquivos', array('arquivos_id' => $primary_key))->row()->arquivo
        );
        return true;
    }
    
    function getNomeNoticia($noticia_id)
    {
        return $this->db->get_where(
            'noticia',
            array('noticia_id' => $noticia_id)
        )->row()->titulo_noticia;
    }
    
    function crudPrograma()

    {
        $crud = new grocery_CRUD();
        $crud->set_table('programa');
        $crud->set_subject('Programa');
        $crud->columns('titulo_programa','texto_programa');
        $crud->required_fields('titulo_programa','texto_programa');
        $crud->display_as('titulo_programa','Título');
        $crud->display_as('texto_programa','Texto');
        
        $crud->order_by('programa_id', 'desc');
        
        $crud->unset_export();
        $crud->unset_print();
        
        $output = $crud->render();
        return($output);
    }
    
    function crudMensagem()
    {
        $crud = new grocery_CRUD();
        
        $crud->set_table('mensagem');
        $crud->set_subject('Mensagem');
               
        $crud->set_relation('prefeitura_prefeitura_id','prefeitura','ufmunicipio');
        $crud->set_relation('administrador_administrador_id','administrador','login');
        
        $crud->columns('titulo_mensagem', 'texto_mensagem', 'administrador_administrador_id', 'prefeitura_prefeitura_id');
        $crud->fields('titulo_mensagem', 'texto_mensagem', 'prefeitura_prefeitura_id');
        $crud->required_fields('titulo_mensagem','texto_mensagem','prefeitura_prefeitura_id');
        
        $crud->display_as('titulo_mensagem','Título');
        $crud->display_as('texto_mensagem','Texto');
        $crud->display_as('prefeitura_prefeitura_id','Prefeitura');
        $crud->display_as('administrador_administrador_id','Administrador');
        
        // impede administradores normais de ver a coluna de remetente
        if ($this->session->userdata('id') != 0) {
            $crud->where('administrador_administrador_id', $this->session->userdata('id'));
            $crud->columns('titulo_mensagem', 'texto_mensagem', 'prefeitura_prefeitura_id');
        }
        
        $crud->order_by('mensagem_id', 'desc');
        
        $crud->callback_insert(array($this, 'crudMensagemInsert'));
        
        $crud->unset_export();
        $crud->unset_print();

        $output = $crud->render();
        return($output);
    }
    
    function crudMensagemInsert($post_array)
    {
        $post_array['administrador_administrador_id'] = $this->session->userdata('id');
        
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $prefeitura = $this->getEmail($post_array['prefeitura_prefeitura_id']);
        $this->email->from('nao-existe@cjr.org.br', 'Sistema SPEC');
        
        $this->email->to($prefeitura->email_prefeitura, 'pedro'); 
        $this->email->subject($post_array['titulo_mensagem']);
        $this->email->message($post_array['texto_mensagem']."Esse é um e-mail automático, não responda esse e-mail.");	
        $this->email->send();
		
        return $this->db->insert('mensagem', $post_array);
    }
	
    function getEmail($id){
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $id);
        $query = $this->db->get()->row();
        return $query; 
    }
    
    function checaQtd($id)
    {
        //seleciona a quantidadede prefeitura 
        $this->db->from('secretario');
        $this->db->where('prefeitura_prefeitura_id', $id);
        $query = $this->db->get();
        return $query->num_rows();        
      

    }
    
    function pegandoTelefone($prefeitura_id)
    {
        $this->db->from('telefone');
        $this->db->where('prefeitura_prefeitura_id', $prefeitura_id);
        $query = $this->db->get();
        
        return $query;
    }
    
    function ativarPrefeitura($id){
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $id);
        $query = $this->db->get()->row();
        
        if( $query->ativada == 'Não ativada'){        
            $ativada = 'Ativada';
             
        }
        else if ( $query->ativada == 'Ativada'){
            $ativada = 'Não ativada';
            
        }
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $id);
        $this->db->set('ativada',$ativada);
        $this->db->update('prefeitura');
    }
    
    
    function checandoIdPrefeitura($post_array){
        $this->db->from('secretario');
        $this->db->where('prefeitura_prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query = $this->db->get();
        
        if (    $query->num_rows() > 2   )
        {
            $post_array['prefeitura_prefeitura_id'] = -1;   
            $this->session->set_userdata('erro', 'insert');
        }
        
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query = $this->db->get()->row();
        return $this->db->insert('secretario',$post_array);
    }
}

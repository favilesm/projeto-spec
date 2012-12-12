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
        $crud->columns('titulo_dica','texto_dica');
        $crud->required_fields('titulo_dica','texto_dica');
        $crud->display_as('titulo_dica','Título');
        $crud->display_as('texto_dica','Texto');

        $output = $crud->render();
        return($output);
    }
    
    function encriptasenha($post_array, $primary_key = null)
    {
        $this->load->helper('security');
        $post_array['senha'] = do_hash($post_array['senha'], 'md5');
        return $post_array;
    }
    
    function crudAdmin($id)
    {
        $crud = new grocery_CRUD();
        $crud->set_table('administrador');
        $crud->set_subject('Administrador');
        $crud->columns('login','senha');
        $crud->required_fields('login', 'senha');
       
        if ($id == 1)
        {
            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();
        }

        $crud->callback_before_insert(array($this,'encriptasenha'));
        $crud->callback_before_update(array($this,'encriptasenha'));

        $output = $crud->render();
        return($output);
    }
    
    function crudBlog()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('blog');
        $crud->set_subject('Blog');
        $crud->required_fields('titulo_blog','texto_blog');
        $crud->columns('titulo_blog','texto_blog');
        $crud->unset_add_fields('blog_id');
        $crud->unset_edit_fields('blog_id');
        $crud->display_as('blog_id','ID')
             ->display_as('titulo_blog','Título')
             ->display_as('texto_blog','Texto');

        $output = $crud->render();
        return($output);
    }


    function crudPrefeitura()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('prefeitura');
        $crud->set_subject('Prefeitura');
        $crud->add_action('Ativar', 'ui-icon-plus','administrador/ativar');
        $crud->add_action('Secretarios', 'ui-icon-plus','administrador/secretario');
        $crud->add_action('Telefone', 'ui-icon-plus','administrador/telefone');
        $crud->unset_add_fields('quantidade_secretario','ativada');
        $crud->unset_edit_fields('quantidade_secretario','ativada');

        $crud->display_as('uf','UF')             ->display_as('municipio','Município')
             ->display_as('endereco','Endereço')
             ->display_as('cnpj','CNPJ')    
             ->display_as('email_prefeitura','Email da prefeitura')        
             ->display_as('num_habitantes','Número de habitantes')                         
             ->display_as('telefone','Telefone')                         
             ->display_as('nome_prefeito','Nome do prefeito');
       
        $output = $crud->render();
        return($output);
    }

    function crudSecretario($id)
    {
        $crud = new grocery_CRUD();

        $crud->set_table('secretario');
        $crud->set_subject('Secretario');
        $crud->columns('nome_secretario', 'email_secretario', 'funcao');
        $crud->fields('nome_secretario', 'email_secretario', 'funcao');
        //$crud->required_fields('prefeitura_prefeitura_id');
        $crud->where('prefeitura_prefeitura_id', $id);
        //$crud->callback_before_insert(array($this,'checandoIdPrefeitura'));
        $crud->callback_insert(array($this,'acharPrefeituraSecretario'));
        
        $output = $crud->render();
        return($output);
    }
    
    function crudTelefone($id)
    {
        $crud = new grocery_CRUD();
      
        $crud->set_table('telefone');
        $crud->set_subject('Telefone');
        $crud->fields('telefone');
        $crud->columns('telefone');
        //$crud->unset_add_fields('prefeitura_prefeitura_id');
        //$ultima = mysql_query("SELECT LAST_INSERT_ID();");
        //print_r($ultima);die("adfasfd");
        $crud->callback_insert(array($this,'acharPrefeituraTelefone'));
         $crud->where('prefeitura_prefeitura_id', $id);
        $output = $crud->render();
        return($output);
    }
    
    function crudPrefeito()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('prefeito');
        $crud->set_subject('Prefeito');
        
        $crud->required_fields('prefeitura_prefeitura_id');
        
        $crud->display_as('nome_prefeito','Nome do prefeito')
             ->display_as('data_nascimento','Data de nascimento')
             ->display_as('email_prefeito','Email do prefeito')
                ->display_as('prefeitura_prefeitura_id','Município do prefeito')
        ->display_as('cpf','CPF');
        
        $crud->unset_add_fields('prefeito_id');
        $crud->unset_edit_fields('prefeito_id');
        
        $crud->callback_before_insert(array($this,'checandoIdPrefeitura'));
        $crud->set_relation('prefeitura_prefeitura_id','prefeitura','municipio');

        $output = $crud->render();
        return($output);
    }
    
    function crudNoticia()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('noticia');
        $crud->set_subject('Noticia');
        $crud->required_fields('titulo_noticia','texto_noticia');
        $crud->columns('titulo_noticia','texto_noticia','prefeituras', 'file_url');
        $crud->set_relation_n_n('prefeituras', 'prefeitura_x_noticia', 'prefeitura', 'noticia_noticia_id', 'prefeitura_prefeitura_id', 'nome_prefeitura');
        $crud->unset_add_fields('noticia_id');
        $crud->unset_edit_fields('noticia_id');
        $crud->add_action('Anexos', 'ui-icon-plus','administrador/noticiaAnexo');
        $crud->display_as('titulo_noticia','Título')
             ->display_as('texto_noticia','Texto');
        
        $crud->set_field_upload('file_url','assets/uploads/files');
        
        $output = $crud->render();
        return($output);
    }    
    
    function crudNoticiaAnexo($noticia_id)
    {
        $crud = new grocery_CRUD();
        
        $this->db->where('noticia_id', $noticia_id);
        $crud->set_table('arquivos');
        $crud->set_subject('anexo à notícia '.$this->db->get('noticia')->row()->titulo_noticia);
        
        $crud->set_relation('noticia_noticia_id','noticia','titulo_noticia');
        
        $crud->columns('arquivo');
        $crud->fields('arquivo');
        $crud->required_fields('arquivo');
        
        $crud->display_as('arquivo', 'Arquivo');
        
        $crud->set_field_upload('arquivo', 'assets/uploads/files/noticiaAnexo');
        
        $crud->where('noticia_noticia_id', $noticia_id);
        
        $crud->callback_insert(array($this, 'crudNoticiaAnexoInsert'));
        
        $output = $crud->render();
        return($output);
    }
    
    function crudNoticiaAnexoInsert($post_array)
    {
        $post_array['noticia_noticia_id'] = $this->uri->segment('3');
        return $this->db->insert('arquivos', $post_array);
    }
    
    function crudPrograma()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('programa');
        $crud->set_subject('Programa');
        $crud->columns('titulo_programa','texto_programa');
        $crud->unset_add_fields('programa_id');
        $crud->unset_edit_fields('programa_id');
        $crud->required_fields('titulo_programa','texto_programa');
        $crud->display_as('titulo_programa','Título');
        $crud->display_as('texto_programa','Texto');

        $output = $crud->render();
        return($output);
    }
    
    function crudMensagem()
    {
        $crud = new grocery_CRUD();
        
        $crud->set_table('mensagem');
        $crud->set_subject('Mensagem');
        
        $crud->set_relation('prefeitura_prefeitura_id','prefeitura','nome_prefeitura');
        $crud->set_relation('administrador_administrador_id','administrador','login');
        
        $crud->fields('titulo_mensagem', 'texto_mensagem', 'prefeitura_prefeitura_id');
        $crud->required_fields('titulo_mensagem','texto_mensagem','prefeitura_prefeitura_id');
        
        $crud->display_as('titulo_mensagem','Título');
        $crud->display_as('texto_mensagem','Texto');
        $crud->display_as('prefeitura_prefeitura_id','Destinatário');
        $crud->display_as('administrador_administrador_id','Remetente');
        
        // impede administradores normais de ver a coluna de remetente
        if ($this->session->userdata('id') != 0) {
            $crud->where('administrador_administrador_id', $this->session->userdata('id'));
            $crud->columns('titulo_mensagem', 'texto_mensagem', 'prefeitura_prefeitura_id');
        }
        
        $crud->callback_insert(array($this, 'crudMensagemInsert'));
        
        $output = $crud->render();
        return($output);
    }
    
    function crudMensagemInsert($post_array)
    {
        $post_array['administrador_administrador_id'] = $this->session->userdata('id');
        return $this->db->insert('mensagem', $post_array);
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
    
    function acharPrefeituraSecretario($post_array)
    {
       
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        return $this->db->insert('secretario',$post_array);
    }
    
    function acharPrefeituraTelefone($post_array)
    {
       
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        return $this->db->insert('telefone',$post_array);
        /*
        $id = $this->uri->segment('4');
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $id){
            $ids = $id->prefeitura_id;
            
        }
        
        print_r($ids);
        $ultima = last_insert_id();
        
        print_r($ultima); die();
            return $ids;
   
         */  }
     
    function ativarPrefeitura($id){
        $ativada = 1;
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $id);
        $this->db->set('ativada',$ativada);
        $this->db->update('prefeitura');
    }
    
    function checandoIdPrefeitura($post_array)
    {
        $this->db->from('secretario');
        $this->db->where('prefeitura_prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query = $this->db->get();
        
        if (    $query->num_rows() > 3   )
        {
            $post_array['prefeitura_prefeitura_id'] = -1;   
            $this->session->set_userdata('erro', 'insert');
        }
        
        
        return $post_array;
    }

    
}

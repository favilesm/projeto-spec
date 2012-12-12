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
        $crud->columns('titulo_dica','texto_dica','prefeitura_prefeitura_id');
        $crud->required_fields('titulo_dica','texto_dica','prefeitura_prefeitura_id');
        
        $crud->set_relation('prefeitura_prefeitura_id','prefeitura','nome_prefeitura');
        
        $crud->display_as('titulo_dica','Título');
        $crud->display_as('texto_dica','Texto');
        $crud->display_as('prefeitura_prefeitura_id','Prefeitura');
        
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


    function crudPrefeitura(){
        $crud = new grocery_CRUD();
 
        $crud->set_table('prefeitura');
        $crud->set_subject('Prefeitura');
        
        $crud->add_action('Ativar',base_url('/assets/uploads/ativada.png'),'administrador/ativar');
        $crud->add_action('Prefeito',base_url('/assets/uploads/mayor.png'),'administrador/prefeito');
        $crud->add_action('Secretarios', base_url('/assets/uploads/secretario.png'),'administrador/secretario');
        $crud->add_action('Telefone', base_url('/assets/uploads/telefone.png'),'administrador/telefone');
        $crud->unset_add_fields('quantidade_secretario','ativada');
        $crud->unset_edit_fields('quantidade_secretario','ativada');

        $crud->display_as('uf','UF')             
             ->display_as('municipio','Município')
             ->display_as('endereco','Endereço')
             ->display_as('cnpj','CNPJ')    
             ->display_as('email_prefeitura','Email da prefeitura')
             ->display_as('nome_prefeitura','Nome do prefeito')
             ->display_as('num_habitantes','Número de habitantes')                         
             ->display_as('telefone','Telefone')                         
             ->display_as('nome_prefeito','Nome do prefeito');
       
        $crud->callback_before_insert(array($this,'encriptasenha'));
        $crud->callback_before_update(array($this,'encriptasenha')); 
       
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
        $crud->where('prefeitura_prefeitura_id', $id);
        
        $crud->callback_insert(array($this,'acharPrefeituraSecretario'));
        $crud->callback_after_delete(array($this,'decQuantidade'));
        
        $output = $crud->render();
        return($output);
    }    
    
    function decQuantidade($primary_key){
        
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query3 = $this->db->get()->row();
        
        $query3->quantidade_secretario --;
                
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $this->db->set('quantidade_secretario',$query3->quantidade_secretario);
        $this->db->update('prefeitura');
    }

    function crudTelefone($id)
    {
        $crud = new grocery_CRUD();
      
        $crud->set_table('telefone');
        $crud->set_subject('Telefone');
        $crud->fields('telefone');
        $crud->columns('telefone');
        $crud->callback_insert(array($this,'acharPrefeituraTelefone'));
         $crud->where('prefeitura_prefeitura_id', $id);
        $output = $crud->render();
        return($output);
    }
    
    function crudPrefeito($id)
    {
        $crud = new grocery_CRUD();
        $crud->set_table('prefeito');
        $crud->set_subject('Prefeito');
        $crud->columns('nome_prefeito', 'celular', 'cpf', 'data_nascimento', 'email_prefeito');
        $crud->fields('nome_prefeito', 'celular', 'cpf', 'data_nascimento', 'email_prefeito');
        $crud->where('prefeitura_prefeitura_id', $id);
        
        $crud->callback_insert(array($this,'crudPrefeitoInsert'));
        
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
        $crud->set_relation_n_n('prefeituras', 'prefeitura_x_noticia', 'prefeitura', 'noticia_noticia_id', 'prefeitura_prefeitura_id', 'nome_prefeitura','priority');
        $crud->unset_add_fields('noticia_id');
        $crud->unset_edit_fields('noticia_id');
        $crud->add_action('Arquivos', 'ui-icon-plus','administrador/noticiaAnexo');
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
        $crud->set_subject('arquivo à notícia '.$this->db->get('noticia')->row()->titulo_noticia);
        
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
    
    function acharPrefeituraSecretario($post_array='')
    {        
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
       
        $this->db->from('secretario');
        $this->db->where('prefeitura_prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query = $this->db->get();
        
        if (    $query->num_rows() > 2   )
        {
            $post_array['prefeitura_prefeitura_id'] = -1;   
            $this->session->set_userdata('erro', 'insert');
        }
        $this->db->insert('secretario',$post_array);
                
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $query3 = $this->db->get()->row();
        
        $query3->quantidade_secretario ++;
                
        $this->db->from('prefeitura');
        $this->db->where('prefeitura_id', $post_array['prefeitura_prefeitura_id']);
        $this->db->set('quantidade_secretario',$query3->quantidade_secretario);
        $this->db->update('prefeitura');
        
    }
    
    function acharPrefeituraTelefone($post_array)
    {
       
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        return $this->db->insert('telefone',$post_array);
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
    
    function crudPrefeitoInsert($post_array)
    {
        $post_array['prefeitura_prefeitura_id'] = $this->uri->segment('3');
        return $this->db->insert('prefeit', $post_array);
    }
}

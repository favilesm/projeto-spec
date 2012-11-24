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
        $crud->display_as('titulo_blog','Título')
             ->display_as('texto_blog','Texto');

        $output = $crud->render();
        return($output);
    }


    function crudPrefeitura()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('prefeitura');
        $crud->set_subject('Prefeitura');
         $crud->add_action('Ativar', 'ui-icon-plus','administrador/prefeitura/ativar');
         $crud->add_action('Secretarios', 'ui-icon-plus','administrador/secretario/add');
        $crud->unset_add_fields('quantidade_secretario','ativada');
        $crud->unset_edit_fields('quantidade_secretario','ativada');
        $output = $crud->render();
        return($output);
    }

    function crudSecretario()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('secretario');
        $crud->set_subject('secretario');
        $crud->required_fields('prefeitura_prefeitura_id');
        
        $crud->callback_before_insert(array($this,'checandoIdPrefeitura'));
        
        $output = $crud->render();
        return($output);
    }
    
    function crudNoticia()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('noticia');
        $crud->set_subject('Noticia');
        $crud->required_fields('titulo_noticia','texto_noticia');
        $crud->columns('titulo_noticia','texto_noticia','prefeituras');
        $crud->unset_add_fields('noticia_id');
        $crud->unset_edit_fields('noticia_id');
        $crud->display_as('titulo_noticia','Título')
             ->display_as('texto_noticia','Texto');
        $crud->set_relation_n_n('prefeituras', 'prefeitura_x_noticia', 'prefeitura', 'noticia_noticia_id', 'prefeitura_prefeitura_id', 'nome_prefeitura');

        $output = $crud->render();
        return($output);
    }    
    

    function checaQtd($id)
    {
        //seleciona a quantidadede prefeitura 
        $this->db->from('secretario');
        $this->db->where('prefeitura_prefeitura_id', $id);
        $query = $this->db->get();
        return $query->num_rows();        
      

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
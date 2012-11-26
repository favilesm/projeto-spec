<?php

class Administrador extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
    
    function _chamaTemplate($output = null)
    {
        $this->load->view('adminTemplateView.php',$output);    
    }
        
    function index()
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudAdmin($this->verificaAdmin());
            $this->_chamaTemplate($output);
            
        }
        else
        {
            redirect('login');
        }

    }
    
    function dica()
    {
        $this->load->model('adminModel');
        $output = $this->adminModel->crudDica();
        $this->_chamaTemplate($output);
    }
    
    function programa()
    {
        $this->load->model('adminModel');
        $output = $this->adminModel->crudPrograma();
        $this->_chamaTemplate($output);
    }
    
    function noticia()
    {
        
        $this->load->model('adminModel');
        $output = $this->adminModel->crudNoticia();
        $this->_chamaTemplate($output);
    }
    
    function blog()
    {
        $this->load->model('adminModel');
        $output = $this->adminModel->crudBlog();
        $this->_chamaTemplate($output);
    }
    
    function prefeitura()
    {
        $this->load->model('adminModel');
        $output = $this->adminModel->crudPrefeitura();
        if( $this->session->userdata('erro') == 'insert' ) $output['erro'] = 'insert';
        $this->_chamaTemplate($output);
    }
    
    function secretario()
    {       
        $this->load->model('adminModel');
        $output = $this->adminModel->crudSecretario();
        
        $this->_chamaTemplate($output); 

    }
    
    function prefeito()
    {       
        $this->load->model('adminModel');
        $output = $this->adminModel->crudPrefeito();
        $this->_chamaTemplate($output); 

    }
    
    function mensagem()
    {       
        $this->load->model('adminModel');
        $output = $this->adminModel->crudMensagem();
        $this->_chamaTemplate($output); 

    }
    
    function verificaAdmin()
    {
        $this->load->model('usuarioModel');        
        $tipoDeUsuario = $this->usuarioModel->verificaAdmin();   
        if(is_object($tipoDeUsuario))
        {
            //usuário é admin
            if( $tipoDeUsuario->administrador_id == 0)
            {
                return 0;
            }
            else
            {//admin normal
                return 1;
            }
                    
        }
        else
        {//usuário normal
           return 2;
        }
        
    }
    
    function checaQtdSecretarios($id)
    {
        
        $this->load->model('adminModel');
        $output = $this->adminModel->checaQtd($id);
        echo $output;
                
    }
    
}

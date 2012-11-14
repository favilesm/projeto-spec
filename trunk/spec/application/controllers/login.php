<?php

class Login extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('login_form');
        
    }
    
    function validar()
    {
        $this->load->helper('url');
        $this->load->model('usuariomodel');
        $senha = $this->input->post('senha');
        $login = $this->input->post('login');
        $query = $this->usuariomodel->validar($senha, $login);
        $query2 = $this->usuariomodel->validarAdmin($senha, $login);
        
        if($query) //Se valido
        {
            $data = array (
                'login' => $this->input->post('login'),
                'logado' => true
            );
                
            $this->session->set_userdata($data);
            
            $this->verificaUsuario();
        }
        
        elseif ($query2) 
        {         
            $data = array (
                'login' => $this->input->post('login'),
                'inserio' => false,
                'logado' => true
            );
                
            $this->session->set_userdata($data);
            
            $this->verificaUsuario();
            
        }
        else
        {
            echo 'login inválido';
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        
        redirect('login');
    }
    
    
    function verificaUsuario()
    {
        $this->load->model('usuariomodel');
        
        $tipoDeUsuario = $this->usuariomodel->verificaAdmin();   
    
        if(is_object($tipoDeUsuario))
        {
            redirect('administrador');
        }
        else
        {
            redirect('prefeitura');
        }
    
    }
    
}

?>

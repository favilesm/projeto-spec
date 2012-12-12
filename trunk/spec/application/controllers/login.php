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
        
        if($query = $this->usuariomodel->validar($senha, $login)) //Se valido
        {
            $data = array (
                'id' => $query->prefeitura_id,
                'login' => $this->input->post('login'),
                'logado' => true
            );
                
            $this->session->set_userdata($data);
            
            $this->verificaUsuario();
        }
        else if ($query = $this->usuariomodel->validarAdmin($senha, $login)) 
        {         
            $data = array (
                'id' => $query->administrador_id,
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

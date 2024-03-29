<?php

class Login extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        if ($this->session->userdata('logado'))
            $this->verificaUsuario();
        
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
                'logado' => true,
                'tipousuario' => 'prefeitura'
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
                'logado' => true,
                'tipousuario' => 'admin'
            );
                
            $this->session->set_userdata($data);
            
            $this->verificaUsuario();
            
        }
        else
        {
            $this->load->view('erro_login');    
        }
    }
    
    function logout()
    {
        $this->session->sess_destroy();
        
        redirect('login');
    }
    
    
    function verificaUsuario()
    {
        if($this->session->userdata('tipousuario') == 'admin')
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

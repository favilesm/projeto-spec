<?php

class Administrador extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('tipousuario') != 'admin')
            redirect('login');
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
            $output = $this->adminModel->crudAdmin();
            $output->titulo = 'Administradores';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function adminsenha($id)
    {
        if (    $this->session->userdata('logado') == true  )
        {
            if ($this->session->userdata('id') != 0)
                redirect('administrador');
            
            $this->load->model('adminModel');
            
            if (count($_POST)) {
                $this->adminModel->alteraSenhaAdmin($id, $_POST['senha']);
                $this->session->set_flashdata('mensagem', 'Senha alterada com sucesso!');
                redirect('administrador');
            }
            
            $dado['nome'] = $this->adminModel->getNomeAdmin($id);
            $dado['tipo'] = 'admin';
            $this->load->view('adminTemplateSenha.php', $dado);
        }
        else
        {
            redirect('login');
        }
    }
    
    function dica()
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudDica();
            $output->titulo = 'Dicas';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function programa($id='')
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudPrograma();
            $output->titulo = 'Programas do governo';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function noticia()
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudNoticia();
            $output->titulo = 'Notícias';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function noticiaAnexo($noticia_id)
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudNoticiaAnexo($noticia_id);
            $output->titulo = 'Anexos da notícia '.$this->adminModel->getNomeNoticia($noticia_id);
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function blog()
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudBlog();
            $output->titulo = 'Blog';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function prefeitura()
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudPrefeitura();
            $output->titulo = 'Prefeituras';
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function prefeiturasenha($prefeitura_id)
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            
            if (count($_POST)) {
                $this->adminModel->alteraSenhaPrefeitura($prefeitura_id, $_POST['senha']);
                $this->session->set_flashdata('mensagem', 'Senha alterada com sucesso!');
                redirect('administrador/prefeitura');
            }
            
            $dado['nome'] = $this->adminModel->getNomePrefeitura($prefeitura_id);
            $dado['tipo'] = 'prefeitura';
            $this->load->view('adminTemplateSenha.php', $dado);
        }
        else
        {
            redirect('login');
        }
    }
    
    function secretario($id='')
    {       
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudSecretario($id);
            $output->titulo = 'Secretários da prefeitura de '.$this->adminModel->getNomePrefeitura($id);
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function telefone($id='')
    {       
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudTelefone($id);
            $output->titulo = 'Telefones da prefeitura de '.$this->adminModel->getNomePrefeitura($id);
            $this->_chamaTemplate($output); 
        }
        else
        {
            redirect('login');
        }
    }
    
    function ativar($id)
    {
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->ativarPrefeitura($id);
             redirect('administrador/prefeitura');
            //$this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function prefeito($id='')
    {       
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudPrefeito($id);
            $output->titulo = 'Prefeito de '.$this->adminModel->getNomePrefeitura($id);
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function mensagem()
    {       
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudMensagem();
            $output->titulo = 'Mensagens';
			$this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
    
    function checaQtdSecretarios($id)
    {
        
        $this->load->model('adminModel');
        $output = $this->adminModel->checaQtd($id);
        echo $output;
                
    }
    

}

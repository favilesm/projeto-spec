<?php

class Administrador extends CI_Controller {
    
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
        if (    $this->session->userdata('logado') == true  )
        {
            $this->load->model('adminModel');
            $output = $this->adminModel->crudDica();
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
            //if( $this->session->userdata('erro' ) $output['erro'] = 'insert';
            $this->_chamaTemplate($output);
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
             redirect('/administrador/prefeitura');
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
            $output = $this->adminModel->crudMensagem($this->verificaAdmin());

            /*$this->load->view('_inc/header_open');
            $this->load->view('_inc/header_grocery', $output);
            $this->load->view('_inc/header');
            $this->load->view('_inc/header_close');
            $this->load->view('admin/top');
            $this->load->view('_inc/grocery', $output);
            $this->load->view('_inc/footer');*/
			$this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
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

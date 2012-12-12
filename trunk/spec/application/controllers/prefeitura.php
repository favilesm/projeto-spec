<?php

class Prefeitura extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('prefeituramodel');
    }
    
    function index()
    {
        $this->load->view('_inc/header_open');
        $this->load->view('_inc/header');
        $this->load->view('_inc/header_close');
        $this->load->view('prefeitura/top');
        $this->load->view('_inc/footer');
    }
    
    function noticia()
    {
        $noticias = $this->prefeituramodel->getNoticias();
        
        $this->load->view('_inc/header_open');
        $this->load->view('_inc/header');
        $this->load->view('_inc/header_close');
        $this->load->view('prefeitura/top');
        $this->load->view('prefeitura/noticias', $noticias);
        $this->load->view('_inc/footer');
    }
    
    function dica()
    {
        $dados['dicas'] = $this->prefeituramodel->getDicas();
        
        $this->load->view('_inc/header_open');
        $this->load->view('_inc/header');
        $this->load->view('_inc/header_close');
        $this->load->view('prefeitura/top');
        $this->load->view('prefeitura/dicas', $dados);
        $this->load->view('_inc/footer');
    }
}

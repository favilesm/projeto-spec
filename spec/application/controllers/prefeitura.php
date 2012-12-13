<?php

class Prefeitura extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('prefeituramodel');
	}
	
	function index()
	{
            if (    $this->session->userdata('logado') == true  )
            {
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('_inc/footer');
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
                $noticias = $this->prefeituramodel->getNoticias();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/noticias', $noticias);
		$this->load->view('_inc/footer');
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
                $dicas = $this->prefeituramodel->getDicas();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/dicas', $dicas);
		$this->load->view('_inc/footer');
            }
            else
            {
                redirect('login');
            }
	}
	
	function programa()
	{
	    if (    $this->session->userdata('logado') == true  )
            {
                $programas = $this->prefeituramodel->getProgramas();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/programas', $programas);
		$this->load->view('_inc/footer');
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
                $blog = $this->prefeituramodel->getBlog();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/blog', $blog);
		$this->load->view('_inc/footer');
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
                $output = $this->prefeituramodel->crudMensagem();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header_grocery', $output);
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('_inc/grocery', $output);
		$this->load->view('_inc/footer');
            }
            else
            {
                redirect('login');
            }
	}
}

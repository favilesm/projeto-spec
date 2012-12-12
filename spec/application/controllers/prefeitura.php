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
		$dicas = $this->prefeituramodel->getDicas();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/dicas', $dicas);
		$this->load->view('_inc/footer');
	}
	
	function programa()
	{
		$programas = $this->prefeituramodel->getProgramas();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/programas', $programas);
		$this->load->view('_inc/footer');
	}
	
	function blog()
	{
		$blog = $this->prefeituramodel->getBlog();
		
		$this->load->view('_inc/header_open');
		$this->load->view('_inc/header');
		$this->load->view('_inc/header_close');
		$this->load->view('prefeitura/top');
		$this->load->view('prefeitura/blog', $blog);
		$this->load->view('_inc/footer');
	}
	
	function mensagem()
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
}

<?php

class Prefeitura extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('prefeituramodel');
	}
	
	function index()
	{
		redirect('prefeitura/noticia');
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
	
	function alterarsenha()
	{
		if (    $this->session->userdata('logado') == true  )
		{
			if (count($_POST)) {
				if ($_POST['senha'] == $_POST['senhavelha']) {
					$this->session->set_flashdata('erro', 'A nova senha deve ser diferente da senha atual!');
					redirect('prefeitura/alterarsenha');
				}
				else if ($this->prefeituramodel->alteraSenha($_POST)) {
					$this->session->set_flashdata('mensagem', 'Senha alterada com sucesso!');
					redirect('prefeitura');
				}
				else {
					$this->session->set_flashdata('erro', 'Senhas não conferem!');
					redirect('prefeitura/alterarsenha');
				}
			}
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top');
			$this->load->view('prefeitura/alterar_senha');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
}

<?php

class Prefeitura extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('tipousuario') != 'prefeitura')
			redirect('login');
		
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
			$output = $this->prefeituramodel->getNoticias();
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header_grocery', $output);
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Notícias'));
			$this->load->view('_inc/grocery', $output);
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	function noticiarow($noticia_id)
	{
		if (    $this->session->userdata('logado') == true  )
		{
			$row = $this->prefeituramodel->getNoticia($noticia_id);
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Notícia'));
			$this->load->view('prefeitura/row', $row);
			$this->load->view('prefeitura/noticia_arquivos', $row);
			$this->load->view('prefeitura/bottom');
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
			$output = $this->prefeituramodel->getDicas();
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header_grocery', $output);
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Dicas'));
			$this->load->view('_inc/grocery', $output);
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	function dicarow($dica_id)
	{
		if (    $this->session->userdata('logado') == true  )
		{
			$row = $this->prefeituramodel->getDica($dica_id);
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Dica'));
			$this->load->view('prefeitura/row', $row);
			$this->load->view('prefeitura/bottom');
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
			$output = $this->prefeituramodel->getProgramas();
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header_grocery', $output);
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Programas do governo'));
			$this->load->view('_inc/grocery', $output);
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	function programarow($programa_id)
	{
		if (    $this->session->userdata('logado') == true  )
		{
			$row = $this->prefeituramodel->getPrograma($programa_id);
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Programa do governo'));
			$this->load->view('prefeitura/row', $row);
			$this->load->view('prefeitura/bottom');
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
			$output = $this->prefeituramodel->getPosts();
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header_grocery', $output);
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Blog'));
			$this->load->view('_inc/grocery', $output);
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	function postrow($post_id)
	{
		if (    $this->session->userdata('logado') == true  )
		{
			$row = $this->prefeituramodel->getPost($post_id);
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Post'));
			$this->load->view('prefeitura/row', $row);
			$this->load->view('prefeitura/bottom');
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
			$output = $this->prefeituramodel->getMensagens();
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header_grocery', $output);
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Mensagens'));
			$this->load->view('_inc/grocery', $output);
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
	
	function mensagemrow($mensagem_id)
	{
		if (    $this->session->userdata('logado') == true  )
		{
			$row = $this->prefeituramodel->getMensagem($mensagem_id);
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Mensagem'));
			$this->load->view('prefeitura/row', $row);
			$this->load->view('prefeitura/bottom');
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
					redirect('prefeitura/noticia');
				}
				else {
					$this->session->set_flashdata('erro', 'Senhas não conferem!');
					redirect('prefeitura/alterarsenha');
				}
			}
			
			$this->load->view('_inc/header_open');
			$this->load->view('_inc/header');
			$this->load->view('_inc/header_close');
			$this->load->view('prefeitura/top', array('titulo' => 'Alterar senha'));
			$this->load->view('prefeitura/alterar_senha');
			$this->load->view('prefeitura/bottom');
			$this->load->view('_inc/footer');
		}
		else
		{
			redirect('login');
		}
	}
}

<?php

class PrefeituraModel extends CI_Model {
	
	function getNoticias()
	{
		$dados['noticias'] = $this->db->query(
			'SELECT * FROM noticia INNER JOIN prefeitura_x_noticia ON '.
			'noticia.noticia_id=prefeitura_x_noticia.noticia_noticia_id WHERE '.
			'prefeitura_x_noticia.prefeitura_prefeitura_id='.$this->session->userdata('id')
		)->result();
		return $dados;
	}
	
	function getDicas()
	{
		$this->db->where('prefeitura_prefeitura_id', $this->session->userdata('id'));
		$dados['dicas'] = $this->db->get('dica')->result();
		return $dados;
	}
	
	function getProgramas()
	{
		$dados['programas'] = $this->db->get('programa')->result();
		return $dados;
	}
	
	function getBlog()
	{
		$dados['blog'] = $this->db->get('blog')->result();
		return $dados;
	}
	
	function crudMensagem()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('mensagem');
		$crud->set_subject('Mensagem');
		
		$crud->columns('titulo_mensagem', 'texto_mensagem');
		$crud->fields('titulo_mensagem', 'texto_mensagem');
		$crud->required_fields('titulo_mensagem','texto_mensagem');
		
		$crud->display_as('titulo_mensagem','Título');
		$crud->display_as('texto_mensagem','Texto');
		
		$crud->where('prefeitura_prefeitura_id', $this->session->userdata('id'));
		
		$crud->unset_edit();
		$crud->unset_delete();
		
		return $crud->render();
	}
}

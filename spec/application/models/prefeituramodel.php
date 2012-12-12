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
}

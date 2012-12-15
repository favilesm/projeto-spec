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
		$dados['dicas'] = $this->db->query(
			'SELECT * FROM dica INNER JOIN prefeitura_x_dica ON '.
			'dica.dica_id=prefeitura_x_dica.dica_dica_id WHERE '.
			'prefeitura_x_dica.prefeitura_prefeitura_id='.$this->session->userdata('id')
		)->result();
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
	
	function getMensagens()
	{
		$this->db->order_by('mensagem_id', 'desc');
		$this->db->where('prefeitura_prefeitura_id', $this->session->userdata('id'));
		$dados['mensagens'] = $this->db->get('mensagem')->result();
		return $dados;
	}
	
	function enviarMensagem($post_array)
	{
		$dados = array(
			'titulo_mensagem' => $post_array['titulo'],
			'texto_mensagem' => $post_array['texto'],
			'prefeitura_prefeitura_id' => $this->session->userdata('id')
		);
		$this->db->insert('mensagem', $dados);
	}
	
	function alteraSenha($post_array)
	{
		$senha_atual = $this->db->get_where('prefeitura', array('prefeitura_id' => $this->session->userdata('id')))->row()->senha;
		if ($senha_atual != md5($post_array['senhavelha']) || $post_array['senha'] != $post_array['senharepete'])
			return false;
		
		$this->db->where('prefeitura_id', $this->session->userdata('id'));
		$this->db->update('prefeitura', array('senha' => md5($post_array['senha'])));
		return true;
	}
}

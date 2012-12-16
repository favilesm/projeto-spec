<?php

class PrefeituraModel extends CI_Model {
	
	function getNoticias()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('noticia');
		$crud->set_subject('Notícia');
		$crud->set_model('prefeituranoticiamodel');
		
		$crud->display_as('titulo_noticia','Título');
		$crud->display_as('texto_noticia','Texto');
		
		$crud->add_action('Ver mais',base_url('/assets/uploads/file.png'),'prefeitura/noticiarow');
		
		$crud->order_by('noticia_id', 'desc');
		
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		$output = $crud->render();
		return($output);
	}
	
	function getNoticia($noticia_id)
	{
		// ve se a noticia realmente esta para o usuario
		$noticia_x_prefeitura = $this->db->get_where(
			'prefeitura_x_noticia',
			array(
				'prefeitura_prefeitura_id' => $this->session->userdata('id'),
				'noticia_noticia_id' => $noticia_id
			)
		)->row();
		if (!count($noticia_x_prefeitura))
			redirect('prefeitura/noticia');
		
		// pega a noticia
		$this->db->where('noticia_id', $noticia_id);
		$linha = $this->db->get('noticia')->row();
		
		// pega os arquivos da noticia
		$this->db->where('noticia_noticia_id', $noticia_id);
		$arquivos = $this->db->get('arquivos')->result();
		
		return array(
			'row' => array(
				'titulo' => $linha->titulo_noticia,
				'texto' => $linha->texto_noticia,
			),
			'arquivos' => $arquivos
		);
	}
	
	function getDicas()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('dica');
		$crud->set_subject('Dica');
		$crud->set_model('prefeituradicamodel');
		
		$crud->display_as('titulo_dica','Título');
		$crud->display_as('texto_dica','Texto');
		
		$crud->add_action('Ver mais',base_url('/assets/uploads/file.png'),'prefeitura/dicarow');
		
		$crud->order_by('dica_id', 'desc');
		
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		$output = $crud->render();
		return($output);
	}
	
	function getDica($dica_id)
	{
		// ve se a dica realmente esta para o usuario
		$dica_x_prefeitura = $this->db->get_where(
			'prefeitura_x_dica',
			array(
				'prefeitura_prefeitura_id' => $this->session->userdata('id'),
				'dica_dica_id' => $dica_id
			)
		)->row();
		if (!count($dica_x_prefeitura))
			redirect('prefeitura/dica');
		
		// pega a dica
		$this->db->where('dica_id', $dica_id);
		$linha = $this->db->get('dica')->row();
		
		return array(
			'row' => array(
				'titulo' => $linha->titulo_dica,
				'texto' => $linha->texto_dica,
			)
		);
	}
	
	function getProgramas()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('programa');
		$crud->set_subject('Programa');
		
		$crud->display_as('titulo_programa','Título');
		$crud->display_as('texto_programa','Texto');
		
		$crud->add_action('Ver mais',base_url('/assets/uploads/file.png'),'prefeitura/programarow');
		
		$crud->order_by('programa_id', 'desc');
		
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		$output = $crud->render();
		return($output);
	}
	
	function getPrograma($programa_id)
	{
		// pega o programa
		$this->db->where('programa_id', $programa_id);
		$linha = $this->db->get('programa')->row();
		
		return array(
			'row' => array(
				'titulo' => $linha->titulo_programa,
				'texto' => $linha->texto_programa,
			)
		);
	}
	
	function getPosts()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('blog');
		$crud->set_subject('Post');
		
		$crud->display_as('titulo_blog','Título');
		$crud->display_as('texto_blog','Texto');
		
		$crud->add_action('Ver mais',base_url('/assets/uploads/file.png'),'prefeitura/postrow');
		
		$crud->order_by('blog_id', 'desc');
		
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		$output = $crud->render();
		return($output);
	}
	
	function getPost($post_id)
	{
		// pega o post
		$this->db->where('blog_id', $post_id);
		$linha = $this->db->get('blog')->row();
		
		return array(
			'row' => array(
				'titulo' => $linha->titulo_blog,
				'texto' => $linha->texto_blog,
			)
		);
	}
	
	function getMensagens()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table('mensagem');
		$crud->set_subject('Mensagem');
		
		$crud->columns('titulo_mensagem', 'texto_mensagem');
		$crud->fields('titulo_mensagem', 'texto_mensagem');
		$crud->required_fields('titulo_mensagem', 'texto_mensagem');
		
		$crud->display_as('titulo_mensagem','Título');
		$crud->display_as('texto_mensagem','Texto');
		
		$crud->add_action('Ver mais',base_url('/assets/uploads/file.png'),'prefeitura/mensagemrow');
		
		$crud->where('prefeitura_prefeitura_id', $this->session->userdata('id'));
		$crud->order_by('mensagem_id', 'desc');
		
		$crud->unset_edit();
		
		$crud->callback_insert(array($this,'getMensagensInsert'));
		
		$output = $crud->render();
		return($output);
	}
	
	function getMensagensInsert($post_array)
	{
		$post_array['prefeitura_prefeitura_id'] = $this->session->userdata('id');
		return $this->db->insert('mensagem', $post_array);
	}
	
	function getMensagem($mensagem_id)
	{
		// pega a mensagem
		$this->db->where('mensagem_id', $mensagem_id);
		$linha = $this->db->get('mensagem')->row();
		
		// verifica se a mensagem realmente eh do usuario
		if ($linha->prefeitura_prefeitura_id != $this->session->userdata('id'))
			redirect('prefeitura/mensagem');
		
		return array(
			'row' => array(
				'titulo' => $linha->titulo_mensagem,
				'texto' => $linha->texto_mensagem,
			)
		);
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

<?php

class PrefeituraNoticiaModel extends grocery_CRUD_Model {
	
	function get_list() {
		return $this->db->query(
			'SELECT * FROM noticia INNER JOIN prefeitura_x_noticia ON '.
			'noticia.noticia_id=prefeitura_x_noticia.noticia_noticia_id WHERE '.
			'prefeitura_x_noticia.prefeitura_prefeitura_id='.$this->session->userdata('id').' '.
			'ORDER BY noticia.noticia_id DESC'
		)->result();
	}
}

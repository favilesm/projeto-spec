<?php

class PrefeituraDicaModel extends grocery_CRUD_Model {
	
	function get_list() {
		return $this->db->query(
			'SELECT * FROM dica INNER JOIN prefeitura_x_dica ON '.
			'dica.dica_id=prefeitura_x_dica.dica_dica_id WHERE '.
			'prefeitura_x_dica.prefeitura_prefeitura_id='.$this->session->userdata('id').' '.
			'ORDER BY dica.dica_id DESC'
		)->result();
	}
}

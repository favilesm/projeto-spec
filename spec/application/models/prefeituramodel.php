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
                $dicas = $this->db->query ( 'SELECT * FROM prefeitura INNER JOIN dica ON (prefeitura.prefeitura_id = dica.prefeitura_prefeitura_id) WHERE dica.prefeitura_prefeitura_id = '.$this->session->userdata('id') )->result();
                return $dicas;
        }
}

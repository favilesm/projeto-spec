<?php

class UsuarioModel extends CI_Model {
    
    function validar($senha,$login)
    {
        
        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));
        $query = $this->db->get('prefeitura');
        if($query->num_rows == 1 && $query->row()->ativada == 'Ativada'){
            return $query->row();
            
        }
        
    }

    function validarAdmin($senha,$login)
    {
        
        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha) );
        $query = $this->db->get('administrador');
        if($query->num_rows == 1)
        {
            return $query->row();
        }   
    }
}

?>

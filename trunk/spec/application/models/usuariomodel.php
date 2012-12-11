<?php

class UsuarioModel extends CI_Model {
    
    function validar($senha,$login)
    {
        
        $this->db->where('login', $login);
        $this->db->where('senha', md5($senha));
        $query = $this->db->get('prefeitura');
        if($query->num_rows == 1)
        {
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
    
    function verificaAdmin()
    {
        //deve-se selecionar qual tipo de adimin é 
        //1 == admin fodão capaz de criar novos admin
        //2 == admin normal, não possui a função de criar usuári admins
        $login = $this->session->userdata('login');
        $this->db->select('administrador_id');
        $this->db->where('login', $login);

        return $this->db->get('administrador')->row();

    }

    
}

?>

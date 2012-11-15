<?php

class prefeitura_model extends CI_Model{

    function listar() {
        $this->db->select('nome_prefeitura,prefeitura_id');
        $query=$this->db->get('prefeitura');
        return $query->result();
        
    }
    
    function addPrefeitura ($prefeitura){
        $this->db->set($prefeitura);
        $this->db->insert('prefeitura'); 
    }
    
    function addPrefeito ($prefeito){
        $this->db->set($prefeito);
        $this->db->insert('prefeito'); 
    }
    
    function addSecretario ($secretario){
        $this->db->set($secretario);
        $this->db->insert('secretario'); 
    }
    
    function delPrefeitura (){
        $this->db->where('prefeitura_id', $this->uri->segment(3));
        $this->db->delete('prefeitura');
    }
    
    function editPrefeitura ($prefeitura = array()){
        
        $this->db->where('prefeitura_id', $this->uri->segment(3));
        $this->db->set($prefeitura);
        $this->db->update('prefeitura');
    }
    
    function getId($id){
        $this->db->where('prefeitura_id', $id);
        $query = $this->db->get('prefeitura');
        return $query->row(0);     
    }

}
?>

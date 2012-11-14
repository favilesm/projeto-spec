<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

        /*MUDEI AQUI!!*/
    
	public function index()
	{
            if (    $this->session->userdata('logado') == true  )
            {
                $this->load->model('prefeitura_model');
                $data['prefeituras'] = $this->prefeitura_model->listar();
                $this->load->view('prefeitura_form',$data);
            }
            else
            {
                redirect('login');
            }


	}
        
        function cadastrar() {
            $prefeitura['nome_prefeitura'] = $this->input->post('nome_prefeitura');
            $prefeitura['municipio'] = $this->input->post('municipio');
            $prefeitura['endereco'] = $this->input->post('endereco');
            $prefeitura['cnpj'] = $this->input->post('cnpj');
            $prefeitura['telefone'] = $this->input->post('telefone');
            $prefeitura['num_habitantes'] = $this->input->post('num_habitantes');
            $prefeitura['fax'] = $this->input->post('fax');
            $prefeitura['uf'] = $this->input->post('uf');
            $prefeitura['senha'] = $this->input->post('senha');
            $prefeitura['ativada'] = $this->input->post('ativada');
            $prefeito['nome_prefeito'] = $this->input->post('nome_prefeito');
            $prefeito['celular'] = $this->input->post('celular');
            $prefeito['cpf'] = $this->input->post('cpf');
            $prefeito['data_nascimento'] = $this->input->post('data_nacimento');
            $prefeito['email_prefeito'] = $this->input->post('email_prefeito');
            $prefeito['prefeitura_prefeitura_id'] = '13';
            $secretario['nome_secretario'] = $this->input->post('nome_secretario');
            $secretario['email_secretario'] = $this->input->post('email_secretario');
            $secretario['funcao'] = $this->input->post('funcao'); 
            $secretario['prefeitura_prefeitura_id'] = '13';
            $this->load->model('prefeitura_model');
            $this->prefeitura_model->addPrefeitura($prefeitura);
            $this->prefeitura_model->addPrefeito($prefeito);
            $this->prefeitura_model->addSecretario($secretario);
            $data['prefeituras'] = $this->prefeitura_model->listar();
            $this->load->view('prefeitura_form',$data); 
       }
       
       function deletar_prefeitura(){
           $this->load->model('prefeitura_model');
           $this->prefeitura_model->delPrefeitura();
           $data['prefeituras'] = $this->prefeitura_model->listar();
           $this->load->view('prefeitura_form',$data);      
       }
       
       function editar_prefeitura($id){
      
           
           $this->load->model('prefeitura_model');
           $prefeitura = $this->prefeitura_model->getId($id);
           print_r($prefeitura);
           if (isset($prefeitura['nome_prefeitura']))
               $this->db->set('nome_prefeitura',$prefeitura['nome_prefeitura']);
           if (isset($prefeitura['municipio']))
               $this->db->set('municipio',$prefeitura['municipio']);
            if (isset($prefeitura['endereco']))
                   $this->db->set('endereco',$prefeitura['endereco']);
            if (isset($prefeitura['cnpj']))
                   $this->db->set('cnpj',$prefeitura['cnpj']);
            if (isset($prefeitura['telefone']))
                   $this->db->set('telefone',$prefeitura['telefone']);
            if (isset($prefeitura['num_habitantes']))
                   $this->db->set('num_habitantes',$prefeitura['num_habitantes']);
            if (isset($prefeitura['fax']))
                   $this->db->set('fax',$prefeitura['fax']);
            if (isset($prefeitura['uf']))
                   $this->db->set('uf',$prefeitura['uf']);
            if (isset($prefeitura['email_prefeitura']))
                   $this->db->set('email_prefeitura',$prefeitura['email_prefeitura']);
            if (isset($prefeitura['login']))
                   $this->db->set('login',$prefeitura['login']);
            if (isset($prefeitura['senha']))
                   $this->db->set('senha',$prefeitura['senha']);
            if (isset($prefeitura['ativada']))
                   $this->db->set('ativada',$prefeitura['ativada']);
           $this->load->view('editar_view',$prefeitura);
           $this->prefeitura_model->editPrefeitura($prefeitura); 
           
       }
    
}


<?php

class Prefeitura extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
    
    function _chamaTemplate($output = null)
    {
        $this->load->view('prefeituraTemplateView.php',$output);    
    }

    function index()
    {
        if ($this->session->userdata('logado') == true  )
        {
            $this->load->model('prefeituraModel');
            $output = $this->prefeituraModel->listarDicas();
            $this->_chamaTemplate($output);
        }
        else
        {
            redirect('login');
        }
    }
}

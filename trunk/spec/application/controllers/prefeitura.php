<?php

class Prefeitura extends CI_Controller {

    function index()
    {
        $this->load->view('_inc/header_open');
        $this->load->view('_inc/header');
        $this->load->view('_inc/header_close');
        $this->load->view('prefeitura/top');
        $this->load->view('_inc/footer');
    }
    
    function noticia()
    {
        $this->load->view('_inc/header_open');
        $this->load->view('_inc/header');
        $this->load->view('_inc/header_close');
        $this->load->view('prefeitura/top');
        $this->load->view('_inc/footer');
    }
}

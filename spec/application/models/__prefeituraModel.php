<?php

class PrefeituraModel extends CI_Model {
    
    function listarDicas()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('dica');
        $crud->set_subject('Dicas');
        $crud->columns('titulo_dica','texto_dica');

        $crud->unset_add();
        $crud->unset_delete();
        $crud->unset_edit();

        $output = $crud->render();
        return ($output);
    }
}
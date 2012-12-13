<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
	}
	
	function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	/*
	* CUSTOM DEPENDENT DROPDOWN
	*/
	function crudNoticia() {
			//GROCERY CRUD SETUP
			$crud = new grocery_CRUD();
                        
			$crud->set_table('noticia');
			$crud->set_relation('id_uf','uf','nome');
			$crud->set_relation_n_n('id_municipio','municipio','nome');
			$crud->required_fields('id_uf','id_municipio');		
			
			//IF YOU HAVE A LARGE AMOUNT OF DATA, ENABLE THE CALLBACKS BELOW - FOR EXAMPLE ONE USER HAD 36000 municipios AND SLOWERD UP THE LOADING PROCESS. THESE CALLBACKS WILL LOAD EMPTY SELECT FIELDS THEN POPULATE THEM AFTERWARDS
			$crud->callback_add_field('id_municipio', array($this, 'empty_municipio_dropdown_select'));
			$crud->callback_edit_field('id_municipio', array($this, 'empty_municipio_dropdown_select'));
						
			$output = $crud->render();
			
			//DEPENDENT DROPDOWN SETUP
			$dd_data = array(
				//GET THE STATE OF THE CURRENT PAGE - E.G LIST | ADD
				'dd_state' =>  $crud->getState(),
				//SETUP YOUR DROPDOWNS
				//Parent field item always listed first in array, in this case id_uf
				//Child field items need to follow in order, e.g stateID then id_municipio
				'dd_dropdowns' => array('id_uf','id_municipio'),
				//SETUP URL POST FOR EACH CHILD
				//List in order as per above
				'dd_url' => array('', site_url().'/noticia/get_municipios/'),
				//LOADER THAT GETS DISPLAYED NEXT TO THE PARENT DROPDOWN WHILE THE CHILD LOADS
				'dd_ajax_loader' => base_url().'ajax-loader.gif'
			);
			$output->dropdown_setup = $dd_data;
			
                        $this->load->view('adminTemplateView.php', $output);	
			
	}	
	
	//CALLBACK FUNCTIONS
	
	function empty_municipio_dropdown_select() {
		//CREATE THE EMPTY SELECT STRING
		$empty_select = '<select name="id_municipio" class="chosen-select" data-placeholder="Select Municipio" style="width: 300px; display: none;">';
		$empty_select_closed = '</select>';
		//GET THE ID OF THE LISTING USING URI
		$listingID = $this->uri->segment(4);
		
		//LOAD GCRUD AND GET THE STATE
		$crud = new grocery_CRUD();
		$state = $crud->getState();
		
		//CHECK FOR A URI VALUE AND MAKE SURE ITS ON THE EDIT STATE
		if(isset($listingID) && $state == "edit") {
			//GET THE STORED STATE ID
			$this->db->select('id_uf, id_municipio')
					 ->from('noticia')
					 ->where('noticia_id', $listingID);
			$db = $this->db->get();
                        $row = $db->row(0);
			$id_uf = $row->id_uf;
			$municipioID = $row->id_municipio;
			//GET THE UF PER COUNTRY ID
			$this->db->select('*')
					 ->from('municipio')
					 ->where('id_uf', $id_uf);
			$db = $this->db->get();
                        
			//APPEND THE OPTION FIELDS WITH VALUES FROM THE STATES PER THE COUNTRY ID
			foreach($db->result() as $row):
				if($row->id_municipio == $municipioID) {
					$empty_select .= '<option value="'.$row->id_municipio.'" selected="selected">'.$row->nome.'</option>';
				} else {
					$empty_select .= '<option value="'.$row->id_municipio.'">'.$row->nome.'</option>';
				}
			endforeach;
			
			//RETURN SELECTION COMBO
			return $empty_select.$empty_select_closed;
		} else {
			//RETURN SELECTION COMBO
                    return $empty_select.$empty_select_closed;	
		}
	}
	
	//GET JSON OF municipios
	function get_municipios() {
		$id_uf = $this->uri->segment(3);
		
		$this->db->select("*")
				 ->from('municipio')
				 ->where('id_uf', $id_uf);
		$db = $this->db->get();
		
		$array = array();
		foreach($db->result() as $row):
			$array[] = array("value" => $row->id_municipio, "property" => $row->nome);
		endforeach;
		
		echo json_encode($array);
		exit;
	}
}
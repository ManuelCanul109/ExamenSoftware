<?php
class Datos extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model('Dato');
	}

	//FUNCION QUE CARGA TODOS LOS ALUMNOS CUANDO ESTEMOS EN EL INDEX
	public function index(){
		$data['datos'] = $this->Dato->getDatos();

		$data['title'] = "Inicio";

		$data['main_content'] = "Inicio";

		$this->load->view('Dato/index',$data);
	}

	public function agregarDato(){
		# code...
		$this->load->library("form_validation");
		$this->load->helper("form");
		$data["titulo"] = "Agregar Alumno";

		$this->form_validation->set_rules("dato_dato1","dato_dato1","required");
		$this->form_validation->set_rules("dato_dato2","dato_dato2","required");
		$this->form_validation->set_rules("dato_dato3","dato_dato3","required");

		if($this->form_validation->run() == FALSE){
			$this->load->view("Dato/add",$data);
		}else{
			$this->Dato->insertarDato();
			redirect('Datos');
		}
	}

	public function actualizarDato($id = null){
		# code...
		$this->load->library("form_validation");
		$this->load->helper("form");

		if($id != null){
			$data['dato'] = $this->Dato->traerDato($id);
			$this->form_validation->set_rules("dato_dato1","dato_dato1","required");
			$this->form_validation->set_rules("dato_dato2","dato_dato2","required");
			$this->form_validation->set_rules("dato_dato3","dato_dato3","required");
			if($this->form_validation->run() == FALSE){
			$this->load->view("Dato/update",$data);
			}else{
				
				$this->Dato->actualizarDat($id);
				redirect('Datos');
			}
		}else{
			$this->Dato->actualizarDat($id);
			redirect("Datos");
		}

	}

	public function eliminarDato($id = null){
		
		if($id != null){
			if($this->Dato->eliminarDato($id)){
				redirect('Datos');
			}
		}else{
			//$this->Dato->actualizarDat($id);
			redirect("Datos");
		}
	}
}

?>
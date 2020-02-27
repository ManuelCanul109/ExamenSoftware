<?php 

class Dato extends CI_model{

	//FUNCION QUE TRAE TODOS LOS DATOS
	public function getDatos(){
		$query = $this->db->get('datos',10);
		return $query->result();
	}

	public function insertarDato(){
		$datos = array(
			'dato_dato1' => $this->input->post('dato_dato1'),
			'dato_dato2' => $this->input->post('dato_dato2'),
			'dato_dato3' => $this->input->post('dato_dato3')
		);

		return $this->db->insert("datos",$datos);
	}

	public function actualizarDat($id = null){
		# code...
		$datos = array(
			'dato_dato1' => $this->input->post('dato_dato1'),
			'dato_dato2' => $this->input->post('dato_dato2'),
			'dato_dato3' => $this->input->post('dato_dato3')
		);
		$this->db->where('id_dato',$this->input->post('id_dato'));
		return $this->db->update('datos',$datos);
	}


	//FUNCION QUE TRAE UN ALUMNO ESPECIFICO POR MEDIO DEL ID
	public function traerDato($id){
		$this->db->where('id_dato',$id);
		$query = $this->db->get('datos');

		return $query->row();
	}

	//FUNCION QUE ELIMINA UN ALUMNO USANDO EL ID
	public function eliminarDato($id){
		$this->db->where('id_dato',$id);
		if($this->db->delete('datos')){
			return true;
		}else{
			return false;
		}
	}

}

?>

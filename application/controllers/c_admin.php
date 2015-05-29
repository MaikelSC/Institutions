<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class c_admin extends CI_Controller {

	var $mensaje;
	
	 function __construct()
	{
		parent::__construct();
//		$this->mensaje = $mensaje;		
		
	}	
	
	public function setMensaje($mensaje){
		$this->mensaje = $mensaje;
		redirect('c_admin/MostrarError');
	}
	 
	 function index()
	{
		$this->VerificarAut();
		$this->load->view('paginas/admin/admin');			
	}
	
	
	function Autenticar(){
		$usuario = $this->input->post('usuario');
		$contra = md5($this->input->post('contra'));		
		$resultUsuario = $this->M_reutilizacion->ObtenerElementoDadoCamposValores('tb_usuario', array('usuario','contra'), array($usuario, $contra));
		if($resultUsuario!= null){
				$Usuario = new stdClass();
				$Usuario->usuario = $resultUsuario->usuario;
				$this->session->set_userdata("usuario",$resultUsuario->usuario);
		}
		else{
			$Usuario->error = true;
		    $Usuario->mensaje = "Usuario o contraseña erróneas";
			
		}		
		echo(json_encode($Usuario));
	
	}
	
	function Desautenticar(){
		$this->VerificarAut();
		$this->session->unset_userdata("usuario");
		redirect('c_inicio/Autenticar');
	}
	
	
	function Error(){
		$this->VerificarAut();
		$datos['heading'] = 'Error';
		$datos['message'] = 'El elemento requerido no existe en la base de datos';
		$this->load->view('paginas/admin/error', $datos);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
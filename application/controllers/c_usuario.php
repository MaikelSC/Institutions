<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class c_usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->VerificarAut();
	}	
	 
	 function cambiarContra($error = false){
	 	$datos['mal'] = $error;
	 	$this->load->view('paginas/admin/cambiarContra', $datos);	
	 }
	 
	 function cambiarPass()
	{
		$pass = $_POST['contra'];
		$nuevaContra = $_POST['nuevaContra'];
		$confirma = $_POST['confirma'];
		if($confirma == $nuevaContra){
			$usuario = $this->M_reutilizacion->ObtenerElementoDadoCamposValores('tb_usuario', array('usuario', 'contra'), array($this->session->userdata['usuario'], md5($pass)));
			if($usuario != null){
				$user->contra = md5($nuevaContra);
				$this->M_reutilizacion->EditarElementoDadoCampoValor($usuario->id_usuario, 'tb_usuario', 'id_usuario', $user);
				redirect('c_admin');
			}
		}
		$error = true;
		redirect('c_usuario/cambiarContra/'.$error);
		
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
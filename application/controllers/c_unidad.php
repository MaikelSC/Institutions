<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class c_unidad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->VerificarAut();
	}	 
	 
	function AdicionarUnidad(){
		 if (isset($_POST['Adicionar_Unidad'])) {
			$unidad = new stdClass();
            $unidad->nombre = $_POST['nombre'];
			$unidad->urlFoto = $_POST['urlFoto'];
			$unidad->descripcion = $_POST['cuerpo'];
			$adicionado = $this->M_reutilizacion->AdicionarElementoDadoValor('tb_unidad', $unidad);	
			redirect('c_unidad/EditarUnidad/'.$adicionado);
		}
		$this->load->view('paginas/admin/adicionarUnidad');	
	} 
	
	function _ObtenerUnidadDadoId($idUnidad){
		$unidad = $this->M_reutilizacion->ObtenerElementoDadoCamposValores('tb_unidad', 'id_unidad', $idUnidad);
		return $unidad;		
	}
	
	 function EditarUnidad($id = null){ 		
		 if (isset($_POST['Editar_Unidad'])) {
			$unidad = new stdClass();
			$unidad->nombre = $_POST['nombre'];
			$unidad->urlFoto = $_POST['urlFoto'];
			$unidad->descripcion = $_POST['cuerpo'];;		
			$adicionado = $this->M_reutilizacion->EditarElementoDadoCampoValor($id, 'tb_unidad', 'id_unidad', $unidad);	
			if(count($adicionado)>0)
				redirect('c_unidad/EditarUnidad/'.$adicionado);	
			redirect('c_admin/Error');				
		}
		$unidad = $this->_ObtenerUnidadDadoId($id);
		if(count($unidad)==0)
			redirect('c_admin/Error');		
		$datos['unidad'] = $unidad;
		$this->load->view('paginas/admin/adicionarUnidad', $datos);			
	}
	
	function ListarUnidades(){
		$this->load->view('paginas/admin/listarUnidades');
	}
	
	function DevolverListadoUnidadesAjax(){
		$cantidadXPagina = $this->input->post('cantXPag');
	    $posInicial = $this->input->post('inicio');
	    $atributo_ordenar = $this->input->post('ordX');
	    $direccion_orden = $this->input->post('dir');
		$unidades = $this->M_reutilizacion->ListarTabla('tb_unidad', $cantidadXPagina, $posInicial, $atributo_ordenar, $direccion_orden);
				
		$result->total = count($this->M_reutilizacion->ListarTabla('tb_unidad'));
		$result->datos = $unidades;
		echo(json_encode($result));
	}
	
	
	
	function DevolverBannerUnidades(){
		$idAlbum = "";
		$imagenes = $this->M_reutilizacion->ListarTabla('tb_banner');
		$result->imagenes = $imagenes;
		echo(json_encode($result));
	}
	
	function GuardarBannerUnidad(){
	    $direccion = 'application/imagenes/upload/banners';
		$name = 'oculto';
	    $retorno = $this->M_reutilizacion->GuardarFoto($direccion, $name);
		if(!isset($retorno->error)){
			$imagen->src = 'banners/'.$_FILES['oculto']['name'];
			$idImagen = $this->M_reutilizacion->AdicionarElementoDadoValor('tb_banner', $imagen); 
			$imagen = $this->M_reutilizacion->ObtenerElementoDadoCamposValores('tb_banner', 'id_banner', $idImagen);
			echo '<script> parent.$.JCP.upload.retorno('.json_encode($imagen).');</script>';
		}
		else{			
	    	echo '<script> parent.$.JCP.upload.retorno('+json_encode($retorno)+');</script>';
		}			    
	}
	
	function EliminarBannerUnidad(){
		$id = $this->input->post('id');
		$this->M_reutilizacion->EliminarElementoDadoCampoValor('tb_banner', 'id_banner', $id);
		echo(json_encode($id));
	}
	
	function EliminarUnidad(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->M_reutilizacion->EliminarElementoDadoCampoValor('tb_unidad', 'id_unidad', $id);
		}
		echo(json_encode(""));
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
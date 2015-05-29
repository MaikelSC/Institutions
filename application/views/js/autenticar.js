$(document).ready(function(){
	$('#acceder').click(function(){
		if($('#usuario').val()!="" && $('#contra').val()!="" ){
			$.consultaAjax.ejecutar({
					url: 'c_admin/Autenticar',
					data: {usuario:$('#usuario').val(), contra : $('#contra').val()},
					accionCorrecta: Autenticado,
					accionError:NoAutenticado						
			});
		}
		else{
			$('#filaMsg').text("Debe Introducir Usuario y Contrase�a");
		}	
	})
	.next()
	.click(function(){
		$('#usuario').val("");
		$('#contra').val("");
		$('#filaMsg').text("");
	})
	$('#usuario')
	.add($('#contra'))
	.click(function(){$('#filaMsg').text("")});
	
	function Autenticado(){
		document.location.href=$.urlServer+"/index.php/c_admin";
	}
	function NoAutenticado(data){
		$('#filaMsg').text(data.mensaje);
	}
});
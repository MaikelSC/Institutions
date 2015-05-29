// JavaScript Document
$(function()
{
	if($('html').find('title').text() == 'Adicionar Unidad' || $('html').find('title').text() == 'Editar Unidad'){
		var urls = $('#vistaPrevia').attr("src").split('/');
		if(urls[urls.length-2]+'/'+urls[urls.length-1] == 'imagenes/no1.jpg' ){
			$('#urlFoto').val("");
		}
		
		$('#urlBanner').click(function(){
				 var bloqueador = $('<div id="bloq" ></div>').prependTo($('html'));
				bloqueador.css({
				     position:'absolute',
				     width:'100%',
				     height:'100%',
					 backgroundColor:'black',
					 opacity:0.5,
				     zIndex:4
				    });
				var padreUpload = $('<div/>')
				.css({
					position:'absolute',
					zIndex:5,
					left:$('html').width()/2-270,
					top:$('html').height()/2-310,
				})
				.prependTo($('html'));
				
				$('html').declararEvento(Array("keypress"), Array("27"), Array(function(){bloqueador.remove();padreUpload.remove();$('html').unbind('keypress');}));
					$.JCP.Crear('upload', {
		                      padre : padreUpload,
							  id : 'Unidades',
							  id_imagen: 'id_banner',
							  css : {width:640,height:320},
							  urls:{
							  	 listar : 'c_unidad/DevolverBannerUnidades',
								 adicionar : 'c_unidad/GuardarBannerUnidad',
								 eliminar : 'c_unidad/EliminarBannerUnidad'
							  },
							  metodoBotonAccionar: function(imagenes){	
							  		imagenes.each(function(e){
										$('#bannerUrl').text($(this).attr("src").split('/')[$(this).attr("src").split('/').length-1]);
										$('#vistaPrevia')
										.css({
											width:'60%',
											marginLeft:'20%',
											height:55
										})
										.attr("src", $(this).attr("src"));
										$('#urlFoto').val($('#bannerUrl').text());
										return;
									});		  		
							  		
							  },							  
							  tieneCss: true
					});bloqueador.height($('html').height());
									   });
		
			$('#textAUnid').cleditor({
		    width:'99.5%',
			height:'300',
			urlsUpload:{
			  	 listar : 'c_noticia/DevolverImagenesNoticias',
				 adicionar : 'c_noticia/GuardarImagenNoticia',
				 eliminar : 'c_noticia/EliminarImagenNoticia'
			},
		});
	}
	else{
			$.JCP.Crear('listado',{
								 padre : $('#contListadoUnidades'),
								 tituloTabla : 'Listado de Unidades',
								 idTabla : 'listado_unidades',
								 add : false,
								 btnAdicionar:false,
								 btnAdicional :[{
								 	value  : 'Editar',
									href : 'c_unidad/EditarUnidad'
								 }],
								 urls:{
								 	listar:'c_unidad/DevolverListadoUnidadesAjax',
									eliminar:'c_unidad/EliminarUnidad'
								 },
								 redimencionar: false,
								 estructura: {
									columnas : {
										names:  Array('Nombre'),
									}								 	
								 },
								 cantXPag: {
								 	valores: Array("10","3","30","40")
								 },
								 consultaListar:{
								 		datosEnvio: {
										    cantXPag: 10,
										    inicio : 1,
											ordX : 'nombre',
											dir: 'asc'
										},
										datosRetorno: {
										campos : Array('id_unidad', 'nombre')
										}
								 },						 
								 vacio: {
								 	mensajeVacio: 'No hay unidades que listar'
								 },		 								
					});
	}	
});
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Listar Mensajes</title>
<!-- InstanceEndEditable -->
<script type='text/javascript' src='<?=base_url()?>application/libraries/jQuery/jquery-1.5.1.js'></script>
<script type='text/javascript' src='<?=base_url()?>application/libraries/propias/JCP.js'></script>

<script type='text/javascript' src='<?=base_url()?>application/libraries/jQuery/easyslider/js/easySlider.js'></script>

<script type='text/javascript' src='<?=base_url()?>application/libraries/jQuery/menuAdmin.js'></script>

<script type='text/javascript' src='<?=base_url()?>application/libraries/jQuery/jquery.hoverIntent.minified.js'></script>


<link href="<?=base_url()?>application/libraries/jQuery/easyslider/css/screen.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>application/views/templates/plantilla.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>application/views/templates/menu.css" rel="stylesheet" type="text/css" />


<link href="<?=base_url()?>application/views/templates/skins/white.css" rel="stylesheet" type="text/css" />

<!-- InstanceBeginEditable name="head" -->

<script type='text/javascript' src='<?=base_url()?>application/libraries/propias/elementos.js'></script>
<script type='text/javascript' src='<?=base_url()?>application/views/js/admin.js'></script>
<script type='text/javascript' src='<?=base_url()?>application/views/js/mensaje.js'></script>

<!-- InstanceEndEditable -->


</head>

<body>
<div ></div>
<table  border="0" id="cuerpo" >	
  <tr>
    <td><div><img src="<?=base_url()?>application/views/templates/imagenes/euroEstudios.png" name="EuroBanner" id="EuroBanner"/></div></td>
	<td id="contBanner2">
		<div id="redes">
		</div>
		<div id="rectangulo"></div>
		<div id="telefonos"><div id="labelTel"><span id="encTel">Tel.:</span> <span id="numTel">(02)254545454 / 54521452154</span></div></div>
		
	</td>
  </tr>
  <tr>
    <td colspan="2" id="padreMenu"><nav id="menu">
    <ul class="menu">
        <li><a href="<?=base_url()?>index.php/c_inicio" class="parent"><span>Inicio</span></a></li>
        <li><a href="<?=base_url()?>index.php/c_inicio/QuienesSomos" class="parent"><span>Quienes Somos</span></a></li>
        <li><a href="<?=base_url()?>index.php/c_inicio/MostrarUnidad"><span>Unidades</span></a></li>
        <li ><a href="<?=base_url()?>index.php/c_inicio/Experiencias"><span>Experiencias</span></a></li>
		<li><a href="<?=base_url()?>index.php/c_inicio/MostrarNoticia" class="parent"><span>Noticias</span></a></li>
		<li><a href="<?=base_url()?>index.php/c_inicio/Contactos" class="parent"><span>Contactos</span></a></li>
    </ul>
</nav></td>
  </tr>
  <tr><td colspan="2"> <div id="tbodyAdmin">
  		<table width="100%">  
		  <tr ><td colspan="2"><div class="tituloFormAdmin"><span>Formulario Administrador</span></div></td>
		  </tr>
		  <tr >
			<td colspan="2" >
			<div class="demo-container">
			<div id="menuAdmin" class="white">	
				<ul id="mega-menu-5" class="mega-menu">
			<li><a>Noticias</a>
				<ul>
					<li>
						<ul>
							<li><a href="<?=base_url()?>index.php/c_noticia/AdicionarNoticia">Adicionar Noticia</a></li>
							<li><a href="<?=base_url()?>index.php/c_noticia/ListarNoticias">Listar Noticias</a></li>
						</ul>
					</li>			
					
				</ul>
			</li>
			<li><a >Unidades</a>
				<ul>
					<li>
						<ul>
							<li><a href="<?=base_url()?>index.php/c_unidad/AdicionarUnidad ">Adicionar Unidad</a></li>
							<li><a href="<?=base_url()?>index.php/c_unidad/ListarUnidades">Listar Unidades</a></li>
						</ul>
					</li>			
					
				</ul>
			</li>			
			<li><a >Experiencias</a>
				<ul>
					<li>
						<ul>
							<li><a href="<?=base_url()?>index.php/c_experiencia/AdicionarExperiencia ">Adicionar Experiencias</a></li>
							<li><a href="<?=base_url()?>index.php/c_experiencia/ListarExperiencias">Listar Experiencias</a></li>
						</ul>
					</li>			
					
				</ul>
			</li>
			<li><a >Generales</a>
				<ul>
					<li>
						<ul>
							<li><a href="<?=base_url()?>index.php/c_general/AdicionarGeneral ">Adicionar Generales</a></li>
							<li><a href="<?=base_url()?>index.php/c_general/ListarGenerales">Listar Generales</a></li>
						</ul>
					</li>			
					
				</ul>
			</li>
			<li><a >Mensajes</a>
				<ul>
					<li>
						<ul>
							<li><a href="<?=base_url()?>index.php/c_mensaje/ListarMensajes ">Listar Mensajes</a></li>
						</ul>
					</li>			
					
				</ul>
			</li>
			<li><a href="<?=base_url()?>index.php/c_usuario/cambiarContra">Cambiar Contrase&ntilde;a</a>
			</li>
			<a href="<?=base_url()?>index.php/c_admin/Desautenticar" id="sessionUser">Cerrar Sesi&oacute;n</a>
		</ul>
		</div></div></td>
		  </tr>
		  <tr>
			 <td colspan="2" id="cuerpoInt"><!-- InstanceBeginEditable name="EditCuerpo" -->
			 
			 <div id="contListadoMensajes"></div>
			 <div id="textoMensaje" class="fm-form fm-borde fm-borde-redondeado" >
			 	<div class="fm-titulo"></div>
				<div id="intTexMen"><textarea readonly="readonly"></textarea></div>
			 </div>
			 <!-- InstanceEndEditable --></td>
		  </tr>
  </table>
  </div>
  </td>
  <tr >
    <td  colspan="2"  >
	<footer>
	<div  ><span>Centro de Informaci&oacute;n municipal de salud de Yaguajay-Copyright 2014 - Todos los derechos reservados</span></div><div style="float:right" ></div></footer></td>
	
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>

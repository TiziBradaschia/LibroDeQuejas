 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Alta Usuario</title>
   <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
   <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>	<br>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
	<body>  
	 <section class="login"><center>
<?php
if(!isset($_SESSION['Nombre']))
   {
	echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
	die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
	}
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Alta de Usuario <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br><br><center>
<Form action="AltaNuevoUsuario.php" Method="Post">
	<div class="input-group mb-1">
        <span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon></span>
		<input class="form-control" type="text" name="Dni" value="" placeholder="Ingrese el Dni"required="requerido"></div>
	<div class="input-group mb-1">
		<span class="input-group-text"><input class="form-check-input"  type="radio" name="radio1" value="1" checked>Cliente</span>
		<span class="input-group-text"><input class="form-check-input" type="radio" name="radio1" value="2"> Empleado</span>  
		<font color="#FAE5D3" size="4px">Seleccione una categor&iacutea </font>
	</div>	
<br><br>
<table><tr>
		<td><button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Aceptar </button>
		</form></td>
		<td><Form Action="MisGestiones.php" Method="Post">
		<button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar </button></form></td>
		</tr>
</table>
</body></section></main></html>
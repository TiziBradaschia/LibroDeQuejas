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
require("includes/ConexionLDQ.php");
require("includes/baseDeDatos.php");
$idCone=conectar();
$U=$_REQUEST['Cx'];
$Nom=$_REQUEST['Nombre'];
$Dni=$_REQUEST['Ct'];
$Mail=$_REQUEST['Mail'];
$texto="";
$b=$_REQUEST['Bandera'];
if($b==1){
header("Location:AltaUsuario.php");
exit();
}
if($U=='1')
	{ 		 
		$Tel=$_REQUEST['Telefono'];
		 $Dir=$_REQUEST['Direccion'];
		 $Prov=$_REQUEST['Provincia'];
		 $Ciu=$_REQUEST['Ciudad'];
		 $Barr=$_REQUEST['Barrio'];
		 $Cat=$_REQUEST['Categoria'];
		InsertCliente($Dni,$Nom,$Mail,$Tel,$Dir,$Barr,$Cat);
		echo"<h1>El Cliente se guardo correctamente</h1>";
	}else
		{		
		 $Area=$_REQUEST['Area'];
		 $Jer=$_REQUEST['Jerarquia'];
		InsertPersonalReclamo($Dni,$Nom,$Mail,$Area,$Jer);
		echo"<h1>El Empleado se guardo correctamente</h1>";
		}
mysqli_close(conectar());
?>
<br><br>
<center>
<table>
	<tr><td>
	    <Form Action="AltaUsuario.php" Method="Post">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="user-plus" size="lg" color="#FAE5D3" animation="tada"></box-icon>Cargar Otro </button></form></td>
	  <td><Form Action="MisGestiones.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Al Men&uacute </button></form></td>
	</tr>
</table>
</body></section></main></html>
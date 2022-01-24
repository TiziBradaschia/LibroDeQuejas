<?php
session_start();
?>
<html lang="es">
 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<link href="css/EstiloIndex.css" rel="stylesheet"  type="text/css"  />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="icon"   href="imagenes/Libro.jpeg" type="image/png" />
		<title>B&uacutesqueda de usuarios </title>
		<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head><br>
  <main class="container alto-100 d-flex justify-content-center align-items-center vh-50 rounded" >
 <body>   
  <section class="inicio"><center>
<?php 
	if(!isset($_SESSION['Nombre']))
		{
		 echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		 die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexclUsted debe logearse para entrar al sitio !");
	    }
	require("includes/ConexionLDQ.php");
    require("includes/baseDeDatos.php");
	$Dni=$_SESSION['Dni'];
	$Tipo=$_SESSION['Tipo'];
?>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> B&uacutesqueda de <?php if($Tipo=='A') echo 'usuario'; else echo'cliente';?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1><br><br>
	
		<form name="contact" method="post" action="ConsultaUsuarioBase.php">
		<div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon> Nombre y Apellido: </span>
		    <input class="form-control" type="text" name="Nombre" value=""></div>
		<div class="input-group mb-1">
             <span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon> Dni: </span>
		     <input class="form-control" type="text" name="Dni" value=""></div>
			 
		<div class="input-group mb-1">
           <span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon> E-mail :</span>
		   <input class="form-control" type="mail" name="Mail" value=""></div>	
<table><tr>
	  <td>
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search-alt" type="solid" size="lg" color="#FAE5D3" animation="tada"></box-icon>  Buscar</button>
	   </form></td>
	  <td>
	   <Form Action="SoyUsuario.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar</button>
	   </form></td>
	</tr></table>
</section></body></html></main>
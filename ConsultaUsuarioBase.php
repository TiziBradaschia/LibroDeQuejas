 <?Php
session_start();
?>
<html lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
   <title>Consultas Seguimientos</title>
   <link href="css/EstiloLogin.css" rel="stylesheet"  type="text/css"  />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link  rel="icon"   href="imagenes/libro.jpeg" type="image/png" />
   <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
 </head>	<br><br><br>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
<body>  
  <section class="login"><center>
	<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border 	border-secondary border-1 rounded-circle">Resultados de la b&uacutesqueda <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"></h1>
	
<?php
	if(!isset($_SESSION['Nombre'])){
		echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
		die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
		}
	require("includes/ConexionLDQ.php");
	require("includes/baseDeDatos.php");
	$Nombre=$_REQUEST['Nombre'];
	$Dni=$_REQUEST['Dni'];
	$Tipo=$_SESSION['Tipo'];
	$Mail=$_REQUEST['Mail'];
	if ($Nombre=="" && $Dni=="" && $Mail=="")
	{
		echo "<h1>No ha ingresado ning&uacuten criterio de b&uacutesqueda</h1>";
	}
	else{ 
		if($Nombre!=""&& $Dni!="" && $Mail!=""){
			$SqlCliente=ConsultaVistaClienteNDM($Nombre,$Dni,$Mail);
				if($Tipo=='A') 
					$SqlEmpleado=ConsultaVistaEmpleadoNDM($Nombre,$Dni,$Mail);
		}elseif($Nombre!=""&& $Dni=="" && $Mail==""){
			$SqlCliente=ConsultaVistaClienteN($Nombre);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoN($Nombre);
		}elseif ($Nombre!=""&& $Dni!="" && $Mail==""){
		   $SqlCliente=ConsultaVistaClienteND($Nombre,$Dni);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoND($Nombre,$Dni);
		}elseif  ($Nombre!=""&& $Dni=="" && $Mail!=""){
			$SqlCliente=ConsultaVistaClienteNM($Nombre,$Mail);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoNM($Nombre,$Mail);
		}elseif  ($Nombre==""&& $Dni=="" && $Mail!=""){
	        $SqlCliente=ConsultaVistaClienteM($Mail);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoM($Mail);
		}elseif  ($Nombre==""&& $Dni!="" && $Mail!=""){
	        $SqlCliente=ConsultaVistaClienteDM($Dni,$Mail);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoDM($Dni,$Mail);
		}else {
		    $SqlCliente=ConsultaVistaClienteD($Dni);
				if($Tipo=='A')
					$SqlEmpleado=ConsultaVistaEmpleadoD($Dni);
		}
		if (mysqli_num_rows($SqlCliente)==0){
				echo "<h2>No existen Clientes que coincidan con la b&uacutesqueda</h2>";
			} 
			else{
?>               <br><h2>CLIENTES</h2>
                <div class="table-responsive-sm">
                <table class="table  table-striped table-hover">
				<thead>
				
				<tr>
				<th scope="col"><center><font color="white" >Dni
				<th scope="col"><center><font color="white">Nombre 
				<th scope="col"><center><font color="white">Mail
				<th scope="col"><center><font color="white">Tel&eacutefono
				<th scope="col"><center><font color="white">Direcci&oacuten
				<th scope="col"><center><font color="white">Barrio
				<th scope="col"><center><font color="white">Ciudad
				<th scope="col"><center><font color="white">Categor&iacutea
				
				</tr>
				</thead>
				<tbody> 
<?php 
				while($Fila=mysqli_fetch_array($SqlCliente))
		  			{
						$Dni=$Fila['Dni_Cliente'];
						$Nombre=$Fila['Nombre_Cliente'];
						$Mail=$Fila['Mail_Cliente'];
						$Telefono=$Fila['Tel_Cliente'];	
						$Direccion=$Fila['Dir_Cliente'];
						$Barrio=$Fila['Nombre_Barrio'];
						$Ciudad=$Fila['Nombre_Ciudad'];
						//$Provincia=$Fila['Nombre_Provincia'];
						$Categoria=$Fila['Nombre_Categoria'];
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$Dni;
						echo"<td class='table-danger' align='center'>".$Nombre;
						echo"<td class='table-danger' align='center'>".$Mail;
						echo"<td class='table-danger' align='center'>".$Telefono;
						echo"<td class='table-danger' align='center'>".$Direccion;
						echo"<td class='table-danger' align='center'>".$Barrio;
						echo"<td class='table-danger' align='center'>".$Ciudad;
                        //echo"<td class='table-danger' align='center'>".$Provincia;
						echo"<td class='table-danger' align='center'>".$Categoria;
					}		
						echo"</tr></tbody></div>";		
			}
		if($Tipo=='A')	
		{
		 if (mysqli_num_rows($SqlEmpleado)==0){
				echo "<h2>No existen Empleados que coincidan con la b&uacutesqueda</h2>";
			} 
			else{
?>               
                <div class="table-responsive-sm">
                <table class="table  table-striped table-hover">
				<thead>
				<br><br><h2>EMPLEADOS</h2>
				<tr >
				<th scope="col"><center><font color="white" >Dni
				<th scope="col"><center><font color="white">Nombre y Apellido
				<th scope="col"><center><font color="white">Mail
				<th scope="col"><center><font color="white">&Aacuterea
				<th scope="col"><center><font color="white">Jerarqu&iacutea
				</tr>
				</thead>
				<tbody> 
<?php 
				while($Fila=mysqli_fetch_array($SqlEmpleado))
		  			{
						$Dni=$Fila['Dni_Personal'];
						$Nombre=$Fila['Nombre_Personal'];
						$Mail=$Fila['Mail_Personal'];
						$Area=$Fila['Nombre_Area'];	
						$Jerarquia=$Fila['Jerarquia'];
						echo"<tr>";
						echo"<td class='table-danger' align='center'>".$Dni;
						echo"<td class='table-danger' align='center'>".$Nombre;
						echo"<td class='table-danger' align='center'>".$Mail;
						echo"<td class='table-danger' align='center'>".$Area;
						echo"<td class='table-danger' align='center'>".$Jerarquia;
						
					}		
						echo"</tr></tbody></div><br>";		
				}	
		}
	}
mysqli_close(conectar());
?>

<table><br><br>
	<tr><td><form name="submit" method="post" action="ConsultaUsuarios.php">
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="search" size="lg" color="#FAE5D3" animation="tada"></box-icon>Otra b&uacutesqueda </button></form></td>
	  <td><Form Action="ConsultasGenerales.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="home" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar al men&uacute </button></form></td>
		 
	   <td><button type="submit" class="botoncito1" onClick="window.print()"> <box-icon class=" border border-secondary border-3 rounded-circle" name="printer" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Imprimir </button>
	</tr>
</table>
</section></body></main></html>
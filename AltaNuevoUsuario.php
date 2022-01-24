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
 </head>
<main class="container alto-100  d-flex justify-content-center align-items-center vh-50 " >	
	<body>  
	 <section class="login"><center>
<?php
if(!isset($_SESSION['Nombre']))
   {
	echo '<br><center><a Href="IngresoUsuario.html"> Retornar al Ingreso </a>';
	die ("<Br><Br><Center><Font Color='#EF280F'><H1>&iexcl Usted debe logearse para entrar al sitio !");
	}
$Dni=$_REQUEST["Dni"];
$U=$_REQUEST['radio1'];

require("includes/ConexionLDQ.php");
require("includes/baseDeDatos.php");
$idCone=conectar();
$b=1;
?>
<h1 class="text-center fs-1 fw-bolder"><img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle">Alta de <?php if($U==1)echo"Cliente";else echo"Empleado";?> <img src="imagenes/L D Q.png" width="125px" height="125px"class="border border-secondary border-1 rounded-circle"> </h1> <br><center>

<form name="Actualizar" method="post" action="AltaUsuarioBase.php?Cx=<?php echo"$U"?>&Ct=<?php echo"$Dni"?>">
<?php
if($U==1)
	{
	 $Cliente=selectCliente($Dni);
		if(	mysqli_num_rows($Cliente)==0)
		{ 
?>
			<div class="input-group mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon> Nombre y Apellido: </span>
				<input class="form-control" type="text" name="Nombre" value="" required="requerido"></div>
			<div class="input-group mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon> Dni: </span>
				<input class="form-control" type="text" name="Dni" value=<?php echo"$Dni"?> required="requerido" disabled></div>
			<div class="input-group mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon> E-mail :</span>
				<input class="form-control" type="mail" name="Mail" value="" required="requerido"></div>
			<div class="input-group input-group-sm mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="phone" type="solid" size="md" color="#FAE5D3"></box-icon> Tel&eacutefono: </span>
				<input class="form-control" type="text" name="Telefono" value="" required="requerido"></div>
			<div class="input-group input-group-sm mb-1" >
				<span class="input-group-text"><box-icon class="rounded-circle" name="home-heart" type="solid" size="md" color="#FAE5D3"></box-icon> Direcci&oacuten: </span>
				<input class="form-control" type="text" name="Direccion" value="" required="requerido"></div>
			<div class="input-group mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Provincia: </span>
				<Select name='Provincia'>
<?php
				$Cprov=consultaProvincia();
				while($Fila=mysqli_fetch_array($Cprov))
					{
					 $CP=$Fila['Cod_Provincia'];
					 $NP=$Fila['Nombre_Provincia'];
					 $EP=$Fila['Estado'];
					 if($EP==0)
						echo "<option value='$CP'>$NP</option>";
					 else
						echo "<option value='$CP' disabled='disabled'>$NP</option>";
					}
?>
			    </Select>
				<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Ciudad: </span>
				<Select name='Ciudad'>
<?php
				$Cciu=consultaCiudad();
				while($Fila=mysqli_fetch_array($Cciu))
					{
					 $Cc=$Fila['Cod_Ciudad'];
					 $Nc=$Fila['Nombre_Ciudad'];
					 $Ec=$Fila['Estado'];
					 if($Ec==0)
						echo "<option value='$Cc'>$Nc</option>";
					 else
						echo "<option value='$Cc' disabled='disabled'>$Nc</option>";
					}
?>
			    </Select>
				<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Barrio: </span>
				<Select name='Barrio'>
<?php
				$Cba=consultaBarrio();
				while($Fila=mysqli_fetch_array($Cba))
					{
					 $Cb=$Fila['Cod_Barrio'];
					 $Nb=$Fila['Nombre_Barrio'];
					 $Eb=$Fila['Estado'];
					 if($Eb==0)
						echo "<option value='$Cb'>$Nb</option>";
					 else
						echo "<option value='$Cb' disabled='disabled'>$Nb</option>";
					}
?>	
			    </Select></div>
			<div class="input-group input-group-sm mb-1">
				<span class="input-group-text"><box-icon class="rounded-circle" name="medal" type="solid" size="md" color="#FAE5D3"></box-icon> Categoria :</span>
				<Select name='Categoria'>
<?php
				$Ccat=consultaCategoria();
				while($Fila=mysqli_fetch_array($Ccat))
					{
					 $Cc=$Fila['Cod_Categoria'];
					 $Nc=$Fila['Nombre_Categoria'];
					 $Ec=$Fila['Estado'];
					 if($Ec==0)
						echo "<option value='$Cc'>$Nc</option>";
					 else
						echo "<option value='$Cc' disabled='disabled'>$Nc</option>";
					}
				 echo"</Select></div>";	
				 $b=0;
		}else
			{
				echo"<h1><font color='#FAE5D3'>Ya existe un cliente con ese Dni</h1>";
				
			}
	}else
		{
		 $Empleado=selectEmpleado($Dni);
		 if(	mysqli_num_rows($Empleado)==0)
		 {
?>
         <div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="user-circle" type="solid" size="md" color="#FAE5D3"></box-icon> Nombre y Apellido: </span>
		    <input class="form-control" type="text" name="Nombre" value="" required="requerido"></div>
		<div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="id-card" type="solid" size="md" color="#FAE5D3"></box-icon> Dni: </span>
		    <input class="form-control" type="text" name="Dni" value=<?php echo"$Dni"?> required="requerido" disabled></div>
		<div class="input-group mb-1">
            <span class="input-group-text"><box-icon class="rounded-circle" name="mail-send" type="solid" size="md" color="#FAE5D3"></box-icon> E-mail :</span>
		    <input class="form-control" type="mail" name="Mail" value="" required="requerido"></div>	
		<div class="input-group mb-1">
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon>  Area de trabajo: </span>
			<Select name='Area'>
<?php
			$CArea=consultaArea();			
			while($Fila=mysqli_fetch_array($CArea))
				{
				 $CA=$Fila['Cod_Area'];
			     $NA=$Fila['Nombre_Area'];
				 $EA=$Fila['Estado'];
				 if($EA==0)
			   		 echo "<option value='$CA'>$NA</option>";
						else
					echo "<option value='$CA' disabled='disabled'>$NA</option>";
				}
?>
			</select>
			<span class="input-group-text"><box-icon class="rounded-circle" name="sitemap" type="solid" size="md" color="#FAE5D3"></box-icon> Jerarqu&iacutea: </span><Select name='Jerarquia'>
<?php
			$CJer=consultaJerarquia();			
			while($Fila=mysqli_fetch_array($CJer))
			    {
			      $CJ=$Fila['Cod_Jerarquia'];
			      $NJ=$Fila['Nombre_Jerarquia'];
				  $EJ=$Fila['Estado'];
			      if($EJ==0)
			   		 echo "<option value='$CJ'>$NJ</option>";
					else
					echo "<option value='$CJ' disabled='disabled'>$NJ</option>";
			    }
            echo"</select></div>";	
            $b=0;			
         }else
			{
				echo"<h1><font color='#FAE5D3'>Ya existe un Empleado con ese Dni</h1>";	
				
			}	
		}
		echo'<input type="Hidden"name="Bandera" value='.$b.'>';
mysqli_close(conectar()); 
?>
<br><br>
<table>
	<tr><td>
	    <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="check-double" size="lg" color="#FAE5D3" animation="tada"></box-icon>Aceptar </button></form></td> 
	  <td><Form Action="AltaUsuario.php" Method="Post">
	     <button type="submit" class="botoncito1"><box-icon class="border border-secondary border-3 rounded-circle" name="arrow-back" type="solid" size="lg" color="#FAE5D3" animation="tada-hover"></box-icon> Retornar </button></form></td>
</tr>
</table>
</body></section></main></html>
<!DOCTYPE html>
<html lang='es'>
<head>
	<?php
	session_start();
	require_once("../../login/valid.php");
	require_once("../../login/validpriv.php");
	require_once("../lib/edit_lib.php");
	validUser();
	$idusr=$_SESSION['usuario']->idclientes; //este es el valor del id del usuario en esta sesion
	$usrModif = selectClienteConID($idusr);
	$usuario = $_SESSION['usuario'];
	/*echo"<pre>";
	print_r($usrModif);
	echo"</pre>";*/
	?>
	<meta charset='utf-8'/>
	<meta name='description' content=''/>
	<meta http-equiv='X-UA-Compatible' content='IE=edge, chrome=1'/>
	<link rel='stylesheet' type='text/css' href = "../../lib/styleAdmin.css">
		<link href='http://fonts.googleapis.com/css?family=Mouse+Memoirs' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="lib/jquery.js"></script>
		<script type="text/javascript" src="lib/lib.js"></script>
		<title>MixaHarris User</title>
<title>MixaHarris - Formulario Clientes</title>
<body>

<div id='navegador'>
			<div id='homeLogo' onclick="location.href='../../main/store/home.php'">MixaHarris User</div>
				<div id='navAdmin'>	
					Hola, <?php echo $usuario->clientesNombre;?> 
					<form action='../../login/logout.php' id='blogout'>
						<input id='button' type='submit' value='Logout'>	
					</form> 
					<a class="Bca" href="../pagindex/userindex.php" title="Configurar datos personales">conf</a> 
				 </div>
		</div><!--navegador-->




<center><div id='menuModClientes'>
	<center><h2>MixaHarris</h2></center>
						</br></br>
							<p class='hdm'>Editar datos</p>



	<table  id="tablaModCliente">
		<form name='editClientes' action="../action/save_clientesEdit.php" method='post' accept-charset='utf-8'>
			<tr><td>Nombre(s):</td><td>
				<input type='text' name='nombre' value=<?php echo "'".$usrModif->clientesNombre."'"; ?>/></td></tr>
			<tr><td>Apellido(s):</td><td>
				<input type='text' name='apellidos' value=<?php echo "'".$usrModif->clientesApellido."'"; ?>/></td></tr>
			<tr><td>Nombre de Usuario:</td><td>
				<input type='text' name='username' value=<?php echo "'".$usrModif->clientesUsername."'"; ?>/></td></tr>
			<tr><td>Direcci&oacute;n:</td><td>
				<input type='text' name='direccion' value=<?php echo "'".$usrModif->clientesDireccion."'";?>/></td></tr>
			<tr><td>C&oacute;digo Postal:</td><td>
				<input type='number' name='CP' value=<?php echo "'".$usrModif->clientesCP."'"; ?>/></td></tr>
			<tr><td>Email:</td><td>
				<input type='email' name='email' value=<?php echo "'".$usrModif->clientesEmail."'"; ?>/></td></tr>
			<tr><td>Tel&eacute;fono:</td><td>
				<input type='number' name='tel' value=<?php echo "'".$usrModif->clientesTelefono."'"; ?>/></td></tr>
			<tr><td>M&oacute;vil:</td><td>
				<input type='number' name='cel' value=<?php echo "'".$usrModif->clientesCelular."'"; ?>/></td></tr>
			<tr><td>Ocupaci&oacute;n:</td><td>
				<input type='text' name='ocupacion' value=<?php echo "'".$usrModif->clientesOcupacion."'";?>/></td></tr>
			<tr><td>Fecha de Nacimiento:</td>
				<td>
				<?php
				/*Script PHP el cual nos ayuda a llenar mas rapidamente los dropdown-list*/
				$nac = array();
				$nac =explode("-", $usrModif->clientesNacimiento);
				echo"<select name='dia'>\n";
				echo"<option value='-1'>D&iacute;a:</option>\n";
					
				$meses= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				for ($i=1; $i <= 31; $i++) { 
				if($i == $nac[2])//condicion para la opcion selecionada
					echo"<option value='".$i."' selected>".$i."</option>\n";
				else
					echo"<option value='".$i."'>".$i."</option>\n";		
				}
				echo"</select>\n";
				echo"<select name='mes'>\n";
				echo"<option value='-1'>Mes:</option>\n";
				$i=1;
				foreach ($meses as $key => $mes) {
					if($i == $nac[1])
					{echo"<option value='".$i."' selected>".$mes."</option>\n"; $i++;}	
					else{echo"<option value='".$i."'>".$mes."</option>\n"; $i++;}
				}
				echo"</select>\n";
				echo"<select name='anio'>\n";
				echo"<option value='-1'>A&ntilde;o:</option>\n";
				for ($i=date("Y"); $i>=1900; $i--) {
					if($i == $nac[0]){
						echo"<option value='".$i."' selected>".$i."</option>\n";}
					else{
						echo"<option value='".$i."'>".$i."</option>\n";}
				}
				echo"</select>\n";
				?>	
				</td>
			</tr>
			<tr><td>Sexo:</td>
				<?php
				$sexo = $usrModif->clientesSexo;
				if($sexo == 'F'){
				echo "<td>"."<input type='radio' name='sexo' value='F' checked/>Mujer\n";
				echo "<input type='radio' name='sexo' value='M' />Hombre</td>\n";
				}else{
				echo "<td>"."<input type='radio' name='sexo' value='F'/>Mujer\n";
				echo "<input type='radio' name='sexo' value='M' checked/>Hombre</td>\n";
				}
				/* **NOTA** la vida de un Script de php  vive por archivo por eso puedes abrir y cerrar en
				 *			varias ocaciones de tal forma que vuelve mas entendible el código
				 */
				?>
			</tr>
			<tr><td colspan='2'><center><input id='button' type='submit'value='Aceptar'/</center></td></tr>
		</form>
	</table>
		</div></center>
</body>
</hmtl>
<?php
if (empty($_SESSION['user'])) {
	echo "<script>";
	echo "alert('No tiene sesion')";
	echo "</script>";
	echo "No existe sesion valida, favor de iniciar sesion";
	header('Location: ../login/login.php');
}
?>
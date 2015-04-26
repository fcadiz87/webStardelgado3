<?php 
	require('capalogicadenegocio/serdocente.class.php');

	$serdocente_id=$_GET['docodigo'];
	/*echo $serdocente_id;*/
	$objserDocente=new serdocente;
	if ($objserDocente->eliminar($serdocente_id)==true) {
		echo "Registro Eliminado Correctamente";
	} else {
		echo "Error al Eliminar Registro Docente...";
	}
?>
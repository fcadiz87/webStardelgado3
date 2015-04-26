<?php 
	include_once("capadatos/conexion.class.php");
/**
* Clase serDocente.
*/
class serDocente
{
	#region Variables
	var $con;
	var $tabla;


	function serDocente()
	{
		$this->con= new DBmanager;
		$tabla = 'serdocente';
	}

	function mostrar_docentes()
	{
		if ($this->con->conectar()==true)
		{
			return mysql_query("SELECT * FROM serDocente");
		}
	}

	function mostrar_docente($id)
	{
		if ($this->con->conectar()==true)
		{
			return mysql_query("SELECT * FROM serDocente WHERE docodigo=".$id);
			echo "SELECT * FROM serDocente WHERE docodigo=".$id;
		}
	}

	function eliminar($id)
	{
		//print($id);
		if ($this->con->conectar()==true)
		{
			return mysql_query("DELETE FROM serDocente WHERE docodigo=".$id);
		}	
	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//print_r($campos);
			//echo "INSERT INTO serDocente (docodigo,donombre,doexperiencia,docodest) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."')";
			//return mysql_query("INSERT INTO serDocente (nombres, ciudad, sexo, telefono, fecha_nacimiento) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')");
			return mysql_query("INSERT INTO serDocente (docodigo,donombre,doexperiencia,docodpai,docodest) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')");
		}
	}

	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			print_r($campos);
			return mysql_query("UPDATE serDocente SET donombre = '".$campos[0]."', doexperiencia = '".$campos[1]."', docodpai = '".$campos[2]."', docodest = '".$campos[3]."' WHERE docodigo = ".$id);
			//UPDATE serdocente SET donombre = 'Weimar', doexperiencia = '7', docodest = '10003' WHERE docodigo = 15;
		}
	}

	function obtenermax(){
			if($this->con->conectar()==true){
				
				return mysql_query("select max(docodigo)+1 from serdocente");

			}
	}


}

	
 ?>
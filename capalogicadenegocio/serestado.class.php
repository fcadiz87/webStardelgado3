<?php 
	include_once("capadatos/conexion.class.php");
/**
 * Clase serEstado
 */
	
	class serEstado
	{
		var $con;
		var $tabla;

		function serEstado()
		{
			$this->con= new DBmanager;
			$tabla = 'serestado';
		}

		function buscarEstado($id)
		{
			if ($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM serestado WHERE escodigo=".$id);
				echo "SELECT * FROM serestado WHERE escodigo=".$id;
			}	
		}

		function mostrar_estados()
		{
			if ($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM serestado");
			}
		}
	}

 ?>
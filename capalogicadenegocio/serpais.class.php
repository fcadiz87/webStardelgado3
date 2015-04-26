<?php 
	include_once("capadatos/conexion.class.php");
/**
 * Clase serEstado
 */
	
	class serPais
	{
		var $con;
		var $tabla;

		function serPais()
		{
			$this->con= new DBmanager;
			$tabla = 'serPais';
		}

		function buscarPais($id)
		{
			if ($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM serPais WHERE pacodigo=".$id);
				//echo "SELECT * FROM serestado WHERE escodigo=".$id;
			}	
		}

		function mostrar_paises()
		{
			if ($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM serpais");
			}
		}
	}

 ?>
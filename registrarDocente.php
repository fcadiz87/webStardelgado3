<?php 
	include ('inc/header.inc'); 

	//echo "<h2 align='center' >Registro de Docentes</h2>";
	
	require('capalogicadenegocio/serestado.class.php');
	require('capalogicadenegocio/serdocente.class.php');
	require('capalogicadenegocio/serpais.class.php');

	$objserEstado=new serestado;
	$consulta_estado=$objserEstado->mostrar_estados();

	$objserPais=new serpais;
	$consulta_pais=$objserPais->mostrar_paises();


	//$objdocente=new serdocente;
	//$consulta_doc=$objdocente->obtenermax();


	if (isset($_POST['submit'])) {
		
		//echo "Entro al mismo formulario con el metodo post";
		$codigo=htmlspecialchars(trim($_REQUEST['cod']));  //CAMBIEN EL POST POR EL REQUEST COMO PRUEBA HOY 22ABRIL
			//echo "$codigo - ";
		$nombDoc=htmlspecialchars(trim($_POST['nombDoc']));
			//echo "$nombDoc - ";
		$exp=htmlspecialchars(trim($_POST['expe']));
			//echo "$exp - ";
		$pai = htmlspecialchars(trim($_POST['comboPais']));
			//echo "$pai - ";
		$estado = htmlspecialchars(trim($_POST['estado']));
			//echo "$estado.";

		$objDocente =new serdocente;
		if ($objDocente->insertar(array($codigo, $nombDoc,$exp,$pai,$estado))==true) {
			echo 'Datos Guardados Correctamente';
			/*echo "<script>";
				echo "alert('Guardado Correctamente !!..');";
				echo "location.replace('listarDocente.php')";
			echo "</script>";	*/
		} else {
			echo 'Error al Guardar Datos';

			/*echo "<script>";
				echo "alert('Se produjo un error. Intente nuevamente');";
				echo "location.replace('listarDocente.php')";
			echo "</script>";*/
		}
	} else {	
?>

	<p>
		<br>
		<div class="container">
			<div class="row">
  				<div class="col-xs-12 col-sm-3 col-md-2">
  					<?php include 'inc/barralateralDocente.inc' ?>
  					
  				</div>
  				<div class="col-xs-12 col-sm-9 col-md-6">
  					<h3>Formulario de Registro</h3>
					<div id="ok"></div>
					<form role="form" class="form-horizontal" id="frmDocenteNuevo" name="frmDocenteNuevo" method="POST" action="registrarDocente.php"  onsubmit="GrabarDatosDocente(); return false"  >
			<?php //<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevo.php" onsubmit="GrabarDatos(); return false"> ?>

						<?php 
							$objDocente =new serdocente;
							$consulta_doc=$objDocente->obtenermax();
							while ($max = mysql_fetch_array($consulta_doc)) 
							{
								$cod = $max['0'];
							} 
								//echo "$cod"; //text por hidden jquqry toma el id de input y post el name
		 				?>
							<div class="form-group">
								<label for="cod" class="col-lg-2 control-label">Codigo: </label>
								<div class="col-lg-10">
									<input type="text" class="form-control"  name="codigo" id="cod" value=" <?php echo $cod ?> " > </input>
								</div>
							</div>

						  <div class="form-group">
						    <label for="nombreDocente" class="col-lg-2 control-label">Nombre: </label>
						    <div class="col-lg-10">
						      	<input type="text" class="form-control"  name="nombreDocente" id="nombDoc" placeholder="Nombre Docente..." >
						    </div>
						  </div>

					  <div class="form-group">
					    <label for="experiencia" class="col-lg-2 control-label">Experiencia:  </label>
					    <div class="col-lg-10">
					      <input type="text" class="form-control"  name="experiencia" id="expe" value="" placeholder="Años de experiencia...">
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label for="comboPais" class="col-lg-2 control-label">Pais:  </label>
					    <div class="col-lg-10">
					      <select class="form-control" name="comboPais" id="comboPais">
							<?php 
								if ($consulta_pais) 
								{
								while ($serVecPai = mysql_fetch_array($consulta_pais)) 
									{?>
										echo "<option value=<?php echo $serVecPai['0'] ?>> <?php echo $serVecPai['1'] ?> </option>"
									<?php 
									}	
								} 
							?>
					      </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="est" class="col-lg-2 control-label">Estado:  </label>
					    <div class="col-lg-10">
					      <select class="form-control" name="estado" id="estado">
							<?php 
								if ($consulta_estado) 
								{
									while ($serVecEst = mysql_fetch_array($consulta_estado)) 
										{?>
											echo "<option value=<?php echo $serVecEst['0'] ?>> <?php echo $serVecEst['1'] ?> </option>"
										<?php 
										}	
								} 
							?>	      	
					      </select>
					    </div>
					  </div>
						

					  <div class="form-group">
					    <div class="col-lg-offset-2 col-lg-10">
					      <input type="submit" name="submit" id="submit" class="btn btn-default" value="Guardar">
					      <input type="button" name="cancelar" id="cancelar" class="btn btn-primary" onclick="Cancelar()" value="Cancelar">
					      <?php //<input  type="button" name="cancelar" id="cancelar" class="cancelar"  value="Cancelar" onclick="Cancelar()"> ?>
					    </div>
					  </div>
					  
					</form>


				</div>

				<div class="col-xs-12 col-sm-12 col-md-4 ">
  					
  						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, dolorem accusantium facere, dolores alias, deleniti quis magni tempora ducimus adipisci sequi distinctio sint. Reiciendis asperiores similique, saepe fugiat deserunt quis!</div>
  						<div>Similique beatae sequi, repellendus doloremque nobis, dolorem iure, quaerat consectetur repudiandae sapiente explicabo esse quidem corporis officia sunt veniam labore quis, dicta consequatur expedita id non deleniti placeat. Optio, ipsam!</div>
  					
  				</div>
			</div>
		</div>
		
	</p>

<?php
}
?>
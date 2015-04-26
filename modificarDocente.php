<?php 
	include ('inc/header.inc'); 


	//require('capalogicadenegocio/serestado.class.php');
	//require('clases/serdocente.class.php');

	if(isset($_POST['submit']))
	{
		require('capalogicadenegocio/serdocente.class.php');
		$objDocente=new serdocente;
		echo "Primer parrafo de Actulizar Docente...";
		$codigo=htmlspecialchars(trim($_REQUEST['coddoc']));
		echo "$codigo";
		$nombDoc=htmlspecialchars(trim($_POST['nomdoc']));
		echo "$nombDoc";
		$exp=htmlspecialchars(trim($_POST['expDoc']));
		echo "$exp";
		$pai=htmlspecialchars(trim($_POST['comboPais']));
		echo "$pai";
		$estado = htmlspecialchars(trim($_POST['comboEstado']));
		echo "$estado";
		
		if ( $objDocente->actualizar(array($nombDoc,$exp,$pai,$estado),$codigo) == true){
			echo 'Datos modificados correctamente...';
		}else{
			echo 'Se produjo un error. Intente nuevamente';
		}
	}
	else
	{
		if(isset($_GET['docodigo']))  //docodigo
		{
			require('capalogicadenegocio/serdocente.class.php');
			$objDocente=new serdocente;
			$consulta = $objDocente->mostrar_docente($_GET['docodigo']);
			$vecdoc = mysql_fetch_array($consulta);

			require('capalogicadenegocio/serpais.class.php');
			$objserPais=new serpais;
			$consulta_pais=$objserPais->mostrar_paises();

			require('capalogicadenegocio/serestado.class.php');
			$objserEstado=new serestado;
			$consulta_estado=$objserEstado->mostrar_estados();
			//echo "Tu codigo que llego al else es". $_GET['docodigo'];
?>
		<?php //comenzando a ocupar los archivos .inc ?>		
		<p>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-2">
  					<?php include 'inc/barralateralDocente.inc' ?>
	  			</div>
				
				<div class="col-xs-12 col-sm-9 col-md-6">
					<h3 align="center" >Formulario de Modificacion</h3>
					<form role="form" class="form-horizontal" id="frmDocenteActualizar" name="frmDocenteActualizar" method="POST" action="modificarDocente.php" onsubmit="ActualizarDatos(); return false">
						
						<div class="form-group">
							<label for="coddoc" class="col-lg-2 control-label">Codigo:</label>
							<div class="col-lg-6">
								<input type="text" class="form-control" name="coddoc" id="coddoc" value=" <?php echo $vecdoc['0'] ?> " ></input>
							</div>
						</div>

						<div class="form-group">
							<label for="nomdoc" class="col-lg-2 control-label">Nombre: </label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="nomdoc" id="nomdoc" value="<?php echo $vecdoc['1'] ?>"></input>
							</div>
						</div>
						
						<div class="form-group">
							<label for="expDoc" class="col-lg-2 control-label">Experiencia</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="expDoc" id="expDoc" value="<?php echo $vecdoc['2'] ?>"></input>
							</div>
						</div>
						
						<div class="form-group">
						    <label for="comboPais" class="col-lg-2 control-label">Pais:  </label>
						    <div class="col-lg-8">
						      <select class="form-control" name="comboPais" id="comboPais">
								<?php 
									if ($consulta_pais) 
									{
									while ($serVecPai = mysql_fetch_array($consulta_pais)) 
										{?>	
											<?php
											if ($vecdoc['3']==$serVecPai['0']) {?>
											    <option selected value=<?php echo $serVecPai['0'] ?>> <?php echo $serVecPai['1'] ?> </option>"
											<?php } else { ?>
											    <option value=<?php echo $serVecPai['0'] ?>> <?php echo $serVecPai['1'] ?> </option>"
											<?php  } 
										}	
									} 
								?>
						      </select>
						    </div>
					  	</div>

					  	<div class="form-group">
						    <label for="comboEstado" class="col-lg-2 control-label">Estado:  </label>
						    <div class="col-lg-8">
						      <select class="form-control" name="comboEstado" id="comboEstado">
								<?php 
									if ($consulta_estado) 
									{
									while ($serVecEst = mysql_fetch_array($consulta_estado)) 
										{?>	
											<?php
											if ($vecdoc['4']==$serVecEst['0']) {?>
											    <option selected value=<?php echo $serVecEst['0'] ?>> <?php echo $serVecEst['1'] ?> </option>"
											<?php } else { ?>
											    <option value=<?php echo $serVecEst['0'] ?>> <?php echo $serVecEst['1'] ?> </option>"
											<?php  } 
										}	
									} 
								?>
						      </select>
						    </div>
					  	</div>

					  	<div class="form-group">
						    <div class="col-lg-offset-2 col-lg-10">
						      <input type="submit" name="submit" id="submit" class="btn btn-default" value="Aceptar">
						      <input type="button" name="cancelar" id="cancelar" class="btn btn-primary" onclick="Cancelar()" value="Cancelar">
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

		
		<?php
		}
	}
?>		
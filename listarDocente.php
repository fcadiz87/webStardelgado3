<?php 
	include ('inc/header.inc'); 
	require('capalogicadenegocio/serdocente.class.php');
	require('capalogicadenegocio/serestado.class.php');
	require('capalogicadenegocio/serpais.class.php');

	$objserDocente=new serdocente;
	$objserEstado=new serestado;
	$objserPais=new serpais;

	$consulta=$objserDocente->mostrar_docentes();
?>
<body>
	<p>
		<br>
		<div class="container">
			<div class="row">
  				<div class="col-xs-12 col-sm-3 col-md-2">
  					<?php include 'inc/barralateralDocente.inc' ?>
  					
  				</div>
  				<div class="col-xs-12 col-sm-9 col-md-7">
  					<h3>Listar/Buscar de Registro</h3>
					  <span id="nuevo"><a href="registrarDocente.php"><img src="img/add.png" alt="Agregar dato" /></a></span>
						
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-condensed">
						   		<tr  >
						   			<th class="ajustar">Cod.</th>
						   			<th >Nombre Docente</th>
						    		<th class="ajustar">Experiencia</th>
						    		<th class="ajustar">Pais</th>
						    		<th >Estado</th>
						    		<th ></th>
						            <th ></th>
						        </tr>
								<?php
								if($consulta) {
									while( $serdocente = mysql_fetch_array($consulta) ){
									?>
									
										  <tr id="fila-<?php echo $serdocente['0'] ?>">
										  	  <td ><?php echo $serdocente['0'] ?></td>		
											  <td><?php echo $serdocente['1'] ?></td>
											  <td><?php echo $serdocente['2'] ?></td>
											  
											   <td>
											  		<?php
											  			 $consulta2=$objserPais->buscarPais($serdocente['3']);
											  			 if($consulta2)
											  			 {
															$serestado = mysql_fetch_array($consulta2);		 	
											  			 }
											  			echo $serestado['1'] 
											  		?>
											  </td>

											  <td>
											  		<?php
											  			 $consulta1=$objserEstado->buscarEstado($serdocente['4']);
											  			 if($consulta1)
											  			 {
															$serestado = mysql_fetch_array($consulta1);		 	
											  			 }
											  			echo $serestado['1'] 
											  		?>
											  </td>
											  <td><span class="modi"><a href="modificarDocente.php?docodigo=<?php echo $serdocente['0'] ?>"><img src="img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
											  <td><span class="dele"><a onClick="EliminarDato(<?php echo $serdocente['0'] ?>); return false" href="dDocente.php?docodigo=<?php echo $serdocente['0'] ?>"><img src="img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
										  </tr>
									<?php
									}
								}
								?>
						   		</table>
							</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
  					
  				</div>
			</div>
		</div>
		
	</p>
</body>
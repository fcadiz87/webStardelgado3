
	
	function EliminarDato(cliente_id){
		var msg = confirm("¿Desea eliminar este Registro?"+ " - " + cliente_id)
		if ( msg ) 
		{
			$.ajax(
			{
				url: 'dDocente.php',
				type: "GET",
				data: "docodigo="+cliente_id,
				success: function(datos)
				{
					alert(datos + " Y Algo Mas...");
					$("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatosDocente(){
		var codigoDoc = $("#cod").attr("value");
		alert(codigoDoc)

		var nombreDoc = document.getElementById("nombDoc").value;
		alert(nombreDoc)

		var expeDoc = document.getElementById("expe").value;
		//alert(expeDoc)

		var codPais = document.getElementById("comboPais").value;
		//alert(codPais)	

		var codEst = document.getElementById("estado").value;
		//alert(codEst)	
		
		$.ajax({
			url: 'registrarDocente.php',
			type: "POST",
			data: "submit=&cod="+codigoDoc+"&nombDoc="+nombreDoc+"&expe="+expeDoc+"&comboPais="+codPais+"&estado="+codEst,

    		error: function(datos) {
        		window.location.replace("registrarDocente.php");
    		},
    		success: function(datos){
				//console.log(datos);
				alert(datos);
				ConsultaDatos();
				/*$("#formulario").hide();
				$("#tabla").show();*/
			}
		});
		return false;
	}

	function ActualizarDatos(){
		var codigoDoc = document.getElementById("coddoc").value;
		alert(codigoDoc)
		var nombreDoc = document.getElementById("nomdoc").value;
		alert(nombreDoc)
		var experienciaDoc = document.getElementById("expDoc").value;
		alert(experienciaDoc)
		var codPais = document.getElementById("comboPais").value;
		alert(codPais)	
		var codEst = document.getElementById("comboEstado").value;
		alert(codEst)	

		$.ajax({
			url: 'modificarDocente.php',
			type: "POST",
			data: "submit=&nomdoc="+nombreDoc+"&expDoc="+experienciaDoc+"&comboPais="+codPais+"&comboEstado="+codEst+"&coddoc="+codigoDoc,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				/*$("#formulario").hide();
				$("#tabla").show();*/
			}
		});
		return false;
	}

	function ConsultaDatos(){
		$.ajax({
			url: 'listarDocente.php', /*url: 'consulta.php',*/
			cache: false,
			type: "GET",
			success: function(datos){
				window.location.href = "listarDocente.php";
				//$("#tabla").html(datos);
			}
			//si hay un error tiene que mantenerme en la misma pagina registrar
		});
	}

	function Cancelar(){
		alert("Usted Presiono Cancelar original");
		window.location.href = "listarDocente.php";
		return false;
	}
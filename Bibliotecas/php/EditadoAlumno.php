<!doctype html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Registro del alumno">
    <meta name="author" content="Garc&iacute;a Tello Axel">
    <title>Registro</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

		<!-- Bootstrap core CSS -->
		<link href="../css/Bootstrap/bootstrap.min.css"  rel="stylesheet">
		<style>
		  .bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		  }

		  @media (min-width: 768px) {
			.bd-placeholder-img-lg {
			  font-size: 3.5rem;
			}
		  }
		</style>

		<!-- Custom styles for this template -->
		<link href="../css/form-validation.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida-curp.js">
    </script>
		<script type="text/javascript" src="../js/Validacion.js">
    </script>
		<script type="text/javascript">
			function EditarAlumno(){
				var xmlhttp = new XMLHttpRequest();
				var curp = document.getElementById("CURP").value;
				var nombre = document.getElementById("nombre").value;
				var paterno = document.getElementById("primerApellido").value;
				var materno = document.getElementById("segundoApellido").value;
				var genero;
				if(document.getElementById("hombre").checked == true){
					genero = "Hombre";
				}
				else{
					genero = "Mujer";
				}
				var nacimiento = document.getElementById("nacimiento").value;
				var correo = document.getElementById("correo").value;
				var telefono = document.getElementById("telefono").value;
				var calle = document.getElementById("calle").value;
				var exterior = document.getElementById("exterior").value;
				var interior = document.getElementById("interior").value;
				var colonia = document.getElementById("colonia").value;
				var municipio = document.getElementById("municipio").value;
				var estado = document.getElementById("estado").value;
				var tipo = document.getElementById("tipo").value;
				var escuela = document.getElementById("escuela").value;
				var localidad = document.getElementById("localidad").value;
				var formacion = document.getElementById("formacion").value;
				var promedio = document.getElementById("promedio").value;
				var carrera = document.getElementById("carrea").value;
				var semestre = document.getElementById("semestre").value;
				var opcion = document.getElementById("opcion").value;
				var idhorario = document.getElementById("idhorario").value;
				var calificacion = document.getElementById("calificacion").value;
				var mensaje;
				mensaje = "CURP=" + curp;
				mensaje += "&nombre=" + nombre;
				mensaje += "&paterno=" + paterno;
				mensaje += "&materno=" + materno;
				mensaje += "&genero=" + genero;
				mensaje += "&nacimiento=" + nacimiento;
				mensaje += "&correo=" + correo;
				mensaje += "&telefono=" + telefono;
				mensaje += "&calle=" + calle;
				mensaje += "&interior=" + interior;
				mensaje += "&exterior=" + exterior;
				mensaje += "&colonia=" + colonia;
				mensaje += "&municipio=" + municipio;
				mensaje += "&estado=" + estado;
				mensaje += "&tipo=" + tipo;
				mensaje += "&escuela=" + escuela;
				mensaje += "&localidad=" + localidad;
				mensaje += "&formacion=" + formacion;
				mensaje += "&promedio=" + promedio;
				mensaje += "&carrera=" + carrera;
				mensaje += "&semestre=" + semestre;
				mensaje += "&opcion=" + opcion;
				mensaje += "&idhorario=" + idhorario;
				mensaje += "&calificacion=" + calificacion;
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
						if(this.responseText == "correcto"){
							document.getElementById("mensaje").innerHTML =
							"<div class=\"alert alert-success\" role=\"alert\">La informaci&oacute;n se a guardado correctamente</div>";
						}
						else{
							document.getElementById("mensaje").innerHTML =
							"<div class=\"alert alert-warning\" role=\"alert\">La informaci&oacute;n no se pudo modificar</div>";
						}
          }
        };
        xmlhttp.open("GET", "EditarAlumno.php?"+mensaje, true);
        xmlhttp.send();
			}
		</script>
	</head>
	<body class="bg-light">
		<div class="container">
			<main>
		    	<div class="py-5 text-center">
		    		<img class="d-block mx-auto mb-4" src="../../Imagenes/escudoESCOM.png"alt="" width="150" height="118.75">
    				  <h2>Bienvenido a ESCOM</h2>
		    		  <p class="lead">Por favor llene el siguiente formulario para poder otorgarle una cita para su examen diagn&oacute;stico.</p>
	    		</div>

					<div class="row g-3">
		  				<div class="col-md-7 col-lg-12">
			    				<h4 class="mb-3">Datos Personales</h4>

	    			      <div class="row g-3">

										<div class="col-sm-6">
											<label for="CURP" class="form-label">CURP</label>
											<input type="text" name="CURP" class="form-control" id="CURP" oninput="validarInput(this)" required>
											<div class="invalid-feedback">
												Se requiere un CURP v&aacute;lido.
											</div>
										</div>

										<div class="col-sm-6">
											<label for="nombre" class="form-label">Nombre(s)</label>
											<input type="text" name="nombre" class="form-control" id="nombre" oninput="validarNombre(this)" required>
											<div class="invalid-feedback">
												Se requiere un nombre v&aacute;lido.
											</div>
										</div>

								    <div class="col-sm-6">
								    	<label for="primerApellido" class="form-label">Primer apellido</label>
								     	<input type="text" name="paterno" class="form-control" id="primerApellido" oninput="validarNombre(this)" required>
								     		<div class="invalid-feedback">
								        	Se requiere un apellido v&aacute;lido.
								        </div>
								    </div>

										<div class="col-sm-6">
											<label for="segundoApellido" class="form-label">Segundo apellido</label>
											<input type="text" name="materno" class="form-control" id="segundoApellido" oninput="validarNombre(this)" required>
											<div class="invalid-feedback">
												Se requiere un segundo apellido válido.
											</div>
										</div>

										<div class="my-3">
											<label for="genero" class="form-label">G&eacute;nero</label>
											<div class="form-check">
												<input id="hombre" name="genero" value="Hombre" type="radio" class="form-check-input" required>
												<label class="form-check-label" for="Hombre">Hombre</label>
											</div>
											<div class="form-check">
												<input id="mujer" name="genero" value="Mujer" type="radio" class="form-check-input" required>
												<label class="form-check-label" for="Mujer">Mujer</label>
											</div>
						        </div>

										<div class="col-md-4">
											<label for="nacimiento" class="form-label">Fecha de nacimiento</label>
											<input type="date" name="nacimiento" class="form-control" id="nacimiento" min="1990-01-01" max="2003-12-31" oninput="validarFecha(this)" required>
											<div class="invalid-feedback">
												Se requiere una fecha v&aacute;lida.
											</div>
										</div>

										<div class="col-md-4">
											<label for="correo" class="form-label">Correo electr&oacute;nico</label>
											<input type="email" name="correo" class="form-control" id="correo" oninput="validarCorreo(this)" required>
											<div class="invalid-feedback">
												Se requiere un correo v&aacute;lido.
											</div>
										</div>

										<div class="col-md-4">
											<label for="telefono" class="form-label">Tel&eacute;fono fijo o celular</label>
											<input type="tel" name="telefono" class="form-control" id="telefono" oninput="validarTelefono(this)" required>
											<div class="invalid-feedback">
												Se requiere un tel&eacute;fono v&aacute;lido.
											</div>
								  	</div>

										<h6 class="mb-3">Direcci&oacute;n</h6>
										<div class="col-md-6">
											<label for="calle" class="form-label">Calle</label>
										  <input type="text" name="calle" class="form-control" id="calle" oninput="validarTexto(this)" required>
										  <div class="invalid-feedback">
											  Se requiere una calle v&aacute;lida.
										  </div>
										</div>

										<div class="col-sm-3">
								    	<label for="exterior" class="form-label">No. exterior</label>
								      <input type="number" name="exterior" class="form-control" id="exterior" max="150" oninput="validarNumero(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere un no. exterior v&aacute;lido.
						        	</div>
						      	</div>

										<div class="col-sm-3">
						        	<label for="interior" class="form-label">No. interior</label>
						        	<input type="number" name="interior" class="form-control" id="interior" max="150" oninput="validarNumero(this)">
						        	<div class="invalid-feedback">
						         			Se requiere un no. interior v&aacute;lido.
						        	</div>
						      	</div>

										<div class="col-md-4">
						        	<label for="colonia" class="form-label">Colonia</label>
								      <input type="text" name="colonia" class="form-control" id="colonia" oninput="validarTexto(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere una colonia v&aacute;lida.
								      </div>
						      	</div>

										<div class="col-md-4">
								    	<label for="municipio" class="form-label">Municipio o alcald&iacute;a</label>
								      <input type="text" name="municipio" class="form-control" id="municipio" oninput="validarTexto(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere un municipio v&aacute;lido.
						        	</div>
						      	</div>

										<div class="col-md-4">
						        	<label for="estado" class="form-label">Estado</label>
								      <input type="text" name="estado" class="form-control" id="estado" oninput="validarTexto(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere un estado v&aacute;lido.
								      </div>
							      </div>

										<hr class="my-4">
										<h4 class="mb-3">Escuela de procedencia</h4>

										<div class="col-md-3">
								    	<label for="tipo" class="form-label">Tipo</label>
								      <select name="tipoescuela" class="form-select" id="tipo" required>
												<option value="">Seleccionar</option>
												<option>P&uacute;blica</option>
												<option>Privada</option>
						        	</select>
								      <div class="invalid-feedback">
								      	Se requiere un tipo v&aacute;lido.
								      </div>
										</div>

										<div class="col-md-9">
						        	<label for="escuela" class="form-label">Nombre</label>
									    <input type="text" name="escuela" class="form-control" id="escuela" oninput="validarTexto(this)" required>
									    <div class="invalid-feedback">
												Se requiere una escuela v&aacute;lida.
											</div>
										</div>

										<div class="col-md-12">
								    	<label for="localidad" class="form-label">Localidad</label>
								      <input type="text" name="localidad" class="form-control" id="localidad" oninput="validarTexto(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere una localidad v&aacute;lida.
						        	</div>
						      	</div>

										<div class="col-md-6">
								      <label for="formacion" class="form-label">Formaci&oacute;n t&eacute;cnica <span class="text-muted">(Opcional)</span></label>
								      <input type="text" name="formacion" class="form-control" id="formacion" oninput="validarTexto(this)">
								      <div class="invalid-feedback">
								      	Se requiere una formación v&aacute;lida.
						        	</div>
							      </div>

										<div class="col-md-6">
						        	<label for="promedio" class="form-label">Promedio obtenido</label>
								      <input type="text" name="promedio" class="form-control" id="promedio" min="0" max="10" oninput="validarPromedio(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere un promedio v&aacute;lido.
								      </div>
										</div>

										<hr class="my-4">
										<h4 class="mb-3">Programa acad&eacute;mico</h4>

										<div class="col-sm-4">
								    	<label for="carrera" class="form-label">Carrera asignada</label>
								      <select name="carrera" class="form-select" id="carrea" required>
												<option value="">Seleccionar</option>
												<option>Ing. en Sistemas Computacionales</option>
												<option>Ing. en Inteligencia Artificial</option>
												<option>Lic. en Ciencia de Datos</option>
								      </select>
								      <div class="invalid-feedback">
								      	Seleccione una carrera v&aacute;lida.
								      </div>
						      	</div>

										<div class="col-sm-4">
								    	<label for="semestre" class="form-label">Semestre</label>
								      <select name="semestre" class="form-select" id="semestre">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
						        	</select>
						        	<div class="invalid-feedback">
						          	Seleccione un semestre valido.
						        	</div>
						      	</div>

										<div class="col-sm-4">
								    	<label for="opcion" class="form-label">N&uacute;mero de opci&oacute;n</label>
								      <input type="number" name="opcion" class="form-control" id="opcion" max="10" oninput="validarOpcion(this)" required>
								      <div class="invalid-feedback">
								      	Se requiere una opcion v&aacute;lida.
						        	</div>
							  		</div>

								<hr class="my-4">

								<div class="col-sm-6">
									<label for="IdHorario" class="form-label">Id Horario</label>
									<input type="number" name="IdHorario" class="form-control" id="idhorario" required>
									<div class="invalid-feedback">
										Se requiere un horario v&aacute;lido.
									</div>
								</div>

								<div class="col-sm-6">
									<label for="Calificacion" class="form-label">Calificaci&oacute;n</label>
									<input type="text" name="Calificacion" class="form-control" id="calificacion" min="0" max="10" oninput="validarPromedio(this)">
									<div class="invalid-feedback">
										Se requiere una calificaci&oacute;n v&aacute;lida.
									</div>
								</div>

								<hr class="my-4">

								<span id="mensaje">
					      </span>
								<button class="w-100 btn btn-primary btn-lg" onclick="EditarAlumno()">Modificar datos</button>
								<?php
			            $CURP = $_GET['CURP'];
			            $Nombre = 0;
			            $Paterno = 0;
			            $Materno = 0;
			            $Genero = 0;
			            $Nacimiento = 0;
			            $Correo = 0;
			            $Telefono = 0;
			            $Calle = 0;
			            $Interior = 0;
			            $Exterior = 0;
			            $Colonia = 0;
			            $Municipio = 0;
			            $Estado = 0;
			            $TipoEscuela = 0;
			            $Escuela = 0;
			            $Localidad = 0;
			            $Formacion = 0;
			            $Promedio = 0;
			            $Carrera = 0;
			            $Semestre = 0;
			            $Opcion = 0;
									$IdHorario = 0;
			            $Calificaion = 0;

			            $servername = "localhost";
			            $username = "root";
			            $password = "";

			            //Iniciar conexion
			            $conn = mysqli_connect($servername, $username, $password);
			            //Checar conexion
			            if(!$conn){
			              die("Conexion fallida: " . mysqli_connect_error());
			            }

			            mysqli_select_db($conn,"WEB");

			            $sql = "SELECT * FROM alumno WHERE CURP='".$CURP."'";

			            $result = mysqli_query($conn, $sql);

			            if (mysqli_num_rows($result) > 0) {
			              $row = mysqli_fetch_assoc($result);
			              $Nombre = $row['Nombre'];
			              $Paterno = $row['ApellidoP'];
			              $Materno = $row['ApellidoM'];
			              $Genero = $row['Genero'];
			              $Nacimiento = $row['FechaNacimiento'];
			              $Correo = $row['Correo'];
			              $Telefono = $row['Telefono'];
			              $Calle = $row['Calle'];
			              $Interior = $row['NoInterior'];
			              $Exterior = $row['NoExterior'];
			              $Colonia = $row['Colonia'];
			              $Municipio = $row['Municipio'];
			              $Estado = $row['Estado'];
			              $TipoEscuela = $row['TipoEsc'];
			              $Escuela = $row['NombreEsc'];
			              $Localidad = $row['LocalidadEsc'];
			              $Formacion = $row['FormacionTec'];
			              $Promedio = $row['Promedio'];
			              $Carrera = $row['Carrera'];
			              $Semestre = $row['Semestre'];
			              $Opcion = $row['Opcion'];
			              $IdHorario = $row['IdHorario'];
			              $Calificacion = $row['Calificacion'];

										echo "<script>
														document.getElementById(\"CURP\").value = \"".$CURP."\";
														document.getElementById(\"nombre\").value = \"".$Nombre."\";
														document.getElementById(\"primerApellido\").value = \"".$Paterno."\";
														document.getElementById(\"segundoApellido\").value = \"".$Materno."\";
														if(\"".$Genero."\"==\"Hombre\"){
															document.getElementById(\"hombre\").checked = true;
														}
														else{
															document.getElementById(\"mujer\").checked = true;
														}
														document.getElementById(\"nacimiento\").value = \"".$Nacimiento."\";
														document.getElementById(\"correo\").value = \"".$Correo."\";
														document.getElementById(\"telefono\").value = \"".$Telefono."\";
														document.getElementById(\"calle\").value = \"".$Calle."\";
														document.getElementById(\"exterior\").value = \"".$Exterior."\";
														document.getElementById(\"interior\").value = \"".$Interior."\";
														document.getElementById(\"colonia\").value = \"".$Colonia."\";
														document.getElementById(\"municipio\").value = \"".$Municipio."\";
														document.getElementById(\"estado\").value = \"".$Estado."\";
														document.getElementById(\"tipo\").value = \"".$TipoEscuela."\";
														document.getElementById(\"escuela\").value = \"".$Escuela."\";
														document.getElementById(\"localidad\").value = \"".$Localidad."\";
														document.getElementById(\"formacion\").value = \"".$Formacion."\";
														document.getElementById(\"promedio\").value = \"".$Promedio."\";
														document.getElementById(\"carrea\").value = \"".$Carrera."\";
														document.getElementById(\"semestre\").value = \"".$Semestre."\";
														document.getElementById(\"opcion\").value = \"".$Opcion."\";
														document.getElementById(\"idhorario\").value = \"".$IdHorario."\";
														document.getElementById(\"calificacion\").value = \"".$Calificacion."\";
													</script>";
			            }
								?>
							</div>

      		</div>
				</div>
  		</main>

			<footer class="my-5 pt-5 text-muted text-center text-small">
				<p class="mb-1">&copy; 2020 Company Name</p>
			</footer>
		</div>
		<script  src="../js/Bootstrap/bootstrap.bundle.min.js"></script>
		<script src="../js/form-validation.js"></script>
	</body>
</html>

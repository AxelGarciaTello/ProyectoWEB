<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administra los datos de los alumnos">
    <meta name="author" content="Garcia Tello Axel">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/Graficos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>Administrador</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
<link href="../css/Bootstrap/bootstrap.css" rel="stylesheet">

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
    <link href="../css/dashboard.css" rel="stylesheet">
    
    <?php
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
     $sql = "SELECT * FROM horario";   
     $result = mysqli_query($conn, $sql);   
   
     $grupos=""; 
     if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_array($result)) {
         $grupos.= '<option value="'.$row['IdHorario'].'">Grupo:'.$row['Grupo'].'    Fecha:'.$row['Fecha'].'   Hora:'.$row['Hora'].':'.$row['Minuto'];
         if($row['Minuto'] == 0){
           $grupos.='0';
         }
         $grupos.='</option>';
       }
     }
   
     mysqli_close($conn);
  ?>  
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
      <main class="col-md-4 ms-sm-auto col-lg-9 px-md-4 ">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom col-8">
            <h1 class="h2">Alumnos</h1>
            <canvas id="graficoGeneral"></canvas>
            <p id="promedioGeneral"></p>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
            <h1 class="h2">Horarios Disponibles</h1>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
              <select class="form-select" aria-label="Grupo" name="Grupo" id="Grupo" onChange=graficoHorario(this.value);>
                <option value="">Seleccionar Grupo</option>
                <?php echo $grupos; ?>
              </select>              
            </div>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center col-9">
            <canvas id="graficoGrupo"></canvas>
            <p id="promedioGrupo"></p>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
              <canvas id="graficoGenero"></canvas>       
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
              <canvas id="graficoProcedencia"></canvas>       
            </div>
          </div>
      </main>

      
      </div>
    </div>

 


  <script>
    $(document).ready(graficoGeneral(),graficoGenero());
    </script>



  <script src="../js/Bootstrap/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
  </body>
</html>
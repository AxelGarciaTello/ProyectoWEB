function Alumnos(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"100%\" height=\"380%\" src=\"../../Administrador/InformacionAlumnos.html\" scrolling=\"yes\" frameborder=\"yes\" ></iframe>";
  document.getElementById("alumnos").classList.add('active');
  document.getElementById("calificar").classList.remove('active');
  document.getElementById("reportes").classList.remove('active');
  document.getElementById("horarios").classList.remove('active');
}
function Calificar(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"100%\" height=\"380%\" src=\"../../Administrador/CalificacionAlumnos.html\" scrolling=\"yes\" frameborder=\"yes\" ></iframe>";
  document.getElementById("alumnos").classList.remove('active');
  document.getElementById("calificar").classList.add('active');
  document.getElementById("reportes").classList.remove('active');
  document.getElementById("horarios").classList.remove('active');
}
function Reportes(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"100%\" height=\"380%\" src=\"MostrarGraficos.php\" scrolling=\"yes\" frameborder=\"yes\" ></iframe>";
  document.getElementById("alumnos").classList.remove('active');
  document.getElementById("calificar").classList.remove('active');
  document.getElementById("reportes").classList.add('active');
  document.getElementById("horarios").classList.remove('active');
}
function Horarios(){
  document.getElementById("pantalla").innerHTML =  "<iframe width=\"100%\" height=\"380%\" src=\"../../Administrador/InformacionHorarios.html\" scrolling=\"yes\" frameborder=\"yes\" ></iframe>";
  document.getElementById("alumnos").classList.remove('active');
  document.getElementById("calificar").classList.remove('active');
  document.getElementById("reportes").classList.remove('active');
  document.getElementById("horarios").classList.add('active');
}

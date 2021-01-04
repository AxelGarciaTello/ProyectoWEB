function validarFecha(inFecha){
  var fecha = new Date(inFecha.value);
  var ahora = new Date();
  ahora.setHours(0,0,0,0);
  if( fecha <= ahora){
    inFecha.classList.add('is-invalid');
  }
  else{
    inFecha.classList.remove('is-invalid');
  }
}

function validarHora(inHora){
  var hora = parseInt(inHora.value);
  if(hora < 7 || hora > 21 ){
    inHora.classList.add('is-invalid');
  }
  else{
    inHora.classList.remove('is-invalid');
  }
}

function validarMinuto(inMinuto){
  var minuto = parseInt(inMinuto.value);
  if(minuto < 0 || minuto > 59 ){
    inMinuto.classList.add('is-invalid');
  }
  else{
    inMinuto.classList.remove('is-invalid');
  }
}

function validarDisponibilidad(inDisponibilidad){
  var disponibilidad = parseInt(inDisponibilidad.value);
  if(disponibilidad < 0 || disponibilidad > 25 ){
    inDisponibilidad.classList.add('is-invalid');
  }
  else{
    inDisponibilidad.classList.remove('is-invalid');
  }
}

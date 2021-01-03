function validarNombre(inNombre){
  var texto = inNombre.value;
  if( texto == null || texto.length == 0 || !(/^[A-Z áéíóúÁÉÍÓÚñ]+$/i.test(texto)) ) {
    inNombre.classList.add('is-invalid');
  }
  else{
    inNombre.classList.remove('is-invalid');
  }
}

function validarCorreo(inCorreo){
  var correo = inCorreo.value;
  var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if( emailRegex.test(correo) ) {
    inCorreo.classList.remove('is-invalid');
  }
  else{
    inCorreo.classList.add('is-invalid');
  }
}

function validarTelefono(inTelefono){
  var telefono = inTelefono.value;
  if( telefono==null || telefono.length!=10 || !(/^[0-9+ ]+$/i.test(inTelefono.value))){
    inTelefono.classList.add('is-invalid');
  }
  else{
    inTelefono.classList.remove('is-invalid');
  }
}

function validarTexto(inTexto){
  var texto = inTexto.value;
  if( texto == null || texto.length == 0 || !(/^[0-9a-zA-Z áéíóúÁÉÍÓÚ,.ñ]+$/i.test(texto)) ){
    inTexto.classList.add('is-invalid');
  }
  else{
    inTexto.classList.remove('is-invalid');
  }
}

function validarNumero(inNumero){
  var numero = parseInt(inNumero.value);
  if(numero > 150 || numero < 0){
    inNumero.classList.add('is-invalid');
  }
  else{
    inNumero.classList.remove('is-invalid');
  }
}

function validarPromedio(inPromedio){
  var promedio = parseFloat(inPromedio.value);
  if( promedio > 10 || promedio < 0 || !(/^[0-9.]+$/i.test(inPromedio.value))){
    inPromedio.classList.add('is-invalid');
  }
  else{
    inPromedio.classList.remove('is-invalid');
  }
}

function validarOpcion(inOpcion){
  var opcion = parseInt(inOpcion.value);
  if( opcion > 3 || opcion < 0 ){
    inOpcion.classList.add('is-invalid');
  }
  else{
    inOpcion.classList.remove('is-invalid');
  }
}

function validarFecha(inFecha){
  var fecha = inFecha.value;
  if( fecha > "2003-12-31" || fecha < "1990-01-01"){
    inFecha.classList.add('is-invalid');
  }
  else{
    inFecha.classList.remove('is-invalid');
  }
}

function mayus(incurp){
  var curp = incurp.value.toUpperCase();
  incurp.value=curp;
}

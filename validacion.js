function valida(f) {
  var ok = true;
  var msg = "Error en los siguientes campos:\n";
  
  if (f.cp.value.length!=5) {
    msg += " - CÓDIGO POSTAL: Ingrese un CP válido.\n";
    ok = false;
  }

  if(ok == false)
    alert(msg);
  return ok;
}

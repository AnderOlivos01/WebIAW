function validateDNI(dni,a) {
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    dni = dni.toUpperCase();
    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-1);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            a.innerHTML="La letra del DNI/NIE es incorrecta";
            a.style.color="red";
            validados["v_dni"]=false;
        }else{
            a.innerHTML="";
            validados["v_dni"]=true;
        }
    }else{
        a.innerHTML="Formato DNI/NIE incorrecto";
        a.style.color="red";
        validados["v_dni"]=false;
    }
}

function validarCodigoPostal(a,b)
{
  if(a.length == 5 && parseInt(a) >= 1000 && parseInt(a) <= 52999){
    b.innerHTML="";
    validados["v_postal"]=true;
    }
  else{
    b.innerHTML="Código postal inválido";
    b.style.color="red";
    validados["v_postal"]=false;
   }
}

function validarFormatoFecha(a,b) {
    var formatoFecha = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;

    if (formatoFecha.test(a)) {
        b.innerHTML="";
        validados["v_nacimiento"]=true;
    } else {
        b.innerHTML="Formato de fecha incorrecto";
        b.style.color="red";
        validados["v_nacimiento"]=false;
    }
}
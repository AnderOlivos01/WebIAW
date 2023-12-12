var validados={
    v_asunto:false,
    v_dni:false,
    v_nombre:false,
    v_apellido:false,
    v_nacimiento:false,
    v_domicilio:false,
    v_postal:false,
    v_info:false,
    v_politicas:false,
    v_fichero1:false,
    v_fichero2:false
}

function validar(){


    /*VALIDACIÓN ASUNTO*/

    if(asunto.value==""){
        alertar(alerta_asunto,"asunto");
        validados["v_asunto"]=false;
    }
    else{
        desaparecer_alertar(alerta_asunto);
        validados["v_asunto"]=true;
    }

    /*VALIDACIÓN DNI*/

    if(dni.value==""){
        alertar(alerta_dni,"DNI");
        validados["v_dni"]=false;
    }
    else{
        desaparecer_alertar(alerta_dni);
        validateDNI(dni.value,alerta_dni);
    }

    /*VALIDACIÓN NOMBRE*/

    if(nombre.value==""){
        alertar(alerta_nombre,"nombre");
        validados["v_nombre"]=false;
    }
    else{
        desaparecer_alertar(alerta_nombre);
        validados["v_nombre"]=true;
    }

    /*VALIDACIÓN APELLIDO*/

    if(apellido.value==""){
        alertar(alerta_apellido,"apellido");
        validados["v_apellido"]=false;
    }
    else{
        desaparecer_alertar(alerta_apellido);
        validados["v_apellido"]=true;
    }

    /*VALIDACIÓN FECHA NACIMIENTO*/

    if(f_nacimiento.value==""){
        alertar(alerta_f_nacimiento,"fecha de nacimiento");
        validados["v_nacimiento"]=false;
    }
    else{
        desaparecer_alertar(alerta_f_nacimiento);
        validarFormatoFecha(f_nacimiento.value,alerta_f_nacimiento);
    }

    /*VALIDACIÓN DOMICILIO*/

    if(domicilio.value==""){
        alertar(alerta_domicilio,"domicilio");
        validados["v_domicilio"]=false;
    }
    else{
        desaparecer_alertar(alerta_domicilio);
        validados["v_domicilio"]=true;
    }

    /*VALIDACIÓN CÓDIGO POSTAL*/

    if(postal.value==""){
        alertar(alerta_postal,"código postal");
        validados["v_postal"]=false;
    }
    else{
        desaparecer_alertar(alerta_postal);
        validarCodigoPostal(postal.value,alerta_postal);
    }

    /*VALIDACIÓN INFORMACIÓN REQUERIDA*/

    if(informacion_requerida.value ==""){
        alertar(alerta_informacion_requerida,"información requerida");
        validados["v_info"]=false;
    }
    else{
        desaparecer_alertar(alerta_informacion_requerida);
        validados["v_info"]=true;
    }

    /*VALIDACIÓN POLÍTICAS*/

    if(politicas.checked==false){
        alertar(alerta_politicas,"políticas de datos y normas de uso");
        validados["v_politicas"]=false;
    }
    else{
        desaparecer_alertar(alerta_politicas);
        validados["v_politicas"]=true;
    }

    if(fichero1.files[0]){
        if(fichero1.files[0].size > 2097152){
            alerta_fichero1.innerHTML='Fichero demasiado grande (2MB max)';
            alerta_fichero1.style.color="red";
            validados["v_fichero1"]=false;
        }
        else{
            alerta_fichero1.innerHTML='';
            validados["v_fichero1"]=true;
        }
    }else{
        validados["v_fichero1"]=true;
    }

    if(fichero2.files[0]){
        if(fichero2.files[0].size > 2097152){
            alerta_fichero2.innerHTML='Fichero demasiado grande (2MB max)';
            alerta_fichero2.style.color="red";
            validados["v_fichero2"]=false;
        }
        else{
            alerta_fichero2.innerHTML='';
            validados["v_fichero2"]=true;
        }
    }
    else{
        validados["v_fichero2"]=true;
    }

    /*VALIDACIÓN DE TODOS LOS INPUTS*/

    if (Object.values(validados).every(function(valor) {
        return valor === true;
    })) {
        // Si todos son true, realiza la acción
        alert("FELICIDADES! El formulario se ha enviado con éxito.")
    }
}

function alertar(a,b){
    a.innerHTML="El campo "+b+" es obligatorio";
    a.style.color="red";
}

function desaparecer_alertar(a){
    a.innerHTML="";
}
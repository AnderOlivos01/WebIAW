function validar(){
    if(asunto.value==""){
        alertar(alerta_asunto,"asunto");
    }
    else{
        desaparecer_alertar(alerta_asunto);
    }


    if(dni.value==""){
        alertar(alerta_dni,"DNI");
    }
    else{
        desaparecer_alertar(alerta_dni);
    }


    if(nombre.value==""){
        alertar(alerta_nombre,"nombre");
    }
    else{
        desaparecer_alertar(alerta_nombre);
    }


    if(apellido.value==""){
        alertar(alerta_apellido,"apellido");
    }
    else{
        desaparecer_alertar(alerta_apellido);
    }


    if(f_nacimiento.value==""){
        alertar(alerta_f_nacimiento,"fecha de nacimiento");
    }
    else{
        desaparecer_alertar(alerta_f_nacimiento);
    }


    if(domicilio.value==""){
        alertar(alerta_domicilio,"domicilio");
    }
    else{
        desaparecer_alertar(alerta_domicilio);
    }


    if(postal.value==""){
        alertar(alerta_postal,"código postal");
    }
    else{
        desaparecer_alertar(alerta_postal);
    }


    if(informacion_requerida.value ==""){
        alertar(alerta_informacion_requerida,"información requerida");
    }
    else{
        desaparecer_alertar(alerta_informacion_requerida);
    }


    if(politicas.checked==false){
        alertar(alerta_politicas,"políticas de datos y normas de uso");
    }
    else{
        desaparecer_alertar(alerta_politicas);
    }
}

function alertar(a,b){
    a.innerHTML="El campo "+b+" es obligatorio";
    a.style.color="red";
}

function desaparecer_alertar(a){
    a.innerHTML="";
}
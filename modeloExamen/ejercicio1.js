validar();

function validar(){
    var elementos_req=document.getElementsByClassName('required');
    console.log(elementos_req);
    for(var i=0;i<elementos_req.length;i++){
        if(elementos_req[i]["value"]=="" || elementos_req[i]["value"]==null || elementos_req[i]["checked"]==false){
            document.getElementById('required'+elementos_req[i]["id"]).innerHTML="El campo "+elementos_req[i]["id"]+" es necesario para completar el formulario";
        }
    }
}
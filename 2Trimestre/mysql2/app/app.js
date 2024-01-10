$("#circle").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", cargado_function);


function cargado_function(){
    $("#entrada").css("display","none");
    $("#container_father").addClass("display_father");
}
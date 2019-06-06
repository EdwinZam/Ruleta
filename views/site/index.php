<?php

/* @var $this yii\web\View */

$this->title = 'Ruleta';
?>
<div class="site-index">
<div class="body-content">
<style type="text/css">
    
    * {
    padding: 0px;
    margin: 0px;
    text-align: center;
}
.vara {
    height: 60px;
    width: 20px;
    background-color: yellow;
    margin: auto;
    position: relative;
    top: 5px;
    border-radius: 0px 0px 10px 10px;
    border: 1px solid #000;
    border-top: 5px solid #000;
    z-index: 1000;
}

img {
    z-index: 100;
    transition: all 5s
}

#color {
    position: center;
    font-size: 20px;
}
#dinero {
    position: absolute;
    font-size: 40px;
    padding: 20px;
}

</style>
<div>
    <button id="green" type="button" class="btn btn-success">Verde x15</button>
    <button id="red" type="button" class="btn btn-danger">Rojo x 2</button>
    <button id="black" type="button" class="btn">Negro x2</button>
    <div id="dinero">Dinero: $10000</div>
    <div id="color">El color seleccionado es: </div>
    <div class="vara"></div>
    <img src="img/imagen.png" id="ruleta">
</div>

<script>
var green = document.getElementById("green");
var red = document.getElementById("red");
var black = document.getElementById("black");
var a = 1 ;
green.onclick = function() {
  return a = 15;
}
red.onclick = function() {
   return a = 2;
}
black.onclick = function() {
   return a = 10;
}

const ruleta = document.querySelector("#ruleta");

ruleta.addEventListener("click",girar);

dinero = 10000;

function girar(){
    if (dinero >= 1000 && a!=1) {
        let rand = Math.random()*7200; 
        valorAle = (Math.random()* (15 - 8) + 8) / 100 ;
        apuesta = (- dinero * valorAle) ;
        sumarPuntos(apuesta);
        color(a);
        calcular(rand);
    }  
    else if (a==1) {         
        alert("Seleccione un Color de Apuesta");
        return 0;
    }else if( (apuesta && dinero) != 0  ){
        let rand = Math.random()*7200;
        apuesta = dinero * -1;
        sumarPuntos(- dinero);
        color(a);      
        calcular(rand);
    }else{
        alert("El jugador no tiene dinero para girar la ruleta");
        return 0; 
    }
}

function sumarPuntos(p){
    color(a); 
    dinero += p ;
    document.querySelector("#dinero").innerHTML = "Dinero: $" +  Math.round( dinero );
}
function color(a){
    if(a==15){
        document.querySelector("#color").innerHTML = "El color seleccionando es: VERDE" ;
    }if(a==2){
        document.querySelector("#color").innerHTML = "El color seleccionando es: ROJO" ;
    }if(a==10){
        document.querySelector("#color").innerHTML = "El color seleccionando es: NEGRO" ;
    }
}


function calcular(rand){
    valor = rand / 360;
    valor = (valor - parseInt(valor.toString().split(".")[0])) * 360;
    ruleta.style.transform = "rotate("+rand+"deg)";
    if (a != 1 ) {
    setTimeout(()=>{
        
    switch(true){
        case valor > 0 && valor <= 7.2 && a==15:
            alert("Usted ha ganado con el Color Verde x 15 ");
            sumarPuntos(apuesta * -15);
            break;
        case valor > 7.2 && valor <= 183.6 && a==2:
            alert("Usted ha ganado con el Color Rojo x 2 ");
            sumarPuntos(apuesta * -2);
            break;
        case valor > 183.6 && valor <= 360 && a == 10:
            alert("Usted ha ganado con el Color Negro x 2 ");
            sumarPuntos(apuesta * -2);
            break;
    }},5000);
    }else{
        alert("apueste seleccionando un boton");
    }
}

</script>





   <!--  <div class="jumbotron">

        <h1>Ruleta</h1>

       <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
-->
    
        
    </div>
</div>

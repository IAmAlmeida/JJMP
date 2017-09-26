function imgoversizer() {
    var almeida =  document.getElementById("almeida");
    var almeidacheck = almeida.style.width.value;
    var i = 0 ;

if(almeidacheck= "150px"){
    almeida.style.height="250px";
    almeida.style.width="250px";
    console.log("add");
    i++;
}
else if(almeidacheck="250px"){

    almeida.style.height="150px";
    almeida.style.width="150px";
    console.log("sub");
    i--;

}



}



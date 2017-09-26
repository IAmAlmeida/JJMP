function imgoversizer() {
    var imagem =  document.getElementById("image");
    var imagemcheck = imagem.style.width;
    var i = 0 ;

if(imagemcheck == "150px"){
    imagem.style.height="250px";
    imagem.style.width="250px";
    console.log("add");
    i++;
}
else if(imagemcheck == "250px"){

    imagem.style.height="150px";
    imagem.style.width="150px";
    console.log("sub");
    i--;

}



}



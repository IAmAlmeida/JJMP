function imgoversizer(name) {
var tag;
var labelaboutus = document.getElementById("labelus");
    for(a=0;a<=3;a++){
        if(a == 0){
            tag = "A";
        }
        if(a == 1){
            tag = "J";
        }
        if(a == 2){
            tag = "M";
        }
        if(a == 3){
            tag = "P";
        }
        var idtag="image";
        var id=idtag+tag;
        var imagedownsizer = document.getElementById(id);
        if(name!=tag){
            imagedownsizer.style.height="150px";
            imagedownsizer.style.width="150px";
        }

    }

    if(name=='A'){
        var imagem =  document.getElementById("imageA");
        labelaboutus.innerHTML="João Almeida <br><br>Tenho 17 anos, comecei este projecto com os meus colegas graças ao clube de róbotica que foi hospedado pela escola secundária de Mafra José Saramago." +
            " <br><br>Fui um dos programadores principais, tentei trabalhar o maximo possivel em todos os componentes deste website, desde que comecei este projeto, tentei sempre alcançar mais longe e mais fundo" +
            "<br><br> Yah sou eu, a dora!";


    }else
    if(name=='J'){
        var imagem =  document.getElementById("imageJ");
        labelaboutus.innerHTML="Joao";
    }else
    if(name=='M'){
        var imagem =  document.getElementById("imageM");
        labelaboutus.innerHTML="Mia";
    }else
    if(name=='P'){
        var imagem =  document.getElementById("imageP");
        labelaboutus.innerHTML="Pedro";
    }
    var imagemcheck = imagem.style.width;
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
    labelaboutus.innerHTML="";
}



}



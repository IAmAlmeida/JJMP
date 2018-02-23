function imgoversizer(name) {
    var tag;
    var labelaboutus = document.getElementById("labelus");
    var logo = document.getElementById("logo");
    for (a = 0; a <= 3; a++) {
        if (a == 0) {
            tag = "J";
        }
        if (a == 1) {
            tag = "A";
        }
        if (a == 2) {
            tag = "M";
        }
        if (a == 3) {
            tag = "P";
        }
        var idtag = "image";
        var id = idtag + tag;
        var imagedownsizer = document.getElementById(id);
        if (name != tag) {
            imagedownsizer.style.maxHeight = "12.5%";
            imagedownsizer.style.maxWidth = "12.5%";
        }

    }

    if (name == 'A') {
        var imagem = document.getElementById("imageA");
        //descrição Almeida
        labelaboutus.innerHTML = "João Almeida, 17 anos <br><br>Comecei este projecto com os meus colegas graças ao clube de róbotica que foi hospedado pela escola secundária de Mafra José Saramago." +
            " <br><br>Fui um dos programadores principais, tentei trabalhar o maximo possivel em todos os componentes deste website, desde que comecei este projeto, tentei sempre alcançar mais longe e mais fundo"



        ;
        logo.src = "public_html/img/logo_jj.png";
    } else if (name == 'J') {
        var imagem = document.getElementById("imageJ");
        //descrição joão
        labelaboutus.innerHTML = "Joao Marques, 17 anos<br><br> Tal como todos os meus colegas, faço parte deste grupo graças ao clube de robótica e às ideias semelhantes que todos tinhamos.<br><br> Prefiro especialmente programação e software a hardware,"

            "</div>"
        logo.src = "public_html/img/logo_j.png";

    } else if (name == 'M') {
        var imagem = document.getElementById("imageM");
        //descrição mia
        labelaboutus.innerHTML = "Maria Saraiva, 18 anos <br><br> Juntei-me a este grupo pois todos nós fizemos parte do clube de robótica e achámos que seria uma boa ideia utilizar tudo o que aprendemos neste projeto.<br><br> Tenho mais facilidade na parte de hardware, mas também tento aprender um pouco mais de software e de progrmaçao com os meus colegas do grupo que me ajudam bastante nesse sentido."

        logo.src = "public_html/img/logo_m.png";
    } else if (name == 'P') {
        var imagem = document.getElementById("imageP");
        //descrição Pedro
        labelaboutus.innerHTML = "Pedro, 17 anos<br><br> Faço parte deste grupo desde o clube de robótica, trabalho tanto na parte de hardware, como de software e de imagem.<br><br> Tenho facilidade em programação mas prefiro essencialmente hardware e image. Faço especialmente os logótipos do nosso website(ex.:JJMP) e o design do mesmo, tal como o background."

            "</div>"
        logo.src = "public_html/img/logo_p.png";
    }

    var imagemcheck = imagem.style.maxWidth;
    if (imagemcheck == "12.5%") {
        imagem.style.maxHeight = "22.5%";
        imagem.style.maxWidth = "22.5%";
        console.log("add");


    }
    else if (imagemcheck == "22.5%") {

        imagem.style.maxHeight = "12.5%";
        imagem.style.maxWidth = "12.5%";
        console.log("sub");
        logo.src = "../../public_html/img/logo.png";

        labelaboutus.innerHTML = " ";

    }
}

    function checknull(texto) {
    var txt = texto;
        var pensabem = document.getElementById(txt);

        if ((pensabem.value == "") || ( pensabem.length = 0)) {
            alert("Escreva algo...");
            return false;
        }
    }

function emailchange() {

    var old = document.getElementById("met");
    var oldr = document.getElementById("metr");
    var newp = document.getElementById("metn");
    var newpr = document.getElementById("metrn");
    var btnmpc = document.getElementById("btnme");

    if(old.value != "" && oldr.value!="" && old.value==oldr.value){
        newp.removeAttribute("disabled");
        newpr.removeAttribute("disabled");
        if(newp.value!="" && newpr.value!="" && newp.value == newpr.value){
            btnmpc.removeAttribute("disabled");
        }else{
            btnmpc.setAttribute("disabled","");
        }
    }else{
        newp.setAttribute("disabled","");
        newpr.setAttribute("disabled","");
    }

}

function oldpasscheck() {
    var old = document.getElementById("mpt");
    var oldr = document.getElementById("mptr");
    var newp = document.getElementById("mptn");
    var newpr = document.getElementById("mptrn");
    var btnmpc = document.getElementById("btnmp");

 if(old.value != "" && oldr.value!="" && old.value==oldr.value){
     newp.removeAttribute("disabled");
     newpr.removeAttribute("disabled");
     if(newp.value!="" && newpr.value!="" && newp.value == newpr.value){
         btnmpc.removeAttribute("disabled");
     }else{
         btnmpc.setAttribute("disabled","");
     }
}else{
     newp.setAttribute("disabled","");
     newpr.setAttribute("disabled","");
 }

}

function del() {
    tdel = document.getElementById('deleteacc');
    bdel = document.getElementById('btnacc');
    div = document.getElementById('checkboxdel');
    checkbox = document.getElementById('deletebox');
    if(tdel.value == "DELETE"){
        if(checkbox.checked == true){
            bdel.removeAttribute('disabled');
        }else{
            bdel.setAttribute('disabled',"");
        }
        div.removeAttribute('hidden');
    }else{
        bdel.setAttribute('disabled',"");
        div.setAttribute('hidden',"");
    }
}


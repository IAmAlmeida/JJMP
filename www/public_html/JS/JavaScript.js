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
            imagedownsizer.style.height = "150px";
            imagedownsizer.style.width = "150px";
        }

    }

    if (name == 'A') {
        var imagem = document.getElementById("imageA");
        //descrição Almeida
        labelaboutus.innerHTML = "João Almeida <br><br>Tenho 17 anos, comecei este projecto com os meus colegas graças ao clube de róbotica que foi hospedado pela escola secundária de Mafra José Saramago." +
            " <br><br>Fui um dos programadores principais, tentei trabalhar o maximo possivel em todos os componentes deste website, desde que comecei este projeto, tentei sempre alcançar mais longe e mais fundo" +
            "<br><br> Yah sou eu, a dora!" +
            "" +
            "<br><br><div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"40\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:40% ; height: 20px;\">\n" +
            "    40% HTML\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"50\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:50% ; height: 20px;\">\n" +
            "    50% CSS\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"60\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:60% ; height: 20px;\">\n" +
            "    60% JavaScript\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"70\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:70% ; height: 20px;\">\n" +
            "    70% PHP \n" +
            "  </div>\n" +
            "</div>"
        ;
        logo.src = "../../public_html/img/logo_jj.png";
    } else if (name == 'J') {
        var imagem = document.getElementById("imageJ");
        //descrição joão
        labelaboutus.innerHTML = "Joao"
            +
            "" +
            "<br><br><div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"40\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:40% ; height: 20px;\">\n" +
            "    40% HTML\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"50\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:50% ; height: 20px;\">\n" +
            "    50% CSS\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"60\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:60% ; height: 20px;\">\n" +
            "    60% JavaScript\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"70\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:70% ; height: 20px;\">\n" +
            "    70% PHP \n" +
            "  </div>\n" +
            "</div>"
        logo.src = "../../public_html/img/logo_j.png";

    } else if (name == 'M') {
        var imagem = document.getElementById("imageM");
        //descrição mia
        labelaboutus.innerHTML = "Sou a Maria ou Mia, tenho 18 anos, faço parte deste grupo da pap (bom dia mia).<br><br> Essencialmente prefiro hardware (prefiro dormir a hardware) mas também consigo trabalhar com software.(não consigo não)"
            +
            "" +
            "<br><br><div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"80\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:80% ; height: 20px;\">\n" +
            "    80% HTML\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"50\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:50% ; height: 20px;\">\n" +
            "    50% CSS\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"60\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:60% ; height: 20px;\">\n" +
            "    60% JavaScript\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"70\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:70% ; height: 20px;\">\n" +
            "    70% PHP \n" +
            "  </div>\n" +
            "</div>"
        logo.src = "../../public_html/img/logo_m.png";
    } else if (name == 'P') {
        var imagem = document.getElementById("imageP");
        //descrição Pedro
        labelaboutus.innerHTML = "Pedro"
            +
            "" +
            "<br><br><div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"40\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:40% ; height: 20px;\">\n" +
            "    40% HTML\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-info\" role=\"progressbar\" aria-valuenow=\"50\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:50% ; height: 20px;\">\n" +
            "    50% CSS\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-warning\" role=\"progressbar\" aria-valuenow=\"60\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:60% ; height: 20px;\">\n" +
            "    60% JavaScript\n" +
            "  </div>\n" +
            "</div>\n" +
            "<br>\n" +
            "<div class=\"progress\">\n" +
            "  <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"70\"\n" +
            "  aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:70% ; height: 20px;\">\n" +
            "    70% PHP \n" +
            "  </div>\n" +
            "</div>"
        logo.src = "../../public_html/img/logo_p.png";
    }

    var imagemcheck = imagem.style.width;
    if (imagemcheck == "150px") {
        imagem.style.height = "250px";
        imagem.style.width = "250px";
        console.log("add");


    }
    else if (imagemcheck == "250px") {

        imagem.style.height = "150px";
        imagem.style.width = "150px";
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

    console.log("hey");

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


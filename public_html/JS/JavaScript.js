function mostraDialogo(mensagem, tipo, tempo){

    // se houver outro alert desse sendo exibido, cancela essa requisição
    if($("#message").is(":visible")){
        return false;
    }

    // se não setar o tempo, o padrão é 3 segundos
    if(!tempo){
        var tempo = 3000;
    }

    // se não setar o tipo, o padrão é alert-info
    if(!tipo){
        var tipo = "info";
    }

    // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
    var cssMessage = "display: block; position: fixed; top: 0; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
    var cssInner = "margin: 0 auto; box-shadow: 1px 1px 5px black;";

    // monta o html da mensagem com Bootstrap
    var dialogo = "";
    dialogo += '<div id="message" style="'+cssMessage+'">';
    dialogo += '    <div class="alert alert-'+tipo+' alert-dismissable" style="'+cssInner+'">';
    dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
    dialogo +=          mensagem;
    dialogo += '    </div>';
    dialogo += '</div>';

    // adiciona ao body a mensagem com o efeito de fade
    $("body").append(dialogo);
    $("#message").hide();
    $("#message").fadeIn(200);

    // contador de tempo para a mensagem sumir
    setTimeout(function() {
        $('#message').fadeOut(300, function(){
            $(this).remove();
        });
    }, tempo); // milliseconds

}


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
        labelaboutus.innerHTML = "João Almeida, 18 anos <br><br>Comecei este projecto com os meus colegas graças ao clube de róbotica que foi hospedado pela escola secundária de Mafra José Saramago." +
            " <br><br>Fui um dos programadores principais, tentei trabalhar o máximo possível em todos os componentes deste website, desde que comecei este projeto, tentei sempre alcançar mais longe e mais fundo."


        ;
        logo.src = "public_html/img/logo_jj.png";
    } else if (name == 'J') {
        var imagem = document.getElementById("imageJ");
        //descrição joão
        labelaboutus.innerHTML = "João Marques, 17 anos<br><br> Tal como todos os meus colegas, faço parte deste grupo graças ao clube de robótica e às ideias semelhantes que todos tínhamos.<br><br> Prefiro especialmente programação e software a hardware."

            "</div>"
        logo.src = "public_html/img/logo_j.png";

    } else if (name == 'M') {
        var imagem = document.getElementById("imageM");
        //descrição mia
        labelaboutus.innerHTML = "Maria Saraiva, 19 anos <br><br> Juntei-me a este grupo pois todos nós fizemos parte do clube de robótica e achámos que seria uma boa ideia utilizar tudo o que aprendemos neste projeto.<br><br> Tenho mais facilidade na parte de hardware, mas também tento aprender um pouco mais de software e de programação com os meus colegas do grupo que me ajudam bastante nesse sentido."

        logo.src = "public_html/img/logo_m.png";
    } else if (name == 'P') {
        var imagem = document.getElementById("imageP");
        //descrição Pedro
        labelaboutus.innerHTML = "Pedro Grilo, 17 anos<br><br> Faço parte deste grupo desde o clube de robótica, trabalho tanto na parte de hardware, como de software e de imagem.<br><br> Neste projeto fui o principal promador da aplicação e do Arduino, fiz tanto o design do site como da montagem do regador.<br><br>Dei sempre o meu melhor e tentei sempre alcançar os meus objetivos."

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
        logo.src = "public_html/img/logo.png";

        labelaboutus.innerHTML = '<center> <h3>Contactos</h3>  <i class="far fa-envelope"></i><a href="mailto:jjmp@jjmp.com"><label style="margin-left: 10px">jjmp@jjmp.com</label></a><br> <i class="fas fa-phone"></i><label style="margin-left: 10px">+351 000 000 000</label></center>';

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


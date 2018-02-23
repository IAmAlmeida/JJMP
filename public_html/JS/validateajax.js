//Esta função faz uma conexão direta a outra página(pedrogats,checknick,checkpass). Vai validar todas as informações de registo tal como email, o nickname e a pass.
var request;
try {
    request= new XMLHttpRequest();
}
catch (tryMicrosoft) {
    try {
        request= new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (otherMicrosoft)
    {
        try {
            request= new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (failed) {
            request= null;
        }
    }
}

function validateemail() {

    var url= "resources/library/formsgateways/pedrogats.php";
    var emailaddress= document.getElementById("email").value;

    var vars= "email="+emailaddress;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("validateemail").innerHTML= return_data;
        }
    }
    request.send(vars);
}

function validatenick() {

    var url= "resources/library/formsgateways/checknick.php";
    var nick= document.getElementById("name").value;

    var vars= "name="+nick;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("validatenick").innerHTML= return_data;
        }
    }
    request.send(vars);
}

function validatepass() {

    var url= "../resources/library/formsgateways/checkpass.php";
    var pass= document.getElementById("pass").value;

    var vars= "pass="+pass;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("validatepass").innerHTML= return_data;
        }
    }
    request.send(vars);
}
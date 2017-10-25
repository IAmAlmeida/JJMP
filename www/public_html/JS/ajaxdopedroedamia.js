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

    var url= "../resources/gateway.php";
    var emailaddress= document.getElementById("emailvalid").value;

    var vars= "email="+emailaddress;
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("validate").innerHTML= return_data;
        }
    }
    request.send(vars);
}

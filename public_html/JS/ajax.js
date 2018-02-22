//Esta função faz uma conexão direta à página do forumR.
function btngetid(id) {

    var request;

    try {

        request = new XMLHttpRequest();

    } catch (tryMicrosoft) {


        try {

            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }


    var url = "../resources/library/formsgateways/forumR.php";
    var ID = id;
    var vars = "ID=" + ID;


    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var return_data = request.responseText;
            document.getElementById("labeltest").innerHTML = return_data;

        }
    };
    request.send(vars);
}


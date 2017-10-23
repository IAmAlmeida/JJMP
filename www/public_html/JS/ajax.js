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

    var url = "forumR.php";
    var vars = "id=" + id;
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
        }
    };

    request.send(vars);
}
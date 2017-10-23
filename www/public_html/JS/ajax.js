function btnidget(id) {
    console.log(id);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp. onreadystatechange = function () {
        if (this.readyState == 4 && this.status ==200) {

        }


    };
    xmlhttp.open("POST", "forum.php" );
    xmlhttp.send("id="+ id);
}

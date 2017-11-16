//Esta função verifica se a palavra passe é válida ou não. Caso a palavra passe tenha um certo numero de carateres, irá aparecer uma progressbar a mudar para medium ou Weak, ou Strong ou Very Strong, alterando a cor.


function authenticate() {

    var password = document.forms["Register"]["pass"].value;
    var confirmpassword = document.forms["Register"]["confirmpass"].value;

    if (password != confirmpassword) {
        alert("Passwords are not the same");
        return false;
    }else if (strength > "10%") {

    }else{
        alert("Password tem que ser no minimo 'Media'");
        return false;
    }
}

function repeatpass(){

    var password = document.forms["Register"]["pass"].value;
    var confirmpassword = document.forms["Register"]["confirmpass"].value;

    if(confirmpassword == "") {
        passvalid.innerHTML = '';
    }else if(confirmpassword!=password){
        passvalid.innerHTML = '<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"> </i></span>';

    }else
        passvalid.innerHTML = '<span style="color:green;"><i class="fa fa-check" aria-hidden="true"> </i></span>';


}

function checkpass(){

    var worst = 7,

        bad = /(?=.{8,}).*/,

        good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/,

        better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/,

        best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/,


        password = document.getElementById("pass").value;

    strength = 0;

    progressClass = 'progress-bar progress-bar-',

        $progressBarElement = $('#password-progress-bar');


    if (best.test(password) === true) {
        strength = '100%';
        progressClass += 'progress-bar bg-success';
        showmsg.innerHTML = '<td>Excelente</td>';
    } else if (better.test(password) === true) {
        strength = '80%';
        progressClass += 'progress-bar bg-info';
        showmsg.innerHTML = '<td>Boa</td>';
    } else if (good.test(password) === true) {
        strength = '50%';
        progressClass += 'progress-bar bg-warning';
        showmsg.innerHTML = '<td>Média</td>';
    } else if (bad.test(password) === true) {
        strength = '30%';
        progressClass += 'progress-bar bg-warning';
        showmsg.innerHTML = '<td>Média</td>';
    } else if (password.length >= 1 && password.length <= worst) {
        strength = '10%';
        progressClass += 'progress-bar bg-danger';
        showmsg.innerHTML = '<td>Fraca</td>';
    } else if (password.length < 1) {
        strength = '0';
        progressClass += 'progress-bar bg-danger';
        showmsg.innerHTML =  '';
    }

    $progressBarElement.removeClass().addClass(progressClass);
    $progressBarElement.attr('aria-valuenow', strength);
    $progressBarElement.css('width', strength);

}



function confirmvalidpassword(){

    var pass = document.getElementById("pass").value;
    var confirmpass=document.getElementById("confirmpass").value;
    passvalid = document.getElementById("passvalid");

    if(confirmpass == "") {
        passvalid.innerHTML = ''
    }else if(confirmpass!=pass){
        passvalid.innerHTML = '<span style="color:#ff0000;"><i class="fa fa-times" aria-hidden="true"> </i></span>'

    }else
        passvalid.innerHTML = '<span style="color:green;"><i class="fa fa-check" aria-hidden="true"> </i></span>'
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
        showmsg.innerHTML = '<td>Very Strong</td>';
    } else if (better.test(password) === true) {
        strength = '80%';
        progressClass += 'progress-bar bg-info';
        showmsg.innerHTML = '<td>Good</td>';
    } else if (good.test(password) === true) {
        strength = '50%';
        progressClass += 'progress-bar bg-warning';
        showmsg.innerHTML = '<td>Medium</td>';
    } else if (bad.test(password) === true) {
        strength = '30%';
        progressClass += 'progress-bar bg-warning';
        showmsg.innerHTML = '<td>Medium</td>';
    } else if (password.length >= 1 && password.length <= worst) {
        strength = '10%';
        progressClass += 'progress-bar bg-danger';
        showmsg.innerHTML = '<td>Weak</td>';
    } else if (password.length < 1) {
        strength = '0';
        progressClass += 'progress-bar bg-danger';
        showmsg.innerHTML =  '';
    }

    $progressBarElement.removeClass().addClass(progressClass);
    $progressBarElement.attr('aria-valuenow', strength);
    $progressBarElement.css('width', strength);

}

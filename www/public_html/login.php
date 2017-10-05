<?php

include("/../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");

?>

<form class="form-horizontal " name='authlogin' method="POST" ">
<?php



if (isset($_POST['login'])) {

    include 'logintest.php';
}

?>
<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-1" for="email">Email</label>
    <div class="col-sm-10 ">
        <input required type="email" name="email" value="" class="form-control "  id="emailvalid" placeholder="Enter email" onblur="" ;>

    </div>
</div>
<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-1 " for="pass">Password</label>
    <div class="col-sm-10">
        <input required type="password" oncopy="return false" oncut="return false" onpaste="return false"  class="form-control pwd" name="password" value="" id="pass" placeholder="Enter password"  onkeyup="javascript:checkpass(),confirmvalidpassword()"/>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 col-sm-3">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4 ">
        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
    </div>
</div>
</div>

</form>

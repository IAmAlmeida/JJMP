

<?php
session_abort();
session_start();


/*
    The important thing to realize is that the config file should be included in every
    page of your project, or at least any page you want access to these settings.
    This allows you to confidently use these settings throughout a project because
    if something changes such as your database credentials, or a path to a specific resource,
    you'll only need to update it here.
*/


/*
    I will usually place the following in a bootstrap file or some type of environment
    setup file (code that is run at the start of every page request), but they work
    just as well in your config file if it's in php (some alternatives to php are xml or ini files).
*/

/*
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "Paginator.php")
*/



$dbname = "jjmp";
$username ="root";
$password = "root";
$host = "localhost";
$servername =$_SERVER['SERVER_NAME'];

$jjmpconn = new mysqli($host, $username, $password, $dbname);
if ($jjmpconn->connect_error) {
    die(header("location:../install_bd.php")."Connection failed: " . $jjmpconn->connect_error );
}


defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

//Obter o url base do projecto
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
$tmpURL = dirname(__FILE__);
$tmpURL = str_replace(chr(92),'/',$tmpURL);
$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
$tmpURL = ltrim($tmpURL,'/');
$tmpURL = rtrim($tmpURL, '/');
if (strpos($tmpURL,'/')){
    $tmpURL = explode('/',$tmpURL);
    $tmpURL = $tmpURL[0];
}
if ($tmpURL !== $_SERVER['HTTP_HOST']){
    $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'';
}else{
    $base_url .= $tmpURL.'';
}
if ($_SERVER['SERVER_NAME'] == $servername){
    $base_url .= '/';
}

$baseUrl =  $base_url;



?>
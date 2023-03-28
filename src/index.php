<!-- die() Function Task -->
<h1>die()</h1>
<?php
$exist = "text.txt";
$not_exist = "font.txt";
if (file_exists($exist)){
    $file = fopen($exist,"r");
    echo "File Open Successfully";
}
else{
    die("Error : File do not found");
}
?>
<hr>

<!-- set_error_handler() TASK -->
<h1>set_error_handler()</h1>
<?php
function errorHandler($error_no,$error_str){
    echo "<b>Error:</b> $error_no $error_str";
}
set_error_handler("errorHandler");
echo $Fake_Var;
?>
<hr>

<!-- trigger_error() TASK -->
<h1>trigger_error()</h1>
<form action="#" method="get">
    <input type="text" name="test_case" placeholder="Enter Number">
    <input type="submit" value="Submit">
</form>
<?php
$trigger = $_GET["test_case"];
$reg = ('/[^0-9]/');
if (isset($_GET["test_case"])){
    if (preg_match($reg,$trigger)){
        trigger_error("Not An Integer Value");
    }
}
?>
<hr>

<!-- E_USER_WARNING TASK -->
<h1>E_USER_WARNING</h1>
<form action="#" method="get">
    <input type="number" name="warning" placeholder="Enter Number">
    <input type="submit" value="Submit">
</form>
<?php
$warning_val = $_GET['warning'];
function custom_err($error_no,$error_str){
    echo "<br><b>Warning:</b> $error_no $error_str";
}
set_error_handler("custom_err",E_USER_WARNING);
if ($warning_val>1){
    trigger_error("Value is greater than 1", E_USER_WARNING);
}
?>
<hr>

<!-- E_USER_NOTICE and E_USER_ERROR TASK -->
<h1>E_USER_NOTICE and E_USER_ERROR</h1>
<?php
function custom_error($error_no,$error_str){
    echo "<br><b>Warning:</b> $error_no $error_str";
}
function custom_notice($error_no,$error_str){
    echo "<br><b>Notice:</b> $error_no $error_str";
    
}
if (!file_exists("text.txt")){
    set_error_handler("custom_error",E_USER_ERROR);
    trigger_error("File Unavilable", E_USER_ERROR);
}else{
    set_error_handler("custom_notice",E_USER_NOTICE);
    trigger_error("File Open Sucessfully", E_USER_NOTICE);
}
?>
<hr>

<!-- Custom error TASK -->
<h1>Custom error</h1>
<a href='http://localhost:8080'>Home</a><br><br>
<a href='http://localhost:8080/myphpfile'>Error</a>
<hr>

<!-- error log TASK -->
<h1>error log</h1>
<a href="http://localhost:8080/my-error.log">Log File</a>
<?php
error_log("Error message\n", 3, "./my-error.log");
?>
<hr>

<!-- File Task -->
<h1>file</h1>
<?php
function errorHandlers($error_no,$error_str,$error_file,$error_line){
    echo "<b>Error:</b> <b>File Name:</b> $error_file <b>in Line:</b> $error_line";
}
set_error_handler("errorHandlers");
echo $Fake_Var;
?>
<hr>

<!-- error_get_last() TASK -->
<h1>error_get_last()</h1>
<?php
echo $nothing;
print_r(error_get_last());
?>
<hr>

<!-- Database logs TASK -->
<h1>Database logs</h1>
<?php
$host="mysql-server";
$uname="root";
$pwd="secret";
$db="new_data";

$conn=mysqli_connect($host,$uname,$pwd,$db);
$time = date("h:i:sa");
if ($conn){
    echo "Database Connection Successful";
}
else{
    error_log("$time Connection Error", 3, "./my-error.log");
}
?>
<hr>
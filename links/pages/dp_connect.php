<?php
// ** MySQL settings - You can get this info from your web host ** //
#MySQL hostname
$DB_HOST ='localhost';
#MySQL database username
$DB_USER = 'root';
#MySQL database password
$DB_PASSWORD = '12345';
#The name of the database
$DB_NAME ='links';
#MySQL database charset
$DB_CHARSET = 'utf8';
#Create connection
$conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
        mysqli_set_charset($conn,"$DB_CHARSET");
#Check connection
if(!$conn){
  echo mysqli_connect_error("Error:").mysqli_connect_errno();
}
#close database after page lode
function close_db(){
  global $conn;
  mysqli_close($conn);
}
define('DBINFO', 'mysql:host=localhost;dbname=links');
define('DBUSER','root');
define('DBPASS','12345');

function fetchAll($query){
    $con = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $con->query($query);
    return $stmt->fetchAll();
}
function performQuery($query){
    $con = new PDO(DBINFO, DBUSER, DBPASS);
    $stmt = $con->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
?>
<?php
    session_start();
?>
<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$email= $_POST["email"];
$password= $_POST["password"];

$sql = "";
$sql .= "SELECT * ";
$sql .= "FROM admins ";
$sql .= "WHERE ";
$sql .= "email='$email' ";
$sql .= "AND password='$password' ";

$va = $con->query($sql);
if($va->num_rows > 0){
    {
        session_start();
        while ($row = $va->fetch_assoc()){
            $_SESSION["email"] = $row["email"];
        }
    }
    header("Location: home_Ad.php");
} else {
    header("Location: login_admin.php?msg=error");

}

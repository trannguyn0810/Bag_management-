<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}

if (isset($_POST["id"]))
{
    $id = $_POST['id'];
    $bag_name = $_POST['bag_name'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $file = $_FILES['image'];
    $fileName = $file["bag_name"];
    $fileNameInfo = pathinfo($fileName);
    $fileNameEnd = $fileNameInfo["filename"]."_".date("Y_m_d_H_i_s").".".$fileNameInfo["extension"];

    $sql = "INSERT INTO bag(id,bag_name,color,price,size,quantity,description, image) VALUES
      ('$id','$bag_name','$color','$price','$size','$quantity','$description', '".$fileNameEnd."')";
    $fileUpload = "image_product/".$fileNameEnd;

    if (move_uploaded_file($file['tmp_name'], $fileUpload)) {
        echo "Upload Successfully<br>";
    } else {
        echo "Upload Failed<br>";
    }

    if($con->query($sql) === TRUE){
        echo "Insert Success";
    }else{
        echo "Insert Error<br>". $con->error;
    }
}
header("Location: index.php?page=bag.php");


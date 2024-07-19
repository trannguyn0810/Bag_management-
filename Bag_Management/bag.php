<?php

    require_once ("index_ConnectionInfo.php");
   $con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
        if($con->connect_error){
            die("Connection error");
        }

        if (isset($_GET["id"])){
            $Id=$_GET["id"];
            $sql= "DELETE FROM bag WHERE id=$Id";
            $con->query($sql);
        }

        $sql="SELECT * FROM bag;";
        $result=$con->query($sql);
?>

<h4 style="text-align: center">List Bag</h4>
<div class="container">
    <td><a href='index.php?page=insert_add_bag.php'><i class="fa-solid fa-circle-plus text-success"></i></a></td>
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
           <td>Id</td>
           <td>Bag Name</td>
           <td>Color</td>
           <td>Price</td>
           <td>Size</td>
           <td>Quantity</td>
           <td>Description</td>
           <td>Image</td>
           <td></td>
           <td></td>
          </tr>
        </thead>
        <tbody>
        <?php
           if($result->num_rows > 0){
               while($row=$result->fetch_assoc()){
                   echo"<tr>";

                   echo"<td class='table-primary'>".$row["id"]."</td>";
                   echo"<td class='table-success'>".$row["bag_name"]."</td>";
                   echo"<td class='table-success'>".$row["color"]."</td>";
                   echo"<td class='table-danger'>".$row["price"]."</td>";
                   echo"<td class='table-danger'>".$row["size"]."</td>";
                   echo"<td class='table-danger'>".$row["quantity"]."</td>";
                   echo"<td class='table-danger'>".$row["description"]."</td>";
                   echo"<td class='table-danger'><img src='image_product/".$row["image"]."' width='100' alt=''></td>";

                   echo"<td><a href='bag_delete.php?id=".$row["id"]."'><i class='fa-regular fa-trash-can text-danger'></i></a></td>";
                   echo"<td><a href='edit_add_bag.php?id=".$row["id"]."'><i class='fa-regular fa-pen-to-square'></i></a></td>";

                   echo"<tr>";
               }
           }
        ?>
        </tbody>
    </table>

</div>

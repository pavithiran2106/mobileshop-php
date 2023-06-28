<?php
require('connection.php');

if (!isset($_SESSION))
{
   session_start(); 
}
if(empty($_SESSION['cus_id'])){
 
    echo"<script> alert('please login and check')</script>";
    echo"<script> location.assign('login.php');</script>";
}


if (isset($_POST['add']))
 {
  $id = $_POST['id'];
  $qty = $_POST['qty'];

  $sql="SELECT * FROM `cart` WHERE customberID='$_SESSION[cus_id]' AND product_id='$id'";
  $result=mysqli_query($conn,$sql);

  if($result->num_rows > 0)
  {
    echo"<script> alert('you already add this item!')</script>";
    echo"<script> location.assign('cart.php');</script>";

  }
  else{

    $sql1="SELECT * FROM `mobiles` WHERE id='$id'";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_array($result1);
    $name=$row['name'];
    $price=$row['price'];
    $img=$row['img'];
    $tprice= ($price*$qty);

    $sql2="INSERT INTO `cart`(`productName`,`image`, `customberID`, `price`, `product_id`,totalprice, `Quantity`) VALUES ('$name','$img','$_SESSION[cus_id]','$price','$id','$tprice','$qty')";
    if ($conn->query($sql2) === TRUE) {
        echo"<script> alert('successfully added this item!')</script>";
        echo"<script> location.assign('cart.php');</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }
 
 }
 ?>
  <?php
   
   // include header.php file
   include ('header.php');
?>

<!-- Header -->
<?php
  
   // include header.php file
   include ('Nav.php');
?>


 <!-- Footer -->
<?php
// include footer.php file
include ('Footer.php');
?>
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
if (isset($_POST['save']))
{

    $grand_totall=0;
    $allItems='';
    $items= array();

    $sql="SELECT CONCAT(productName,'(',Quantity,')') AS ItemQty,totalprice From cart WHERE customberID='$_SESSION[cus_id]'";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_totall +=$row['totalprice'];
        $items[]=$row['ItemQty'];

    }
   
    $allItems=implode(",",$items);
   

    $name=$_POST['name'];
    $phone=$_POST['contact'];
    $payment=$_POST['payment'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    $sql1="INSERT INTO `orders`(`product_and_qty`, `total_price`, `customer_name`, `customer_address`, `email`, `customer_phone_no`, `payment`, `customerid`) VALUES ('$allItems','$grand_totall','$name','$address','$email','$phone','$payment','$_SESSION[cus_id]')";
    if ($conn->query($sql1) === TRUE) {
        echo "<script>alert('successfully ordered wait for the admin response')</script>";

        $sql2="DELETE FROM `cart` WHERE customberID='$_SESSION[cus_id]'";
        if ($conn->query($sql2) === TRUE) {
            echo"<script> location.assign('orders.php');</script>";
        }
        else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
          }
      } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
      }
      
}
?>
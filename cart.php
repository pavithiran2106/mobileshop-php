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
  
  $query ="SELECT * FROM `cart`";  
  $result = mysqli_query($conn, $query); 
  if(isset($_GET['id']))
 {
  $id = $_GET['id'];
  $sql="DELETE FROM `cart` WHERE product_id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo"<script> alert('successfully deleted this item from cart!')</script>";
        echo"<script> location.assign('cart.php');</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/> 
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            .fa-color{
                color:red;
            }
        </style>
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container p-5 my-5">  
                <h3 align="center">Products</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th>ProductName</th>  
                                    <th>Price</th>  
                                    <th>Quantity</th>  
                                    <th>Potalprice</th>  
                                    <th>Action</th> 

                               </tr>  
                          </thead>  
                          <?php  
                          $total=0;
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr> 
                                    <td>'.$row["productName"].'</td>  
                                    <td>'.$row["price"].'</td>  
                                    <td>'.$row["Quantity"].'</td>  
                                    <td>'.$row["totalprice"].'</td>  
                                    <td>'.'<a href="cart.php?id=' . $row['product_id'] . '"><i class="fas fa-trash-alt fa-color"></i></a>'.'</td>  
                                </tr>
                             
                               ';  
                               $total+=$row["totalprice"];
                          }  
                       
                          ?>  
                     </table>  
                    <div>
                            <h2>TotalPrice:<span>Rs.<?php echo $total;?>.00</span></h2>
                            <?php
                            if($total>0)
                            {
                                echo' <a href="checkout.php" class="btn btn-primary">Confirm Order</a>';
                            }
                            ?>
                    </div>
                </div>  
           </div>  
            <br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br>
           <p></p>
           <p></p>
           <p></p>
           <br>
           <br><br><br><br><br>
           
        </div>
    </body>
</html>
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  

 <!-- Footer -->
<?php
// include footer.php file
include ('Footer.php');
?>
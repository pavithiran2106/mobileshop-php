<?php
require('connection.php');

if (!isset($_SESSION))
{
   session_start(); 
}
if(empty($_SESSION['admin_id'])){
 
    echo"<script> alert('please login and check')</script>";
    echo"<script> location.assign('index.php');</script>";
}

  $query ="SELECT * FROM `orders` WHERE state='pending'";  
  $result = mysqli_query($conn, $query); 
?>
<?php
require('connection.php');

if(isset($_GET['id']))
 {

 $id = $_GET['id'];  
 $sql ="UPDATE `orders` SET `state`='accepted' WHERE id='$id'";
 if ($conn->query($sql) === TRUE) 
 {
    echo"<script> alert('Successfully accepted!')</script>";
    echo"<script>  window.location.assign('home.php')</script>";

}
else 
{
    echo"<script> alert('same problem!')</script>";
    echo"<script>  window.location.assign('home.php')</script>";
} 

}

if(isset($_GET['id1']))
 {

 $id = $_GET['id1'];  
 $sql ="UPDATE `orders` SET `state`='rejected' WHERE id='$id'";
 if ($conn->query($sql) === TRUE) 
 {
    echo"<script> alert('Successfully rejected!')</script>";
    echo"<script>  window.location.assign('home.php')</script>";

}
else 
{
    echo"<script> alert('same problem!')</script>";
    echo"<script>  window.location.assign('home.php')</script>";
}     
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Admin|Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/> 
      
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
       
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/style.css" type="text/css">
        
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

           <style>
               .fa-color{
    color:green;
}
.fa-color1{
    color:red;
}
            </style>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <!---A_Nav--->
              <?php
                require 'A_Nav.php';
            ?>
            
            <div class="container">  
                <h3 align="center">New Orders</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th>#</th>
                                    <th>Product&qty</th>
                                    <th>TotalPrice</th>
                                    <th>customer Name</th>
                                    <th>customer Address</th>
                                    <th>customer phoneno</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                               </tr>  
                          </thead>  
                          <?php  
                            $cnt=1;
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr> 
                                    <td>'.$cnt.'</td>  
                                    <td>'.$row['product_and_qty'].'</td>  
                                    <td>Rs.'.$row['total_price'].'.00</td>  
                                    <td>'.$row['customer_name'].'</td> 
                                    <td>'.$row['customer_address'].'</td> 
                                    <td>'.$row['customer_phone_no'].'</td> 
                                    <td>'.$row['payment'].'</td>  
                                    <td><a href="home.php?id=' . $row['id'] . '"><i class="fa fa-check fa-2x fa-color" aria-hidden="true"></i></a>&nbsp;<a href="home.php?id1=' . $row['id'] . '"><i class="fa fa-times fa-2x fa-color1" aria-hidden="true"></i></a></td> 
                                </tr>
                             
                               ';  
                                $cnt=$cnt+1;
                          }  
                       
                          ?>  
                     </table>
                </div>  
           </div>  
            <br><br><br><br><br><br><br><br>
           
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
include ('A_Footer.php');
?>
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
  
  $sql="SELECT * FROM `users` WHERE id='$_SESSION[cus_id]'";
  $res=$conn->query($sql);
  $row=$res->fetch_assoc();
  ; 

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>parts Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/> 
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
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Checkout Form</h3>
                            </div>
                            <div class="panel-body">
                                <p>Billing Address</p>
                                <form method="post" action="saveorders.php">
                                <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name"  pattern="[A-Za-z]{0,20}" value="<?= $row['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $row['email'] ?>" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" placeholder="Contact" value="<?= $row['contact'] ?>"  pattern="[0-9]{10}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?= $row['address'] ?>" pattern="[A-Za-z0-9./,]{0,50}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="payment"  value="cash on delivery "pattern="[A-Za-z0-9./,]{0,50}" required readonly>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Continue to checkout" name="save">
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <br><br><br><br><br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy <a href="admin/">star mobile shop</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by pavithiran</p>
               </center>
               
               </div>
           </footer>
        </div>
    </body>
</html>
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


?>

            <!-- Header -->
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
        <title>Mobile shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
       
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
           <!---
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Bike Parts Store!</h1>
                    <p>We have the best Bike Parts for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>-->


            <?php
    require('connection.php');
    $sql="SELECT * FROM `mobiles`";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
     
     echo'       <div class="container p-5 my-5">
                <div class="row">';
                while($row=$res->fetch_assoc())
                {

                echo'
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="admin/img/'. $row['img'] .'" alt="">
                            </a>
                            <center>
                            <form action="addcart.php" method="post">
                                <div class="caption">
                                    <h3>'. $row['name'] .'</h3>
                                    <p>Price: Rs. '. $row['price'] .'.00</p>
                                    <p><input type="number" min="1" max="1000" value="1" name="qty" id="qty"></p>
                                    <input type="hidden" class="pprice" name="id" id="id" value="'. $row['id'] .'">
                                    <button type="submit"class="btn btn-block btn-primary" name="add">add to cart</button>
                                    </form>
                                </div>
                            </center>
                        </div>
                    </div>';}}?>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
            <br><br><br><br><br>
           <p></p>
           <p></p>
           <p></p>
           <br>
           <br><br><br><br><br>
         
        </div>
    </body>
</html>
<!-- Footer -->
<?php
// include footer.php file
include ('Footer.php');
?>  


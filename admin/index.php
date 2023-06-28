<?php
 session_start();
 require('connection.php');

if (isset($_POST['login'])) 
{
$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM `admin` WHERE username='$email'";
$result=mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);

if($count==1)
{
$sql1="SELECT * FROM `admin` WHERE username='$email' AND password='$password'";
$result1=mysqli_query($conn, $sql1);
$count1=mysqli_num_rows($result1);
    if($count1==1)
    {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $user['id'];
        header("location:home.php");
    }
    else{
        echo"<script> alert('you entered wrong  password ')</script>";
        echo"<script> location.assign('index.php');</script>";
    }
 }
 else
{
 echo"<script> alert('you entered wrong email ')</script>";
 echo"<script> location.assign('index.php');</script>";
 }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Admin|Mobile Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">

        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>

        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
       
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <br><br><br>
           <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Admin</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login</p>
                                <form method="post" action="index.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary" name="login">
                                    </div>

                                    </div>
                            <div class="panel-footer">Don't have an account ? <a href="home.php">Register</a></div>
                        </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <br><br><br><br><br>
           
        </div>
    </body>
</html>

<!-- Footer -->
<?php
// include footer.php file
include ('A_Footer.php');
?>
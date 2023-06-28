<?php
require('connection.php');
if (isset($_POST['register']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $tel=$_POST['contact'];

    $sql="SELECT * FROM `users` WHERE email='$email'";
    $result=mysqli_query($conn, $sql);
      if($result->num_rows > 0)
      {
        echo"<script> alert('you already registered!')</script>";
        echo"<script> location.assign('login.php');</script>";

      }
      else
      {
        if($password==$cpassword)
        {
          $query="INSERT INTO `users`(`name`, `email`, `password`, `contact`,`address`) VALUES ('$name','$email','$password','$tel','$address')";
               if ($conn->query($query) === TRUE) 
               {
                echo"<script> alert('successfully registered!')</script>";
                echo"<script> location.assign('login.php');</script>";
                }
        }
        else
        {
          echo"<script> alert('Password not match!')</script>";
          echo"<script> location.assign('signup.php');</script>";
        }
                
      }
}
?>

    <body>
        <div>
            <?php
                require 'header.php';
            ?>
             <?php
                require 'Nav.php';
            ?>
            <br><br>
            <div class="container-flex">
                <div class="row">
                    <div class="col-xs-5 col-xxs-offset-3">
                        <h1><b>SIGN UP</b></h1>
                        <form method="post" action="signup.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name"  pattern="[A-Za-z]{0,20}" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="cpassword" placeholder="Retype Password(min. 6 characters)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="contact" placeholder="Contact"  pattern="[0-9]{10}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Address" pattern="[A-Za-z0-9./,]{0,50}" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Sign Up" name="register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
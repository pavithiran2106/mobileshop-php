<?php
require('connection.php');

if (!isset($_SESSION))
{
   session_start(); 
}
if(empty($_SESSION['admin_id'])){
 
    echo"<script> alert('please login and check')</script>";
    echo"<script> location.assign('login.php');</script>";
}

  $query ="SELECT * FROM `mobiles`";  
  $result = mysqli_query($conn, $query); 
?>
<?php
//delete orders from database
if(isset($_GET['id']))
 {
require('connection.php');
 $id = $_GET['id'];  
 $sql ="DELETE FROM `mobiles` WHERE id='$id'";
 if ($conn->query($sql) === TRUE) 
 {
    echo"<script> alert('Successfully Deleted!')</script>";
    echo"<script>  window.location.assign('manageparts.php')</script>";

}
else 
{
    echo"<script> alert(' NOT Successfully Deleted!')</script>";
    echo"<script>  window.location.assign('manageparts.php')</script>";
}     
}
?>
<?php
//insert burger
require('connection.php');
if (isset($_POST['submit'])) 
{

    $name=$_POST['name'];
    $price=$_POST['price'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];    
    $folder = "img/".$filename;
    move_uploaded_file($tempname, $folder);

    $sql1="SELECT * FROM `mobiles` WHERE name='$name'";
    $result=mysqli_query($conn, $sql1);
   if ($result->num_rows > 0)
    {
    echo"<script> alert('You Already Added This part!')</script>";
    echo"<script>  window.location.assign('manageparts.php')</script>";
    }
    else
    {
        
    $sql = "INSERT INTO `mobiles`( `name`, `price`, `img`) VALUES ('$name','$price','$filename')";
    $result1=mysqli_query($conn, $sql);
    echo"<script> alert('Successfully Added New Part!')</script>";
    echo"<script>  window.location.assign('manageparts.php')</script>";

    }
 
}
  
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>star mobiles</title>
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
    color:red;
}
#add{
    position: relative;
    left: 1060px;
    top: 50px;
}

            </style>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <br>
            <div class="container">


  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="add">ADD Mobiles</button>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
   
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD mobiles</h4>
        </div>
        <div class="modal-body">
        <form action="manageparts.php" method="post"  enctype="multipart/form-data">
        <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" name="name" pattern="[a-zA-Z0-9\s,.]+{0,500}" required>
        </div>

        <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price"  pattern="[0-9]{0,20}" required>
        </div>
        <div class="form-group">
                <label for="image">image:</label>
                <input type="file" name="image" class="form-control" required="required">
        </div>
  
  
  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
        


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

            <div class="container">  
                <h3 align="center">mobiles</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Price</th>
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
                                    <td>'.$row['name'].'</td>  
                                    <td>Rs.'.$row['price'].'.00</td>   
                                    <td><a href="manageparts.php?id=' . $row['id'] . '"><i class="fas fa-trash-alt fa-color"></i></a></td> 
                                </tr>
                             
                               ';  
                                $cnt=$cnt+1;
                          }  
                       
                          ?>  
                     </table>
                </div>  
           </div>  
           
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy <a href="admin/">star mobiles</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by Pavi</p>
               </center>
               
               </div>
           </footer>
        </div>
    </body>
</html>
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
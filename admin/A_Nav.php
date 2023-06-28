<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand">Mobile Shop</a>
                      
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['cus_id'])){
                           ?>
                           <li><a href="manageparts.php"><span class="glyphicon glyphicon-cog"></span> Manage Mobiles</a></li>
                           <li><a href="Home.php"><span class="glyphicon glyphicon-shopping-cart"></span> Home</a></li>
                           <li><a href="aceptedorders.php"><span class="glyphicon glyphicon-cog"></span> Accepted Orders</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="manageparts.php"><span class="glyphicon glyphicon-cog"></span> Manage Mobiles</a></li>
                            <li><a href="home.php"><span class="glyphicon glyphicon-user"></span> Home</a></li>
                        
                           <li><a href="aceptedorders.php"><span class="glyphicon glyphicon-cog"></span> Accepted Orders</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>
<?php
    session_start();
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



    </head>
    <body>
        <div>
            <!----
            <div class="container p-3 my-3 bg-primary text-white pt-3">
            
                
                    <h1>What if the mobile revolution is just beginning?</h1>
                    <p>

“What if the next mobile revolution is all about real-world and context-driven experiences — individual needs that are taken care of through mobile, making our lives easier and more seamless?”</p>
                </div>
            </div>

-->


            <div class="container" id="back">
                <div class="content">
               
                    <div class="images">
                        <img  id="a"src="image/iphone-13-pro-review-dan-baker-40.jpg">
                        
                     
                    </div>
                </div>

            </div>
            <br>
            <br>
            
         
                    
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

        <script>
      var indexValue = 0;
      function slideShow(){
        setTimeout(slideShow, 2500);
        var x;
        const img = document.querySelectorAll("#a");
        for(x = 0; x < img.length; x++){
          img[x].style.display = "none";
        }
        indexValue++;
        if(indexValue > img.length){indexValue = 1}
        img[indexValue -1].style.display = "block";
      }
      slideShow();
    </script>
    </body>
</html>


<!-- Footer -->
<?php
// include footer.php file
include ('Footer.php');
?>
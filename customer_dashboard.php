<?php
session_start();
include 'dbcon.php';
$email = $_SESSION['email'];
$sql3 = "SELECT * FROM add_to_cart WHERE email = '$email'";
$result1 = mysqli_query($conn, $sql3);
$row_count = mysqli_num_rows($result1);
$_SESSION['row_count'] = $row_count;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Farm-To-Fork | Customer Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'includes/stylesheets.php'; ?>
    <style type="text/css">
        .white{
            color: black;
            padding-left: 100px;
            text-shadow: 2px 0 0 #fff;
        }
        .white a{
            color: black;
        }
    </style>
  </head>
<body class="goto-here" style="font: courier new">
    <div align="padding-left" id="google_translate_element"> </div>  
      
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
    <div class="py-1 bg-primary">
      <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><a href="tel:+91 9220592205"><span class="icon-phone2"></span></div>
                <span class="text">+91 7700027264</span></a>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><a href="mailto:qwerty.sih2020@email.com"><span class="icon-paper-plane"></span></div>
                <span class="text">qwerty.sih2020@email.com</span></a>
              </div>
              <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                <span class="text">We want you to get the best price for your produce </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">FARM-TO-FORK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.html" class="nav-link"><b>Home</b></a></li>
            
            <li class="nav-item"><a href="customer_dashboard.php" class="nav-link"><b>Vegetables</b></a></li>
            <li class="nav-item"><a href="customer_orders.php" class="nav-link"><b>My Orders</b></a></li>
            <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[  
                <?php
                    echo $_SESSION['row_count']; 
                ?>  
                ]</a></li>
              <div align="center" class="white" style=" padding: 10px; height: auto;width: auto;">
              <i class="fa fa-user-circle-o" style="font-size:36px"></i><p>Email&nbsp:&nbsp<?php echo $_SESSION['email']; ?></p>
              <a href="customer_session_logout.php">logout</a>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/download-2-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Onion" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 63/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/tomato.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Tomato" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 33/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
       <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- Capsicum container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/caps.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Capsicum" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 41/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Capsicum container ------------------>
        
     

          
         
          

        <!--------------- Cucumber container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/cucumber-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Cucumber" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 44/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Cucumber container ------------------>
        </div>
      </div>
     </section> 

     <!--------------- Potato container ------------------>
     <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/aloo-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Potato" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 37/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Potato container ------------------>
        
     

          
         
          

        <!--------------- Cauliflower container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/cauliflower-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Cauliflower" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 82/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Cauliflower container ------------------>
        </div>
      </div>
     </section> 

     <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- Chilli container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/green-chilly-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Green Chilli" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 68/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Chilli container ------------------>
        
     

          
         
          

        <!--------------- rhilly container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/product-12.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Red Chilli" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 126/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- Chilli container ------------------>
        </div>
      </div>
     </section> 

     <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- Broccoli container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/broccolli.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Broccoli" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 100/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- broccoli container ------------------>
        
     

          
         
          

        <!--------------- Spinach container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/spinach-1-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Spinach" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 77/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

      <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/peas-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Peas" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 60/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/product-4.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Cabbage" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 92/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
        <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/ek-aur-gajar-min.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Carrots" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 85/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/beet.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Beetroot" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 54/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
       <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/lettuce.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Lettuce" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 70/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/okra.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Okra" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 60/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
       <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/product-11.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Garlic" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 262/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/ginger.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Ginger" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 120/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
        <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/brinjal.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Brinjal" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 70/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>

          <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/coriander.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Coriander " class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 45/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- tomato container ------------------>
        </div>
      </div>
     </section> 

     
      
        <section class="ftco-section contact-section ">
      <div class="container">
        <div class="row block-9">    

        <!--------------- onion container ------------------>
        <div class="col-md-6 d-flex">
            <form action="onion.php" method="post" class="bg-white p-5 contact-form">

    
              <div align="center">
                <img src="images/category-1.jpg" height="200" width="250"> 
              </div>


              <div class="form-group">
                <div align="center">
                    <div class="col-md-4">
                    <input type="text" name="name" value="Test" class="form-control" required="Tomato" style="border: none; font-size: 17px; font-style: bold" readonly>
                </div>
                </div>
              </div>

              <div class="form-group">
                <div align="center">
                    <label><h4>Price : </label><label>
                        
                    </label><label> Rs. 1/- per kg</h4></label>
                </div>
              </div> 

            <div class="form-group">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <div align="center">
                            <h4>Quantity</h4>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="quantity" placeholder="quantity(in kgs)*" class="form-control">                
                        </div>
                    </div>                    
                </div>
              </div>            

              <div class="form-group">
                <div align="center">
                  <input type="submit" value="Add to cart" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </form>
           </div>  
        <!--------------- onion container ------------------>
        
     

          
         
          

        <!--------------- tomato container ------------------>


        <!--------------- tomato container ------------------>
       
     </section> 


<footer class="ftco-footer ftco-section " >
    <div class="container">
      <div align="center">
        <p>Copyright @2020 Team Qwerty . All Rights Reserved.</p>
      </div>
    </div>
    </footer>    


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$order_id = uniqid(O);
$_SESSION['order_id'] = $order_id;
?>

<?php
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
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .white{
            color: black;
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
            <li class="nav-item">  
            <div align="center" class="white">
            <p>Email&nbsp:&nbsp<?php echo $_SESSION['email']; ?></p>
            <a href="courier_session_logout.php">logout</a>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
              <?php
              include 'dbcon.php';
              $email = $_SESSION['email'];
              $sql = "SELECT * FROM add_to_cart WHERE email = '$email'";
              $result = mysqli_query($conn, $sql);

	    				echo "<table class='table'>";
						    echo "<thead class='thead-primary'>";
						      echo "<tr class='text-center'>";
						      echo "<th>Product name</th>";
						        echo "<th>Price</th>";
						        echo "<th>Quantity (in kgs)</th>";
						        echo "<th>Total</th>";
						      echo "</tr>";
						    echo "</thead>";
						    echo "<tbody>";

              while($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>" .$row['v_name']. "</td>";
                echo "<td>" .$row['v_price']. "</td>";
                echo "<td>" .$row['quantity']. "</td>";
                echo "<td>" .$row['total']. "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
              ?>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3><b>Payment Details</b></h3>
  						<form action="pgRedirect.php" method="post" class="info">
	              			<div class="form-group">
	              				<label><b><h6>Order ID :</h6></b></label>
	                			<input type="text" id="ORDER_ID" name="ORDER_ID" style="border: none"  value="<?php echo $_SESSION['order_id']; ?>" readonly>
	             			 </div>

	              			<div class="form-group">
	              				<label><b><h6>Customer ID :</h6></b></label>
	                			<input type="text" id="CUST_ID" name="CUST_ID" style="border: none"  value="<?php echo $_SESSION['customer_id']; ?>" readonly>
	              			</div>

	              			<div class="form-group">
	              				<label><b><h6>Industry ID :</h6></b></label>
	                			<input type="text" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" style="border: none"  value="Retail" readonly>
	              			</div>

	              			<div class="form-group">
	              				<label><b><h6>Channel ID :</h6></b></label>
	                			<input type="text" id="CHANNEL_ID" name="CHANNEL_ID" style="border: none"  value="WEB" readonly>
	              			</div>	              	              
    					</div>
    				</div>

    				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    					<div class="cart-total mb-3">
	              			<div class="form-group">
	              				<label><h3><b>Delivery Address</b></h3></label>
	                			<textarea name="delivery_address" rows="5" cols="3" class="form-control text-left px-3" placeholder="" required></textarea>
	              			</div>
    					</div>
    				</div>


    				<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    					<div class="cart-total mb-3">
    						<h3><b>Cart Totals</b></h3>
    						<p class="d-flex">
    							<span>Subtotal : </span>
    							<span>
    								<?php
    								include 'php/subtotal.php';
    								echo $_SESSION['subtotal'];
    								?>
    							</span>
    						</p>

    						<p class="d-flex">
    							<span>Delivery</span>
    							<span><?php echo $_SESSION['delivery_fee']; ?></span>
    						</p>
    						<hr>
    						<p class="d-flex total-price">
    							<span>Total</span>
    							<span><input align="text-center" style="border: none" type="text" name="TXN_AMOUNT" value ="<?php echo $_SESSION['grand_total']; ?>" size="1.5" readonly></span>
    						</p>
    					</div>
    					<p><input type="submit" value="Proceed to Payment" class="btn btn-primary py-3 px-4"></p>
    				</div>
    			</form>
    			</div>
			</div>
		</section>

<footer class="ftco-footer ftco-section " >
    <div class="container">
      <div align="center">
        <p>Copyright @2020 Team Qwerty . All Rights Reserved.</p>
      </div>
    </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
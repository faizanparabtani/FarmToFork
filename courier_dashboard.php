<?php 
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Farm-To-Fork | Courier Dashboard | All Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include 'includes/stylesheets.php';
    ?>
    <style type="text/css">
        .white{
            color: black;
            padding-left: 100px;
            text-shadow: 2px 0 0 #fff;
        }
        .white a{
            color: black;
        }

        .black{
        	color: black;
        }

        .black input{
        	color: black;
        	size: 20;
        	border: none;
        }

        .content{
  			font-size: 20px;
 			font-family: serif;
  			font-style: italic;
  			width: 100%;
  			padding: 15px;
  			box-shadow: 5px 5px 5px grey;
  			height: auto;
  			text-align: center;
  			border-radius: 50px; 
        }

        .click{
          float: center;
          color: black;
          background-color: white;
          font-family: serif;
          font-style: bold;
          size: 200px;
          border-color: white;
          font-size: 24px;
          display: inline-block;
          margin: 4px 2px;
          cursor: pointer;
          text-align: center;
          box-shadow: 0 12px 16px 0 #d9d9d9, 0 17px 50px 0 #d9d9d9;
        }
        .click:hover
        {
          color: #009900 ;         

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
            
            <li class="nav-item"><a href="courier_dashboard.php" class="nav-link"><b>New Order</b></a></li>
            <li class="nav-item"><a href="courier_pending_orders.php" class="nav-link"><b>Pending Order</b></a></li>
            <li class="nav-item"><a href="courier_completed_orders.php" class="nav-link"><b>Delivered Order</b></a></li>
            <li>
              <div align="center" class="white" style=" padding: 10px; height: auto;width: auto;">
              <i class="fa fa-user-circle-o" style="font-size:36px"></i><p>Email&nbsp:&nbsp<?php echo $_SESSION['email']; ?></p>
              <a href="courier_session_logout.php">logout</a>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- END nav -->

<div class="container">
<div class="black" align = 'center'>
	<br><br>
	<h2><b>All Orders</b></h2><br><br>
<?php
error_reporting(E_ALL & ~E_WARNING);
include 'dbcon.php';
$values = '(';
$sql1 = "SELECT order_id FROM orders_in_process";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
	$values = $values."'".$row1['order_id']."' ,";
}
$values = $values."'' )";

$sql = "SELECT * FROM customer_order_details WHERE order_id NOT IN".$values;
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_array($result)){

	//first row data
	echo "<div class='content'>";
	echo "<div class='col-md-12'>";
	echo "<div class='row'>";
	echo "<div class='col-md-4'>";	
	echo "<p><b>Order ID :</b>".$row[order_id]."</p>";
	echo "</div>";
	echo "<div class='col-md-4'>";
	echo "<p><b>Customer ID :</b> ".$row[customer_id]."</p>";
	echo "</div>";
	echo "<div class='col-md-4'>";
	echo "<p><b>Vegetable List :</b><br>".$row[vegetable_list]."</p>";
	echo "</div>";echo "</div>";echo "</div>";
	//first row data

	//second row data
	echo "<div class='col-md-12'>";
	echo "<div class='row'>";
	echo "<div class='col-md-4'>";
	echo "<p><b>Total Quantity : </b>".$row['total_quantity']." kg</p>";
	echo "</div>";
	echo "<div class='col-md-4'>";	
	echo "<p><b>Grand Total : </b>Rs. ".$row['grand_total']." /-</p>";
	echo "</div>";echo "</div>";echo "</div>";echo "<br>";
	//second row data

	//third row data
	echo "<div class='col-md-12'>";
	echo "<div class='row'>";
	echo "<div class='col-md-9'>";
	echo "<p><b>Delivery Address : </b>".$row['delivery_address']."</p>";
	echo "</div>";
	echo "<div class='col-md-3'>";
	echo "<p><a href='add_new_order.php?order_id=".$row['order_id']."'><button>Accept Order</button></a></p>";
	echo "</div>"; echo "</div>"; echo "</div>";	
	echo "</div>";
	echo "<br>";
	echo "<br>";
	//third row data		
}

?>
</div>
</div>


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
  <script src="js/Startup.js"></script>
    
  </body>
</html>

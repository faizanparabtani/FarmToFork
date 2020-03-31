<?php 
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Farm-To-Fork | Courier Dashboard | Pending Orders</title>
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


<div class="black" align = 'center'>
	<br><br>
	<h2><b>Completed Orders</b></h2><br><br>
<?php
	include 'dbcon.php';
  $email = $_SESSION['email'];
  $sql1 = "SELECT * FROM courier_login WHERE email = '$email'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);
  $courier_id = $row1['courier_id'];


	$sql = "SELECT * FROM courier_completed_orders WHERE courier_id = '$courier_id'";
	$result = mysqli_query($conn, $sql);
	echo "<table class='table'>";
	echo "<thead class='thead-primary'>";
	echo "<tr class='text-center'>";
	echo "<th>Order ID</th>";
		echo "<th>Courier ID</th>";
		echo "<th>Vegetable List</th>";
		echo "<th>Total Quantity</th>";
		echo "<th>Grand Total</th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

              while($row = mysqli_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>" .$row['order_id']. "</td>";
                echo "<td>" .$row['courier_id']. "</td>";
                echo "<td>" .$row['vegetable_list']. "</td>";
                echo "<td>" .$row['total_quantity']. "</td>";
                echo "<td>" .$row['grand_total']. "</td>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";             
?>

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

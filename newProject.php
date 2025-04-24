<?php
session_start();
$pass = isset($_SESSION['passLogin']) ? $_SESSION['passLogin'] : '';
if ($pass == 'true')
{?>

<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Financial Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body style="height: 100%">


  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="background-header header-sticky"
  style="z-index: 1000;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Projects</a></li>
                        <li><a href="index.php">Employees</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
    
  </header>
  <!-- ***** Header Area End ***** -->

  <script>
    function onButtonClick(clsName){
      if (document.getElementById(clsName).className=="show")
      {
        document.getElementById(clsName).className="hide";
      }
      else
      {
        document.getElementById(clsName).className="show";
      }
    }
  </script>
   
  <style>
    h6 {
      color: grey; 
      font-family: 'Century Gothic';
      margin: 10px 0px;
    }
  </style>

  <form name="form" action="writeProject.php" method="POST">
    <div class="amazing-deals" style="background-color: white!important;margin-top: 85px">
      <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Name: 
        <input type="text" id="NAME OF CLIENT" name="NAME OF CLIENT" /></h6>
      </div>
      <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Wattage: 
        <input type="text" id="KW" name="KW" /></h6>
      </div>
      <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Status: 
        <select name="STATUS" id="STATUS">
          <option value="1 - SITE VISIT">1 - SITE VISIT</option>
          <option value="2- DESIGN PREPARED">2- DESIGN PREPARED</option>
          <option value="3 - DESIGN APPROVED">3 - DESIGN APPROVED</option>
          <option value="4 - STRUCTURE ORDER">4 - STRUCTURE ORDER</option>
          <option value="5 - BOM PREPARED">5 - BOM PREPARED</option>
          <option value="6 - EARTHING PURCHASE">6 - EARTHING PURCHASE</option>
          <option value="7 - CIVIL PURCHASE">7 - CIVIL PURCHASE</option>
          <option value="8 - BOM 2 PUR">8 - BOM 2 PUR</option>
          <option value="9 - STRUCTURE INST CHK">9 - STRUCTURE INST CHK</option>
          <option value="10 - CIVIL WORK CHK">10 - CIVIL WORK CHK</option>
          <option value="11 - PANEL WORK CHK">11 - PANEL WORK CHK</option>
          <option value="12 - EQUIP MOUNT">12 - EQUIP MOUNT</option>
          <option value="13 - AC/DC WIRING">13 - AC/DC WIRING</option>
          <option value="14 - TERMINATION">14 - TERMINATION</option>
          <option value="15 - COMMISSIONING">15 - COMMISSIONING</option>
        </select></h6>
        <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Net Metering: 
        <input type="text" id="NET METERING STATUS" name="NET METERING STATUS" /></h6>
        </div>
        <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Installer name: 
        <input type="text" id="INSTALLER NAME" name="INSTALLER NAME" /></h6>
      </div>
      <div class="row" style="display: inline;">
        <?$now = date('F j, y');?>
        <h6 style="color: grey; font-family: 'Century Gothic'">Date order received: 
        <input type="text" id="Dt of order recd" name="Dt of order recd" value="<?php echo$now?>" /></h6>
      </div>
      <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Start date: 
        <input type="text" id="START DATE" name="START DATE" value="<?php echo$now?>" /></h6>
      </div>
      <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Expected no. of days for completion: 
        <input type="text" id="Expected No.of days for completion" name="Expected No.of days for completion" /></h6>
      </div>
      <!-- <div class="row" style="display: inline;">
        <h6 style="color: grey; font-family: 'Century Gothic'">Planned date of completion: 
        <input type="text" id="PLANNED DT COMPLETION" name="PLANNED DT COMPLETION" value="<?php echo$now?>" /></h6>
      </div> -->
      <div class="row" style="display:flex; justify-content: center">
        <input type="submit" class="edit-button align-self-center" style="color: grey" />
      </div>
    </div>
  </form>

  

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <!-- <script src="assets/js/wow.js"></script> -->
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
<?php }
else
  header("Location: login.php");
?>

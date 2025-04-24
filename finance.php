<?php
    session_start();
    $id = isset($_GET['id']) ? (int)$_GET['id'] : '';
    $pass = isset($_SESSION['passLogin']) ? $_SESSION['passLogin'] : '';
    if ($pass == 'true')
    {
      $passFinance = isset($_SESSION['passFinance']) ? $_SESSION['passFinance'] : '';
      if ($passFinance == 'true')
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
   


  
    <div class="more-info reservation-info" style="margin-top: 0px; height: 100%;">
      <div class="container" style="padding-top: 85px; justify-content: center;">
        <a href="project.php?id=<?php echo$id?>"><i class="fa fa-angle-left edit-button" style="border-color: transparent;"></i></a>        
        <div class="col-lg-12" style="margin: 20px 0px">
          <div class="info-item">
            <div class="row">
              <h4>Financial details</h4>           
            </div>


<?php
    include("includes/config.php");

    
    
    if ($id != '')
    {

        $sql = "SELECT * from finances WHERE SNO=$id";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if ($numRows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $amt = $row['Total Billed Amount'];
            $rcvd = $row['TOTAL Received Amount'];
            $due = $row['Due Amount'];
        
        ?>
          <form name="form" action="writeFinance.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo$id?>">
            <div class="card-group">
              <div class="card border-0">
                <div class="card-body">
                  <p class="card-text"><b>Total billed amount</b></p>
                  <p class="card-text"><?php echo$amt?></p>
                  <input class="hide" type="text" id="Total Billed Amount" name="Total Billed Amount" value="<?php echo$amt?>" style="margin-left: auto; margin-right: auto;" />
                </div>
                <div class="card-footer border-0" style="background-color:#fff">
                  <button type="button" onclick="onButtonClick('Total Billed Amount')" style="border-radius: 100px; scale: 0.57; bottom:  0"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p class="card-text"><b>Amount recieved</b></p>
                  <p class="card-text"><?php echo$rcvd?></p>
                  <input class="hide" type="text" id="TOTAL Received Amount" name="TOTAL Received Amount" value="<?php echo$rcvd?>" style="margin-left: auto; margin-right: auto;" />
                </div>
                <div class="card-footer border-0" style="background-color:#fff">
                  <button type="button" onclick="onButtonClick('TOTAL Received Amount')" style="border-radius: 100px; scale: 0.57;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p class="card-text"><b>Due</b></p>
                  <p class="card-text"><?php echo$due?></p>
                  <input class="hide" type="text" id="Due Amount" name="Due Amount" value="<?php echo$due?>" style="margin-left: auto; margin-right: auto;" />
                </div>
                <div class="card-footer border-0" style="background-color:#fff">
                  <button type="button" onclick="onButtonClick('Due Amount')" style="border-radius: 100px; scale: 0.57;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>         
                </div>
              </div>  
            </div>
            <input type="submit" class="edit-button" value="Submit" style="justify-content: center;"> 
            </form>
            <?php}
            else
            {
              ?>
              <div class="row" style="display:flex; justify-content: center">
                <p>No records found</p>
              </div>
            <?php}
    }?>

          </div>
        </div>
        
      </div>
    </div>
  

  

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

<?php}
else
  header("Location: verifyFinance.php?id=$id");
}
else
{
  header("Location: login.php");
}
?>

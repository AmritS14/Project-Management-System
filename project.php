<?php
    session_start();
    $pass = isset($_SESSION['passLogin']) ? $_SESSION['passLogin'] : '';
    if ($pass == 'true')
    {?>
<!DOCTYPE html>
<?php
        
    include("includes/config.php");

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    
    if ($id != '')
    {

        $sql = "SELECT * from projects WHERE SNO=$id";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if ($numRows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $clientName = $row['NAME OF CLIENT'];
            $kw = $row['KW'];
            $comp = $row['PLANNED DT COMPLETION'];
            $status = $row['STATUS'];
            $rem = $row['REMARKS'];
            $installer = $row['INSTALLER NAME'];
            $netMetering = $row['NET METERING STATUS'];
            $orderRcvdDate = date('F j, y', strtotime(str_replace('.', '/', $row['Dt of order recd'])));
            $completionDays = $row['Expected No.of days for completion'];
            $startDate = date('F j, y', strtotime(str_replace('.', '/', $row['START DATE'])));
            $plannedDate = date('F j, y', strtotime(str_replace('.', '/', $row['PLANNED DT COMPLETION'])));
            $difference = $row['Difference'];

            $sql = "SELECT `DESIGN APPROVAL`, `STRUCTURE ORDERED`, `BOM READY`, `MATERIAL PURCHASE`, `BOM DISPATCHED` FROM projects WHERE  `SNO`=$id";
            $resultInner = mysqli_query($conn, $sql);
            $rowInner = mysqli_fetch_assoc($resultInner);
        ?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Project Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

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

  <!-- <script>
    function onClickA(){
      const menu = document.getElementById("test");
      const style = "display: block";
      // Object.assign(menu.style, style);
      document.getElementById("test").style.cssText=style;
    }
  </script> -->

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
                    <ul class="nav" id="test">
                        <li><a href="#one" id="sec-1">Basic info</a></li>
                        <li><a href="#two" id="sec-2">BOM</a></li>
                        <li><a href="#three" id="sec-3">Timeline</a></li>
                        <li><a href="#four" id="sec-4">Tasks</a></li>
                        <li><a href="#five" id="sec-4">Resources</a></li>
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

    // $("#sec-1").addClass("active");

    // $("#sec-1").click(function() {
    //        $('html, body').animate({
    //            scrollTop:        $("#one").offset().top-66
    //        }, 1000);
    //     return false;
    //    });
      
    //   $("#sec-2").click(function() {
    //        $('html, body') .animate({
    //            scrollTop:        $("#two").offset().top-112
    //        }, 1000);
    //     return false;
    //    });
      
    //   $("#sec-3").click(function() {
    //        $(' html,body') .animate({
    //            scrollTop:        $("#three").offset().top-112
    //        }, 1000);
    //     return false;
    //    });
      
    //   $("#sec-4").click(function() {
    //     $(this).addClass("active");
    //        $('html,body ') .animate({
    //            scrollTop:        $("#four").offset().top-112
    //        }, 1000);
    //     return false;
    //    });

    //   $('#two').waypoint(function() {
      
    //     $(".container ul li").children().removeClass("active");
    //     $("#sec-2").addClass("active");
        
    //   }, { offset: 101 });
      
      
    //   $('#three').waypoint(function() {
    //     $(".container ul li").children().removeClass("active");
    //     $("#sec-3").addClass("active");
    //   }, { offset: 101 });
      
    //   $('#four').waypoint(function() {
    //     $(".container ul li").children().removeClass("active");
    //     $("#sec-4").addClass("active");
    //   }, { offset: 101 });
      
    //   $('#one').waypoint(function() {
    //     $(".container ul li").children().removeClass("active");
    //     $("#sec-1").addClass("active");
    //   }, { offset: 0 });
  </script>
   
  <form name="form" action="write.php?id=<?php echo$id?>" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo$id?>">
    <div class="second-page-heading">
      <div class="card-group" id="one" style="padding-top: 70px; padding-bottom: 20px; margin-top: -190px; z-index: 1000; width: 100%;">
      <?php
      foreach ($rowInner as $key => $value) {
        $value = isset($rowInner[$key]) ? $rowInner[$key] : '';
        $style = "";
        if (strtoupper($value) == 'DONE' || strtoupper($value) == 'APPROVED')
          $style = "color: #155724; background-color: #d4edda;";
        else
          $style = "color: #721c24; background-color: #f8d7da;";?>
        <div class="card" style="font-size: 10.5px; <?php echo$style?>">
          <div class="card-body" style="display: flex; justify-content: center"><b><?php echo$key?>:</b></div>
          <div class="card-footer border-0" style="<?php echo$style?>"><?php echo$value?></div>
        </div>        
      <?php }?>
      <!-- <div class="col-6" style="background-color: red;">Test
      </div>
      <div class="col-6" style="background-color: green;">
      </div> -->
    </div>
      <div class="container">

        

        <div class="row default first">
          <div class="col-lg-12">
            <div class="row">
              <h4 style="margin-bottom: -15px;">Client Name</h4>
              </div>
              <input type = "button" class="edit-button" style="scale: 0.85; margin-top: 20px" onclick="onButtonClick('NAME OF CLIENT')" value="Edit" />
              <input type="submit" class="hide">
              
              <input class="hide" type="text" id="NAME OF CLIENT" name="NAME OF CLIENT" value="<?php echo$clientName?>" style="margin-left: auto; margin-right: auto;">
              
              <h2><?php echo$clientName?></h2>
            
            <div class="row">
              <div class="card-group">
                <div class="card border-0" style="display: flex; justify-content: center; background-color: transparent;">
                  <div class="card-body">
                    <b>Mobile no.:</b><br><?php echo$row['Mobile no']?>
                  </div>
                  <div class="card-footer border-0">
                    <button type="button" class="btn btn-outline-info" onclick="onButtonClick('Mobile no')" style="border-radius: 100px; --bs-btn-color: #22b3c1; --bs-btn-hover-bg: #22b3c1;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>
                    <input class="hide" type="text" id="Mobile no" name="Mobile no" value="<?php echo$row['Mobile no']?>" style="margin-left: auto; margin-right: auto;">
                  </div>
                </div>
                <div class="card border-0" style="display: flex; justify-content: center; background-color: transparent;">
                  <div class="card-body">
                    <b>Address:</b><br><?php echo$row['Address']?>
                  </div>
                  <div class="card-footer border-0">
                    <button type="button" class="btn btn-outline-info" onclick="onButtonClick('Address')" style="border-radius: 100px; --bs-btn-color: #22b3c1; --bs-btn-hover-bg: #22b3c1;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>
                    <input class="hide" type="text" id="Address" name="Address" value="<?php echo$row['Address']?>" style="margin-left: auto; margin-right: auto;">
                  </div>
                </div>
                <div class="card border-0" style="display: flex; justify-content: center; background-color: transparent;">
                  <div class="card-body">
                    <b>Contact person name:</b><br><?php echo$row['Contact person name']?>
                  </div>
                   <div class="card-footer border-0">
                    <button type="button" class="btn btn-outline-info" onclick="onButtonClick('Contact person name')" style="border-radius: 100px; --bs-btn-color: #22b3c1; --bs-btn-hover-bg: #22b3c1;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>
                    <input class="hide" type="text" id="Contact person name" name="Contact person name" value="<?php echo$row['Contact person name']?>" style="margin-left: auto; margin-right: auto;">
                  </div>
                </div>
               
              </div>
            </div>
            <div class="row">
              <p><b>Remarks: </b><br><?php echo$rem?></p>
              <input type = "button" class="edit-button" style="scale: 0.85" onclick="onButtonClick('REMARKS')" value="Add" />
              <input class="hide" type="text" id="REMARKS" name="REMARKS" value="<?php echo$rem?>" style="margin-left: auto; margin-right: auto;"><br>
            </div>
            <div class="main-button" style="margin-top: 10px"><?php $s = ($installer == "DONE") ? "Project installed" : "Installer name: ".$installer;
            echo $s?></div>
           <input class="hide" type="text" id="INSTALLER NAME" name="INSTALLER NAME" value="<?php echo$row['INSTALLER NAME']?>" style="margin-left: auto; margin-right: auto;" /><br>
            <button type="button" class="btn btn-outline-info" onclick="onButtonClick('INSTALLER NAME')" style="border-radius: 100px; --bs-btn-color: #22b3c1; --bs-btn-hover-bg: #22b3c1;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>

          </div>
        </div>
      </div>
    </div>
    <div class="more-info reservation-info">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="info-item">
              <input type = "button" class="edit-button" onclick="onButtonClick('STATUS')" style="color: grey; padding: 5px 24px; scale: 0.85; margin-bottom: 10px;" value="Edit" /><!--           
              <input class="hide" type="text" id="STATUS" name="STATUS" value="<?php echo$status?>" style="margin-left: auto;
              margin-right: auto;"> -->
              <select name="STATUS" id="STATUS" class="hide" style="margin-left: auto; margin-right: auto;">
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
              </select><br>
              <i class="fa fa-clock"></i>
              <h4>Status</h4>
              <p style="color: black"><?php echo$status?></p>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
           <div class="info-item">
                <input type = "button" class="edit-button" onclick="onButtonClick('KW')" style="color: grey; padding: 5px 24px; scale: 0.85; margin-bottom: 10px;" value="Edit" />          
                <input class="hide" type="text" id="KW" name="KW" value="<?php echo$row['KW']?>" style="margin-left: auto; margin-right: auto;" /><br>
                <i class="fa fa-bolt"></i>
                <h4>Wattage</h4>
                <p style="color: black"><?php echo$row['KW']?></p>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="info-item">
              <input type = "button" class="edit-button" onclick="onButtonClick('NET METERING STATUS')" style="color: grey; padding: 5px 24px; scale: 0.85; margin-bottom: 10px;" value="Edit" />          
              <input class="hide" type="text" id="NET METERING STATUS" name="NET METERING STATUS" value="<?php echo$row['NET METERING STATUS']?>" style="margin-left: auto; margin-right: auto;"><br>
              <i class="fa fa-weight-scale"></i>
              <h4>Net Metering</h4>
              <p style="color: black"><?php echo$netMetering?></p>
            </div>
          </div>
        </div>
      <!-- </form> -->
      <div class="row" style="justify-content: center;">
        <a class="main-button" style="width: auto; margin-top: 20px;" href="loginFinance.php?id=<?php echo$id?>">Financial details</a>
      </div>

      <div class="info-item" style="margin-top: 20px">
        <div class="row">
          <h4>Location</h4>
        </div>
        <!-- <form action="writeLocation.php" method="post"> -->
          <input type="hidden" name="id" value="<?php echo$id?>">
          <input type = "button" class="edit-button" onclick="onButtonClick('Location')" style="color: grey; padding: 5px 24px; scale: 0.85; margin-bottom: 10px;" value="Edit" />
          <input type="text" class="hide" name="Location" id="Location" value="<?php echo$row['Location']?>" style="margin-left: auto; margin-right: auto">
          <div class="row" id="Location">
            <p><?php echo$row['Location']?></p>
          </div>
          </form>
      </div>
      
        <div class="col-lg-12" id="two" style="margin: 20px 0px">
          <div class="info-item">
            <div class="row">
              <h4>BOM</h4><br>
              <a href="bom.php?id=<?php echo$id?>"><p>Print BOM</p></a>
              <p style="color: black">Legend: </p><br>
            </div>
            <div class="row" style="display:flex; justify-content:center;">
              <div class="card-group" style="width: 50%; padding-bottom: 20px">
                <div class="card" style="border-color: green; background-color: lightgreen;">
                  <div class="card-body">
                    <p style="color: black">= Qty</p>
                  </div>
                </div>
                <div class="card" style="border-color: red; background-color: lightcoral;">
                  <div class="card-body">
                    <p style="color: black">> Qty</p>
                  </div>
                </div>
                <div class="card" style="border-color: orange; background-color: lightgoldenrodyellow;">
                  <div class="card-body">
                    <p style="color: black">< Qty</p>
                  </div>
                </div>
              </div>
            </div>           
            <!-- </div>
            
              
      </form>

            </div> -->
            <style>
              .inputGroup {
                font-family: 'Segoe UI', sans-serif;
                margin: 1em 0 1em 0;
                max-width: 190px;
                position: relative;
              }

              .inputGroup input {
                font-size: 100%;
                padding: 0.8em;
                outline: none;
                border: 1.5px solid rgb(200, 200, 200);
                background-color: transparent;
                border-radius: 20px;
                width: 100%;
              }

              /*.inputGroup label {
                font-size: 100%;
                position: absolute;
                left: 0;
                padding: 0.8em;
                margin-left: 0.5em;
                pointer-events: none;
                transition: all 0.3s ease;
                color: rgb(100, 100, 100);
              }

              .inputGroup :is(input:focus, input:valid)~label {
                transform: translateY(-50%) scale(.9);
                margin: 0em;
                margin-left: 1.3em;
                padding: 0.4em;
                background-color: white;
              }

              .inputGroup :is(input:focus) {
                border-color: rgb(150, 150, 200);
              }*/
            </style>
            <div class="row">
            <div class="card-group">
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>SNo.</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Name</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Spec</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Qty</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Disp.</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Date</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Taken by</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Mode</b></p>
                </div>
              </div>
              <div class="card border-0">
                <div class="card-body">
                  <p style="color: black"><b>Rcvd. by</b></p>
                </div>
              </div>
            </div>
            </div>
            <!-- <div class="row" style="padding-bottom: 15px;">
              <div class="col-md-1" style="display:flex; justify-content:center">
                <p style="color: black"><b>SNo.</b></p>
              </div>
              <div class="col-md-4" style="display:flex; justify-content:center">
                <p style="color: black"><b>Name</b></p>
              </div>
              <div class="col-md-5" style="display:flex; justify-content:center">
                <p style="color: black"><b>Spec</b></p>
              </div>
              <div class="col-md-1" style="display:flex; justify-content:center">
                <p style="font-size:13px; color: black"><b>Quantity</b></p>
              </div>
              <div class="col-md-1" style="display:flex; justify-content:center">
                <p style="font-size:13px; color: black"><b>Dispatched</b></p>
              </div>
            </div> -->
            
          </div>
        </div>
        <!-- </form> -->
        <form name="form" action="writeTime.php?id=<?php echo$id?>" method="POST">

          <div class="col-lg-12" id="three" style="margin: 20px 0px">
            <div class="info-item">
              <div class="row">
                <h4>Timeline</h4>
              </div>
              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><b>Date order recieved</b></p>
                    <p class="card-text"><?php echo$orderRcvdDate?></p>
                    <input class="hide" type="text" id="Dt of order recd" name="Dt of order recd" value="<?php echo$orderRcvdDate?>" style="margin-left: auto; margin-right: auto;" />
                  </div>
                  <div class="card-footer" style="background-color:#fff">
                    <button type="button" onclick="onButtonClick('Dt of order recd')" style="border-radius: 100px; scale: 0.57; bottom:  0"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>          
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><b>Start date:</b></p>
                    <p class="card-text"><?php echo$startDate?></p>
                    <input class="hide" type="text" id="START DATE" name="START DATE" value="<?php echo$startDate?>" style="margin-left: auto; margin-right: auto;" />
                  </div>
                  <div class="card-footer" style="background-color:#fff">
                    <button type="button" onclick="onButtonClick('START DATE')" style="border-radius: 100px; scale: 0.57;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>         
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><b>Days required for completion:</b></p>
                    <p class="card-text"><?php echo$completionDays?></p>
                    <input class="hide" type="text" id="Expected No.of days for completion" name="Expected No.of days for completion" value="<?php echo$completionDays?>" style="margin-left: auto; margin-right: auto;" />
                  </div>
                  <div class="card-footer" style="background-color:#fff">
                    <button type="button" onclick="onButtonClick('Expected No.of days for completion')" style="border-radius: 100px; scale: 0.57;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>         
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><b>Planned date of completion:</b></p>
                    <p class="card-text"><?php echo$plannedDate?></p>
                    <input class="hide" type="text" id="PLANNED DT COMPLETION" name="PLANNED DT COMPLETION" value="<?php echo$plannedDate?>" style="margin-left: auto; margin-right: auto;" />
                  </div>
                  <div class="card-footer" style="background-color:#fff">
                    <button type="button" onclick="onButtonClick('PLANNED DT COMPLETION')" style="border-radius: 100px; scale: 0.57;"><i class="fa fa-pen-to-square" style="margin: 0"></i></button>         
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <p class="card-text"><b>Difference:</b></p>
                    <p class="card-text"><?php echo$difference.' days'?></p>
                    <!-- <input type="hidden" name="Difference" id="Difference" value="<?php echo$difference?>"> -->                    
                  </div>
                  <?php $alert = $difference > 10 ? array('success', 'On time') : ($difference > 0 ? array('warning', 'Nearing deadline') : array('danger', 'Overdue!'))?>
                  <div class="card-footer border-0" style="background-color:#fff">
                    <div class="alert alert-<?php echo$alert[0]?>" role="alert"><?php echo$alert[1]?></div>
                  </div>
                  <input type="submit" class="hide">              
                </div>  
              </div>
            </div>
          </div>
        </form>
        
        
       
      <div class="row"></div>
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
<?php
}}}
else
  header("Location: login.php");
?>
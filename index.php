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

    <title>Projects</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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



  <!-- ***** Header Area Start ***** -->
  <header class="background-header header-sticky">
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
                        <li><div class="row" style="display: flex; justify-content: center"><a href="login.php" style="padding-top: 0; padding-bottom: 0">Change user</a></div>
                          <div class="row" style="display: flex; justify-content: center"><p style="font-size: 12px; color: white">Current user: <b><?php echo$_SESSION['user']?></b></div></li>
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

// JavaScript code
function search_animal() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('item');
    let btn = document.getElementById('newProject');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="inherit";                 
        }
        btn.className="hide";
    }
}
  </script>

  

  <div class="amazing-deals" style="background-color: white !important">
    <div class="container" style="padding-top:100px">

      <div class="col-lg-12">
          <ul class="page-numbers">
            <!-- <li><a href="#"><i class="fa fa-arrow-left"></i></a></li> -->
            <li><button class="filter-button btn btn-outline-secondary" data-filter="all">All</button></li>
            <li><button class="filter-button btn btn-outline-danger" data-filter="overdue">Overdue</button></li>
            <li><button class="filter-button btn btn-outline-warning" data-filter="near">Nearing deadline</button></li>
            <li><button class="filter-button btn btn-outline-success" data-filter="on-time">On time</button></li>
            <li><input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search projects.." style="height: 38px; text-indent: 3px; border-radius: 10px;"></li>
            <!-- <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-arrow-right"></i></a></li> -->
          </ul>
        </div>
        
      <!-- <a href="reservation.html">
        <div class="col-md-12">
          <div class="item">
            <div class="row">
              <div class="col-md-12 align-self-center">
                <div class="content" style="padding-left: 20px">
                  <span class="info">*Limited Offer Today</span>
                  <h4>Glasgow City Lorem</h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">5 Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a> -->

  <?php
    if (isset($_SESSION['pass'])) 
      $_SESSION['pass'] = 'false';
    // include("test.php");
    include("includes/config.php");

    // system('python includes/read.py', $resultCode);

    $sql = "SELECT SNO,`PLANNED DT COMPLETION` FROM projects";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) 
    {

        for ($i = 0; $i < $numRows; $i++)
        {
          $row = mysqli_fetch_assoc($result);
          $id = $row['SNO'];
          $comp = $row['PLANNED DT COMPLETION'];
          $diff = round((strtotime($comp) - time()) / (60 * 60 * 24));
          $usql = "UPDATE projects SET Difference=$diff WHERE SNO=$id";
          mysqli_query($conn, $usql);
        }

    $sql = "SELECT * FROM projects ORDER BY Difference";
    $result = mysqli_query($conn, $sql);

        for ($i = 0; $i < $numRows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $id = $row['SNO'];
            $cName = $row['NAME OF CLIENT'];
            $kw = $row['KW'];
            $status = $row['STATUS'];
            $diff = $row['Difference'];
            $color = ((int)$diff <= 0) ? array('background-color: #f8d7da;','#f5c6cb;', 'overdue') : (((int)$diff <= 10) ? array('background-color: #fff3cd;','#ffeeba;', 'near') : array('background-color: #d4edda;',' #c3e6cb;', 'on-time'));?>



      <div class="row filter <?php echo$color[2]?>">
        <div class="col-md-12">
          <div class="item" style="<?php echo$color[0]?>border: 1px solid <?php echo$color[1]?>; margin: 15px 0px">
            <div class="row">
              <div class="col-md-12 align-self-center">
                <div class="content" style="padding-left: 20px">
                  <!-- <span class="info">*Limited Offer Today</span> -->
                  <a href="project.php?id=<?php echo$id?>"><h4><?php echo$cName?></h4></a>
                  <h6 style="padding-bottom: 10px; color: grey; font-family: 'Century Gothic'"><?php echo$status?></h6>
                  <div class="row">
                    <div class="col-3">
                      <i class="fa fa-bolt"></i>
                      <span class="list"><?php echo$row['KW']?></span>
                    </div>
                    <div class="col-3">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo date('F j, y', strtotime($row['PLANNED DT COMPLETION']))?></span>
                    </div>
                    <div class="col-3">
                      <i class="fa fa-exclamation"></i>
                      <span class="list"><?php echo$diff?></span>
                    </div>
                    <div class="col-3">
                     <a href="deleteProject.php?id=<?php echo$id?>"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }} ?>
        
        
      
    </div>
    <div class="col-lg-12" style="display:flex; justify-content:center" id="newProject">
      <a href="newProject.php" class="edit-button align-self-center" style="margin-bottom: 20px; margin-top: 10px; background-color: #22b3c1; color: white">New Project</a>
    </div>
  </div>



  <!-- <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Are You Looking To Travel ?</h2>
          <h4>Make A Reservation By Clicking The Button</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="reservation.html">Book Yours Now</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
        });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");
  </script>

  </body>

</html>
<?php }
else
{
  header("Location: login.php");
}
?>

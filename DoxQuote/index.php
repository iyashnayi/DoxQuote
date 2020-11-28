<?php 
  session_start();
  include("shared/database.php");
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION['user_doxquote'])){
      header("location:login.php");  
  }
  $auth_user = $_SESSION['user_doxquote'];
  $query = "SELECT * FROM REGISTRATION WHERE username='$auth_user'";
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data); 
  $result = mysqli_fetch_assoc($data);
  

  $quoteQuery = "SELECT * FROM MYQUOTE";
  $quoteData = mysqli_query($conn,$quoteQuery);
  $quoteTotal = mysqli_num_rows($quoteData);
  $quoteResult = mysqli_fetch_assoc($quoteData);
  
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>DoxQuote</title>
  <link href="assets/img/doxquote.svg" rel="icon">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/homestyle.css">
  <link rel="stylesheet" href="assets/css/core.css">
  <link rel="stylesheet" href="assets/css/customstyle.css">
  <link rel="stylesheet" href="assets/css/font.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/line-icons.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <script type="text/javascript" src="assets/js/core.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js.map"></script>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="assets/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <style type="text/css">
    .nav-caps{
      font-variant-caps: titling-case;
      }
  </style>
</head>
<body>

	<!-- Vertical navbar -->
	<div class="vertical-nav" id="sidebar">
  		<div class="pt-3 pl-0 px-1 mb-3">
    		<div class="row">
          <div class="logo-card">
             <img src="assets/img/doxquote.svg" class="img-fluid animate-logo"/>
             <label class="label">DoxQuote</label>  
          </div>                            
      	</div>
        <!-- avtive user details -->
        <div class="back-pro-card mt-4 ml-2 mr-2">
          <div class="container-fluid ">
            <div class="row">
                <?php if($result['img'] == null) { ?>
                <img src="profilesimgs/avtar.png" width="23%" height="23%" class="img-fluid img-thumbnail rounded-circle mt-0 pt-0"/>
                <?php } else { ?>
                  <img src="<?php echo $result['img']; ?>" alt="Profile Photo" width="25%" height="25%" class="img-fluid img-crop-profile rounded-circle mt-0 pt-0"/>
                <?php } ?>
                <label class="col pt-1"><strong class="text-black name-size"><?php echo $result['fname']." ".$result['lname']; ?></strong> <small class="text-dark email-size"><?php echo $result['email']; ?></small></label>
            </div>
          </div>
        </div>
  		</div>
      <nav class="nav">
        <ul class="nav flex-column my-2">
          <li class="nav-item active-nav">
              <a href="index.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_home_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;home</a>
          </li>
          <li class="nav-item">
              <a href="writequote.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_mode_edit_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;write quote</a>
          </li>
          <li class="nav-item">
              <a href="myquote.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_format_quote_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;my quotes</a>
          </li>
          <li class="nav-item">
              <a href="profile.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_account_box_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;profile</a>
          </li>
        </ul>
        <!-- bottom logout -->
        <ul class="nav flex-column">
          <li class="nav-item">
              <a href="logout.php" class="nav-link nav-cap text-danger"><img src="assets/icon/ic_exit_to_app_24px.svg">&nbsp;&nbsp;&nbsp;logout</a>
          </li>
          <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                    Bar charts
                </a>
          </li> -->
        </ul>
      </nav>
	</div>
  <!-- End vertical navbar -->
  <script type="text/javascript" src="assets/js/core.js"></script>
  <!-- Page content holder -->
	<div class="page-content p-3" id="content">
  		<!-- Toggle button -->
  		  <button id="sidebarCollapse" type="button" class="btn btn-light shadow-sm px-4 mb-4"><img src="assets/icon/ic_menu_24px.svg" width="30"></button>
        <label class="label main-logo-head px-5 mb-1"><img src="assets/img/doxquote.svg" class="img-fluid" width="60">DoxQuote</label>
        <a href="search.php" class="btn btn-light float-right"><img src="assets/icon/ic_search_24px.svg"></a>
        <!-- <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary bg-light" type="button" id="button-addon2"><img src="assets/icon/ic_search_24px.svg"></button>
          </div>
        </div> -->
      <!-------------------------- content---------------------------------------------- -->
      <!-- <div>
        <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
      </div> -->
  		<div class="row">
        <?php 
        $quoteQuery = "SELECT * FROM MYQUOTE";
        
        if ($quoteData = mysqli_query($conn,$quoteQuery)) {
          // if ($quoteTotal = mysqli_num_rows($quoteData) != 0) { 
            while($quoteResult = mysqli_fetch_assoc($quoteData) ) {
        // } else {
          
        // }
        
         ?>
    		<div class="col-xl-6 col-lg-6 col-xs-12 col-md-12 text-black">
         <div class="card">
            <div class="card-header">
              <div class="m-0 p-0 float-left">
                  <label class="text-black"><img src="assets/icon/ic_format_quote_24px.svg" class="img-fluid">Quote</label>
              </div>
              <div class="m-0 p-0 float-right"><span id="" class="text-gray"><?php echo $quoteResult['crntdate']; ?></span></div>
            </div>
            <blockquote class="blockquote mb-0 card-body">
              <label class="card-title"><?php echo $quoteResult['title']; ?></label>
              <p class="text-dark card-text justify-quote"><?php echo $quoteResult['quote']; ?></p>
              <?php if (!empty($quoteResult['weblink'])) { ?>
                <p class="text-gray">Website : <a href="<?php echo $quoteResult['weblink']; ?>" target="blank" class="card-link text-primary"><?php echo $quoteResult['weblink']; ?></a></p>
              <?php } else { 
                
              } ?>
              
              
              <footer class="blockquote-footer float-right">
                <label><?php echo $quoteResult['writername'] ?></label>
              </footer>
            </bloackquote>
          </div>               
        </div>

        <?php } 
         } else { ?>
         <div class="">
            <center>
              <img src="assets/img/notfound.jpg" class="img-fluid" width="55%" height="55%"/>
            </center>
          </div>
       <?php } ?>
       
      </div>
          <!-- javas -->
          <script type="text/javascript">
            var today = new  Date();
            var day, month, year;
            day = today.getDate();
            month = today.getMonth()+1;
            year = today.getFullYear();
            dmy = day+" / "+month+" / "+year;
            document.getElementById('date').innerHTML = dmy;
          </script>	
    		</div>
        <div class=""></div>
  		</div>
	</div>
<!-- End content -->
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>

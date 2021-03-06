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
  // if ($total==1) {
  //   $result = mysqli_fetch_assoc($data);

  // } else {
  //   # getting something wrongcode...
  // }
  
  
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
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js.map"></script>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="assets/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
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
          <li class="nav-item">
              <a href="index.php" class="nav-link nav-cap nav text-black"><img src="assets/icon/ic_home_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;home</a>
          </li>
          <li class="nav-item">
              <a href="writequote.php" class="nav-link nav-cap nav text-black"><img src="assets/icon/ic_mode_edit_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;write quote</a>
          </li>
          <li class="nav-item">
              <a href="myquote.php" class="nav-link nav-cap nav text-black"><img src="assets/icon/ic_format_quote_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;my quotes</a>
          </li>
          <li class="nav-item active-nav">
              <a href="profile.php" class="nav-link nav-cap nav text-black"><img src="assets/icon/ic_account_box_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;profile</a>
          </li>
        </ul>
        <!-- bottom logout -->
        <ul class="nav flex-column">
          <li class="nav-item">
              <a href="logout.php" class="nav-link nav-cap nav text-danger"><img src="assets/icon/ic_exit_to_app_24px.svg">&nbsp;&nbsp;&nbsp;logout</a>
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
    		<div class="col-lg-12 col-xs-12 col-md-12 text-black">
         <div class="card">
          <div class="card-header">
            <div class="float-left">
              <h3 class="text-black ">Profile</h3>
            </div>
            <div class="float-right">
              <a href="settingprofile.php" class="p-1 moveable"><img src="assets/icon/ic_settings_24px.svg" class="img-fluid"></a>
            </div>
          </div>
          <div class="card-body">
            <div class="container col-lg-12 m-0 p-0 pl-0">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-xs-4 col-sm-12 col-md-12">
                    <div class="profile-content">
                      <?php if($result['img'] == null) { ?>
                      <img src="profilesimgs/avtar.png" width="80%" height="80%" class="img-fluid img-thumbnail rounded-circle mt-0 pt-1"/>
                      <?php } else { ?>
                        <a href="<?php echo $result['img']; ?>"><img src="<?php echo $result['img']; ?>" alt="Profile Photo" width="90%" height="90%" class="img-fluid img-crop-profile img-thumbnail rounded-circle mt-0 pt-1"/></a>
                      <?php } ?> 
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-4 col-sm-12 col-md-12">
                    <div class="profile-content">
                      <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label>DoxQuote ID :</label><label>&nbsp;<?php echo $result['doxquoteid'];?></label></h4>
                      </div>
                       <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">name :</label><label>&nbsp;<?php echo $result['fname']." ".$result['lname'];?></label></h4>
                      </div>
                       <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">username :</label><label>&nbsp;<?php echo $result['username'];?></label></h4>
                      </div>
                      <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">gender :</label><label>&nbsp;<?php echo $result['gender'];?></label></h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-4 col-sm-12 col-md-12">
                    <div class="profile-content">
                      <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">birth date :</label><label>&nbsp;</label><?php echo $result['dob'];?></h4>
                      </div>
                       <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">email :</label><label>&nbsp;<?php echo $result['email'];?></label></h4>
                      </div>
                      <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">mobile :</label><label>&nbsp;<?php echo $result['mobile'];?></label></h4>
                      </div>
                       <div class="back-pro-card m-2 pt-3 pl-3 pb-1">
                        <h4 class="text-black"><label class="cap">Author :</label><label>&nbsp;<?php echo $result['author'];?></label></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="float-left">
              <a href="deleteaccount.php" class="p-1 moveable"><img src="assets/icon/ic_delete_24px.svg" class="img-fluid"></a>
            </div>
            <!-- <div class="float-right-date">- Yash nayi</div> -->
          </div>
        
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

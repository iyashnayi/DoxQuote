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
  $folder = "";
  $msg = "";
  $updateMsg = "";
  if (isset($_POST['btn-update'])) {
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "profilesimgs/".$filename;
    // echo $folder;
    move_uploaded_file($tempname, $folder);

    $queryprofile = "UPDATE REGISTRATION SET img='$folder' WHERE username='$auth_user'";
    $dataprofile = mysqli_query($conn,$queryprofile); 
    if ($dataprofile && !empty($filename) && !empty($folder)) {
      $msg = "<div class='alert alert-success' role='alert'>
                        Your profile upload successfully done
                    </div>"; 
    } else {
      $msg = "<div class='alert alert-danger' role='alert'>
                      your profile couldn't upload
                    </div>"; 
    }
    
    // print_r($viewimg);
  } else {
    // echo "something wrong";
  }
  
  if (isset($_POST['btn-update-data'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $author = $_POST['author'];

    $query = "SELECT * FROM REGISTRATION WHERE username='$auth_user'";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data); 
    $result = mysqli_fetch_assoc($data);

    if (!empty($fname) && !empty($lname) && !empty($dob) && !empty($email) && !empty($mobile) && !empty($author)) {
        $query = "UPDATE REGISTRATION SET fname='$fname', lname='$lname', dob='$dob', email='$email', mobile='$mobile'  WHERE username='$auth_user'";
        $data = mysqli_query($conn,$query);
        if ($data == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your data update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your data couldn't update
                      </div>";
        }
    } else {
     if (!empty($fname)) {

        $queryFname = "UPDATE REGISTRATION SET fname='$fname' WHERE username='$auth_user'";
        $dataFname = mysqli_query($conn,$queryFname);
        if ($dataFname == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your first name update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your first name couldn't update
                      </div>";
        }
      }
      if (!empty($lname)) {

        $queryLname = "UPDATE REGISTRATION SET lname='$lname' WHERE username='$auth_user'";
        $dataLname = mysqli_query($conn,$queryLname);
        if ($dataLname == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your last name update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your last name couldn't update
                      </div>";
        }
      }
      if (!empty($dob)) {

        $queryDob = "UPDATE REGISTRATION SET dob='$dob' WHERE username='$auth_user'";
        $dataDob = mysqli_query($conn,$queryDob);
        if ($dataDob == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your birthdate update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your birthdate couldn't update
                      </div>";
        }
      }
      if (!empty($email)) {

        $queryEmail = "UPDATE REGISTRATION SET email='$email' WHERE username='$auth_user'";
        $dataEmail = mysqli_query($conn,$queryEmail);
        if ($dataEmail == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your email update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your email couldn't update
                      </div>";
        }
      }
      if (!empty($mobile)) {

        $queryMobile = "UPDATE REGISTRATION SET mobile='$mobile' WHERE username='$auth_user'";
        $dataMobile = mysqli_query($conn,$queryMobile);
        if ($dataMobile == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your mobile number update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your mobile number couldn't update
                      </div>";
        }
      }
      if (!empty($author)) {

        $queryAuthor = "UPDATE REGISTRATION SET author='$author' WHERE username='$auth_user'";
        $dataMobile = mysqli_query($conn,$queryAuthor);
        if ($dataMobile == 1) {
          $updateMsg = "<div class='alert alert-success' role='alert'>
                          Your author name update successfully done
                      </div>";
        } else {
          $updateMsg = "<div class='alert alert-danger' role='alert'>
                          Your author name couldn't update
                      </div>";
        }
      }
    }
    

    

    
  } else {
    # code...
  }
  
  
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
              <a href="index.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_home_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;home</a>
          </li>
          <li class="nav-item">
              <a href="writequote.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_mode_edit_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;write quote</a>
          </li>
          <li class="nav-item">
              <a href="myquote.php" class="nav-link nav-cap text-black"><img src="assets/icon/ic_format_quote_24px.svg" class="img-fluid"/>&nbsp;&nbsp;&nbsp;my quotes</a>
          </li>
          <li class="nav-item active-nav">
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
              <h3 class="text-black cap">profile update</h3>
            </div>
            <!-- <div class="float-right">
              <a href="" class="p-1 moveable"><img src="assets/icon/ic_settings_24px.svg" class="img-fluid"></a>
            </div> -->
          </div>
          <div class="card-body">
            <div class="container col-lg-12 m-0 p-0 pl-0">
              <div class="row justify-content-between">
                <div class="col-lg-4 col-xs-4 col-sm-12 col-md-12">
                  <form action="#" method="post" id="#" enctype="multipart/form-data">
                    <div class="profile-content">
                      <?php if($result['img'] == null) { ?>
                      <img src="profilesimgs/avtar.png" width="80%" height="80%" class="img-fluid img-thumbnail rounded-circle mt-0 pt-1"/>
                      <?php } else { ?>
                        <a href="<?php echo $result['img']; ?>"><img src="<?php echo $result['img']; ?>" alt="Profile Photo" width="90%" height="90%" class="img-fluid img-crop-profile img-thumbnail rounded-circle mt-0 pt-1"/></a>
                      <?php } ?> 
                      <div class="file-field medium btn btn-gradient float-left">
                        <input type="file" class="btn-gradient" id="cropbox" name="image" accept="image/x-png,image/gif,image/jpeg" value="Profile" />
                      </div>
                      <button type="submit" name="btn-update" class="btn btn-gradient col-lg-12 col-sm-12 col-md-12 col-xs-12 text-white"><img src="assets/icon/ic_file_upload_white_18dp.png" width="10%" height="10%">Upload</button>
                    </div>
                    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <?php echo $msg; ?> 
                    </div>
                  </form>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-12 col-md-12">
                  <form action="#" method="post">
                    <div class="profile-content">
                      <div class="row">
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="text" name="fname" class="form-control form-input input-box" placeholder="First name">
                        </div>
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="text" name="lname" class="form-control form-input input-box" placeholder="Last name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="text" name="username" class="form-control form-input input-box" placeholder="Username" value="<?php echo $result['username']; ?>" disabled>
                        </div>
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="date" name="dob" class="form-control form-input input-box" placeholder="dob">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="email" name="email" class="form-control form-input input-box" placeholder="Email">
                        </div>
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="tel" name="mobile" class="form-control form-input input-box" maxlength="10" max="10" placeholder="Mobile">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group  col-12 col-xs-6 col-sm-12 col-md-12 col-lg-6">
                          <input type="text" name="author" class="form-control form-input input-box" placeholder="Author">
                        </div>
                      </div>
                      <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <?php echo $updateMsg; ?> 
                      </div>
                      <button type="submit" name="btn-update-data" class="btn btn-gradient col-lg-12 col-sm-12 col-md-12 col-xs-12 text-white">Update data</button>
                    </div>
                  </form>  
                </div>
              </div>
            </div>
                 <!-- <div class="float-left">
              <a href="" class="p-1 moveable"><img src="assets/icon/ic_delete_24px.svg" class="img-fluid"></a>
            </div> -->
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
        <!-- <script type="text/javascript">
          $(document).ready(function(){
              var size;
              $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: function(c){
                 size = {x:c.x,y:c.y,w:c.w,h:c.h};
                 $("#crop").css("visibility", "visible");     
                }
              });
           
              $("#crop").click(function(){
                  var img = $("#cropbox").attr('src');
                  $("#cropped_img").show();
                  $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
              });
          });
        </script>	 -->
    	</div>
  	</div>
	</div>
    <!-- End content -->
    <script type="text/javascript">

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

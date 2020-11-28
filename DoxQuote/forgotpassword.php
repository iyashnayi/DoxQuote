<?php 
  include("shared/database.php");
  $msg = "";
  if (isset($_POST['btn-reset'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $conf_password = $_POST['confir_password']; 
    // echo $username." - ".$password;

    if ($password == $conf_password) {
      if (isset($username) && isset($password)) {

        $query = "SELECT * FROM REGISTRATION WHERE username='$username'";
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data); 
        $result = mysqli_fetch_assoc($data);


        if ($result['username']===$username) {

          $queryUpdate = "UPDATE REGISTRATION SET password='$password' WHERE username='$username'";
          $data = mysqli_query($conn,$queryUpdate);
          if ($data) {
            $msg = "<div class='alert alert-success' role='alert'>
                        Your password reset successfully done
                    </div>"; 
          } else {
            $msg = "<div class='alert alert-danger' role='alert'>
                        Your password couldn't reset
                    </div>"; 
          }
        } else {
          $msg = "<div class='alert alert-danger' role='alert'>
                      Sorry ! no user exists with $username username
                  </div>";
        }      
        // header('location:login.php');
      }
    } else {
      $msg = "<div class='alert alert-danger' role='alert'>
                  Your password and confirm password doesn't match
              </div>";
    }
    
    
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password - DoxQuote</title>
    <link href="assets/img/doxquote.svg" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/customstyle.css">
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-icons.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="Bootstrap/js/bootstrap.bundle.min.js.map"></script>
  </head>
  <body class="bg-body">
    <center>
      <section class="content-area">
        <div class="col-lg-10">
          <div class="card card-shadow">
            <div class="card-body">
                <div class="container col-lg-12">
                  <div class="row justify-content-between">
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <!-- -----------------------------------back arrow------------------------------------------- -->
                      <div class="back">
                        <a href="login.php"><img src="assets/img/ic_arrow_back_18px.svg" class="img-fluid" width="25"></a>
                      </div>
                       <!-- ---------------------------------show img vector--------------------------------------- -->
                      <div class="img content-area">
                        <center><img src="assets/img/password.svg" class="img-fluid animate-img-vec" /></center>
                      </div>
                    </div>
                     <!-- ---------------------------------forgot password form---------------------------------- -->
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <div class="container-area">
                        <img src="assets/img/doxquote.svg" class="img-fluid" width="80"><br>
                        <label class="main-label">Forgot Password</label>
                        <div class="password-content">
                          <form action="#" method="post">
                              <div class="form-group">
                                <input type="text" name="username" required="required" placeholder="Username" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"/>
                              </div>
                              <div class="form-group">
                                <input type="password" name="password" required="required" placeholder="Password" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"/>
                              </div>
                              <div class="form-group">
                                <input type="password" name="confir_password" required="required" placeholder="Confirm Password" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"/>
                              </div>
                              <div class="row col-lg-8 col-sm-12 col-md-12 col-xs-12">
                                <?php echo $msg; ?> 
                              </div>
                              <button type="submit" name="btn-reset" class="btn btn-gradient col-lg-8">reset</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    </center>
  </body>
</html>

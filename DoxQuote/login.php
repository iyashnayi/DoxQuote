<!DOCTYPE html>
<html>
  <head>
    <title>Login - DoxQuote</title>
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
    <?php 
       session_start();
       include("shared/database.php");

       if (isset($_SESSION['user_doxquote'])) {
         header('location:index.php');
       } 
       

       $msg = '';
       $success = '';
       $login = '';
    ?>
  </head>
  <body class="bg-body">
    <center>
      <section class="content-area">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
                <div class="container col-lg-12">
                  <div class="row justify-content-between">
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <div class="img content-area">
                        <center><img src="assets/img/peopel-login.svg" class="img-fluid animate-img-vec" /></center>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <div class="container-area">
                        <img src="assets/img/doxquote.svg" class="img-fluid" width="80"><br>
                        <label class="main-label">Login with <strong>D</strong>ox<strong>Q</strong>uote</label>
                        <label class="text-success"><?php echo $login; ?></label>
                        <div class="login-content">
                          <?php 
                            
                            if (isset($_POST['btn-login'])) {
                              $username = $_POST['username'];
                              $password = $_POST['password'];

                              $query = "SELECT * FROM REGISTRATION WHERE username='$username' && password='$password'";
                              $data = mysqli_query($conn,$query);
                              $total = mysqli_num_rows($data);
                              $result = mysqli_fetch_assoc($data);
                              // echo $total;
                              if ($total ==1) {
                                if ($result['username']==$username && $result['password']==$password) {
                                  $_SESSION['user_doxquote']=$username;
                                  header('location:index.php');
                                } else {
                                  $msg = "<div class='alert alert-danger' role='alert'>
                                          Your username or password are not valid !
                                        </div>"; 
                                }
                                
                                
                              } else {
                                $msg = "<div class='alert alert-danger' role='alert'>
                                          Your data not found or you are not registed user please register with DoxQuote !
                                        </div>"; 
                              }
                              

                            } else {
                              # code...
                            }          
                          ?>
                          <form action="#" method="post">
                              <div class="form-group">
                                <input type="text" name="username" required="required" placeholder="Username" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"/>
                              </div>
                              <div class="form-group">
                                <input type="password" name="password" required="required" placeholder="Password" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"/>
                              </div>
                              <div class="row col-lg-8 col-sm-12 col-md-12 col-xs-12">
                                <?php echo $msg; ?> 
                              </div>
                              <div class="row col-lg-8 col-sm-12 col-md-12 col-xs-12">
                                <?php echo $success; ?> 
                              </div>
                              <button type="submit" name="btn-login" value="login" class="btn btn-gradient col-lg-8">Login</button>
                          </form>
                          <div class="link-register mt-3">
                              <p><a href="forgotpassword.php">Forgot password ?</a></p>
                          </div>
                          <div class="link-register">
                              <p>Need an account ? <a href="registration.php">Register</a></p>
                          </div>
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
<!-- $msg = "<div class='alert alert-danger' role='alert'>
          Something went to wrong;
        </div>
        "; -->
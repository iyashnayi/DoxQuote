<?php
      
  session_start();

  include('shared/database.php');
  // Check if the user is logged in, if not then redirect him to login page
  if(isset($_SESSION['user_doxquote'])){
      header("location:index.php");  
  }

  $msg = "";
  $success = "";
  if (isset($_REQUEST["registraion-btn"])) {

    $doxquoteid = trim($_REQUEST['fname']."".rand(1000, 9999)."".rand(100, 999));
    $fname = trim($_REQUEST["fname"]);
    $lname = trim($_REQUEST["lname"]);
    $author = trim($_REQUEST["author"]);
    $birthdate = trim($_REQUEST["birthdate"]);
    $sex = trim($_REQUEST["sex"]);
    $mobile = trim($_REQUEST["mobile"]);
    $email = trim($_REQUEST["email"]);
    $username = trim($_REQUEST["username"]);
    $password = trim($_REQUEST["password"]);
    $con_password = trim($_REQUEST["con_password"]);

    if ($password == $con_password) {

      

      $result = mysqli_query($conn,"SELECT email, mobile FROM registration WHERE email = $email AND mobile = $mobile");

      $row = mysqli_fetch_array($result);

      if (!($row)) {

        $query = "INSERT INTO registration (doxquoteid, fname, lname, author, dob, gender, mobile, email, username, password) VALUES ('".$doxquoteid."','".$fname."','".$lname."','".$author."','".$birthdate."','".$sex."','".$mobile."','".$email."','".$username."','".$password."')";

        $res = mysqli_query($conn,$query);
        if($res==1){
          $success = "<div class='alert alert-success' role='alert'>
                        You are register successfully.
                      </div>";
          header("location: login.php");
        }
        else{
          $msg = "<div class='alert alert-danger' role='alert'>
                    Something went to wrong...
                  </div>
                  ";
        }
      }else{
        $msg = "<div class='alert alert-danger' role='alert'>
                  You are alreay taken try anothor account !
                </div>
                ";
      }

    }
    else{
      $msg = "<div class='alert alert-danger' role='alert'>
                  Password and confirm password are not match
                </div>
              ";
    }

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register - DoxQuote</title>
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
      <section class="reg-content-area">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
                <div class="container col-lg-12">
                  <div class="row justify-content-between">
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <!-- -----------------------------------back arrow---------------------------------------- -->
                      <div class="back">
                        <a href="login.html"><img src="assets/img/ic_arrow_back_18px.svg" class="img-fluid" width="25"></a>
                      </div>
                       <!-- ---------------------------------show img vector------------------------------------- -->
                      <div class="img content-area">
                        <center><img src="assets/img/regisvec.svg" class="img-fluid animate-img-vec"/></center>
                      </div>
                    </div>
                     <!-- ---------------------------------Registraion form------------------------------------- -->
                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-6">
                      <div class="container-area-reg">
                        <img src="assets/img/doxquote.svg" class="img-fluid" width="80"><br>
                        <label class="main-label">Register with <strong>D</strong>ox<strong>Q</strong>uote</label>
                          <div class="register-content">
                            <form id="regForm" action="#" method="post" class="form-elegant scrollbar-light-blue" >
                              <!-- onsubmit="return registerValidation()" -->
                               <!-- ----------------------new row----------------- -->
                              <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="form-group  col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                  <input type="text" name="fname" class="form-control form-input input-box" required="required" placeholder="First name" id="firstname"/>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                  <input type="text" name="lname" class="form-control form-input input-box" required="required" placeholder="Last name" id="lasstname"/>
                                </div>
                                <div class="col-lg-2"></div>
                              </div>
                              <!-- ----------------------new row----------------- -->
                              <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="form-group  col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                   <input type="text" name="author" required="required" placeholder="Author" class="form-control form-input input-box "  id="author"/>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                  <input type="date" name="birthdate" required="required" placeholder="Mobile no" class="form-control form-input input-box " id="dob"/>
                                </div>
                                <div class="col-lg-2"></div>
                              </div>
                               <!-- ----------------------new row----------------- -->
                               <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="form-group  col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                   <div class="form-check  form-check-inline">
                                    <input type="radio" name="sex" value="Male" required="required" placeholder="Author" class="form-check-input radio" id="male" />&nbsp;<label class="form-check-label text-dark" for="male">Male</label>
                                    <!-- <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12"></div> -->
                                    <input type="radio" name="sex" value="Male" required="required" placeholder="Author" class="form-check-input radio m-1" id="female" /><label class="form-check-label text-dark" for="female">Female</label>
                                  </div>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                  <input type="tel" maxlength="10" minlength="10" name="mobile" required="required" placeholder="Mobile no" class="form-control form-input input-box "  id="mobile"/>
                                </div>
                                <div class="col-lg-2"></div>
                              </div>
                              
                               <!-- ----------------------new row----------------- -->
                              <div class="form-group ">
                                <input type="email" name="email" 
                                 required="required"placeholder="Email" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"  id="email"/><span class="required error" id="email-info"></span>
                              </div>
                               <div class="form-group">
                                <input type="text" name="username" required="required"placeholder="Username" class="form-control form-input input-box col-lg-8 col-sm-12 col-md-12 col-xs-12"  id="username"/><span class="required error" id="username-info"></span>
                              </div>
                               <div class="row">
                                <div class="col-lg-2"></div>
                                  <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                      <input type="password" name="password" required="required" placeholder="Password" class="form-control form-input input-box"  id="password"/>
                                  </div>
                                  <div class="form-group col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                    <input type="password" name="con_password"  required="required" placeholder="Re-password" class="form-control form-input input-box" id="confirm-password" />
                                  </div>
                              </div>
                              <div class="col-lg-2"></div>
                              
                             
                              <div class="row col-lg-8 col-sm-12 col-md-12 col-xs-12">
                                <?php echo $msg; ?>
                                <?php echo $success; ?>  
                              </div>
                              <!-- <div class="form-group">
                               
                              </div>
                              <div class="form-group">
                                
                              </div> -->
                         
                            <!-- --------------------------------------button------------------------------------------- -->
                           <!--  <button type="button" ip="goPrevBtn" onclick="nextPrev(-1)" class="btn outline-btn-gradient col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4"><img src="assets/icon/ic_chevron_left_black_18dp.png">Previous</button>
                           -->  
                            <button type="submit" ip="goNextBtn" class="btn btn-gradient col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 cap" name="registraion-btn">register<img src="assets/icon/ic_chevron_right_white_18dp.png"></button> 
                            
                           <!--  <div style="text-align:center;margin-top:10px;">
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>            
                            </div>    -->                        
                            </form>
                            <div class="link pt-1">
                              <p>Already have an account ? <a href="login.php">Login</a></p>
                            </div>
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
    
    <script type="text/javascript" src="assets/js/steper.js"></script>
    <!-- <script>
      function registerValidation() {
      var valid = true;

      // $("#username").removeClass("error-field");
      // $("#email").removeClass("error-field");
      // $("#password").removeClass("error-field");
      // $("#confirm-password").removeClass("error-field");

      var firstName = $("#firstname").val();
      var lastName = $("#lastname").val();
      var author = $("#author").val();
      var dob = $("#dob").val();
      // var sex = $("#sex");
      var mobile = $("#mobile").val();
      var UserName = $("#username").val();
      var email = $("#email").val();
      var Password = $('#password').val();
      var ConfirmPassword = $('#confirm-password').val();
      var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

      $("#username-info").html("").hide();
      $("#email-info").html("").hide();

      if (UserName.trim() == "") {
        $("#username-info").html("required.").css("color", "#ee0000").show();
        $("#username").addClass("error-field");
        valid = false;
      }
      if (email == "") {
        $("#email-info").html("required").css("color", "#ee0000").show();
        $("#email").addClass("error-field");
        valid = false;
      } else if (email.trim() == "") {
        $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
        $("#email").addClass("error-field");
        valid = false;
      } else if (!emailRegex.test(email)) {
        $("#email-info").html("Invalid email address.").css("color", "#ee0000")
            .show();
        $("#email").addClass("error-field");
        valid = false;
      }
      if (Password.trim() == "") {
        $("#signup-password-info").html("required.").css("color", "#ee0000").show();
        $("#signup-password").addClass("error-field");
        valid = false;
      }
      if (ConfirmPassword.trim() == "") {
        $("#confirm-password-info").html("required.").css("color", "#ee0000").show();
        $("#confirm-password").addClass("error-field");
        valid = false;
      }
      if(Password != ConfirmPassword){
            $("#error-msg").html("Both passwords must be same.").show();
            valid=false;
        }
      if (valid == false) {
        $('.error-field').first().focus();
        valid = false;
      }
      return valid;
      }
    </script> -->
  </body>
</html>
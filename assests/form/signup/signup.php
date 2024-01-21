
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITNESS CLUB</title>
  <!--ICON IMPORT CDN-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <!--  CUSTOMIZED CSS IMPORT -->
  <link rel="stylesheet" href="./signup.css">

  <!--ICON IMPORT BOOTSTRAP CDN-->
  <link href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

</head>  <?php
  include_once "../../../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){
       
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
  
        $pass =trim( $_POST['pass']);
        $cpass = trim($_POST['cpass']);

      if($pass == $cpass){
          $query = "SELECT * FROM `users` where email='$email'";
          $result = mysqli_query($conn , $query);
          if(mysqli_num_rows($result) > 0){
              echo "<script> alert('Already Exits'); 
              window.location.href = './signup.php';
              </script>";
        
          }else{
          $result = mysqli_query($conn , $query);
              $query=" INSERT INTO `users` ( `fname`, `lname`, `email`, `password`) VALUES ( '$fname', '$lname', '$email', '$pass')";
          $result = mysqli_query($conn , $query);
              echo "<script> alert('Registration Successful.  Redirecting to login page'); 
              window.location.href = '../login/login.php';
              reload();
              </script>";
          }
      }else{
        echo '<script>alert("Password does not match");
        window.history.back()
      </script>';
      }
}
}
?>

<body id="contact-us" class="p-4  " style="height: max-content;">
    <div class="container card-contact g-3">
              <div class="row text-center">            
                  <h1 class="text-white">SIGN UP</h1>

              </div>
             
              <form method="post" id="frm" action="#" class="row justify-content-center g-3 px-2 ">
                <div class="col-lg-8 ">
                    <h2 class="">Hello!</h2>
</div>
                  <div class="row col-lg-8">

                    <div class="form-group col-md-12 col-lg-6  mt-md-3">
                      <input type="text" class="form-control" name="fname" placeholder="First Name" required >
                    </div>


                    <div class="form-group col-md-12 col-lg-6  mt-md-3">
                      <input type="text" class="form-control" name="lname" placeholder="Last Name" >
                    </div>

                    <div class="form-group col-md-12 mt-md-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" required >
                    </div>


                  

                    <div class="form-group col-md-12 mt-md-3">
                      <input type="password" class="form-control" name="pass" id="pass" placeholder="Password"  required>
                    </div>

                    <div class="form-group col-md-12 mt-md-3">
                      <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password"  required>
                    </div>

                    <div class="form-group col-md-12 text-center">
                        <input type='submit' class="submit-btn-btn col-lg-6" id="submit" name="submit" value='Sign Up'> </input>  
                    </div>
    

    
                    <div class="text-center mt-3 mb-2">
                        <span style="color: white;">Already Have Account ? <a href="../login/login.php">login Now</a></span>
                    </div>
    
                  </div>
                </div>
              </form>
    
            </div>
            
            <script src="./js/bootstrap.min.js"></script>
    </body>
</html>
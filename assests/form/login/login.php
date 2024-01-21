
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITNESS CLUB</title>
  <!--ICON IMPORT CDN-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <!--  CUSTOMIZED CSS IMPORT -->
  <link rel="stylesheet" href="./log-in.css">

  <!--ICON IMPORT BOOTSTRAP CDN-->
  <link href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

</head>  <?php
  include_once "../../../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){       
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $query = "SELECT * FROM `users` where email='$email' and Password='$pass'";

        $result = mysqli_query($conn , $query);

        if(mysqli_num_rows($result) > 0){        
          echo "<script> alert('Login Successful'); 
          window.location.href = '../../../index.php';
          </script>";
          session_start();
          $_SESSION['login']=$email;
          }else{
          echo "<script> alert('Login Failed');
          window.location.href = './login.php';
             </script>";
        }
    }
}
?>

<body id="contact-us" class="p-5">
    <div class="container card-contact gy-3">
              <div class="row my-5">
                <div class=" text-center">
                  <h1 class="text-white">LOGIN</h1>
                  </div>
              </div>
             
              <form method="post" id="frm" action="#" class="row justify-content-center g-3">
                <div class="col-lg-6 px-5">
                    <h2>Welcome back!</h2>
                  <div class="row">
                    <div class="form-group col-md-12 mt-3 mt-md-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
    
                    <div class="form-group col-md-12 mt-md-3">
                      <input type="password" class="form-control" name="pass" id="exampleFormControlInput1" placeholder="Password" required>
                    </div>
    
                    <div class="form-group col-md-12 text-center">
                        <input type='submit' class="submit-btn-btn col-lg-6" id="submit" name="submit" value='Login'> </input>  
                    </div>
    
                    <div class="forgot text-center mt-3">
                        <a href="../forgot/forgot.php">Forgot Password ?</a>
                    </div>
    
                    <div class="text-center mt-2 mb-4">
                        <span style="color: white;">Don't Have Account ? <a href="../signup/signup.php">Register Now</a></span>
                    </div>
    
                  </div>
                </div>
              </form>
    
            </div>
            
            <script src="./js/bootstrap.min.js"></script>
    </body>
</html>
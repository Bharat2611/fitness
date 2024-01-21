
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
       
        $uname = $_POST['MobNo'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM `users` where email='$uname' and Password='$pass'";


        $result = mysqli_query($conn , $query);

        
    

        if(mysqli_num_rows($result) > 0){
            echo "<script> alert('Login Successful'); 
            window.location.href = '../../../index.php';
            </script>";
          }else{
          echo "<script> alert('Login Failed');
          window.location.href = './login.php';
          reload()
             </script>";
        }


    }
}
?>

<body id="contact-us" class="px-4" style="height: max-content;">
    <div class="container card-contact">
      <div class=" text-center">
        <h1 class="text-white">LOGIN</h1>
      </div>
    <div class="row" >
             
              <form method="post" id="frm" action="#" class="row justify-content-center g-3">
                <div class="col-lg-6 p-5">
                    <h2>Welcome back!</h2>

                  <div class="row">
                    <div class="form-group col-md-12 ">
                      <input type="email" class="form-control" name="MobNo" placeholder="Email" required>
                    </div>
    
                    <div class="form-group col-md-12">
                      <input type="password" class="form-control" name="pass" id="exampleFormControlInput1" placeholder="Password" required>
                    </div>
    
                    <div class="form-group col-md-12 text-center">
                        <input type='submit' class="submit-btn-btn col-lg-6" id="submit" name="submit" value='Login'> </input>  
                    </div>
    
                    <div class="forgot text-center mt-2">
                        <a href="#">Forgot Password ?</a>
                    </div>
    
                    <div class="text-center mt-3">
                        <span style="color: white;">Don't Have Account ? <a href="../signup/signup.php">Register Now</a></span>
                    </div>
    
                  </div>
                </div>
              </form>
    
            </div>
            
            <script src="./js/bootstrap.min.js"></script>
    </body>
</html>
<?php
  include_once "../../../config.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submit'])){       
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $mobno = $_POST['mobno'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bgrp = $_POST['bgrp'];
        $demo = $_POST['demo'];
        $address = $_POST['address'];


        $query = "SELECT * FROM `users` where email='$email'";

        $result = mysqli_query($conn , $query);      
    
        if(mysqli_num_rows($result) > 0){
            $query = "UPDATE `users` SET 
            `fname` = '$fname',
            `mnane` = '$mname',
            `lname` = '$lname',
            `email` = '$email',
            `mobno` = '$mobno',
            `weight` = '$weight',
            `height` = '$height',
            `bgrp` = '$bgrp',
            `demo` = '$demo',
            `address` = '$address'
            

          WHERE
            `email` = '$email'";
        $result = mysqli_query($conn , $query);      

                   echo
                   "<script> alert('Mebership Buyed Our Team will contact soon for more'); 
                   window.location.href = './gold.php';
                   
                      </script>";

          }else{
          echo
          "<script> alert('You have To Login First'); 
          window.location.href = './gold.php';
          
             </script>";
        }


    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS CLUB</title>
    <!--ICON IMPORT CDN-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <!--  CUSTOMIZED CSS IMPORT -->
    <link rel="stylesheet" href="../../css/stylesheeet.css">

    <!--ICON IMPORT BOOTSTRAP CDN-->
    <link href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="contact-us" class="">
    <div class="container card-contact">
        <div class="row">
        </div>
        <div class="forgot">
            <a href="../../../index.php" class="text-white text-start" style="font-size: 18px;">Back to Home Page</a>
            <h2 class="text-white text-center">Fill Correct Information</h2>
        </div>
        <form method="post" id="frm" action="#" class="row justify-content-center ">
            <div class="col-lg-8 p-3">
                <h4 class="text-white text-center " >Membership Type : <span style="color: gold; font-weight: 600;">GOLD</span></h4>
                <div class="row g-3">

                    <div class="form-group col-md-12 col-lg-4">
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                    </div>


                    <div class="form-group col-md-12 col-lg-4 ">
                        <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                    </div>

                    <div class="form-group col-md-12 col-lg-4 ">
                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <input type="tel" class="form-control" name="mobno" placeholder="Mobile No"
                            pattern="[0-9][0-9]{9}" required>
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <input type="tel" class="form-control" name="age" placeholder="Age (In YRS)" required>
                    </div>

                    <div class="form-group col-md-12 col-lg-3">
                        <input type="tel" class="form-control" name="weight" placeholder="Weight (IN KG)" required>
                    </div>

                    <div class="form-group col-md-12 col-lg-3">
                        <input type="tel" class="form-control" name="height" placeholder="Height" required>
                    </div>

                    <div class="form-group col-md-12 col-lg-3">
                        <input type="text" class="form-control" name="bgrp" placeholder="Blood Group" required>
                    </div>

                    <div class="form-group col-md-12 col-lg-3">
                        <input type="text" class="form-control" name="demo" placeholder="weight" required>
                    </div>

                    <div class=" col-md-12 col-lg-12">
                        <textarea type="text" class="form-control" name="address" placeholder="Address (As Per Adhar)"
                            required></textarea>
                    </div>


                 
                    <div class="form-group col-md-12 col-lg-6">
                        <input class="form-control" id="disabledInput" style="cursor:not-allowed;" type="text"
                            name="pretime" placeholder="Preffered Time For Gym (Diamond Members Only)" disabled>
                    </div>

                    <div class="row mt-3 g-3 text-center">
                        <div class="form-group col-md-12 col-lg-4 mx-auto">
                            <h5 class="text-white">Upload Adhar Card</h5>
                            <input type="file" class="form-control" name="adhar">
                        </div>
                        <div class="form-group col-md-12 col-lg-4 mx-auto">
                            <h5 class="text-white">Upload Pan Card</h5>
                            <input type="file" class="form-control" name="pan">
                        </div>
                        <div class="form-group col-md-12 col-lg-4 mx-auto ">
                            <h5 class="text-white">Upload Your Photo</h5>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>


                </div>
            </div>
























            <div class="form-group col-md-12 text-center">
                <input type='submit' class="submit-btn-btn col-lg-6" id="submit" name="submit" value='submit'>
                </input>
            </div>




    </div>
    </div>
    </form>

    </div>

    <script src="./js/bootstrap.min.js"></script>
</body>

</html>
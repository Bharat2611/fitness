<?php
include_once "./config.php";
session_start();
$email = $_SESSION['login'];

// Your form submission code
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $brief = $_POST['brief'];

        $query = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $query = "INSERT INTO `brief_query` (`fname`, `lname`, `email`, `subject`, `brief`) VALUES ('$fname','$lname','$email','$subject', '$brief')";
            $result = mysqli_query($conn, $query);

            echo "<script> alert('Thank you for submitting your gym callback form. We shall be in touch with you shortly!'); 
                window.location.href = './index.php';                   
                </script>";
        } else {
            $query = "INSERT INTO `brief_query` (`fname`, `lname`, `email`, `subject`, `brief`) VALUES ('$fname','$lname','$email','$subject', '$brief')";
            $result = mysqli_query($conn, $query);

            echo "<script> alert('Thank you for submitting your gym callback form. We shall be in touch with you shortly!'); 
                window.location.href = './index.php';                       
                </script>";
        }
    }
}



$sql = "SELECT fname, lname FROM users WHERE email='$email'"; 

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $names = array();

    while ($row = $result->fetch_assoc()) {
        $fullName = $row["fname"] . " " . $row["lname"];

        $names[] = $fullName;
    }
    $_SESSION['names'] = $names;
} else {

}
mysqli_close($conn);

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
  <link rel="stylesheet" href="./assests/css/stylesheeet.css">

  <!--ICON IMPORT BOOTSTRAP CDN-->
  <link href="./assests/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div id="home" >
    <nav class="navbar navbar-expand-lg navbar-light bg-nav fixed-top " id="home">
      <div class="container-fluid ">
        <span class="heading-family" href="#"><img src="./assests/images/gym-logo.png "
            style="height: 60px; width: 80px;">FITNESS CLUB</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-items">
              <a class="nav-links underline-h " aria-current="page" href="#home">Home</a>
            </li>

            <li class="nav-items">
              <a class="nav-links underline-h " aria-current="page" href="#trainer-info">Trainer</a>
            </li>
            <li class="nav-items">
              <a class="nav-links underline-h " aria-current="page" href="#membership">Membership</a>
            </li>

            <li class="nav-items">
              <a class="nav-links underline-h " aria-current="page" href="#contact">Contact Us</a>
            </li>
          </ul>

          <form class="d-flex">
          <?php if (isset($_SESSION['login'])) {  ?>
           
    <div class="  me-lg-5">
    <div class="  me-lg-5 ">
    <li style="list-style: none;" class="me-lg-5 dropdown">
        <a class="nav-link " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                style="width: 50px; height: 50px;" src="./assests/images/image.png" id="profileImage">
        </a>
        <ul class="dropdown-menu me-5" aria-labelledby="navbarDropdown"> 
          
  <div class="text-center"><img src="./assests/images/image.png" alt="Loading" style="height: 60px ; width: 60px;"></div>
       
        <li class="dropdown-item fw-bold">
                <?php  echo $email ?>
            </li>
          <h5 class="dropdown-item text-center mt-3" style="background-color: #fc6f03; font-weight: 400;">HELLO!</h5>
        <li class="dropdown-item text-center">
                <?php  echo  $fullName; ?>

            </li>
       
          
            <li>
                <hr >
            </li>
            <li class=""><a class="dropdown-item mx-auto sign-out-btn text-center" href="./logout.php">
                    Sign Out</a>
                  </li>
                
        </ul>
    </li>
    </div>
    </div>
          
               
                     
                     </div>
                  </div>
          </div>
          </div>
          </form>


  	<?php } 
	  	else { ?>
	  		<a id = "login"  href="./assests/form/login/login.php" class="member-btn" type="submit"> Login</a>
	  	<?php } ?>
      </form>
        </div>
      </div>
    </nav>
  </div>
  <!--NAVBAR ENDS-->

  <!--CAROUSEL START-->
  <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="cara-img">
          <img src="./assests/images/slide1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-caption  d-md-block mx-auto">
          <h5>Forge Your Strength</h5>
          <p>Elevate your fitness journey with state-of-the-art equipment and expert guidance in a dynamic community.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="cara-img">
          <img src="./assests/images/slide2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-caption  d-md-block mx-auto">
          <h5>Sculpt, Sweat, Succeed</h5>
          <p>Transform Your Body and Mind at Peak Performance With Fitness Club.</p>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="cara-img">
          <img src="./assests/images/slide3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-caption  d-md-block">
          <h5>Beyond Limits</h5>
          <p>Ignite Your Passion for Fitness at Fitness Club - Where Goals Become Achievements.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <!--CAROUSEL ENDS-->

  <!--TRAINER INFO START-->
  <div id="trainer-info">
    <div class="section-heading dark-bg">
      <h2 style="color: black;"> <em>Expert</em> Trainer</h2>
    </div>
    <div class="album ">
      <div class="container px-lg-5 ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4">

          <div class="col  py-3">
            <div class="card  px-5">
              <img src="./assests/images/first-trainer.jpg" class="mt-5" alt="LOADING">
              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: Sarah Rodriguez</li>
                  <li>Experience: 10 years</li>
                  <li>Language: English and Spanish</li>
                  <li>Available: Monday to Friday, 8:00 am - 6:00 pm</li>

                  <div class="icon">  
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>

          <div class="col py-3">
            <div class="card  px-5">
              <img src="./assests/images/second-trainer.jpg" class="mt-5" alt="LOADING">
              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: James Smith</li>
                  <li>Experience: 5 years</li>
                  <li>Language: English</li>
                  <li>Available: Tuesday, Thursday, Saturday, 1:00 pm - 9:00 pm</li>

                  <div class="icon">
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>


          <div class="col py-3">
            <div class="card  px-5">
              <img src="./assests/images/third-trainer.jpg" class="mt-5" alt="LOADING">
              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: Aisha Malik</li>
                  <li>Experience: 7 years</li>
                  <li>Language: English, Arabic</li>
                  <li>Available: Monday, Wednesday, Friday, 9:00 am - 5:00 pm</li>

                  <div class="icon">
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>

          <div class="col py-3">
            <div class="card  px-5">
              <img src="./assests/images/fourth-trainer.jpg" class="mt-5" alt="LOADING">

              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: Marcus Johnson</li>
                  <li>Experience: 3 years</li>
                  <li>Available: Monday to Thusday, 5:00 pm - 10:00 pm</li>
                  <li>Language: English and Hindi</li>

                  <div class="icon">
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>


          <div class="col py-3">
            <div class="card  px-5">
              <img src="./assests/images/fifth-trainer.jpg" class="mt-5" alt="LOADING">
              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: Diego Chavez</li>
                  <li>Experience: 2 years</li>
                  <li>Available: Monday to Saturday, 7:00 am - 3:00 pm</li>
                  <li>Language: English and Spanish</li>

                  <div class="icon">
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>


          <div class="col py-3">
            <div class="card  px-5">
              <img src="./assests/images/sixth-trainer.jpg" class="mt-5" alt="LOADING">
              <div class="card-body">
                <ul class="text-start mt-3 mb-4 list-unstyled trainer-info">
                  <li>Name: Emily Nguyen</li>
                  <li>Experience: 6 years</li>
                  <li>Available: Tuesday, Thursday, Sunday, 10:00 am - 8:00 pm</li>
                  <li>Language: English and Vietnamese</li>

                  <div class="icon">
                    <i class="ri-instagram-line inner-icon"></i>
                    <i class="ri-whatsapp-line inner-icon"></i>
                  </div>
                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <!--TRAINER INFO ENDS-->


  <!--MEMBERSHIP START-->
  <div id="membership">
    <div class="container mt-0">
      <header>
        <div class="pricing-header  pb-md-4 mx-auto text-center">
          <!-- <h1 class="display-4 heading-family">Membership</h1> -->
          <div class="section-heading dark-bg">
            <h2 style="color: black;">Membership </h2>
          </div>
          <p class="fs-5 ">A gym membership provides individuals with access to fitness facilities,
            including workout equipment, classes & many more...</p>
        </div>
      </header>

      <main>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

          <div class="col">
            <div class="card mb-4 rounded-3 ">
              <div class="card-header py-3">
                <h4 class="ard-header py-3 header-bg ">GOLD</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">₹ 1000<small class=" fw-light">/mo</small>
                </h1>
                <ul class="text-start mt-3 mb-4 text-start" id="div1">
                  <li> Basic gym facilities</li>
                  <li> Group fitness classes </li>
                  <li> Regular health assessments </li>
                  <li> Standard locker room amenities </li> <br>
             
                </ul>

                <?php if (isset($_SESSION['login'])) {  ?> <a href="./assests/form/membership/gold.php" type="button" class="w-100 member-btn2 ">Buy
                  Membership</a>
                 
                 <?php    }else{
echo "<a href='./assests/form/login/login.php' type='button' class='w-100 member-btn2 ' aria-disabled='true'>Log In first</a>";
                  }?>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card mb-4 rounded-3 ">
              <div class="card-header py-3">
                <h4 class="py-3 header-bg">PLATINUM</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">₹ 2500<small class=" fw-light">/mo</small>
                </h1>
                <ul class="text-start mt-3 mb-4 text-start" id="div2">
                  <li style="color: blue; font-weight: 600;font-size: 18px; cursor: pointer;" id="text1"> Gold benefits
                    plus</li>
                  <li> Priority equipment access </li>
                  <li> Personalized workout plans </li>
                  <li> Enhanced locker room amenities </li>
                  <li>Discounts on extras</li>
                </ul>
                <?php if (isset($_SESSION['login'])) {  ?> <a href="./assests/form/membership/gold.php" type="button" class="w-100 member-btn2 ">Buy
                  Membership</a>
                 
                 <?php    }else{
echo "<a href='./assests/form/login/login.php' type='button' class='w-100 member-btn2 ' aria-disabled='true'>Log In first</a>";
                  }?>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card mb-4 rounded-3 ">
              <div class="card-header py-3">
                <h4 class="py-3 header-bg">DIAMOND</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">₹ 3000<small class=" fw-light">/mo</small>
                </h1>
                <ul class="text-start mt-3 mb-4 text-start" id="div2">
                  <li style="color: blue; font-weight: 600;font-size: 18px; cursor: pointer;" id="div3"> Platinum
                    benefits
                    plus</li>
                  <li> Exclusive classes </li>
                  <li> 24/7 gym access </li>
                  <li> Priority personal training </li>
                  <li>Luxury locker room amenities</li>
                </ul>
                <?php if (isset($_SESSION['login'])) {  ?> <a href="./assests/form/membership/gold.php" type="button" class="w-100 member-btn2 ">Buy
                  Membership</a>
                 
                 <?php    }else{
echo "<a href='./assests/form/login/login.php' type='button' class='w-100 member-btn2 ' aria-disabled='true'>Log In first</a>";
                  }?>
              </div>
            </div>
          </div>

        </div>
    </div>
    </main>
  </div>
  <!--MEMBERSHIP ENDS-->

  <!--CLIENT FEEDBACK START-->
  <section id="reviews" class="bg-cover">
    <div class="container p-lg-">
      <div class="row">
        <div class="section-heading dark-bg">
          <h2>Client <em>Overview</em></h2>
        </div>
      </div>

      <div id="reviewSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#reviewSlider" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">

          <div class="carousel-item active mb-5">
            <div class="row justify-content-center " data-bs-interval="1000">
              <div class="col-lg-8 client-outer">
                <div class="review bg-white p-5 text-center">
                  <p class="mb-0">Olympus Gym has truly changed my life! The trainers are fantastic, the facilities
                    top-notch. I've never
                    been so motivated to stay fit. Highly recommend!</p>

                  <div class=" text-center mt-4">
                    <img class="img-fluid" src="./assests/images/w-client1.png" alt="">
                    <h4 class="mb-0 mt-3">Madhavi Bhide</h4>
                    <span class="star">
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item mb-5">
            <div class="row justify-content-center" data-bs-interval="1000">
              <div class="col-lg-8 client-outer">
                <div class="review bg-white p-5 text-center">
                  <p class="mb-0">Titan Fitness Club is more than just a gym; it's a community. The personalized
                    workouts and supportive
                    atmosphere make every session enjoyable. Proud to be a member!</p>
                  <div class=" mt-4">
                    <img class="img-fluid" src="./assests/images/w-client2.png" alt="">
                    <h4 class="mb-0 mt-3">Ananya Patel</h4>
                    <span class="star">
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-half-fill"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="carousel-item mb-5">
            <div class="row justify-content-center" data-bs-interval="1000">
              <div class="col-lg-8 client-outer">
                <div class="review bg-white p-5  text-center">
                  <p class="mb-0">I've tried many gyms, but none compare to the expertise at Olympus Gym. The staff's
                    commitment to my
                    fitness journey has made a significant impact. Kudos!</p>
                  <div class="person mt-4">
                    <img class="img-fluid" src="./assests/images/m-client1.png" alt="">
                    <h4 class="mb-0 mt-3">Amit Singhania</h4>
                    <span class="star">
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item mb-5">
            <div class="row justify-content-center" data-bs-interval="1000">
              <div class="col-lg-8 client-outer">
                <div class="review bg-white p-5 text-center">
                  <p> Fitness Club is where dedication meets results. The trainers go above and beyond to push you, and
                    the
                    camaraderie among members is truly motivating. Thrilled with my progress!</p>
                  <div class="person mt-4">
                    <img class="img-fluid" src="./assests/images/m-client2.png" alt="">
                    <h4 class="mb-0 mt-3">Karthik Patil</h4>
                    <span class="star">
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-fill"></i>
                      <i class="ri-star-half-fill"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <button class="carousel-control-prev" type="button" data-bs-target="#reviewSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#reviewSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>
  <!--CLIENT FEEDBACK ENDS-->

  
  <!-- CALL TO BECOME MEMBER START -->
  <div id="call-member" class="call-member img-fluid mt-lg-5  p-5 ">
    <div class="container text-center">
      <span class="member-heading">DON’T <span style="color: #ED563B;"> THINK</span>, BEGIN <span
          style="color: #ED563B;">TODAY</span>!</span>

      <p class="mt-lg-2 call-para">Start a fitness journey! Join our gym for personalized support. Don't miss out <br>
        <span class="become-member-txt">Become A Member Today</span> and kick off your path to a healthier, stronger
        you!
      </p>
      <a href="#membership" class="member-btn mt-lg-5">Become A Member</a>
    </div>
  </div>
</div>
  <!-- CALL TO MEMBER END -->

  <!-- VISIT US START -->
  <div id="contact">
    <div class="section-heading dark-bg">
      <h2 style="color: black;">Visit Us</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-lg-7 mx-auto">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119981.26817444539!2d73.72107860073469!3d19.99110534032964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1705778215231!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- VISIT US ENDS -->

        <!--CONTACT US START-->

        <div id="contact-us" class="col-md-12 col-sm-12 col-lg-5  mx-auto p-5">
                <div class="card-contact">
                    <div class="container-fluid">
                        <div class="col-12  ">
                            <div id="contact_us " class="">
                              <h2 class="text-center" style="color: white;font-weight: 500;">Fill Form For Call Back.</h2>
                                <form method="post" action="#" id="frm" class="row g-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="fname" class="form-control"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="lname" class="form-control"
                                            placeholder="Last Name">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" type="email" name="email" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                            required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea style="resize: none;" name="brief" class="form-control"
                                            placeholder="Brief Your Query" ></textarea>
                                    </div>
                                    <center>
                                        <div class="col-lg-12 mx-auto">
                                            <button type="submit" name="submit"
                                                class="submit-btn-btn w-50 form-control mb-3"
                                                value="">Submit</button>

                                        </div>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          


        </div>
      </div>
    </div>

    <!--CONTACT US ENDS-->

  <!-- SCHEDULE STARTS -->
  <div class="container-fluid">
    <section class="section mt-5" id="schedule">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="section-heading dark-bg">
              <h2>Classes <em>Schedule</em></h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="filters">
                <ul class="schedule-filter">
                  <li class="active" data-tsfilter="monday">Monday</li>
                  <li data-tsfilter="tuesday">Tuesday</li>
                  <li data-tsfilter="wednesday">Wednesday</li>
                  <li data-tsfilter="thursday">Thursday</li>
                  <li data-tsfilter="friday">Friday</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-10 offset-lg-1">
              <div class="schedule-table filtering">
                <table>
                  <tbody>
                    <tr>
                      <td class="day-time">Fitness Class</td>
                      <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                      <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                      <td>William G. Stewart</td>
                    </tr>
                    <tr>
                      <td class="day-time">Muscle Training</td>
                      <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                      <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM
                      </td>
                      <td>Paul D. Newman</td>
                    </tr>
                    <tr>
                      <td class="day-time">Body Building</td>
                      <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                      <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                      <td>Boyd C. Harris</td>
                    </tr>
                    <tr>
                      <td class="day-time">Yoga Training Class</td>
                      <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                      <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                      <td>Hector T. Daigle</td>
                    </tr>
                    <tr>
                      <td class="day-time">Advanced Training</td>
                      <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                      <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                      <td>Bret D. Bowers</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <!-- SCHEDULE End -->

  <!-- FOOTER START -->
  <footer class="bd-footer  mt-5 footer-main">
    <div class="container py-5">
      <div class="row">
        <div class="col-6 col-lg-2 mb-3 ms-lg-5 ">
          <h5>Links</h5>
          <ul class="list-unstyled ">
            <li class="mb-2  "><a href="#home">Home</a></li>
            <li class="mb-2 "><a href="#trainer-info">Trainer</a></li>
            <li class="mb-2 "><a href="#membership">Membership</a></li>
            <li class="mb-2 "><a href="#contact-us">Contact Us</a></li>
          </ul>
        </div>


      </div>
    </div>
  </footer>
  <!-- FOOTER ENDS -->
  <!-- SCRIPT IMPORT START    -->
  <script src="./assests/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  <script src="./assests/js/jquery-2.1.0.min.js"></script>
  <script src="./assests/js/index.js"></script>

  <script>function toggleDropdown() {
    var dropdown = document.getElementById('dropdownContent');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}

// Close the dropdown if the user clicks outside of it
window.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdownContent');
    var profileImage = document.getElementById('profileImage');
    if (event.target !== dropdown && event.target !== profileImage) {
        dropdown.style.display = 'none';
    }
});</script>
</body>

</html>
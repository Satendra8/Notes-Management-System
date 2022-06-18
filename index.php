
<?php

require 'includes/dbcon.php';

if (isset($_REQUEST["submit"])) {

    $name = mysqli_real_escape_string($conn, trim($_REQUEST['name']));
    $email = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_REQUEST['phone']));
    $descrip = mysqli_real_escape_string($conn, trim($_REQUEST['descrip']));

    $token = bin2hex(random_bytes(15));


    if (!empty($name) && !empty($email) &&  !empty($phone) && !empty($descrip)) {

        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d H:i:s ");
        $user = "Customer";
        //  echo $today;
        //$adminname = $_SESSION["adminname"];
        $insertqry = "insert into contactform(custname,email,phone,description,UserType,AddDate,token)
            values('$name','$email','$phone','$descrip','$user','$today','$token')";

        // mysqli_query($conn, $insertqry);
        // print_r(mysqli_error($conn));
        // exit;

        if (mysqli_query($conn, $insertqry)) {
?>
            <script>
                alert("Message Send Successfully");
            </script>
        <?php
        } else {
            print_r("Error: " . $insertqry . "<br>" . mysqli_error($conn));
            exit;
        ?>
            <script>
                alert("Message Not Send");
            </script>
<?php
        }
    }
}
?>

<?php

require 'includes/header.php';
require 'links/links.php';

?>
<!-- ************************************ Start NavBar Code ************-->
<nav class="mainnavbar">
  <div class="max-width">
    <div class="logo"><a href="#">E Learning</a></div>
    <div class="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Feedback</a></li>
    </div>
    <div class="hamburger" id="hamburger">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</nav>

<!-- ########################################### End NavBar Code  ###############################-->

<!-- ************************************ Start Home Code  ************  -->
<!-- home page Started-->

<section class="home">
  <div class="center-div">
    <div class="home-content">
      <h1>welcome To E-Learning Website</h1>
      <p>Learn To Get Success</p>
    </div>
  </div>
</section>
<!-- home page ended-->
<!-- ########################################### End Home Code  ###############################-->

<!--Service started-->
<div class="service-section">
  <div class="inner-width">
    <h1 class="section-title">Our Services</h1>
    <div class="borders"></div>
    <div class="service-container">
      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Notes</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>


      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Question Paper</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>


      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Sample Papers</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>


      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Projects</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>


      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Reference Books</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>


      <div class="service-box">
        <div class="service-icons">
          <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="service-title"><a href="login.php">Presentations</a></div>
        <div class="service-desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Quae asperiores maiores labore, debitis suscipit optio totam laborum ea voluptas cumque sunt adipisci soluta expedita error tempora provident sapiente aliquam molestiae.
        </div>

      </div>
    </div>
  </div>
</div>
<!--Service ended-->

<!-- Contact form   -->
<section class="contact py-5" id="contact">
  <div class="container">
    <h1 class=" text-center text-dark p-0">Contact Us</h1>
    <p class="text-center">
      Our Mangar will Contact You Shortly Time
    </p>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-6">
              <label for="">Name</label>
              <input type="text" name="name" value="" class="form-control bg-light p-1">
            </div>
            <div class="col-lg-6">
              <label for="">Phone</label>
              <input type="number" name="phone" value="" class="form-control bg-light p-1">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <label for="">Email</label>
              <input type="email" name="email" value="" class="form-control bg-light p-1">
            </div>
          </div>
          <div class="row py-3">
            <div class="col-lg-12">
              <label for="">Message</label>
              <textarea name="descrip" class="form-control bg-light" id="" cols="20" rows="6"></textarea>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- //Contact form -->

<!--footer started-->
<div class="footer">
  <div class="inner-footer">
    <div class="footer-items">
      <h1>E-Library</h1>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi ab asperiores earum labore rerum! Cupiditate omnis mollitia quam error sint, perferendis ratione sed, laudantium rerum aliquam facere nobis adipisci inventore?

      </p>

    </div>
    <div class="footer-items">
      <h2>Quick Links</h2>
      <div class="border"></div>
      <ul>
        <a href="index.html">
          <li>Home</li>
        </a>
        <a href="about.html">
          <li>About</li>
        </a>
        <a href="contact.html">
          <li>Contact</li>
        </a>
        <a href="service.html">
          <li>Service</li>
        </a>
        <a href="feedback.html">
          <li>Feedback</li>
        </a>
      </ul>

    </div>
    <div class="footer-items">
      <h2>Services</h2>
      <div class="border"></div>
      <ul>
        <a href="">
          <li>Notes</li>
        </a>
        <a href="">
          <li>Question Paper</li>
        </a>
        <a href="">
          <li>Sample Papers</li>
        </a>
        <a href="">
          <li>Projects</li>
        </a>
        <a href="">
          <li>Reference Books</li>
        </a>
      </ul>

    </div>
    <div class="footer-items">
      <h2>Contact</h2>
      <div class="border"></div>
      <ul>
        <li><i class="fa fa-map-marker" aria-hidden="true"></i>E-192, Shashtri Nagar</li>
        <li><i class="fa fa-phone-square" aria-hidden="true"></i>+916734618888</li>
        <li><i class="fa fa-envelope" aria-hidden="true"></i>rajkumar21@gmil.com</li>
      </ul>
      <div class="social-media">
        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <i class="fa fa-instagram" aria-hidden="true"></i>
        <a href=""><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>


      </div>

    </div>

  </div>
  <div class="footer-bottom">
    copyright & copy;E-Library . All rights reserved.


  </div>

</div>

<!--footer ended-->

<?php

require 'includes/footer.php';

?>
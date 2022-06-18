<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Our Team</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .wrapper {
            width: 100%;
            min-height: 100vh;
            background: rgb(184, 184, 184);
            overflow: hidden;
        }

        .title {
            text-align: center;
            padding-top: 70px;
            font-size: 22px;
        }

        .title::after {
            content: "";
            height: 4px;
            width: 150px;
            background-color: #fff;
            display: block;
            margin: 0px auto;
        }

        .team {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 100px auto;
        }

        .main:hover {
            box-shadow: 0px 7px 11px 0px rgba(19, 18, 18, 0.8);
            background: rgb(192, 68, 68);
        }

        .main {
            width: 250px;
            background-color: #fff;
            box-shadow: 0px 5px 8px 0px rgba(0, 0, 0, 0.4);
            margin-left: 20px;
            padding: 0px 10px;
            letter-spacing: 2px;
        }

        .image {
            width: 65%;
            margin: -50px auto;
        }

        .image img {
            width: 100%;
            border-radius: 50%;
            border: 8px solid #fff;
        }

        .description {
            display: block;
            margin: 50px 0px 20px 0px;
            text-align: center;
        }

        .description h2 {
            margin-bottom: 7px;
        }

        .description h4 {
            color: #ff9307;
        }

        .description p {
            font-size: 15px;
            color: #141403;
            font-family: sans-serif;
            margin-top: 20px;
        }

        .social {
            font-size: 25px;
        }

        .social i {
            margin: 20px 10px;
            cursor: pointer;
        }

        .social i:hover {
            color: #9e9e89;
            transition: 0s ease;
        }

        @media screen and (max-width: 780px) {
            .team {
                width: 100%;
                margin-top: 20px;
                flex-direction: column;
            }

            .main {
                width: 90%;
                margin-top: 75px;
                margin-left: 0px;
            }

            .title {
                padding-top: 75px;
            }
        }
    </style>

</head>

<body>
    <div class="wrapper">

    <nav class="mainnavbar">
      <div class="max-width">
        <div class="logo"><a href="#">E Learning</a></div>
        <div class="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="register.php">Login</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Feedback</a></li>
        </div>
        <div class="hamburger" id="hamburger">
          <i class="fa fa-bars"></i>
        </div>
      </div>
    </nav>
        <div class="title">
            <h2>About</h2>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Real Estate Management System</h1>
                <p class="lead">
                    We have provided a platform where anyone can visit and find their dream home, then can login on our website as a user. This service is also for the persons who want to sell their house,
                    and they can come on our website as client.
                    We are taking care of each and every person, and providing a services through which everyone is comfortable.
                    <br><br>
                    We have provided an online presence and a Real Estate Management System for a Real Estate company that provides marketing tools for property Managers. Using the internal system the Property Managers will get an effective way to promote their rental property,
                    real estate listing, and vacation rentals services for free.
                    Property managers have been managing relevant data for as long as the rental market has existed.
                    The Real estate Company offers free way to promote rental property, real estate listing, or vacation rentals which is easy to use.
                    the Real estate Company provides a free marketing tool for all types of properties. User can post the properties on their professional template for more exposure such as Homes for Sale, or Rent.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
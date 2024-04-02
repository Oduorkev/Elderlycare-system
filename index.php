<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location: login.php');
    exit;
}

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM user
        WHERE id = {$_SESSION["user_id"]}";

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   

    <!--Aos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>Elderly Nutrition</title>
    <link rel="stylesheet" href="style.css">


</head>

<body id="bg">
    <style>
        /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
        #hero {
            width: 100%;
            height: calc(100vh - 110px);
            background: url("images/fudd.jpg") top center;
            background-size: cover;
            position: relative;

        }

        #hero:before {
            content: "";
            background: ghostwhite;
            position: relative;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero h1 {
            margin: 0 0 10px 0;
            font-size: 48px;
            font-weight: 700px;
            top: 150px;
            margin: 100px;
            margin-left: 200px;
            line-height: 56px;
            box-shadow: 5px 5px 8px #040404;
            text-transform: uppercase;
            color: honeydew;
        }

        .d-flex {
            display: flex !important;
        }

        #hero h2 {
            color: white;
            text-align: center;
            margin: 100px;
            margin-left: 140px;
            margin-bottom: 300px;
            box-shadow: 5px 5px 8px #040404;
            font-size: 24px;
        }

        #hero .btn-get-started {
            font-family: "Raleway", sans-serif;
            text-transform: uppercase;
            font-weight: 550;
            font-size: 14px;
            margin: 10px;
            margin-left: 660px;
            bottom: 150px;
            position: relative;
            justify-content: center;
            letter-spacing: 0.5px;
            display: inline-block;
            padding: 13px 28px;
            transition: 0.5s;
            box-shadow: 5px 5px 8px #090909;
            border: 2px solid #c3a8a8;
            background-color: azure;
            color: #030007;
        }

        #hero .btn-get-started:hover {
            background: #cc1616;
            border-color: #cc1616;
        }

        @-webkit-keyframes fade-up {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);

                opacity: 1;
            }

            75% {
                -webkit-transform: translateY(-20px);
                transform: translateY(-20px);

                opacity: 0;
            }
        }

        @keyframes fade-up {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);

                opacity: 1;
            }

            75% {
                -webkit-transform: translateY(-20px);
                transform: translateY(-20px);

                opacity: 0;
            }
        }

        .bx-fade-up {
            -webkit-animation: fade-up 1.5s infinite linear;
            animation: fade-up 1.5s infinite linear;
        }

        .bx-fade-up-hover:hover {
            -webkit-animation: fade-up 1.5s infinite linear;
            animation: fade-up 1.5s infinite linear;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        @media (max-width: 768px) {
            #hero {
                text-align: center;
            }

            #hero .container {
                padding-top: 40px;
            }

            #hero h1 {
                font-size: 28px;
                line-height: 36px;
            }

            #hero h2 {
                font-size: 18px;
                line-height: 24px;
                margin-bottom: 30px;
            }
        }

        .dropdown-content {
            display: block;
            position: relative;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            opacity: .8;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: green;
            opacity: .6;
            
        }
    </style>

      <!--Header starts-->
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="./logo.jpg">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php" class="active">Home</a>
                    </li>
                    <li>
                        <a href="nutrition.html">Nutrition</a>
                    </li>
                    <li>
                        <a href="recipes.html">Recipes</a>
                    </li>
                    <li>
                        <a href="fitness.html">Fitness</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>

                </ul>
                <div class="login-signup">
                    <a href="login.php">Login/Sign-up</a>
                </div>
            </nav>
        </div>
        <div class="header-right">
            <div class="login-signup">
            <div class="dropdown-content">    
                <a href="login.php" class="dropbtn">Login/Sign-up</a>
                <a href="logout.php" >Logout</a>
               
               <?php if (isset($user)) : ?>

               <?php else : ?>

               <?php endif; ?>
            </div>
            </div><br>
                
        
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>


   

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            <h1>Welcome to Elderly Nutrition Application</h1>
            <h2> <em>"We provide diet plans, recipes and fitness videos to improve your health or better your lifestyle"</em> </h2>
            <a href="nutrition.html" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->




    <section class="seculd">
        <div style="width: 700px; height: 800px;  ">
           

        </div>

    </section>

    	<!-- Insert the preloader container and loading icon -->
	

    <!--scroll-top-->
    <button id="btnScrollToTop">
        <i class="material-icons">arrow_upward</i>
    </button>





   
    <!--footer starts-->
    <footer class="footer">
        <div class="footer-bottom">
            <p>copyright &copy;2023 geriatricNutrition. designed by <span>Abdiaziz</span></p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
            
        </footer>

    <!--Footer ends-->



    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }

        window.addEventListener("scroll", function() {
            const footer = document.querySelector("footer");
            const footerPosition = footer.getBoundingClientRect().top + window.pageYOffset;
            const windowPosition = window.innerHeight + window.pageYOffset;

            if (windowPosition >= footerPosition) {
                footer.classList.remove("hide-footer");
            } else {
                footer.classList.replace("hide-footer");
            }
        });


        const btnScrollToTop = document.querySelector("#btnScrollToTop");

btnScrollToTop.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });

    $("html, body").animate({
        scrollTop: 0
    }, 1000); // increase the duration to 1000ms (1 second)
});



        AOS.init();

      

    </script>

    <script src="app.js"></script>
</body>
</html>
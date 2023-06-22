<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATNOS</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap">
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.php" class="logo">
                Baggage Service
            </a>
            <div class="sidebar">
                <ul>
                    <li class="active">
                    <li><a href="#header">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <!-- <li><a href="contact.php">Contact</a></li> -->
                </ul>
            </div>
            <script src="script1.js"></script>
            <div class="nav-links" id="navLinks">
                <!-- Reposnive bar open and close -->
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            <!-- Reposnive bar open and close -->
        </nav>

        <div class="text_box">
            <p></p>
            <h1>Airport Baggage Check Service</h1>
            <p></p>
            <p id="headtext">Platform Research</p>
            <p>Discover Smart System Solutions
                <br> to Optimize Baggage Check
            </p>
            <a href="login.php" class="hero_btn">Login</a>
        </div>
    </section>
    <!-- Call To Action Section Start -->
    <section class="cta">
        <h1>Get ahead with our latest news & updates!</h1>
        <a href="contact.php" class="hero_btn">CONTACT US</a>
    </section>
    <!-- Call To Action Section End -->

    <!-- Footer Section Start -->
    <section class="footer">
        <hr>
        <p>Copyright © 2023 <a href="#footer">PT Angkasa Pura I</a> All Rights Reserved</p>
    </section>
    <!-- Footer Section End -->

    <script src="script.js"></script>
</body>

</html>
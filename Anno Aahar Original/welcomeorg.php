<?php

session_start();

if (!isset($_SESSION['organization'])){
    header("Location: index.php" );
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Anno Aahar</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Sabar Adhikar Anno Aahar</span>
                <span class="site-heading-lower">Anno Adhikar</span>
            </h1>
        </header>
        <?php require_once 'nav.php'; ?>
        <div class="member-name">
        <?php echo "<h1>Welcome " . $_SESSION['organization'] . "</h1>"; ?>
        <br>
        <br>
        <section class="organization">
            <h1 class="h-primary center">Updates</h1>
            <div id="ngo">
                <div class="box">
                    <h2 class="h-secondary center">Arslan</h2>
                    <!-- <img src= "picngo.jpg" alt="image not available"> -->
                    <p class="center">
                        <h3 class="h-three center">ADDRESS:A/2 ABC SARANI KOLKATA-50</h3><br>
                        <h3 class="h-three center">CONTACT:+91XXXXXXXXXX</h3>
                        <h3 class="h-three center">QUANTITY OF FOOD(No. of person): 6</h3>
                        <h3 class="h-three center">PICKUP BY:12.30</h3>
                    </p>
                </div>
                <div id="ngo">
                    <div class="box">
                        <h2 class="h-secondary center">Zeeshan</h2>
                        <!-- <img src= "PICNGO2.jpg" alt="image not available"> -->
                        <p class="center">
                            <h3 class="h-three center">ADDRESS:22/Q FUD ROAD KOLKATA-10</h3><br>
                            <h3 class="h-three center">CONTACT:+91XXXXXXXXXX</h3>
                            <h3 class="h-three center">QUANTITY OF FOOD(No. of person): 5</h3>
                        <h3 class="h-three center">PICKUP BY:12.30</h3>
                        </p>
                    </div>
                    <div id="ngo">
                        <div class="box">
                            <h2 class="h-secondary center">Royal Indian</h2>
                            <!-- <img src= "PCNGO3.jpg" alt="image not available"> -->
                            <p class="center">
                                <h3 class="h-three center">ADDRESS:15-C UNB SARANI KOLKATA-17</h3><br>
                                <h3 class="h-three center">CONTACT:+91XXXXXXXXXX</h3>
                                <h3 class="h-three center">QUANTITY OF FOOD(No. of person): 5</h3>
                        <h3 class="h-three center">PICKUP BY:12.30</h3>
                            </p>
            </div>
        </section>
        <section class="centre">
        <a class="abc" href="logout.php">logout</a>
        </section>
        <div>
            
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
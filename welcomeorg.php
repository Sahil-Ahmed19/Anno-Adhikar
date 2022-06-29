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
        <section class="organization">
            <h1 class="h-primary center">Updates</h1>
           
                <?php

                $server = "localhost";
                $user = "root";
                $pass = "Sahil339273$";
                $database = "updatefood";

                $conn = mysqli_connect($server,$user,$pass,$database);

                if(!$conn){
                    die("<script>alert('Connection Failed.')</script>");
                }

                $selectquery = " SELECT * FROM foodup";
                $query = mysqli_query($conn,$selectquery);

                while($res = mysqli_fetch_assoc($query)){
                    
                ?>
                 <div id="ngo">
                <div class="box">
                   
                        <h2 class="h-secondary center"><?php echo $res['restaurant'] . "<br>"; ?></h2>
                        <p class="center">
                                <h3 class="h-three center">Address: <?php echo $res['address'] . "<br>"; ?></h3>
                                <h3 class="h-three center">Landmark: <?php echo $res['landmark'] . "<br>"; ?></h3>
                                <h3 class="h-three center">Contact: <?php echo $res['contact'] . "<br>"; ?></h3>
                                <h3 class="h-three center">Email: <?php echo $res['email'] . "<br>"; ?></h3>
                                <h3 class="h-three center">Food left for number of people: <?php echo $res['food'] . "<br>"; ?></h3>
                                <h3 class="h-three center">Pickup Before: <?php echo $res['time'] . "<br>"; ?></h3>
                                <h3 class="h-three center"><img src="<?php echo 'uploads/'.$res["file_name"];?>" height="100px" width="100px" alt=""/></h3>
                        </p>
                </div> 
                <?php
                }
                ?>
                
        </section>
        <section class="centre1">
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
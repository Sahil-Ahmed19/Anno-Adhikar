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
        <button class="tablink" onclick="openPage('Restaurants', this, '#2F170F')" id="defaultOpen">Restaurants</button>
        <button class="tablink" onclick="openPage('Organization', this, '#2F170F')">Organizations</button>
        <div id="Restaurants" class="tabcontent">
        <?php


        include 'configorg.php';

        session_start();

        error_reporting(0);

        if (isset($_SESSION['restaurant'])){
            header("Location: welcome.php" );
        }

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['restaurant'] = $row['restaurant'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['landmark'] = $row['landmark'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['email'] = $row['email'];
                header("Location: welcome.php");
            }else{
                echo "<script>alert('Email or Password is Wrong.')</script>";
            }
        }

        ?>
        <section class="login-form">
            <div class="container-form">
                <form action="" method="POST" class="login-email">
                    <p class="login-text">Login</p>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Login</button>
                    </div>
                    <p class="login-register-text">Don't have an account? <a href="register.php">Register here</a>.</p>
                </form>
            </div>
        </section>    
        </div>
        <div id="Organization" class="tabcontent">
        <?php


        include 'configorg.php';

        session_start();

        error_reporting(0);

        if (isset($_SESSION['organization'])){
            header("Location: welcomeorg.php" );
        }

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM orgusers WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['organization'] = $row['organization'];
                header("Location: welcomeorg.php");
            }else{
                echo "<script>alert('Email or Password is Wrong.')</script>";
            }
        }

        ?>
        <section class="login-form">
            <div class="container-form">
                <form action="" method="POST" class="login-email">
                    <p class="login-text">Login</p>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Login</button>
                    </div>
                    <p class="login-register-text">Don't have an account? <a href="orgregister.php">Register here</a>.</p>
                </form>
            </div>
        </section>    
        </div>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
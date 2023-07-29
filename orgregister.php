<?php


include 'configorg.php';

error_reporting(0);

session_start();

if (isset($_SESSION['organization'])){
    header("Location: loginregister.php" );
}

if(isset($_POST['submit'])){
    $organization = $_POST['organization'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM orgusers WHERE email='$email'";
        $result = mysqli_query($conn , $sql);
        if($result->num_rows>0){
            echo "<script>alert('Email ALready Exists.')</script>";
        } else{
            $sql = "INSERT INTO orgusers (organization, address, landmark, contact, email, password)
                VALUES ('$organization', '$address', '$landmark', '$contact', '$email', '$password')";
            $result = mysqli_query($conn , $sql);
            if($result){
            echo "<script>alert('Successfully Registered.')</script>";
            $organization = "";
            $address = "";
            $landmark = "";
            $contact = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
            } else{
            echo "<script>alert('Oops! Something Went Wrong!!!.')</script>";
            }
        }
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
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
        <!-- <section class="page-section cta">
            <div class="NgoregForm">
                <h1>Connect with Us</h1>
                <form action="register.php" method="post">
                    <p>Name of Organisation:*<br><input type ="text" name="oname" required></p>
                    <p>Address:*<br><textarea name="oaddress" required></textarea></p>
                    <p>Email Id*:<br><input type ="email" name="oemail" required></p>
                    <p>Contact Number*:<br><input type ="tel" name="ocontact" required></p>
                    <button id="osubmit">Submit</button>
                </form>
            </div>
        </section> -->
        <section class="login-form">
            <div class="container-form">
                <form action="" method="POST" class="login-email">
                    <p class="login-text" style="font-size : 2rem; font-weight:800;">Register Organization</p>
                    <div class="input-group">
                        <input type="text" placeholder="Organization Name" name="organization" value="<?php echo $organization; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="textarea" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Landmark" name="landmark" value="<?php echo $landmark; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="tel" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="btn">Register</button>
                    </div>
                    <p class="login-register-text">Already have an account? <a href="loginregister.php">Login here</a>.</p>
                </form>
            </div>
        </section>    
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

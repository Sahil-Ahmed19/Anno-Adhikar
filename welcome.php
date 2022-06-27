<?php

session_start();

if (!isset($_SESSION['restaurant'])){
    header("Location: index.php" );
}

$server = "localhost";
$user = "root";
$pass = "Sahil339273$";
$database = "updatefood";

$conn = mysqli_connect($server,$user,$pass,$database);

if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$restaurant = $_SESSION['restaurant'];
$address = $_SESSION['address'];
$landmark = $_SESSION['landmark'];
$contact = $_SESSION['contact'];
$email = $_SESSION['email'];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $food = $_POST['food'];
    $time = $_POST['time'];
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO foodup (restaurant, address, landmark, contact, email, food, time, file_name, uploaded_on)
            VALUES ('$restaurant', '$address', '$landmark', '$contact', '$email', '$food','$time','".$fileName."',NOW())";
            $result = mysqli_query($conn , $sql);
            if($result){
                echo "<script>alert('Updated Successfully.')</script>";
            }else{
                echo "<script>alert('Oops! Something Went Wrong!!!.')</script>";
            }
        }
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
        <div class="member-name">
        <?php echo "<h1>Welcome " . $restaurant . "</h1>"; ?>
        </div>

        <section class="update">
        <div class="updateform">
        <h2>Food is getting wasted?</h2>
        <h3>Inform the NGOs</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <p>Food left for number of people :</p>
        <div class="te">
             <input type="number" name="food" value="<?php echo $food; ?>" required>
        </div>
        <p>Pickup before:</p>
        <div class="te">
            <input type="datetime-local" name="time" value="<?php echo $time; ?>" required>
        </div>
        <div>
        Select Image File to Upload:
        <input type="file" name="file">
        </div>
        <button name='submit'>Submit</button>
        </form>
        </div>
        <a href="logout.php">logout</a>
        </section>
        
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Sarah Meng, Anna Wu">
    <meta name="description" content="Website to make your own stationery">
    <meta name="keywords" content="make your own, stationery, custom, customize">

    <title>Make Your Own Stationery</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include "includes/navbar.php"; ?>

    <main>
        <p>
            <?php
        
            // if user is logged in, display saved stuff from database
            if (isset($_SESSION["username"])) {
                // greet
                echo "Welcome, " . htmlspecialchars($_SESSION["username"]) . "! Here are your creations.";
                
                // show the pretties from database
                
            }
            // else, if user is a guest, display saved stuff from cookies
            else {
                // inform
                echo 'You are not logged in, so your creations displayed here will only be saved on this browser until the cookies from this website are cleared or a week has passed, whichever happens first.</p>';
                echo '<p>Please <a href="login.php">log in</a> or <a href="register.php">register</a> to ensure you do not lose access to your creations.';
                
                // show the pretties from cookies
                
            }
            ?>
        </p>
    </main>


</body>

</html>

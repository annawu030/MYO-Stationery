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
        
            <?php
        
            // if user is logged in, display saved stuff from database
            if (isset($_SESSION["username"])) {
                // greet
                echo "<p>Welcome, " . htmlspecialchars($_SESSION["username"]) . "! </p>";
                
                // show the pretties from database
                
            }
            // else, if user is a guest, display saved stuff from cookies?
            else {
                // moved to a separate page for my sanity -Sarah
                include "includes/account-guest.php";
                
            }
            ?>
        
    </main>


</body>

</html>

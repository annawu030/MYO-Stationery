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
        <form action="login.php" name="login" method="post">
            <fieldset>
                <legend>Log in</legend>
                <label for="username">Username: </label>
                <input type="text" name="username" />
                <label for="password">Password: </label><input type="password" name="password" /> <br />
                <input type="submit" value="Log in" />
            </fieldset>
        </form>
    </main>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "hi";
            
            // currently hard-coded
            if ($_POST["username"] === "Sarah" && $_POST["password"] === "Sarah")
            {
    ?>
    <script type="text/javascript">
        window.location = "account.php";

    </script>
    <?php
            }
            else {
                echo "incorrect";
            }
        }
    
    ?>


</body>

</html>

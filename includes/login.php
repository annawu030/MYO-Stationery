<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // need to look at database
        // credentials currently hard-coded:
        if ($_POST["username"] === "Sarah" && $_POST["password"] === "Sarah")
        {
            
            $_SESSION["username"] = $_POST["username"];
            
            // there's going to be a flash of this page before the redirect below kicks in
            // so reassure the user, especially if they have JS disabled
            echo '<p class="success">You have logged in!</p>';
?>
<script type="text/javascript">
    window.location = "account.php";

</script>
<?php
        } // end of if (credentials are valid)

        else {
            echo '<p class="error">Login failed. We could not find that combination of username and password.</p>';
        }
    } // end of if (method is POST)

?>

<?php
    // if user is already logged in, display a message
    if (isset($_SESSION["username"]) && $_SERVER["REQUEST_METHOD"] !== "POST") {
        echo '<p>You are already logged in as ' . $_SESSION["username"] . '. Do you want to <a href="logout.php">log out</a>?</p>';
    }

    else { // if user is not logged in, provide the form
?>
<form action="login.php" name="login" method="post">
    <fieldset>
        <legend>Log in</legend>
        <label for="username">Username: </label>
        <input type="text" name="username" />
        <label for="password">Password: </label><input type="password" name="password" /> <br />
        <input type="submit" value="Log in" />
    </fieldset>
</form>
<?php
        }
?>

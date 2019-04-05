<?php

    // when displaying username, need to escape!
    // everyone on StackOverflow says to escape on the way out, not on the way in
    // because of double-escaping and wrong-language-escaping issues

    // this could be better organized

    // handle post request

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // extra security
        // if the redirect doesn't kick in and the page is refreshed
        // or if a request is faked with AJAX
        if (isset($_SESSION["username"])) {
            echo '<p>Heads up! You are already logged in as ' . htmlspecialchars($_SESSION["username"]) . '. Do you want to <a href="logout.php">log out</a>?</p>';
            // and then get the hell outta here
            exit();
        }
        
        // need to look at database and make sure the username doesn't already exist
        // currently hard-coded:
        if ($_POST["username"] === "Sarah")
        {
            echo '<p class="error">Sorry, that username is already taken.</p>';
        }

        else {
            // need to add to database...
            // add to database here
            
            // and log them in automatically
            $_SESSION["username"] = $_POST["username"];
            
            // there's going to be a flash of this page before the redirect below kicks in
            // so reassure the user, especially if they have JS disabled
            echo '<p class="success">You have registered! You have been automatically logged in.</p>';
?>
<script type="text/javascript">
    window.location = "account.php";

</script>
<?php
        } // end of if (registration is successful)
    } // end of if (method is POST)



    // now, to display additional page content

    // if user is already logged in, display a message
    if (isset($_SESSION["username"]) && $_SERVER["REQUEST_METHOD"] !== "POST") {
        echo '<p>You are already logged in as ' . htmlspecialchars($_SESSION["username"]) . '. Do you want to <a href="logout.php">log out</a>?</p>';
    }

    else { // if user is not logged in, provide the form
?>
<form action="register.php" name="register" method="post">
    <fieldset>
        <legend>Registration</legend>
        <label for="username">Username: </label>
        <input type="text" name="username" />
        <br /><label for="password">Password: </label>
        <input type="password" name="password" />
        <br /><input type="submit" value="Log in" />
    </fieldset>
</form>
<?php
        }
?>

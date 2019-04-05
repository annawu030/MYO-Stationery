<?php

    // when displaying username, need to escape!
    // everyone on StackOverflow says to escape on the way out, not on the way in
    // because of double-escaping and wrong-language-escaping issues

    // this could be better organized...

    // handle POST request

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // extra security
        // if the redirect doesn't kick in and the page is refreshed
        // or if a request is faked with AJAX
        if (isset($_SESSION["username"])) {
            echo '<p>Heads up! You are already logged in as ' . htmlspecialchars($_SESSION["username"]) . '. Do you want to <a href="logout.php">log out</a>?</p>';
            // and then get outta here real fast
            exit();
        }
        
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



    // now, to display additional page content

    // if user is already logged in, display a message
    if (isset($_SESSION["username"]) && $_SERVER["REQUEST_METHOD"] !== "POST") {
        echo '<p>You are already logged in as ' . htmlspecialchars($_SESSION["username"]) . '. Do you want to <a href="logout.php">log out</a>?</p>';
    }

    else { // if user is not logged in, provide the form
?>
<form action="login.php" name="login" method="post">
    <fieldset>
        <legend>Log in</legend>
        <label for="username">Username: </label>
        <input type="text" name="username" />
        <br /><label for="password">Password: </label><input type="password" name="password" />
        <br /><input type="submit" value="Log in" />
    </fieldset>
</form>
<?php
        } // end of else (user is not logged in)
?>

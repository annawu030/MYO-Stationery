<?php

    // when displaying username, need to escape!
    // everyone on StackOverflow says to escape on the way out, not on the way in (or through, I guess)
    // because of double-escaping and wrong-language-escaping issues

    // this could be better organized

    // handle get request

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        /* in the event that we rearrange things and do need this validation
        if (isset($_SESSION["username"])) { // if user was being sneaky while logged in
            echo '<p class="error">You are already logged in as ' . htmlspecialchars($_SESSION["username"]) . '. Do you want to <a href="logout.php">log out</a>?</p>';
            exit();
        }
        */
        
        // user must be a guest now

        if (isset($_GET["name"])) {
            $newName = $_GET["name"];

            if (isset($_COOKIE["name"])) {
                $oldName = $_COOKIE["name"];
                echo '<p class="success">Name changed from ' . htmlspecialchars($oldName) . ' to ';
                setcookie("name", $newName, time() + (60 * 60 * 24 * 7)); // 7 days
                echo htmlspecialchars($newName) . ".</p>";
            }
            else {
                echo '<p class="success">Name set to ';
                setcookie("name", $newName, time() + (60 * 60 * 24 * 7)); // 7 days
                echo htmlspecialchars($newName) . ".</p>";
            }
        }
    } // end of if (method is GET)



    // now, to display page content

    // greet
    function welcomeMessage($name) {
        if (is_string($name)) {
            echo "<p>Welcome, " . htmlspecialchars($name) . "!</p>";
        }
    }
    if (isset($_GET["name"])) {
        welcomeMessage($_GET["name"]);
    }
    else if (isset($_COOKIE["name"])) {
        welcomeMessage($_COOKIE["name"]);
    }
    
    // inform because you are a guest
    echo '<p>You are not logged in, so your creations displayed here will only be saved on this browser until the cookies from this website are cleared or a week has passed, whichever happens first.</p>';
    echo '<p>Please <a href="login.php">log in</a> or <a href="register.php">register</a> to ensure you do not lose access to your creations.</p>';
    ?>
    <form name="guest">
            <label for="name">Set your temporary name: </label>
            <input type="text" name="name" />
            <input type="submit" value="Set name" id="setguestname" />
    </form>
    <script type="text/javascript">
        // AJAX
        function setName() {
            // let's say this is a modern browser
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    document.write(responseText);
                }
            }

            var getURL = "account.php";

            xhr.open("GET", getURL, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.send();
        }
        var btnSubmit = document.getElementById("setguestname");
        btnSubmit.addEventListener("click", setName, false);
    </script>
    <?php

    // show the pretties from cookies?

?>
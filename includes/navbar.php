<?php session_start(); ?>

<header>
    <nav role="navigation">
        <a href="index.php" id="logo">MYOS</a>

        <span class="functionlinks">
            <a href="account.php" title="Account" style="min-width:0;"><img src=" images/avatar.png" alt="User avatar" id="avatar" /></a>
            <a href="create.php">Create</a>
            <a href="edit.php">Edit</a>
            <a href="browse.php">Browse</a>
            <?php
                if (isset($_SESSION["username"])) {
                    echo '<a href="logout.php">Log out</a>';
                }
                else {
                    echo '<a href="login.php">Log in</a> or <a href="register.php">register</a>';
                }
            ?>
        </span>
    </nav>
</header>

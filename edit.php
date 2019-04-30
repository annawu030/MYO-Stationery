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
        $username = "";
        if (isset($_SESSION["username"])) {
          $username = htmlspecialchars($_SESSION["username"]);  
          echo "Welcome, " . $username . "! Here are your creations."."</br>"."</br>"; 
        }
        // else, if user is a guest, display saved stuff from cookies
        else {
            echo 'You are not logged in, so your works displayed here will only be saved on this browser until the cookies from this website are cleared or a week has passed, whichever happens first.</p>';
            echo '<p>Please <a href="login.php">log in</a> or <a href="register.php">register</a> to ensure you do not lose access to your creations.';          
        }
      ?>
      
      <form action="create.php" id="new_stationery" method="post">
        Stationery Name:&nbsp<input type="text" name="sname"><br>
        Creator:&nbsp<input type="text" name="creator" value="<?php echo $username; ?>"><br>
        Creation Time:&nbsp<input type="text" id="ctime" name="ctime"><br>
        Color Scheme:&nbsp
        <select name="scheme">
          <option value="warm">Warm</option>
          <option value="cold">Cold</option>
          <option value="neutral">Neutral</option>
        </select><br>
        Tag: &nbsp<input type="text" name="tag" placeholder="i.e. professional"><br>
        <!-- Complexity: &nbsp<input type="text" name="complex" value="need to get element count"><br> -->
        <input type="checkbox" name="is_template"> <label for="is_template"> Allow other users to use your creation as a template?</label>&ensp;&ensp; <br>
        <br>
        <a style="background-color: #039; color: white; padding: 10px 10px; text-align: center; display: inline-block; border-radius: 5px;" href="#" onclick="news();">Create New Stationery</a>
        <br>
        <br>
      </form> 

      <?php
        if (!empty($_SESSION["username"])) {
          $username = htmlspecialchars($_SESSION["username"]); 
          // if ($username === "Anna Wu")
          $cname = $username;
          $count = 0;
          require('connect-db.php');
          $query = "SELECT id, sname, create_time, color_scheme, is_template FROM `stationery` WHERE creator = :creator";
          $statement = $db->prepare($query);
          $statement->bindValue(':creator', $cname);
          $statement->execute();

          // fetchAll() returns an array for all of the rows in the result set
          $results = $statement->fetchAll();
          // closes the cursor and frees the connection to the server so other SQL statements may be issued
          $statement->closecursor();
          foreach ($results as $result)
          {
            // echo "result";
            if ($result['is_template'] == 0) {
              $temp = "No";
            }
            else $temp = "Yes";
              echo "ID: " . $result['id'] . "<br/>Stationery Name:" . $result['sname'] . "<br/>Create Time: " . $result['create_time'] . "<br/>Color Scheme: " . $result['color_scheme'] . "<br/>Allow Others to Use As Template: " . $temp . "<br/><br/><br/>";
              $count += 1;
          }
          if ($count > 1){
            echo "You have created ".$count." stationeries so far~"."<br/>";
          }
          else if ($count == 1){
            echo "You have created ".$count." stationery so far~"."<br/>";
          }
          else{
            echo "You haven't created any stationery yet, make one?"."<br/>";
          }
        }
      ?>

    </main>
</body>
<script src="javascript/edit.js"></script>
</html>

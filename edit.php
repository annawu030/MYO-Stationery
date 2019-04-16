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

      <?php
        $error = false;
        if (isset($_POST['insert'])){
          $required = array('sname', 'creator', 'ctime', 'scheme', 'tag', 'complex','template');
        // Loop over field names, make sure each one exists and is not empty 
          foreach($required as $field) {
            if (empty($_POST[$field])) {
              $error = true;
            }
          }
          if (!$error){
            libxml_use_internal_errors(true);       
            $xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");
            // error handling
            if ($xml === false){  // failed loading XML, display error messages
              foreach (libxml_get_errors() as $error){
                  echo "$error->message <br/>";
              }
            }   
            $xml->addChild("stationeries");
            $xml->stationeries->addChild("stationery");
            $xml->stationeries->stationery->addChild("id", 555555);
            $xml->stationeries->stationery->addChild("name", $_POST["sname"]);
            $xml->stationeries->stationery->addChild("creator", $_POST["creator"]);
            $xml->stationeries->stationery->addChild("createtime", $_POST["ctime"]);
            $xml->stationeries->stationery->addChild("tag");
            $xml->stationeries->stationery->addChild("template", $_POST["template"]);
            
            $xml->stationeries->stationery->tag->addChild("colorscheme", $_POST["scheme"]);
            $xml->stationeries->stationery->tag->addChild("usertag", $_POST["tag"]);
            $xml->stationeries->stationery->tag->addChild("complexity", $_POST["complex"]);

            // $xml->save("data.xml");
          }
        }
        
      ?>

      <form method="POST" action="edit.php">
        Stationery Name:&nbsp<input type="text" name="sname"><br>
        Creator:&nbsp<input type="text" name="creator" value="<?php echo $username; ?>"><br>
        Creation Time:&nbsp<input type="text" name="ctime" value="need to figure out"><br>
        Color Scheme:&nbsp<input type="text" name="scheme"><br>
        Tag: &nbsp<input type="text" name="tag" placeholder="i.e. professional"><br>
        Complexity: &nbsp<input type="text" name="complex" value="need to get element count"><br>
        Template: &nbsp<input type="text" name="template" value="no"><br>
        <input type="submit" value="Submit" name="insert">
        <?php
          if ($error) {
            echo '<span style="color:red;"> All fields are required.</span><br>';
          }
        ?>
      </form> 

      

      <?php
        // retrieve all XML errors when loading the document, result in an array of errors
        libxml_use_internal_errors(true);       

        $xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");
        // error handling
        if ($xml === false){  // failed loading XML, display error messages
          foreach (libxml_get_errors() as $error){
              echo "$error->message <br/>";
          }
        }
        
        $count = 0;
        foreach($xml->children()->stationery as $stationery) {
          if ($stationery->creator == $username){
            // echo "Stationery ID: ".$stationery->id."<br/>";
            // echo '<a href="' . $folder_path . '">Link text</a>';
            echo "Stationery Name: ".$stationery->name."<br/>";
            echo "Creation Time: ".$stationery->createtime."<br/>";
            $usertag = "";
            $multiple_utag = False;
            foreach($stationery->tag->children() as $tag) {
              if ($tag->getName() == "colorscheme"){
                echo "Color Scheme: ".$tag."<br/>";
              }
              if ($tag->getName() == "usertag"){
                $usertag .= " ".$tag.",";
                $multiple_utag = True;
              }
              if ($tag->getName() == "complexity")
              {
                echo "Complexity: ".$tag."<br/>";
              }
            }
            if ($multiple_utag == True){
              echo "User Tags: ".substr($usertag, 0, -1)."<br/>";
            }
            echo "</br>";
            $count += 1;
          }
        } 
        if ($count > 1){
          echo "You have ".$count." stationeries to work on~"."<br/>";
        }
        else if ($count == 1){
          echo "You have ".$count." stationery to work on~"."<br/>";
        }
        else{
          echo "You haven't created any stationery yet, make one?"."<br/>";
        }


      ?>
    </main>
</body>

</html>

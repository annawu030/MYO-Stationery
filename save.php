<?php 
$sid = "";
if (isset($_POST["sid_name"])){
  $sid = $_POST["sid_name"];
}

if (isset($_POST["bcolor_name"])){
  $bcolor = $_POST["bcolor_name"];
  if (empty($bcolor)){
    $bcolor = "rgb(255, 255, 255)";
  }
  if (!empty($sid)){
    require('connect-db.php');
    $query = "INSERT INTO canvas (id, bcolor) VALUES (:id, :bcolor)";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $sid);
    $statement->bindValue(':bcolor', $bcolor);
    $statement->execute();
    $statement->closeCursor();
  }
}
// else{
//   echo "rgb(255, 255, 255)";
// }

if (isset($_POST["imgs_info_name"])){
  $imgs = $_POST["imgs_info_name"];
  if (!empty($imgs)){
    // echo $imgs;
    $img_info_arr = explode (";", $imgs);  
    foreach($img_info_arr as $img_info){ 
      $filepath = "";
      $xpos = "";
      $ypos = "";
      $element_info_arr = explode (",", $img_info);
      foreach($element_info_arr as $element_info){ 
        // echo $element_info; 
        // echo "<br>";
        $values = explode(":",$element_info);
        if ($values[0]==="filepath"){
          $filepath = end($values);
        }
        if ($values[0]==="xpos"){
          $xpos = end($values);
        }
        if ($values[0]==="ypos"){
          $ypos = end($values);
        }
      }
      // echo $filepath . " + " . $xpos . " + " . $ypos. "<br>";
      if (!empty($sid) && !empty($filepath)){
        // $rest = "/Applications/XAMPP/xamppfiles/htdocs".substr($filepath, 11, -1)."g";  // returns "abcde"
        // echo $rest;
        // $blob = fopen($rest, 'rb');
        $rest = "images/".substr($filepath, 42, -1)."g";  
        echo $rest;
        // $blob = fopen($rest, 'rb');
        require('connect-db.php');
        $query = "INSERT INTO element (id, img, xpos, ypos) VALUES (:id, :img, :xpos, :ypos)";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $sid);
        $statement->bindValue(':img', $rest);
        $statement->bindValue(':xpos', $xpos);
        $statement->bindValue(':ypos', $ypos);
        $statement->execute();
        $statement->closeCursor();
      }

      
    
      
      
      // echo $img_info;
    } 
  }
}
// else{
//   echo "no imgs";
// }
?>

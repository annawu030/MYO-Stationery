<?php 
if (isset($_POST["bcolor_name"])){
  echo "hey color";
  $bcolor = $_POST["bcolor_name"];
  echo $bcolor;
}
else{
  echo "rgb(255, 255, 255)";
}
?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <?php include "includes/navbar.php"; ?>
    

    <main>
        <?php
            $get_bcolor = "";
            if (isset($_GET["id"])){
                // echo "HOOOOOHOOOOHOOOO". $_GET["id"];
                require('connect-db.php');

                $query = "SELECT bcolor FROM `canvas` WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $_GET["id"]);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closecursor();
                if (!empty($results))
                    $get_bcolor = $results[0]['bcolor'];
                // echo $get_bcolor;

                $query = "SELECT eid, img, xpos, ypos FROM `element` WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindValue(':id', $_GET["id"]);
                $statement->execute();
                // $stmt->bindColumn(2, $data, PDO::PARAM_LOB);
                // $stmt->fetch(PDO::FETCH_BOUND);
                $results = $statement->fetchAll();
                $statement->closecursor();
                $src = "<p id='testsrc' style='display:none'>";
                $xpos = "<p id='testxpos' style='display:none'>";
                $ypos = "<p id='testypos' style='display:none'>";
                foreach ($results as $result)
                {
                    // echo "img:" . $result['img'] . "<br/>xpos: " . $result['xpos'] . "<br/>Color ypos: " . $result['ypos'] . "<br/><br/><br/>";
                    $src .= $result['img']."+";
                    $xpos .= $result['xpos']."+";
                    $ypos .= $result['ypos']."+";
                    
                }
                $src .= "</p>";
                $xpos .= "</p>";
                $ypos .= "</p>";
                echo $src . $xpos . $ypos;
                echo "<a id = 'restore' style='background-color: #cc0000; color: white; padding: 10px 10px; text-align: center; display: inline-block; border-radius: 5px;' href='#'>Restore Elements?</a><br/><br/>";
                // echo $get_bcolor;
            }
        ?>
        <?php 
            $sid = "";
            if (isset($_POST["sname"])){
                
                require('connect-db.php');
                $sname = $_POST["sname"];
                $creator = $_POST["creator"];
                $ctime = $_POST["ctime"];
                $scheme = $_POST["scheme"];
                if (!isset($_POST["is_template"])){
                    $is_template = false;
                }
                else $is_template = true;
                echo $sname." + ".$creator." + ".$ctime." + ".$scheme." + ".$is_template;

                $query = "INSERT INTO stationery (sname, creator, create_time, color_scheme, is_template) VALUES (:sname, :creator, :ctime, :scheme, :is_template)";
                $statement = $db->prepare($query);

                $statement->bindValue(':sname', $sname);
                $statement->bindValue(':creator', $creator);
                $statement->bindValue(':ctime', $ctime);
                $statement->bindValue(':scheme', $scheme);
                $statement->bindValue(':is_template', $is_template);
                $statement->execute();
                $statement->closeCursor();


                $query = "SELECT id FROM `stationery` WHERE creator = :creator and create_time = :ctime";
                $statement = $db->prepare($query);
                $statement->bindValue(':creator', $creator);
                $statement->bindValue(':ctime', $ctime);
                $statement->execute();

                // fetchAll() returns an array for all of the rows in the result set
                $results = $statement->fetchAll();
                // closes the cursor and frees the connection to the server so other SQL statements may be issued
                $statement->closecursor();

                $sid = $results[0]['id'];
            }
        ?>
        <span class="breadcrumbs"><a href="index.html">Home</a> › <a href="edit.html">Edit</a> › <?php 
            if(isset($_POST['sname']) && !empty($_POST['sname'])) echo $_POST['sname']; 
            else if (isset($_GET['sname']) && !empty($_GET['sname'])) echo $_GET['sname']; 
        ?> </span>

        <br>
        <div class="float-container">
            <div class="float" align="left">
                <div id="canvas" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"></div>
                <br>
                <label>Change Background Color: </label>
                <input type="color" value="#ffffff" tabindex=1 id="colorpicker">
                <!-- <input type="button" id="change_canvas_color" value="Change Background Color"> -->
            </div>

            

            <div class="float">
                <!-- open tabs on click -->
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'shape')">Shape</button>
                    <button class="tablinks" onclick="openTab(event, 'image')">Image</button>
                    <button class="tablinks" onclick="openTab(event, 'border')">Border</button>
                </div>

                <div id="shape" class="tabcontent">
                    <!-- <div id="img11">

            </div> -->
                    <img src="images/shape/circle.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="circle">
                    <img src="images/shape/sun.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="sun">
                    <img src="images/shape/triangle.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="triangle">
                    <img src="images/shape/triangle_solid.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="triangle_solid">
                    <img src="images/shape/star_circle.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="star_circle">
                    <img src="images/shape/star.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="star">
                    <img src="images/shape/rectangle.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="rectangle">
                    <img src="images/shape/poligon.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="poligon">
                    <img src="images/shape/heart.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="heart">
                </div>

                <div id="image" class="tabcontent" id="design_items">
                    <div>
                        <img src="images/image/anchor.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="anchor">
                        <img src="images/image/bone.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="bone">
                        <img src="images/image/cabriolet.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="cabriolet">
                        <img src="images/image/fan.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="fan">
                        <img src="images/image/gift.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="gift">
                        <img src="images/image/glasses.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="glasses">
                        <img src="images/image/hot_air_balloon.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="hot_air_balloon">
                        <img src="images/image/hummus.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="hummus">
                        <img src="images/image/ice_cream.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="ice_cream">
                        <img src="images/image/lemonade.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="lemonade">
                        <img src="images/image/onigiri.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="onigiri">
                        <img src="images/image/salad.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="salad">
                        <img src="images/image/sand.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="sand">
                        <img src="images/image/suitcase.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="suitcase">
                        <img src="images/image/sun_smile.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="sun_smile">
                        <img src="images/image/sunset.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="sunset">
                        <img src="images/image/vegetables.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="vegetables">
                        <img src="images/image/watermelon.png" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" class="img1" id="watermelon">
                    </div>
                </div>

                <div id="border" class="tabcontent">
                </div>
            </div>
        </div>
        <div id="container">
        </div>
        <form action="print.php">
            <input type="submit" value="Print" />
        </form>
        <form action="save.php" id="element_form" method="post">
            <input type="text" id="sid" name="sid_name" value=<?php 
                if (!empty($sid)) echo $sid;
                else if (isset($_GET['id']) && !empty($_GET['id'])) echo $_GET['id'];
            ?>>
            <input type="text" id="bcolor" name="bcolor_name">
            <input type="text" id="info" name="imgs_info_name" value="">
            <!-- <input type="button" onclick="tryprint()" value="Save" /> -->
            <a href="#" onclick="tryprint();">Save</a>
        </form>

        <!-- <form id="img_form" method="post" action="save.php">
            <input type="text" id="bcolor" value="" name="bcolor_name"">
            <input type="text" id="imgs_info" value="" name="imgs_info_name"">
            <a href="#" onclick="tryprint()">Save</a>
        </form> -->
        <!-- <p id="hihihi">hiiiiiiiiiiiii</p> -->
    </main>

</body>
<script src="javascript/canvas.js"></script>
<script>
    var color = "<?php echo $get_bcolor ?>" /*localStorage.getItem('color')*/;
    // if (!empty(color)) {
    document.getElementById("canvas").style.backgroundColor = color;
</script>


</html>

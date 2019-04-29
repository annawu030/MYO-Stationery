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
        <span class="breadcrumbs"><a href="index.html">Home</a> › <a href="edit.html">Edit</a> › Stationery Name </span>

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
        <form action="save.php">
            <input type="submit" value="Save" />
        </form>

        <form id="img_form" method="post" action="save.php">
            <input type="text" id="bcolor" value="" name="bcolor_name"">
            <input type="text" id="imgs_info" value="" name="imgs_info_name"">
            <a href="#" onclick="tryprint()">Save</a>
        </form>
    </main>

</body>
<script src="javascript/canvas.js"></script>

</html>

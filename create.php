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
            <div class="float">
                <div id="canvas" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"></div>
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
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                </div>

                <div id="image" class="tabcontent" id="design_items">
                    <div>
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                        <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    </div>
                </div>

                <div id="border" class="tabcontent">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                    <img src="http://placehold.it/50x50" draggable="true" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);" id="img1">
                </div>
            </div>
        </div>
        <div id="container">
        </div>
        <form action="print.html">
            <input type="submit" value="Print" />
        </form>
    </main>

</body>
<script src="javascript/canvas.js"></script>

</html>
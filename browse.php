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

    <main id="browse-wrapper">

        <div id="filterlist">
            <h4>Complexity</h4>
            <ul style="list-style-type:none;">
                <li><input type="checkbox" name="complexity1" value="complex"> complex (10+ elements)</li>
                <li><input type="checkbox" name="complexity2" value="simple"> simple (&lt; 10 elements)</li>
            </ul>
            <h4>Colors</h4>
            <ul style="list-style-type:none;">
                <li><input type="checkbox" name="color1" value="warm"> warm</li>
                <li><input type="checkbox" name="color2" value="cold"> cold</li>
            </ul>
            <h4>User Tags</h4>
            <ul style="list-style-type:none;">
                <li><input type="checkbox" name="usertag1" value="tag_birthday"> birthday</li>
                <li><input type="checkbox" name="usertag2" value="tag_professional"> professional</li>
                <li><input type="checkbox" name="usertag2" value="tag_fun"> fun</li>
            </ul>
        </div>

        <div id="stationerydisplay">
            <div class="grid-item simple warm tag_birthday">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button">Use as Template</button>
                </fieldset>
            </div>
            <div class="grid-item complex cold">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
            <div class="grid-item simple">
                <fieldset>
                    <legend>Stationery Name - Some Name (guest)</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button">Use as Template</button>
                </fieldset>
            </div>
            <div class="grid-item simple tag_professional">
                <fieldset>
                    <legend>Stationery Name - Anonymous</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button">Use as Template</button>
                </fieldset>
            </div>
            <div class="grid-item complex tag_fun">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
            <div class="grid-item complex tag_birthday">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button">Use as Template</button>
                </fieldset>
            </div>
            <div class="grid-item complex cold">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
            <div class="grid-item complex warm">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
            <div class="grid-item simple tag_fun">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
        </div>
    </main>


    <script type="text/javascript">
        // this is a mess

        function filterStationery() {
            var theTag = this.value;
            if (!this.checked) {
                for (stationery in document.getElementsByClassName(theTag)) {
                    stationery.style.display = "none";
                }
            } else(!this.checked) {
                for (stationery in document.getElementsByClassName(theTag)) {
                    stationery.style.display = "inline-block";
                }
            }
        }
        // get list of tags to filter by
        var listOfTags = document.querySelectorAll("li input");
        // list of refs to the checkboxes

        for (tag in listOfTags) {
            tag.addEventListener("click", filterStationery, false);
        }

    </script>

</body>


</html>
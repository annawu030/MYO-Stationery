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

    <main id="printpreview">

        <span class="breadcrumbs"><a href="index.php">Home</a> › <a href="new.php">New</a> › <a href="#">Stationery Name</a> › Print Preview</span>

        <div id="printpreview-window-wrapper">
            <!-- might need [] thing in input names -->
            <div id="printpreview-window">
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected1" value="1" /><label for="Selected1">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 1 of Stationery Name" />
                </div>
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected2" value="2" /><label for="Selected2">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 2 of Stationery Name" />
                </div>
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected3" value="3" /><label for="Selected3">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 3 of Stationery Name" />
                </div>
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected4" value="4" /><label for="Selected4">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 4 of Stationery Name" />
                </div>
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected5" value="5" /><label for="Selected5">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 5 of Stationery Name" />
                </div>
                <div class="printpreview-item">
                    <input type="checkbox" name="toprint" id="Selected6" value="6" /><label for="Selected6">Select</label>
                    <img src="http://placehold.it/300x150" alt="Preview of type 6 of Stationery Name" />
                </div>
            </div>
        </div>

        <!-- do input validation for "Print Selected"--what if nothing is selected? -->
        <div class="choicebuttons">
            <input type="button" value="Go back to edit" />
            <input type="button" id="btn-printall" value="Print all" />
            <input type="button" id="btn-printselected" value="Print selected" />
        </div>

        <script type="text/javascript">
            function checkSelected() {
                // how to make this adapt to number of previews? maybe generate this part with PHP? can I?
                var selected = [document.getElementById("Selected1").checked, document.getElementById("Selected2").checked, document.getElementById("Selected3").checked, document.getElementById("Selected4").checked, document.getElementById("Selected5").checked, document.getElementById("Selected6").checked];

                var countTrue = 0;
                var i = 0;
                while (i < selected.length) {
                    if (selected[i] == true) {
                        countTrue++;
                    }
                    i++;
                }

                if (countTrue == 0) {
                    alert("Please select at least one kind of stationery to print.");
                } else {
                    // NEED TO SET STUFF ON PAGE TO BE VIEWED BY THE PRINTER OR NOT FIRST
                    window.print();
                }
            }
            var btnPrintSelected =
                document.getElementById("btn-printselected");
            btnPrintSelected.addEventListener("click", checkSelected, false);

            var btnPrintAll = document.getElementById("btn-printall");
            btnPrintAll.addEventListener("click", function() {
                window.print();
            }, false);

        </script>
    </main>
</body>

</html>

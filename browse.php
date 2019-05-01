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
        <!-- filter options -->
        <div id="filterlist">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h4 style="display: inline">Filter by Color Scheme</h4>
                <select name="cscheme">
                    <option value="warm">Warm</option>
                    <option value="cold">Cold</option>
                    <option value="neutral">Neutral</option>
                </select><br>  
                <h4 style="display: inline">Allow Template Use</h4>
                <select name="template">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select><br>   
                <input style="background-color: #039; color: white; padding: 10px 10px; text-align: center; display: inline-block; border-radius: 5px;" type="submit" name="submit" value="Filter">  
            </form> 
        </div>
        <br>
        <?php
        // if post request sent, filter with color scheme and if want to be used as template
            if (isset($_POST["cscheme"]) && isset($_POST["template"])){
                require('connect-db.php');
                $query = "SELECT id, sname, creator, create_time, color_scheme, is_template FROM `stationery` WHERE color_scheme = :color_scheme and is_template = :is_template";
                $statement = $db->prepare($query);
                $statement->bindValue(':color_scheme', $_POST["cscheme"]);
                $statement->bindValue(':is_template', $_POST["template"]);
                $statement->execute();
                $results = $statement->fetchAll();
                // closes the cursor and frees the connection to the server so other SQL statements may be issued
                $statement->closecursor();
                echo '<table border=1><tr><th>ID</th><th>Stationery Name</th><th>Creator</th><th>Create Time</th><th>Color Scheme</th><th>Allow Template</th></tr><tbody>';
                foreach ($results as $result)
                {
                    // echo "result";
                    if ($result['is_template']==0) {
                    $temp = "No";
                    }
                    else $temp = "Yes";
                    echo "<tr><td>".$result['id']."</td><td>".$result['sname']."</td><td>".$result['creator']."</td><td>".$result['create_time']."</td><td>".$result['color_scheme']."</td><td>".$temp."</td></tr>";
                }
                echo "</tbody></table>";
                // echo "SET cscheme!!";
            }
            // show all the stationeries in database
            else{
                // echo "NOT SET";
                require('connect-db.php');
                $query = "SELECT id, sname, creator, create_time, color_scheme, is_template FROM `stationery`";
                $statement = $db->prepare($query);
                $statement->execute();

                // fetchAll() returns an array for all of the rows in the result set
                $results = $statement->fetchAll();
                // closes the cursor and frees the connection to the server so other SQL statements may be issued
                $statement->closecursor();
                echo '<table border=1"><tr><th>ID</th><th>Stationery Name</th><th>Creator</th><th>Create Time</th><th>Color Scheme</th><th>Allow Template</th></tr><tbody>';
                foreach ($results as $result)
                {
                    // echo "result";
                    if ($result['is_template']) {
                    $temp = "No";
                    }
                    else $temp = "Yes";
                    echo "<tr><td>".$result['id']."</td><td>".$result['sname']."</td><td>".$result['creator']."</td><td>".$result['create_time']."</td><td>".$result['color_scheme']."</td><td>".$temp."</td></tr>";
                }
                echo "</tbody></table>";
            }
        ?>

        <!-- <div id="stationerydisplay">
            <?php include "includes/browse.php"; ?>
            <div class="grid-item simple tag_fun">
                <fieldset>
                    <legend>Stationery Name - Username</legend>
                    <img src="http://placehold.it/300x150" /> <br>
                    <button type="button" disabled>For Inspiration :)</button>
                </fieldset>
            </div>
        </div> -->
    </main>


    <script type="text/javascript">
        function news() {
            document.forms["browses"].submit();
        }
        // this is a mess

        // function filterStationery() {
        //     var theTag = this.value;
        //     if (!this.checked) {
        //         for (stationery in document.getElementsByClassName(theTag)) {
        //             stationery.style.display = "none";
        //         }
        //     } else(!this.checked) {
        //         for (stationery in document.getElementsByClassName(theTag)) {
        //             stationery.style.display = "inline-block";
        //         }
        //     }
        // }
        // // get list of tags to filter by
        // var listOfTags = document.querySelectorAll("li input");
        // // list of refs to the checkboxes

        // for (tag in listOfTags) {
        //     tag.addEventListener("click", filterStationery, false);
        // }

    </script>

</body>


</html>

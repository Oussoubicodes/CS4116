<?php
    mysql_connect('sql300.epizy.com','epiz_33768646','DnPkUp7wbvcfJ') or die("could not connect");
    mysql_select_db('epiz_33768646_CS4116ProjGroup10') or die("could not confind db");
    $output = '';

    if (isset($_POST["search"])) {
        $searchq = $_POST["search"];
        //only allows letters and numbers to be searched
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

        $query = mysql_query("SELECT * FROM user WHERE firstname LIKE '$searchq%' OR lastname LIKE '$searchq%'") or die("could not search");
        $count = mysql_num_rows($query);

        if($count == 0){
            $output = "User doesn't exist";
        }else{
            while($row = mysql_fetch_array($query)){
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $output .= '<div>' .$fname.' '.$lname.'</div>';
            }
        }
    }
?>


<!DOCTYPE html>
<link rel="stylesheet" href="wavelengthPages.css">

<div class='nav_bar'>
    <a href= "wavelengthHome.html"><img src="images/sound.png" alt="sound" width='50' height='50'></a>
    <a href= "wavelengthDiscover.php"><img src="images/search.png" alt="search" width='50' height='50'></a>
    <a href= "wavelengthChat.html"><img src="images/chats.png" alt="chats" width='50' height='50'></a>
</div>

<h1>Search for fellow artists</h1>

<body>
<form method='post'>
    <input type='text' name='search' placeholder='Search users'>
    <input type='submit' value='>>'>
</form>

<?php print("$output"); ?>
</body>
</html>

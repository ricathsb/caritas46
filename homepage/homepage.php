<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage with Search Bar</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
        
    <div class="navigate-bar-top">
        <div class="navigate-bar-top-1">
            <ul class="navigate-bar-top-content">
                <li class="nav-list"><a href="homepage.php"><img src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR" height="50px"></a></li>
                <li class="nav-list"><a href="../character_list/characterlist.html">Character</a></li>
                <li class="nav-list"><a href="../weapon.php">Weapon</a></li>
                <li class="nav-list"><a href="../Character_tierlist/tierlistc0.html">Tier List</a></li>
                <li class="nav-list"><a href="../calendar/calendar.php">Calendar</a></li>
                <li class="nav-list"><a href="#">About</a></li>
            </ul>
        </div>
        
    <div class="search-container">
        <form method="post">
            <p>What are you looking for Traveler?</p>
            <input id="search" name="search" type="text" placeholder="Insert Character Name Here...">
            <input id="submit" name="submit" type="submit">
        </form>
        <div id="searchResults"></div>
    </div>
    </div>
</body>
</html>

<?php
$con = new PDO("mysql:host=localhost; dbname=caritas46", 'root', '');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];

    // Check if the search query contains at least 2 characters
    if (strlen($str) >= 2) {
        $sth = $con->prepare("SELECT * FROM `character` WHERE Name LIKE :search");
        $sth->bindValue(':search', '%' . $str . '%', PDO::PARAM_STR);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->execute();
        

        $results = $sth->fetchAll();

        if (!empty($results)) {
            ?>
            <div class="main">
                <br><br><br>
                <table border="1">
                    <tr>
                        <th>Name</th>
                        <th>Elemen</th>
                        <th>Weapon</th>
                    </tr>
                    <?php
                    foreach ($results as $row) {
                        $detailPageLink = "../character.php?character=" . $row->name;
                        ?>
                        <tr align="center">
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="../image/profile/<?= strtolower(str_replace(" ", "_", $row->name)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->name)).".webp" ?>" class="width-75"><br><?php echo $row->name; ?></td>
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="../image/utility/<?= strtolower(str_replace(" ", "_", $row->elemen)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->elemen)).".webp" ?>" width="25px"><?= $row->elemen ?></td>
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="../image/utility/<?= strtolower(str_replace(" ", "_", $row->main_weapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->main_weapon)).".webp" ?>" width="25px"><?= $row->main_weapon ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        } else {
            echo "No matching results found";
        }
    } else {
        echo "Search query must contain at least 2 characters";
    }
}
?>

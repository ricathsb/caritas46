<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage with Search Bar</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="homepage/homepage.css"> -->
</head>
<body>
    <div class="navigate-bar-top-1">
        <div class="navigate-bar-top-content">
            <a class="navbar-anchor" href=""><img class="navbar-logo" src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR"></a>
            <a class="navbar-anchor" href="character_list/characterlist.php">Character</a>
            <a class="navbar-anchor" href="weapon/weapon.php">Weapon</a>
            <a class="navbar-anchor" href="tier_list/c0.html">Tier List</a>
            <a class="navbar-anchor" href="calendar/calendar.php">Calendar</a>
            <a class="navbar-anchor" href="about/about.html">About</a>
            <a class="navbar-anchor" href="new/new.php">new</a>
        </div>
    </div>     
    <div class="search-container">
        <form method="post">
            <p>What are you looking for Traveler?</p>
            <input id="search" name="search" type="text" placeholder="Insert Character Name Here...">
            <input id="submit" name="submit" type="submit">
        </form>
    <div id="searchResults"></div>
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
                        $detailPageLink = "character.php?character=" . $row->name;
                        ?>
                        <tr align="center">
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $row->name)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->name)).".webp" ?>" class="width-75"><br><?php echo $row->name; ?></td>
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $row->elemen)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->elemen)).".webp" ?>" width="25px"><?= $row->elemen ?></td>
                            <td><a href="<?php echo $detailPageLink; ?>"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $row->main_weapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $row->main_weapon)).".webp" ?>" width="25px"><?= $row->main_weapon ?></td>
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

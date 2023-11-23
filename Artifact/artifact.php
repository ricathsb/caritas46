<?php
require "../functions.php";
if(isset($_GET['rarity'])){
    $rarity = (int) $_GET['rarity'];
    $results = artifactRarity($rarity);
}else {
$results = artifactAll();
}
$count = count($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caritas46-artifact</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="navigate-bar-top-1">
        <div class="navigate-bar-top-content">
            <a class="navbar-anchor" href="../index.php"><img class="navbar-logo" src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR"></a>
            <a class="navbar-anchor" href="../character_list/characterlist.php">Character</a>
            <a class="navbar-anchor" href="../weapon/weapon.php">Weapon</a>
            <a class="navbar-anchor" href="../tier_list/c0.html">Tier List</a>
            <a class="navbar-anchor" href="../calendar/calendar.php">Calendar</a>
            <a class="navbar-anchor" href="../Artifact/artifact.php">Artifact</a>
            <a class="navbar-anchor" href="../about/about.html">About</a>
        </div>
    </div>    
    <div>
    <div id="container">
        <div class="text-center">
            <form action="" method="get">
                <button class="weapon-button" value="all" name="show">Show All</button>
            </form>
            <form action="" method="get">
                <button class="weapon-button" value="5" name="rarity">5 Star</button>
                <button class="weapon-button" value="4" name="rarity">4 Star</button>
                <button class="weapon-button" value="3" name="rarity">3 Star</button>
            </form>
        </div>
    </div>
        <h1 style="text-align: center;">Artifact List</h1>
        <table class="weapon-table">
            <tr>
                <th>NO</th>
                <th>Image</th>
                <th>Name</th>
                <th>2 Set Bonus</th>
                <th>4 Set Bonus</th>
            </tr>
            <?php 
            $i = 1;
            if(isset($results)) {
                foreach($results as $result) {
                    $img = strtolower(str_replace(" ", "_", $result['name'])).".webp";
            ?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td class="weapon-img-td"><a href="weapon.php?weapon=<?= strtolower(str_replace(" ", "_", $result['name'])) ?>"><img class="weapon-img" src="../image/utility/<?= $img ?>" alt="<?= $result['name'] ?>"></a></td>
                        <td class="weapon-text"><?= $result['name'] ?></td>
                        <td class="weapon-text"><?= $result['set2bonus'] ?></td>
                        <td class="weapon-text"><?= $result['set4bonus'] ?></td>
                    </tr>
            <?php 
                    $i++;
                }
            } ?>
        </table>
    </div>

    
</body>
</html>
<?php
require "../functions.php";
$results = getAllCharacter();
$elements = getElements();
$itemPerLine = 8;
if(isset($_POST['elements'])) {
    $results = getCharacterByElement($_POST['elements']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character List</title>
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <div class="navigate-bar-top-1">
        <div class="navigate-bar-top-content">
            <a class="navbar-anchor" href="../"><img class="navbar-logo" src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR"></a>
            <a class="navbar-anchor" href="../character_list/characterlist.php">Character</a>
            <a class="navbar-anchor" href="../weapon/weapon.php">Weapon</a>
            <a class="navbar-anchor" href="../tier_list/c0.html">Tier List</a>
            <a class="navbar-anchor" href="../calendar/calendar.php">Calendar</a>
            <a class="navbar-anchor" href="../about/about.html">About</a>
            <a class="navbar-anchor" href="../new/new.php">new</a>
        </div>
    </div>    
    <div class="character-list-container">
        <h1 class="text-center">Character List</h1>
        <form action="" method="post" class="d-flex justify-content-center align-items-center">
            <div class="show-all"><button class="character-list-filter" name="elements" value="all"><h1>*</h1></button></div>
            <?php foreach ($elements as $element) {?>
            <button class="character-list-filter" name="elements" value="<?php echo $element['elemen'] ?>"><img class="character-list-element-img" src="../image/utility/<?php echo strtolower($element['elemen']) ?>.webp" alt=""></button>
            <?php } ?>
        </form>
        <table class="character-list-table">
            <tr>
            <?php $i = 0; foreach ($results as $result) {  
                if ($result['star'] == 5) {?>
                <td class="character-list-item"><div class="character-list-div"><a href="../character.php?character=<?php echo str_replace(" ", "%20", $result['name']) ?>"><img class="character-list-img star-5" src="../image/profile/<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>" alt="<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>"><br><?php echo $result['name'] ?></a></div></td>
                <?php } else {?>
                <td class="character-list-item"><div class="character-list-div"><a href="../character.php?character=<?php echo str_replace(" ", "%20", $result['name']) ?>"><img class="character-list-img star-4" src="../image/profile/<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>" alt="<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>"><br><?php echo $result['name'] ?></a></div></td>
                <?php } ?>
                <?php if ($i == (count($results) - 1)) {
                    break;
                }
                if (($i + 1) % $itemPerLine == 0) { ?>
                </tr>
                <tr>
                <?php } ?> 
            <?php $i++; } ?>
            </tr>
        </table>
    </div>
</body>
</html>
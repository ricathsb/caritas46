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
    <!-- <link rel="stylesheet" href="style/stylechar.css"> -->
    <link rel="stylesheet" href="../character/style/styles.css">
    <style>
        .character-list-item {
            width: 100px;
            text-align: center;
            font-size: 0.8em;
        }
        .character-list-item:hover {
            opacity: 50%;
            transition-duration: 0.5s;
        }
        .character-list-img {
            border: 1pt solid transparent;
            border-top-right-radius: 20%;
            border-top-left-radius: 20%;
        }
        .character-list-div {
            /* margin: 2.5pt; */
            background-color: #3d2b14;
            border-radius: 15%;
        }
        .star-4 {
            background-color: #7b5c90;
        }
        .star-5 {
            background-color: #926d45;
        }
        .character-list-h1 {
            text-align: center !important;
            color: white;
        }
        body {
            text-align: center;
        }
        button {
            transition-duration: 0.5s;
            color: white;
            background-color: transparent;
            border: none;
            margin: 5pt;
        }
        button:hover {
            cursor: pointer;
            opacity: 0.5;

        }
        form {
            justify-content: center;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="navigate-bar-top">
        <div class="navigate-bar-top-1">
            <ul class="navigate-bar-top-content">
                <li class="nav-list"><a class="navbar-anchor" href="../"><img src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR" height="50px"></a></li>
                <li class="nav-list"><a class="navbar-anchor" href="">Character</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="../weapon.php">Weapon</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="../character_tierlist/tierlistc0.html">Tier List</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="../calendar/calendar.php">Calendar</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="../About/about.html">About</a></li>
            </ul>
        </div>
    </div>
    <div class="character-list-container">
        <h1 class="character-list-h1">Character List</h1>
    </div>
    <form action="" method="post">
    <div class="show-all"><button name="elements" value="all">Show All</button></div>
        <?php foreach ($elements as $element) {?>
        <button name="elements" value="<?php echo $element['elemen'] ?>"><img src="../image/utility/<?php echo strtolower($element['elemen']) ?>.webp" alt=""></button>
        <?php } ?>
    </form>
    <table border="0">
        <tr>
        <?php $i = 0; foreach ($results as $result) {  
            if ($result['star'] == 5) {?>
            <td class="character-list-item"><div class="character-list-div"><a href="../character.php?character=<?php echo str_replace(" ", "%20", $result['name']) ?>"><img class="character-list-img star-5" src="../image/profile/<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>" alt="<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>"><?php echo $result['name'] ?></a></div></td>
            <?php } else {?>
            <td class="character-list-item"><div class="character-list-div"><a href="../character.php?character=<?php echo str_replace(" ", "%20", $result['name']) ?>"><img class="character-list-img star-4" src="../image/profile/<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>" alt="<?php echo strtolower(str_replace(" ", "_", $result['name'])) . ".webp" ?>"><?php echo $result['name'] ?></a></div></td>
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
</body>
</html>
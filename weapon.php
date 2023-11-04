<?php
require "functions.php";
if(isset($_GET['rarity'])){
    $rarity = (int) $_GET['rarity'];
    $results = weaponRarity($rarity);
} else if(isset($_GET['type'])){
    $type = $_GET['type'];
    $results = weaponType($type);
} else {
    $results = weaponAll();
}
$count = count($results);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="weaponlist.css">
    <title>Document</title>  
</head>

<body>
    <div class="navigate-bar-top">
        <div class="navigate-bar-top-1">
            <ul class="navigate-bar-top-content">
                <li class="nav-list"><a class = "navbar-anchor" href="index.php"><img src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR" height="50px"></a></li>
                <li class="nav-list"><a class = "navbar-anchor" href="character_list/characterlist.php">Character</a></li>
                <li class="nav-list"><a class = "navbar-anchor" href="weapon.php">Weapon</a></li>
                <li class="nav-list"><a class = "navbar-anchor" href="character_tierlist/tierlistc6.html">Tier List</a></li>
                <li class="nav-list"><a class = "navbar-anchor" href="calendar/calendar.php">Calendar</a></li>
                <li class="nav-list"><a class = "navbar-anchor" href="About/about.html">About</a></li>
            </ul>
        </div>
    </div>
    <div id="container">
        <div class="center-button">
            <form action="" method="get">
                <button class = "button" value="all" name="show">Show All</button>
            </form>
            <form action="" method="get">
                <button class = "button" value="5" name="rarity">5 Star</button>
                <button class = "button" value="4" name="rarity">4 Star</button>
                <button class = "button" value="3" name="rarity">3 Star</button>
                <button class = "button" value="2" name="rarity">2 Star</button>
                <button class = "button" value="1" name="rarity">1 Star</button>
            </form>
        </div>
        <div class="center-button"> 
            <form action="" method="get">
                <button class = "button" value="Bow" name="type">Bow</button>
                <button class = "button" value="Catalyst" name="type">Catalyst</button>
                <button class = "button" value="Polearm" name="type">Polearm</button>
                <button class = "button" value="Claymore" name="type">Claymore</button>
                <button class = "button" value="Sword" name="type">Sword</button>
            </form>
        </div>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <th>NO</th>
                <th>Image</th>
                <th>Rarity</th>
                <th>Name</th>
                <th>Type</th>
                <th>Substat</th>
            </tr>
            <?php 
            $i = 1;
            if(isset($results)) {
                foreach($results as $result) {
                    $img = strtolower(str_replace(" ", "_", $result['name'])).".webp";
            ?>
                    <tr>
                        <td class="order no"><?= $i ?></td>
                        <td class = "img-loc"><a href="weapon.php?weapon=<?= strtolower(str_replace(" ", "_", $result['name'])) ?>"><img class="img" src="image/weapon/<?= $img ?>" alt="<?= $result['name'] ?>"></a></td>
                        <td class="text"><?php for($j = 0; $j < $result['rarity']; $j++) {?>★<?php } ?></td>
                        <td class="text"><?= $result['name'] ?></td>
                        <td class="text"><?= $result['type'] ?></td>
                        <td class="text"><?= $result['substat'] ?></td>
                    </tr>
            <?php 
                    $i++;
                }
            } ?>
        </table>
    </div>
    <script>
        const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

        const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
            v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
            )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

        // do the work...
        document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
            const table = th.closest('table');
            Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
                .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
                .forEach(tr => table.appendChild(tr) );
        })));
    </script>
</body>
</html>
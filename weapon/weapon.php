<?php
require "../functions.php";
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
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>  
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
    <div id="container">
        <div class="text-center">
            <form action="" method="get">
                <button class="weapon-button" value="all" name="show">Show All</button>
            </form>
            <form action="" method="get">
                <button class="weapon-button" value="5" name="rarity">5 Star</button>
                <button class="weapon-button" value="4" name="rarity">4 Star</button>
                <button class="weapon-button" value="3" name="rarity">3 Star</button>
                <button class="weapon-button" value="2" name="rarity">2 Star</button>
                <button class="weapon-button" value="1" name="rarity">1 Star</button>
            </form>
            <form action="" method="get">
                <button class="weapon-button" value="Bow" name="type">Bow</button>
                <button class="weapon-button" value="Catalyst" name="type">Catalyst</button>
                <button class="weapon-button" value="Polearm" name="type">Polearm</button>
                <button class="weapon-button" value="Claymore" name="type">Claymore</button>
                <button class="weapon-button" value="Sword" name="type">Sword</button>
            </form>
        </div>
    </div>
    <br>
    <div>
        <table class="weapon-table">
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
                        <td class="text-center"><?= $i ?></td>
                        <td class="weapon-img-td"><a href="weapon.php?weapon=<?= strtolower(str_replace(" ", "_", $result['name'])) ?>"><img class="weapon-img" src="../image/weapon/<?= $img ?>" alt="<?= $result['name'] ?>"></a></td>
                        <td class="weapon-text"><?php for($j = 0; $j < $result['rarity']; $j++) {?>★<?php } ?></td>
                        <td class="weapon-text"><?= $result['name'] ?></td>
                        <td class="weapon-text"><?= $result['type'] ?></td>
                        <td class="weapon-text"><?= $result['substat'] ?></td>
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
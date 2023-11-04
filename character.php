<?php
require "functions.php";
if(isset($_GET['character'])){
    $characterName = $_GET['character'];
    $results = getAllFromCharacter($characterName)[0];
    $characterName = $results['name'];
    $Gender = $results['gender'];
    $star = $results['star'];
    $element = $results['elemen'];
    $mainWeapon = $results['main_weapon'];
    $rating = $results['rating'];
    $enVoice = $results['en_voice'];
    $jpVoice = $results['jp_voice'];
    $mainDps= $results['main_dps'];
    $subDps= $results['sub_dps'];
    $support= $results['support'];
    $explore= $results['exploration'];
    $hp20 = number_format((int) $results['hp_20']);
    $hp80 = number_format((int) $results['hp_80']);
    $att20 = number_format((int) $results['att_20']);
    $att80 = number_format((int) $results['att_80']);
    $def20 = number_format((int) $results['def_20']);
    $def80 = number_format((int) $results['def_80']);
    $asc20 = $results['asc_20'];
    $asc80 = $results['asc_80'];
    $strengths = explode(";", $results['strength']);
    $weaknesses = explode(";", $results['weakness']);
    $mainRole = $results['main_role'];
    $bestWeapon = $results['best_weapon'];
    $replacementWeapons = explode(";", $results['replacement_weapon']);
    $bestartifact_1 = $results['best_artifact'];
    $bestartifact_2 = $results['best_artifact_2'];
    $artifactMultiplier = $results['artifact_multiplier'];
    $weapons = explode(";", $results['weapon']);
    $descWeapons = explode(";", $results['desc_weapon']);
    $f2pWeapon = $results['f2p_weapon'];
    $descF2pWeapon = $results['desc_f2p_weapon'];
    $sands = $results['sands'];
    $goblet = $results['goblet'];
    $circlet = $results['circlet'];
    $substat = $results['substat'];
    $descBuild = $results['desc_build'];
    $talent1 = $results['talent_1'];
    $talent2 = $results['talent_2'];
    $talent3 = $results['talent_3'];
    $descTalent = $results['desc_talent'];
    $artifacts = explode(";", $results['artifact']);
    $descArtifacts = explode(";", $results['desc_artifact']);
    $star4Artifact = $results['star_4_artifact'];
    $descStar4Artifact = $results['desc_star_4_artifact'];
    $recommendedWeapons = explode(";", $results['all_recommended_weapon']);
    $howToGet = explode(";", $results['how_to_get']);
    $teamComps = explode(";", $results['team_comp']);
    $descTeamComp = $results['team_comp_comment'];
    $team1Th = explode(";", $results['team_1_th']);
    $team2Th = explode(";", $results['team_2_th']);
    $team3Th = explode(";", $results['team_3_th']);
    $team4Th = explode(";", $results['team_4_th']);
    $team1Char = explode(";", $results['team_1_char']);
    $team2Char = explode(";", $results['team_2_char']);
    $team3Char = explode(";", $results['team_3_char']);
    $team4Char = explode(";", $results['team_4_char']);
    $team1Comment = $results['team_1_comment'];
    $team2Comment = $results['team_2_comment'];
    $team3Comment = $results['team_3_comment'];
    $team4Comment = $results['team_4_comment'];
    $bestConst = $results['best_constellation'];
    $c1 = $results['c1'];
    $c2 = $results['c2'];
    $c3 = $results['c3'];
    $c4 = $results['c4'];
    $c5 = $results['c5'];
    $c6 = $results['c6'];
    $recommendedConsts = explode(";", $results['recommended_const']);
    $constRatings = explode(";", $results['const_rating']);
    $constEffects = explode(";", $results['const_effects']);
    $constComment1 = $results['const_comment_1'];
    $constComment2 = $results['const_comment_2'];
    $ascMaterials = explode(";", $results['asc_material']);
    $talents = explode(";", $results['talents']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $characterName ?> Best Build - Genshin Impact</title>
    <link rel="stylesheet" href="character/style/styles.css">
</head>
<body>
    <div class="navigate-bar-top">
        <div class="navigate-bar-top-1">
            <ul class="navigate-bar-top-content">
                <li class="nav-list"><a class="navbar-anchor" href="index.php"><img src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR" height="50px"></a></li>
                <li class="nav-list"><a class="navbar-anchor" href="character_list/characterlist.php">Character</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="weapon.php">Weapon</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="character_tierlist/tierlistc0.html">Tier List</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="calendar/calendar.php">Calendar</a></li>
                <li class="nav-list"><a class="navbar-anchor" href="About/about.html">About</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <h1 class="center title-h1"><?= $characterName ?> Best Build and Gameplay</h1> <br>
        <table>
            <tr>
                <td>
                    <img class="img-backround" src="image/splash art/<?= strtolower(str_replace(" ", "_", $characterName)).".jpg" ?>" alt="<?= strtolower(str_replace(" ", "_", $characterName)).".jpg" ?>"
                </td>
            </tr>
        </table>
        <p><?= $characterName ?> is a <?= $star ?>-Star <?= $element ?> <?= $mainWeapon ?> character in Genshin Impact. Check out this <?= $characterName ?> build guide for <?= $Gender ?> best builds, best Artifacts, best weapons, team comps, and talent priority!</p>
        <div  class="submain">
            <h2><?= $characterName ?> Rating and Information</h2>
            <div class="info">
                <h3><?= $characterName ?> Information</h3>
                <table border="1">
                    <tr>
                        <th colspan="3"><?= $characterName ?></th>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $characterName)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $characterName)).".webp" ?>" class="width-75"></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td align="center" colspan="2"><?= $rating ?></td>
                    </tr>
                    <tr>
                        <td>Rarity</td>
                        <td align="center" colspan="2"><?php for($i = 0; $i < $star; $i++) {?>★<?php } ?></td>
                    </tr>
                    <tr>
                        <td>Element</td>
                        <td align="center" colspan="2"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $element)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $element)).".webp" ?>" width="25px"><?= $element ?></td>
                    </tr>
                    <tr>
                        <td>Weapon</td>
                        <td align="center" colspan="2"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $mainWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $mainWeapon)).".webp" ?>" width="25px" style="background-color: white;"><?= $mainWeapon ?></td>
                    </tr>
                    <tr>
                        <td rowspan="2">Voice Actors</td>
                        <td>EN Voice Actor : <?= $enVoice ?></td>
                    </tr>
                    <tr>
                        <td>JP Voice Actor : <?= $jpVoice ?></td>
                    </tr>
                </table>
                <h3>Tier List Ranking</h3>
                <table border="1">
                    <tr align="center">
                        <th>Main DPS</th>
                        <th>Sub-DPS</th>
                        <th>Support</th>
                        <th>Exploration</th>
                    </tr>
                    <tr align="center">
                        <td><?= $mainDps ?></td>
                        <td><?= $subDps ?></td>
                        <td><?= $support ?></td>
                        <td><?= $explore ?></td>
                    </tr>
                </table>
                <h3><?= $characterName ?>'s Stats</h3>
                <table border="1">
                    <tr align="center">
                        <th> </th>
                        <th>HP</th>
                        <th>Attack</th>
                        <th>Defense</th>
                        <th>Ascension Stat</th>
                    </tr>
                    <tr align="center">
                        <th>LVL 20</th>
                        <td><?= $hp20 ?></td>
                        <td><?= $att20 ?></td>
                        <td><?= $def20 ?></td>
                        <td><?= $asc20 ?></td>
                    </tr>
                    <tr align="center">
                        <th>LVL 80</th>
                        <td><?= $hp80 ?></td>
                        <td><?= $att80 ?></td>
                        <td><?= $def80 ?></td>
                        <td><?= $asc80 ?></td>
                    </tr>
                </table>
                <h3>Strengths and Weaknesses</h3>
                <table class="table-strength" border="1">
                    <tr>
                        <th><?= $characterName ?>'s Strengths</th>
                    </tr>
                    <?php foreach($strengths as $strength) {?>
                    <tr><td><?= $strength ?></td></tr>
                    <?php } ?>
                    <tr>
                        <th><?= $characterName ?>'s Weaknesses</th>
                    </tr>
                    <?php foreach($weaknesses as $weakness) {?>
                    <tr><td><?= $weakness ?></td></tr>
                    <?php } ?>
                </table>
            </div>
            <h2><?= $characterName ?> Best Builds</h2>
            <div class="builds">
                <h3><?= $characterName ?> <?= $mainRole ?> Build</h3>
                <table class="table-best-build" border="1">
                    <tr>
                        <th class= "th-best-build">Best Weapon</th>
                        <td class="td-best-build"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $bestWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestWeapon)).".webp" ?>" class="width-35"><?= $bestWeapon ?></td>
                    </tr>
                    <tr>
                        <th class= "th-best-build" rowspan="<?= count($replacementWeapons) + 1 ?>">Replacement Weapons</th>
                    </tr>
                    <?php $i = 1; foreach($replacementWeapons as $replacementWeapon) {?>
                    <tr>
                        <td class="td-best-build"><?= $i ?>. <img src="image/weapon/<?= strtolower(str_replace(" ", "_", $replacementWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $replacementWeapon)).".webp" ?>" class="width-35"><?= $replacementWeapon ?></td>
                    </tr>
                    <?php $i++; } ?>
                    <tr>
                        <th class= "th-best-build" rowspan="<?php if($bestartifact_2 != NULL) {echo "2";} ?>">Best Artifacts</th>
                        <td class="td-best-build"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestartifact_1)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestartifact_1)).".webp" ?>" class="width-20"><?= $bestartifact_1?> x<?= $artifactMultiplier?></td>
                    </tr> 
                    <?php if($bestartifact_2 !== NULL) {?>

                        <tr>
                        <td class="td-best-build"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestartifact_2)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestartifact_2)).".webp" ?>" class="width-20"><?= $bestartifact_2?> x<?= $artifactMultiplier?></td>
                        </tr>
                        <?php } ?>
                    <tr>
                        <th class= "th-best-build" rowspan="3">Main Stats</th>
                        <td class="td-best-build"><img src="image/utility/sands.webp" alt="sands.webp" width="25px"> Sands : <?= $sands ?></td>
                    </tr>
                    <tr><td class="td-best-build"><img src="image/utility/goblet.webp" alt="goblet.webp" width="25px">Goblet : <?= $goblet ?></td></tr>
                    <tr><td class="td-best-build"><img src="image/utility/circlet.webp" alt="circlet.webp" width="25px">Circlet : <?= $circlet ?></td></tr>
                    <tr>
                        <th class= "th-best-build">Substats</th>
                        <td class="td-best-build"><?= $substat ?></td>
                    </tr>
                </table>
                <p><?= $descBuild ?></p>
                <h3><?= $characterName ?>'s Talent Priority</h3>
                <table class="table-talent-priority" border="1">
                    <tr>
                        <th class="th-talent-priority"> </th>
                        <th>For <?= $mainRole ?> <?= $characterName ?></th>
                    </tr>
                    <tr>
                        <th class="th-talent-priority">1st</th>
                        <td><?= $talent1 ?></td>
                    </tr>
                    <tr>
                        <th class="th-talent-priority">2nd</th>
                        <td><?= $talent2 ?></td>
                    </tr>
                    <tr>
                        <th class="th-talent-priority">3rd</th>
                        <td><?= $talent3 ?></td>
                    </tr>
                </table>
                <p><?= $descTalent ?></p>
            </div>
            <h2><?= $characterName ?> Best Artifacts</h2>
            <div class="artifact">
                <h3><?= $characterName ?> Artifact Rangkings</h3>
                <table border="1">
                    <tr>
                        <th> </th>
                        <th>Artifact</th>
                        <th>Artifact Bonuses</th>
                    </tr>
                    <?php $i = 0; foreach($artifacts as $artifact) {?>
                    <tr>
                        <th><?= $i + 1 ?></th>
                        <td align="center"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $artifact)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $artifact)).".webp" ?>" class="width-75"><br><?= $artifact ?></td>
                        <td><?= $descArtifacts[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h3>Best 4-Star Artifact for <?= $characterName ?></h3>
                <table border="1">
                    <tr>
                        <th>Artifact</th>
                        <th>Artifact Bonuses</th>
                    </tr>
                    <tr>
                        <td align="center"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $star4Artifact)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $star4Artifact)).".webp" ?>" class="width-75"><br><?= $star4Artifact ?></td>
                        <td><?= $descStar4Artifact ?></td>
                    </tr>
                </table>
            </div>
            <h2><?= $characterName ?> Best Weapon</h2>
            <div class="weapon">
                <h3><?= $characterName ?> Weapon Rankings</h3>
                <table border="1">
                    <tr>
                        <th> </th>
                        <th>Weapon</th>
                        <th>Weapon Detail</th>
                    </tr>
                    <?php $i = 0; foreach($weapons as $weapon) {?>
                    <tr>
                        <th><?= $i + 1 ?></th>
                        <td align="center">
                            <img src="image/weapon/<?= strtolower(str_replace(" ", "_", $weapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $weapon)).".webp" ?>" class="width-75"><br><?= $weapon ?>
                        </td>
                        <td>
                            <?= $descWeapons[$i]; ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h3>Best Free-to-Play Weapon</h3>
                <table border="1">
                    <tr>
                        <th>Weapon</th>
                        <th>Weapon Detail</th>
                    </tr>
                    <tr>
                        <td align="center"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $f2pWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $f2pWeapon)).".webp" ?>" class="width-75"><br><?= $f2pWeapon ?></td>
                        <td><?= $descF2pWeapon ?></td>
                    </tr>
                </table>
                <h3>All Recommended Weapons for <?= $characterName ?></h3>
                <table class="table-recommended-weapon" border="1">
                    <tr>
                        <th class="th-recommended-weapon" >Recommended Weapons</th>
                        <th class="th-recommended-weapon" >How to Get</th>
                    </tr>
                    <?php $i = 0; foreach($recommendedWeapons as $recommendedWeapon) {?>
                    <tr>
                        <td class="td-recommended-weapon-wp"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $recommendedWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $recommendedWeapon)).".webp" ?>" class="width-50"><br><?= $recommendedWeapon ?></td>
                        <td class="th-recommended-weapon-how" align="center"><?= $howToGet[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
            </div>
            <h2><?= $characterName ?>'s Best Team Comp</h2>
            <div class="team">

                <?php if($descTeamComp !== NULL) { ?>
                    <p><?=$descTeamComp?></p>
                        <?php } ?>
                <h3><?= $teamComps[0] ?></h3>
                <table border="1">
                    <tr>
                        <?php foreach($team1Th as $th) { ?>
                        <th><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr align="center">
                        <?php foreach($team1Char as $char) { ?>
                        <td><a href="character.php?character=<?php echo str_replace(" ", "%20", $characterName) ?>"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="width-75"><br><?= $char ?></a></td>
                        <?php } ?>
                    </tr>
                </table>
                <p><?= $team1Comment ?></p>
                <h3><?= $teamComps[1] ?></h3>
                <table border="1">
                    <tr>
                        <?php foreach($team2Th as $th) { ?>
                        <th><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr align="center">
                        <?php foreach($team2Char as $char) { ?>
                        <td><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="width-75"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p><?= $team2Comment ?></p>
                <?php if(isset($teamComps[2])) {?>
                <h3><?= $teamComps[2] ?></h3>
                <table border="1">
                    <tr>
                        <?php foreach($team3Th as $th) { ?>
                        <th><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr align="center">
                        <?php foreach($team3Char as $char) { ?>
                        <td><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="width-75"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p><?= $team3Comment ?></p>
                <?php } ?>
                <?php if(isset($teamComps[3])) {?>
                <h3><?= $teamComps[3] ?></h3>
                <table border="1">
                    <tr>
                        <?php foreach($team4Th as $th) { ?>
                        <th><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr align="center">
                        <?php foreach($team4Char as $char) { ?>
                        <td><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="width-75"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p><?= $team4Comment ?></p>
                <?php } ?>
            </div>
            <h2><?= $characterName ?> Best Constellations</h2>
            <div class="constellation">
                <table>
                    <tr><th><?= $bestConst ?></th></tr>
                    <tr><td><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestConst)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestConst)).".webp" ?>" class="width-200"></td></tr>
                </table>
                <h3>Constellations and Effects</h3>
                <table border="1">
                    <tr>
                        <th> </th>
                        <th><?= $characterName ?>'s Constellations</th>
                    </tr>
                    <tr>
                        <th>C1</th>
                        <td><?= $c1 ?></td>
                    </tr>
                    <tr>
                        <th>C2</th>
                        <td><?= $c2 ?></td>
                    </tr>
                    <tr>
                        <th>C3</th>
                        <td><?= $c3 ?></td>
                    </tr>
                    <tr>
                        <th>C4</th>
                        <td><?= $c4 ?></td>
                    </tr>
                    <tr>
                        <th>C5</th>
                        <td><?= $c5 ?></td>
                    </tr>
                    <tr>
                        <th>C6</th>
                        <td><?= $c6 ?></td>
                    </tr>
                </table>
                <h3>Recommended Constellations</h3>
                <table border="1">
                    <tr>
                        <th> </th>
                        <th>Rating</th>
                        <th>Constellations Effect/Merits</th>
                    </tr>
                    <?php $i = 0; foreach($recommendedConsts as $const) { ?>
                    <tr>
                        <th><?= $const ?></th>
                        <td><?php for($j = 0; $j < $constRatings[$i]; $j++) { ?>★<?php } ?></td>
                        <td><?= $constEffects[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h4><?= $constComment1 ?></h4>
                <p><?= $constComment2 ?></p>
            </div>
            <h2><?= $characterName ?> Ascension and Talent Materials</h2>
            <div class="material">
                <h3><?= $characterName ?> Ascension Materials</h3>
                <table class="table-material" border="1">
                    <tr>
                        <td>
                        <?php $i = 0; foreach($ascMaterials as $material) { ?>
                        <ul><img src="image/utility/<?= strtolower(str_replace(" ", "_", $material)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $material)).".webp" ?>" class="img-material"><?= $material ?></ul>
                        <?php $i++; } ?>
                        </td>
                    </tr>
                </table>

                <h3><?= $characterName ?> Talent Material</h3>
                <table class="table-material" border="1">
                    <tr>
                        <td>
                        <?php $i = 0; foreach($talents as $talent) { ?>
                        <ul><img src="image/utility/<?= strtolower(str_replace(" ", "_", $talent)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $talent)).".webp" ?>" class="img-material"><?= $talent ?></ul>
                        <?php $i++; } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
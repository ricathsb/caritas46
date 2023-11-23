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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navigate-bar-top-1">
        <div class="navigate-bar-top-content">
            <a class="navbar-anchor" href="index.php"><img class="navbar-logo" src="https://play-lh.googleusercontent.com/MITqgDSnTFzREWAG7UI3vjIa40oB_J_zWxhQJ2XZlDOosxP9mhOOhgbQc9QovuZeauAR"></a>
            <a class="navbar-anchor" href="character_list/characterlist.php">Character</a>
            <a class="navbar-anchor" href="weapon/weapon.php">Weapon</a>
            <a class="navbar-anchor" href="tier_list/c0.html">Tier List</a>
            <a class="navbar-anchor" href="calendar/calendar.php">Calendar</a>
            <a class="navbar-anchor" href="artifact/artifact.php">Artifact</a>
            <a class="navbar-anchor" href="about/about.html">About</a>
        </div>
    </div>    
    <div class="main">
        <h1><?= $characterName ?> Best Build and Gameplay</h1> <br>
        <table class="character-table">
            <tr class="character-table-padding">
                <td class="character-table-padding">
                    <img class="character-img-background" src="image/splash art/<?= strtolower(str_replace(" ", "_", $characterName)).".jpg" ?>" alt="<?= strtolower(str_replace(" ", "_", $characterName)).".jpg" ?>"
                </td>
            </tr>
        </table>
        <p class="character-desc"><?= $characterName ?> is a <?= $star ?>-Star <?= $element ?> <?= $mainWeapon ?> character in Genshin Impact. Check out this <?= $characterName ?> build guide for <?= $Gender ?> best builds, best Artifacts, best weapons, team comps, and talent priority!</p>
        <div class="submain">
            <h2 class="character-h2"><?= $characterName ?> Rating and Information</h2>
            <div class="info">
                <h3 class="character-h3"><?= $characterName ?> Information</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding" colspan="3"><?= $characterName ?></th>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding" colspan="3" align="center"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $characterName)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $characterName)).".webp" ?>"></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding">Rating</td>
                        <td class="character-table-padding" align="center" colspan="2"><?= $rating ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding">Rarity</td>
                        <td class="character-table-padding" align="center" colspan="2"><?php for($i = 0; $i < $star; $i++) {?>★<?php } ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding">Element</td>
                        <td class="character-table-padding" align="center" colspan="2"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $element)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $element)).".webp" ?>" class="character-small-img"><?= $element ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding">Weapon</td>
                        <td class="character-table-padding" align="center" colspan="2"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $mainWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $mainWeapon)).".webp" ?>" class="character-small-img"><?= $mainWeapon ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding" rowspan="2">Voice Actors</td>
                        <td class="character-table-padding">EN Voice Actor : <?= $enVoice ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding">JP Voice Actor : <?= $jpVoice ?></td>
                    </tr>
                </table>
                <h3 class="character-h3">Tier List Ranking</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding" align="center">
                        <th class="character-table-padding">Main DPS</th>
                        <th class="character-table-padding">Sub-DPS</th>
                        <th class="character-table-padding">Support</th>
                        <th class="character-table-padding">Exploration</th>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <td class="character-table-padding"><?= $mainDps ?></td>
                        <td class="character-table-padding"><?= $subDps ?></td>
                        <td class="character-table-padding"><?= $support ?></td>
                        <td class="character-table-padding"><?= $explore ?></td>
                    </tr>
                </table>
                <h3 class="character-h3"><?= $characterName ?>'s Stats</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding" align="center">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding">HP</th>
                        <th class="character-table-padding">Attack</th>
                        <th class="character-table-padding">Defense</th>
                        <th class="character-table-padding">Ascension Stat</th>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <th class="character-table-padding">LVL 20</th>
                        <td class="character-table-padding"><?= $hp20 ?></td>
                        <td class="character-table-padding"><?= $att20 ?></td>
                        <td class="character-table-padding"><?= $def20 ?></td>
                        <td class="character-table-padding"><?= $asc20 ?></td>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <th class="character-table-padding">LVL 80</th>
                        <td class="character-table-padding"><?= $hp80 ?></td>
                        <td class="character-table-padding"><?= $att80 ?></td>
                        <td class="character-table-padding"><?= $def80 ?></td>
                        <td class="character-table-padding"><?= $asc80 ?></td>
                    </tr>
                </table>
                <h3 class="character-h3">Strengths and Weaknesses</h3>
                <table class="character-table" class="table-strength" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"><?= $characterName ?>'s Strengths</th>
                    </tr>
                    <?php foreach($strengths as $strength) {?>
                    <tr class="character-table-padding"><td class="character-table-padding"><?= $strength ?></td></tr>
                    <?php } ?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding"><?= $characterName ?>'s Weaknesses</th>
                    </tr>
                    <?php foreach($weaknesses as $weakness) {?>
                    <tr class="character-table-padding"><td class="character-table-padding"><?= $weakness ?></td></tr>
                    <?php } ?>
                </table>
            </div>
            <h2 class="character-h2"><?= $characterName ?> Best Builds</h2>
            <div class="builds">
                <h3 class="character-h3"><?= $characterName ?> <?= $mainRole ?> Build</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding">Best Weapon</th>
                        <td class="character-table-padding" class="td-best-build"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $bestWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestWeapon)).".webp" ?>" class="character-small-img"><?= $bestWeapon ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding" rowspan="<?= count($replacementWeapons) + 1 ?>">Replacement Weapons</th>
                    </tr>
                    <?php $i = 1; foreach($replacementWeapons as $replacementWeapon) {?>
                    <tr class="character-table-padding">
                        <td class="character-table-padding" class="td-best-build"><?= $i ?>. <img src="image/weapon/<?= strtolower(str_replace(" ", "_", $replacementWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $replacementWeapon)).".webp" ?>" class="character-small-img"><?= $replacementWeapon ?></td>
                    </tr>
                    <?php $i++; } ?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding" rowspan="<?php if($bestartifact_2 != NULL) {echo "2";} ?>">Best Artifacts</th>
                        <td class="character-table-padding" class="td-best-build"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestartifact_1)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestartifact_1)).".webp" ?>" class="character-small-img"><?= $bestartifact_1?> x<?= $artifactMultiplier?></td>
                    </tr> 
                    <?php if($bestartifact_2 !== NULL) {?>

                        <tr class="character-table-padding">
                        <td class="character-table-padding" class="td-best-build"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestartifact_2)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestartifact_2)).".webp" ?>" class="character-small-img"><?= $bestartifact_2?> x<?= $artifactMultiplier?></td>
                        </tr>
                        <?php } ?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding" rowspan="3">Main Stats</th>
                        <td class="character-table-padding" class="td-best-build"><img src="image/utility/sands.webp" alt="sands.webp" class="character-small-img"> Sands : <?= $sands ?></td>
                    </tr>
                    <tr class="character-table-padding"><td class="character-table-padding" class="td-best-build"><img src="image/utility/goblet.webp" alt="goblet.webp" class="character-small-img">Goblet : <?= $goblet ?></td></tr>
                    <tr class="character-table-padding"><td class="character-table-padding" class="td-best-build"><img src="image/utility/circlet.webp" alt="circlet.webp" class="character-small-img">Circlet : <?= $circlet ?></td></tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">Substats</th>
                        <td class="character-table-padding" class="td-best-build"><?= $substat ?></td>
                    </tr>
                </table>
                <p class="character-desc"><?= $descBuild ?></p>
                <h3 class="character-h3"><?= $characterName ?>'s Talent Priority</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding">For <?= $mainRole ?> <?= $characterName ?></th>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">1st</th>
                        <td class="character-table-padding text-center"><?= $talent1 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">2nd</th>
                        <td class="character-table-padding text-center"><?= $talent2 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">3rd</th>
                        <td class="character-table-padding text-center"><?= $talent3 ?></td>
                    </tr>
                </table>
                <p class="character-desc"><?= $descTalent ?></p>
            </div>
            <h2 class="character-h2"><?= $characterName ?> Best Artifacts</h2>
            <div class="artifact">
                <h3 class="character-h3"><?= $characterName ?> Artifact Rangkings</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding">Artifact</th>
                        <th class="character-table-padding">Artifact Bonuses</th>
                    </tr>
                    <?php $i = 0; foreach($artifacts as $artifact) {?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding"><?= $i + 1 ?></th>
                        <td class="character-table-padding" align="center"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $artifact)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $artifact)).".webp" ?>" class="character-medium-img"><br><?= $artifact ?></td>
                        <td class="character-table-padding"><?= $descArtifacts[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h3 class="character-h3">Best 4-Star Artifact for <?= $characterName ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding">Artifact</th>
                        <th class="character-table-padding">Artifact Bonuses</th>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding" align="center"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $star4Artifact)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $star4Artifact)).".webp" ?>" class="character-medium-img"><br><?= $star4Artifact ?></td>
                        <td class="character-table-padding"><?= $descStar4Artifact ?></td>
                    </tr>
                </table>
            </div>
            <h2 class="character-h2"><?= $characterName ?> Best Weapon</h2>
            <div class="weapon">
                <h3 class="character-h3"><?= $characterName ?> Weapon Rankings</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding">Weapon</th>
                        <th class="character-table-padding">Weapon Detail</th>
                    </tr>
                    <?php $i = 0; foreach($weapons as $weapon) {?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding"><?= $i + 1 ?></th>
                        <td class="character-table-padding" align="center">
                            <img src="image/weapon/<?= strtolower(str_replace(" ", "_", $weapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $weapon)).".webp" ?>" class="character-medium-img"><br><?= $weapon ?>
                        </td>
                        <td class="character-table-padding">
                            <?= $descWeapons[$i]; ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h3 class="character-h3">Best Free-to-Play Weapon</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding">Weapon</th>
                        <th class="character-table-padding">Weapon Detail</th>
                    </tr>
                    <tr class="character-table-padding">
                        <td class="character-table-padding" align="center"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $f2pWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $f2pWeapon)).".webp" ?>" class="character-medium-img"><br><?= $f2pWeapon ?></td>
                        <td class="character-table-padding"><?= $descF2pWeapon ?></td>
                    </tr>
                </table>
                <h3 class="character-h3">All Recommended Weapons for <?= $characterName ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding">Recommended Weapons</th>
                        <th class="character-table-padding">How to Get</th>
                    </tr>
                    <?php $i = 0; foreach($recommendedWeapons as $recommendedWeapon) {?>
                    <tr class="character-table-padding">
                        <td class="character-table-padding text-center" class="td-recommended-weapon-wp"><img src="image/weapon/<?= strtolower(str_replace(" ", "_", $recommendedWeapon)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $recommendedWeapon)).".webp" ?>" class="character-medium-img"><br><?= $recommendedWeapon ?></td>
                        <td class="character-table-padding" class="th-recommended-weapon-how" align="center"><?= $howToGet[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
            </div>
            <h2 class="character-h2"><?= $characterName ?>'s Best Team Comp</h2>
            <div class="character-team">
                <?php if($descTeamComp !== NULL) { ?>
                    <p class="character-desc"><?=$descTeamComp?></p>
                        <?php } ?>
                <h3 class="character-h3"><?= $teamComps[0] ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <?php foreach($team1Th as $th) { ?>
                        <th class="character-table-padding"><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <?php foreach($team1Char as $char) { ?>
                        <td class="character-table-padding"><a href="character.php?character=<?php echo str_replace(" ", "%20", $characterName) ?>"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="character-medium-img"><br><?= $char ?></a></td>
                        <?php } ?>
                    </tr>
                </table>
                <p class="character-desc"><?= $team1Comment ?></p>
                <h3 class="character-h3"><?= $teamComps[1] ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <?php foreach($team2Th as $th) { ?>
                        <th class="character-table-padding"><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <?php foreach($team2Char as $char) { ?>
                        <td class="character-table-padding"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="character-medium-img"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p class="character-desc"><?= $team2Comment ?></p>
                <?php if(isset($teamComps[2])) {?>
                <h3 class="character-h3"><?= $teamComps[2] ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <?php foreach($team3Th as $th) { ?>
                        <th class="character-table-padding"><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <?php foreach($team3Char as $char) { ?>
                        <td class="character-table-padding"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="character-medium-img"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p class="character-desc"><?= $team3Comment ?></p>
                <?php } ?>
                <?php if(isset($teamComps[3])) {?>
                <h3 class="character-h3"><?= $teamComps[3] ?></h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <?php foreach($team4Th as $th) { ?>
                        <th class="character-table-padding"><?= $th ?></th>
                        <?php } ?>
                    </tr>
                    <tr class="character-table-padding" align="center">
                        <?php foreach($team4Char as $char) { ?>
                        <td class="character-table-padding"><img src="image/profile/<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $char)).".webp" ?>" class="character-medium-img"><br><?= $char ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <p class="character-desc"><?= $team4Comment ?></p>
                <?php } ?>
            </div>
            <h2 class="character-h2"><?= $characterName ?> Best Constellations</h2>
            <div class="constellation">
                <table class="character-table">
                    <tr class="character-table-padding"><th class="character-table-padding"><?= $bestConst ?></th></tr>
                    <tr class="character-table-padding"><td class="character-table-padding"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $bestConst)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $bestConst)).".webp" ?>" class="character-big-img"></td></tr>
                </table>
                <h3 class="character-h3">Constellations and Effects</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding"><?= $characterName ?>'s Constellations</th>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C1</th>
                        <td class="character-table-padding"><?= $c1 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C2</th>
                        <td class="character-table-padding"><?= $c2 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C3</th>
                        <td class="character-table-padding"><?= $c3 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C4</th>
                        <td class="character-table-padding"><?= $c4 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C5</th>
                        <td class="character-table-padding"><?= $c5 ?></td>
                    </tr>
                    <tr class="character-table-padding">
                        <th class="character-table-padding">C6</th>
                        <td class="character-table-padding"><?= $c6 ?></td>
                    </tr>
                </table>
                <h3 class="character-h3">Recommended Constellations</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <th class="character-table-padding"> </th>
                        <th class="character-table-padding">Rating</th>
                        <th class="character-table-padding">Constellations Effect/Merits</th>
                    </tr>
                    <?php $i = 0; foreach($recommendedConsts as $const) { ?>
                    <tr class="character-table-padding">
                        <th class="character-table-padding"><?= $const ?></th>
                        <td class="character-table-padding"><?php for($j = 0; $j < $constRatings[$i]; $j++) { ?>★<?php } ?></td>
                        <td class="character-table-padding"><?= $constEffects[$i] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                <h4><?= $constComment1 ?></h4>
                <p class="character-desc"><?= $constComment2 ?></p>
            </div>
            <h2 class="character-h2"><?= $characterName ?> Ascension and Talent Materials</h2>
            <div class="material">
                <h3 class="character-h3"><?= $characterName ?> Ascension Materials</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <td class="character-table-padding">
                        <?php $i = 0; foreach($ascMaterials as $material) { ?>
                        <div class="character-asc"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $material)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $material)).".webp" ?>" class="character-small-img"><?= $material ?></div>
                        <?php $i++; } ?>
                        </td>
                    </tr>
                </table>

                <h3 class="character-h3"><?= $characterName ?> Talent Material</h3>
                <table class="character-table" border="1">
                    <tr class="character-table-padding">
                        <td class="character-table-padding">
                        <?php $i = 0; foreach($talents as $talent) { ?>
                        <div class="character-asc"><img src="image/utility/<?= strtolower(str_replace(" ", "_", $talent)).".webp" ?>" alt="<?= strtolower(str_replace(" ", "_", $talent)).".webp" ?>" class="character-small-img"><?= $talent ?></div>
                        <?php $i++; } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
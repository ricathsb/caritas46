<?php
$itemPerPage = 25;

$dbPassword = "";
$dbUsername = "root";
$dbHost = "localhost";
$dbName = "caritas46";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function weaponRarity($rarity) {
    global $itemPerPage;
    return query("SELECT DISTINCT * FROM `weapon` WHERE `rarity` = $rarity ORDER BY name;");
}

function weaponType($type) {
    global $itemPerPage;
    return query("SELECT DISTINCT * FROM `weapon` WHERE `type` = '$type' ORDER BY name;");
}

function weaponAll() {
    global $itemPerPage;
    return query("SELECT DISTINCT * FROM `weapon` ORDER BY name;");
}

function getAllFromCharacter($characterName) {
    return query("SELECT * FROM `character` WHERE `name` = '$characterName' ;");
}

function getAllCharacter() {
    return query("SELECT * FROM `character` ORDER BY `name`");
}

function getElements() {
    return query("SELECT DISTINCT elemen FROM `character` ORDER BY `elemen`");
}

function getCharacterByElement($element) {
    if($element == "all") {
        return getAllCharacter();
    }
    return query("SELECT * FROM `character` where `elemen`='$element' ORDER BY `name`");
}
?>
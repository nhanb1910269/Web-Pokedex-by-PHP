<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pokemonName = null;
$pokemonType = null;
$pokemonType2 = null;
$pokemonAbility = null;
$pokemonAbility22 = null;
$pokemonAbility33 = null;
$pokemonAbility44 = null;
$pokemonImage = null;
$pokemonWeight = null;
$pokemonSpeed = null;
$pokemonSpD = null;
$pokemonSpA = null;
$pokemonHP = null;
$pokemonEvolutions = null;
$pokemonAttack = null;
$pokemonDefense = null;
$pokemonSpeed = null;
$pokemonHeight = null;
$pokemonCounter = 1;

while ($pokemonCounter <= 20) {
    $pokeGET2 = ('https://pokeapi.co/api/v2//pokemon/' . $pokemonCounter . '/');

    $pokeread = file_get_contents($pokeGET2);
    $pokeConvert = json_decode($pokeread, TRUE);
    $pokemonName = $pokeConvert['name'];
    $pokemonImage = $pokeConvert['sprites']['front_default'];
    $pokemonType = $pokeConvert['types'][0]['type']['name'];
    $pokemonType2 = $pokeConvert['types'][1]['type']['name'];
    $pokemonAbility = $pokeConvert['abilities'][0]['ability']['name'];
    $pokemonAbility22 = $pokeConvert['abilities'][1]['ability']['name'];
    $pokemonAbility33 = $pokeConvert['abilities'][2]['ability']['name'];
    $pokemonAbility44 = $pokeConvert['abilities'][3]['ability']['name'];
    //Replace empty values.
    if ($pokemonAbility == "") {
    $pokemonAbility = "(None)";
    }
    if ($pokemonAbility22 == "") {
    $pokemonAbility22 = "(None)";
    }
    if ($pokemonAbility33 == "") {
    $pokemonAbility33 = "(None)";
    }
    if ($pokemonAbility44 == "") {
    $pokemonAbility44 = "(None)";
    }
    if ($pokemonType == "") {
    $pokemonType = "(None)";
    }
    if ($pokemonType2 == "") {
    $pokemonType2 = "(None)";
    }
    $pokemonHP = $pokeConvert['stats'][0]['base_stat'];
    $pokemonAttack = $pokeConvert['stats'][1]['base_stat'];
    $pokemonSpA = $pokeConvert['stats'][3]['base_stat'];
    $pokemonDefense = $pokeConvert['stats'][2]['base_stat'];
    $pokemonSpD = $pokeConvert['stats'][4]['base_stat'];
    $pokemonWeight = $pokeConvert['weight'];
    $pokemonSpeed = $pokeConvert['stats'][5]['base_stat'];
    $pokemonHeight = $pokeConvert['height'];
    

    //Make sure to use the same names for columns
    /*
    mysql_connect('localhost', 'root', '') or die(mysql_error());
    mysql_select_db("pokedex") or die(mysql_error());

    mysql_query("INSERT INTO pokeall
           (no, name, type, type2) VALUES ('$pokemonCounter','$pokemonName', '$pokemonType', '$pokemonType2')")
        or die(mysql_error());
    */

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pokedex", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO pokeall
        (no, name, image, type, type2, height, weight, ability1, ability2, ability3, ability4, hp, attack, defense, spattack, spdefense, speed) VALUES ('$pokemonCounter','$pokemonName','$pokemonImage', '$pokemonType', '$pokemonType2', '$pokemonHeight', '$pokemonWeight', '$pokemonAbility', '$pokemonAbility22', '$pokemonAbility33', '$pokemonAbility44', '$pokemonHP', '$pokemonAttack','$pokemonDefense','$pokemonSpA','$pokemonSpD','$pokemonSpeed')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    //Used in while look and requests.
    $pokemonCounter++;

    //Reset variables.
    $pokemonType = null;
    $pokemonAbility = null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeList </title>
</head>

<body>
    <?php
    if ($_GET['page'] > 0) {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
    } else {
        $hide = "hidden";
    }

    $poke_url = 'https://pokeapi.co/api/v2/pokemon?offset=' . (1 * $page) . '&limit=2';


    $json_data = file_get_contents($poke_url);
    $response_data = json_decode($json_data);
    $poke_data = $response_data->results;
    foreach ($poke_data as $pokemon) {
        echo "<h1 >Pokemon Name : " . $pokemon->name . "</h1>";
        echo "<br />";
        $pokemon_url = $pokemon->url;
        $json_data1 = file_get_contents($pokemon_url);
        $response_data1 = json_decode($json_data1);
        $poke_mage = $response_data1->sprites->other->dream_world->front_default;
        echo "<img src='$poke_mage' height='300' width='300' border='7'/></br>";
        //print_r($response_data1);
        $poke_bility_data1 = $response_data1->abilities;
        echo "<h3>Abilities of Pokemon is : </h3>";
        foreach ($poke_bility_data1 as $pokemon1) {
            $ability_data = $pokemon1->ability;
            echo "</br>" . $ability_data->name;
        }
        echo "<br />";
        echo "<br />";
    }
    // echo "<button onclick='prev1($s)'>Previous</button>";
    // echo "<button onclick='next1()'>Next</button>";
    ?>


    <a <?php echo $hide; ?>href="/pokelist.php?page=<?= $page = $page - 2; ?>">Pre</a>
    <a href="/pokelist.php?page=<?= $page = $page + 4; ?>">Next</a>
</body>

</html>
<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#iniciar una sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos el resultado de ua peticion pero no mostrarla po pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la pticion y guardamos el resultado*/

$result = curl_exec($ch);
$data = json_decode($result,true);
curl_close($ch);

var_dump($data);

?>

<head>
    <title>La proxima pelicula de marvel</title>
    <meta charset="UTF-8"/>
    <meta name="description" content="La proxima pelicula de marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]?>" width="300" alt="Poster de <?= $data["title"]?>" "  />
    </section>

    <hgroup>
        <h2><?= $data["title"];?> se estrena en <?= $data["days_until"] ?> dias</h2>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>
    
    
</main>


<style>
    *{
        align-items: center;
        background-color: lightgray;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    img {
        border-radius: 20px;
        margin: 0 auto;
    }
</style>
<?php
// Added Data file
include 'data/data.php';

// Filtri iniziali (nessun filtro)
$filteredHotels = $hotels;

// Applica i filtri se sono stati inviati tramite il form
if (isset($_GET['parking']) && $_GET['parking'] !== '') {
    $parkingFilter = $_GET['parking'] === '1';
    $filteredHotels = array_filter($filteredHotels, function ($hotel) use ($parkingFilter) {
        return $hotel['parking'] === $parkingFilter;
    });
}

if (isset($_GET['vote']) && $_GET['vote'] !== '') {
    $voteFilter = (int)$_GET['vote'];
    $filteredHotels = array_filter($filteredHotels, function ($hotel) use ($voteFilter) {
        return $hotel['vote'] >= $voteFilter;
    });
}
?>

<!-- Html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="includes/img/hotel.png" />
    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' integrity='sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==' crossorigin='anonymous' />
    <title>Hotel List</title>
</head>

<body>
    <!-- <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel List</title>
    </head>

    <body>
        <h1>Elenco degli Hotel</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <td><?= $hotel['name']; ?></td>
                        <td><?= $hotel['description']; ?></td>
                        <td><?= $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?= $hotel['vote']; ?></td>
                        <td><?= $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body> -->

    <!-- Hotels Form and Table  -->
    <div class="container">

        <h1 class="my-4">Elenco degli Hotel</h1>
        <!-- Form per i filtri -->
        <form method="GET" class="my-3">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="parking">Filtra per parcheggio:</label>
                    <select name="parking" id="parking" class="form-control">
                        <option value="">Tutti</option>
                        <option value="1">Con parcheggio</option>
                        <option value="0">Senza parcheggio</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="vote">Filtra per voto maggiore o uguale:</label>
                    <input type="number" name="vote" id="vote" min="1" max="5" step="1" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <button type="submit" class="btn btn-primary mt-4">Filtra</button>
                </div>
            </div>
        </form>

        <!-- Tabella degli hotel -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel) : ?>
                    <tr>
                        <td><?= $hotel['name']; ?></td>
                        <td><?= $hotel['description']; ?></td>
                        <td><?= $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?= $hotel['vote']; ?></td>
                        <td><?= $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
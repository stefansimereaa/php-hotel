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
    <!DOCTYPE html>
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
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>

</body>

</html>
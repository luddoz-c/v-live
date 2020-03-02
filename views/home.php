<?php

require_once(dirname(__DIR__) . '/lib/functions.php');
require_once(dirname(__DIR__) . '/lib/Station.class.php');

$stations = json_decode(file_get_contents("http://vlille.fil.univ-lille1.fr"));

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V'Live</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap" rel="stylesheet">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>

<body>
    <header>
        <h1 class="main-title">
            <i class="fas fa-biking"></i> V'Live
        </h1>

        <button class="search subtitle">
            <span>Recherche</span>
            <i class="fas fa-search"></i>
        </button>
        </form>
    </header>

    <main>
        <div class="stations">
            <h2 class="subtitle">
                Stations <i class="fas fa-directions"></i>
            </h2>

            <div class="stations-container">

                <?php

                foreach ($stations as $station) {
                    $st = new Station($station);
                    echo create_station($st->name, $st->city, $st->bikes, $st->slots);
                }

                ?>
            </div>
        </div>
        <div class="map" id="leaflet-map">
        </div>
        <div class="infos">
            <h2 class="subtitle">
                <i class="fas fa-info-circle"></i> Infos
            </h2>

            <div class="infos-container">
                <div class="infos-main-title card highlight">
                    <span class="name">DE GAULLE</span>
                    <span class="city"><i class="fas fa-map-marker-alt"></i> LA MADELEINE </span>
                </div>
                <div class="info card">
                    <span class="info-title">Vélos disponibles</span>
                    <span>2</span>
                </div>
                <div class="info card">
                    <span class="info-title">Emplacements disponibles</span>
                    <span>8</span>
                </div>
                <div class="info card">
                    <span class="info-title">TPE</span>
                    <span>Oui</span>
                </div>
                <div class="info card">
                    <span class="info-title">État</span>
                    <span>En service</span>
                </div>
                <div class="info card">
                    <span class="info-title">État Connexion</span>
                    <span>En Ligne</span>
                </div>
            </div>
        </div>
    </main>

    <?php require_once(__DIR__ . '/modal.php') ?>

    <footer>
        <span>Copyright © 2020 Ludovic Chombeau - Romain Follet</span>
        <a class="link" href="">Crédits</a>
    </footer>

    <script src="//kit.fontawesome.com/c7aac9c8ff.js" crossorigin="anonymous"></script>
    <script src="../js/map.js"></script>

</body>

</html>
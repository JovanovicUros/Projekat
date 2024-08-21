<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Restoran Tabor</title>
    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="restoran.php"><?php session_start(); echo $_SESSION['ime'] ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="recenzije.php">Recenzije</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/logout.php">Odjavi se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Dobro došli u Restoran Tabor</h1>
            <p class="lead">Visoki kvalitet hrane!</p>
            <div class="mt-4">
                <a href="menadzer_menija.php" class="btn btn-primary me-2"  >Meni</a>
                <a href="porudzbine.php" class="btn btn-primary">Porudzbine</a>
            </div>
        </div>
    </header>

    <!-- Sekcija za Meni -->
    <section class="menu-section">
        <div class="container">
            <div class="menu-card">
                <h2 class="text-center">Meni</h2>
                <div class="row">
                    <?php
                    include 'php/konekcija.php';

                    $sql = "SELECT naziv, opis, cena FROM meni";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4 menu-item">';
                            echo '<div class="menu-item-card">';
                            echo '<h3>' . $row["naziv"] . '</h3>';
                            echo '<p>' . $row["opis"] . '</p>';
                            echo '<p class="cena">' . $row["cena"] . ' RSD</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-center">Trenutno nema ništa na meniju.</p>';
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Sekcija za Porudzbinu -->
    <section class="order-section">
        <div class="container">
            <div class="order-card">
                <h2 class="text-center">Porudžbina</h2>
                <form action="php/poruci.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="ime">Ime:</label>
                            <input type="text" class="form-control" id="ime" name="ime" required>
                        </div>
                        <div class="col-md-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="telefon">Telefon:</label>
                            <input type="text" class="form-control" id="telefon" name="telefon" required>
                        </div>
                        <div class="col-md-3">
                            <label for="adresa">Adresa:</label>
                            <input type="text" class="form-control" id="adresa" name="adresa" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jela">Izaberite jelo:</label>
                        <div class="menu-item-card">
                            <?php
                            include 'php/konekcija.php';

                            $sql = "SELECT jelo_id, naziv FROM meni";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="form-check">';
                                    echo '<input class="form-check-input" type="checkbox" name="jela[]" id="jelo' . $row["jelo_id"] . '" value="' . $row["naziv"] . '">';
                                    echo '<label class="form-check-label" for="jelo' . $row["jelo_id"] . '">' . $row["naziv"] . '</label>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p class="text-center">Trenutno nema dostupnih jela.</p>';
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Poruči</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

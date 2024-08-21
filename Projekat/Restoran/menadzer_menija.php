<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Menadžer Menija</title>
</head>
<style>
        body {
            background-color: #3E4E62;
        }
    </style>
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
                        <a class="nav-link" href="menadzer_menija.php">Meni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="porudzbine.php">Porudžbine</a>
                    </li>
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

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="menu-form-card">
                    <h2 class="text-center">FastFood Uros</h2>
                    <form action="php/dodaj_jelo.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="naziv" class="form-label">Unesite ime jela</label>
                            <input type="text" class="form-control" id="naziv" name="naziv" required>
                        </div>
                        <div class="mb-3">
                            <label for="opis" class="form-label">Unesite opis jela</label>
                            <input type="text" class="form-control" id="opis" name="opis" required>
                        </div>
                        <div class="mb-3">
                            <label for="cena" class="form-label">Unesite cenu jela</label>
                            <input type="text" class="form-control" id="cena" name="cena" required>
                        </div>
                        <div class="mb-3">
                            <label for="slika" class="form-label">Slika jela</label>
                            <input type="file" class="form-control" id="slika" name="slika">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Dodaj</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="menu-list-card">
                    <h2 class="text-center">Meni</h2>
                    <div class="menu-list">
                        <?php
                        include 'php/konekcija.php';

                        $sql = "SELECT * FROM meni";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="menu-item">';
                                echo '<div class="menu-item-content">';
                                echo '<img src="slike/' . $row["slika"] . '" alt="Slika jela">';
                                echo '<h3>' . $row["naziv"] . '</h3>';
                                echo '<p>' . $row["opis"] . '</p>';
                                echo '<p class="cena">' . $row["cena"] . ' RSD</p>';
                                echo '</div>';
                                echo '<div class="menu-item-actions">';
                                echo '<a href="php/izmeni_jelo.php?id=' . $row["jelo_id"] . '" class="btn btn-primary">Izmeni</a>';
                                echo '<a href="php/obrisi_jelo.php?id=' . $row["jelo_id"] . '" class="btn btn-danger">Obriši</a>';
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
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

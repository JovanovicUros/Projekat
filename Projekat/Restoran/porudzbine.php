<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Porudžbine</title>
    <style>
        body {
            background-color: #3E4E62;
        }
        .order-card {
            background-color: #181818;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .order-card h2 {
            font-family: 'Lalezar', cursive;
        }
        .table {
            color: white;
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
        <div class="order-card">
            <h2 class="text-center">FastFood Uros</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Adresa</th>
                        <th scope="col">Jela</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Vreme dostave</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'php/konekcija.php';

                    $sql = "SELECT ime, email, telefon, adresa, jela, datum FROM porudzbine";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $vreme_dostave = rand(0, 60); // Nasumično vreme dostave između 0 i 60 minuta
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ime']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['telefon']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['adresa']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jela']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
                            echo "<td>" . $vreme_dostave . " minuta</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Nema porudžbina.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="restoran.php" class="btn btn-primary">Dodaj</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

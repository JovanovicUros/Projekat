<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Recenzije</title>
    <style>
        body {
            background-color: #3E4E62;
        }
        .review-card {
            background-color: #181818;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .review-card h2 {
            font-family: 'Lalezar', cursive;
        }
        .table {
            color: white;
        }
        .btn-add-review {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-add-review:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
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
                        <a class="nav-link" href="tabor.php">Pocetna</a>
                    </li>
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
        <div class="review-card">
            <h2 class="text-center">FastFood Uros</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ocena</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Datum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'php/konekcija.php';

                    $sql = "SELECT ime, email, ocena, opis, datum FROM ocene";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ime']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ocena']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['opis']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Nema recenzija.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="dodaj_recenziju.php" class="btn-add-review">Dodaj ocenu</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

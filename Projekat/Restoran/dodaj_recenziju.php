<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Dodaj Recenziju</title>
    <style>
        body {
            background-color: #3E4E62;
        }
        .review-form-card {
            background-color: #181818;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .review-form-card h2 {
            font-family: 'Lalezar', cursive;
        }
        .form-control {
            background-color: #333;
            color: #ccc;
            border: none;
            border-radius: 5px;
        }
        .form-control::placeholder {
            color: #888;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
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
        <div class="review-form-card">
            <h2 class="text-center">FastFood Uros</h2>
            <form action="php/dodaj_recenziju.php" method="POST">
                <div class="mb-3">
                    <label for="ime" class="form-label">Unesite ime</label>
                    <input type="text" class="form-control" id="ime" name="ime" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Unesite email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="opis" class="form-label">Unesite opis</label>
                    <textarea class="form-control" id="opis" name="opis" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="ocena" class="form-label">Unesite ocenu</label>
                    <input type="number" class="form-control" id="ocena" name="ocena" min="1" max="5" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Dodaj</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Restoran</title>
</head>
<body>
    <div class="container-fluid bg">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-4 login-box">
                <h1 class="text-center">FastFood Tabor</h1>
                <form action="php/login.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="username">Unesite username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username:" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Unesite password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password:" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                    <div class="text-center mt-2">
                        <a href="register.php">Nemaš nalog?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

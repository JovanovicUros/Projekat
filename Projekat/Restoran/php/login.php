<?php
include 'konekcija.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging output
    error_log("Username: $username");
    error_log("Password: $password");

    // Provera specifičnog korisničkog imena i lozinke za admina
    if ($username === 'Uros12' && $password === '1234') {
        $_SESSION['korisnik_id'] = 'admin';  // Postavi admin ID ili neku drugu vrednost
        $_SESSION['ime'] = 'Admin';          // Postavi ime korisnika na Admin ili neki drugi podatak
        header("Location: /Restoran/restoran.php");
        exit();
    }

    // Standardna provera korisničkog imena i lozinke u bazi
    $sql = "SELECT * FROM korisnici WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['lozinka'])) {
            $_SESSION['korisnik_id'] = $user['korisnik_id'];
            $_SESSION['ime'] = $user['ime'];
            // Preusmeravanje standardnih korisnika na stranicu tabor.php
            header("Location: /Restoran/tabor.php");
            exit();
        } else {
            echo "Pogrešna lozinka.";
        }
    } else {
        echo "Korisničko ime ne postoji.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Forma nije poslata ispravno.";
}
?>

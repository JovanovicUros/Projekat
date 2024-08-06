<?php
include 'konekcija.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging output
    error_log("Username: $username");
    error_log("Password: $password");

    $sql = "SELECT * FROM korisnici WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['lozinka'])) {
            $_SESSION['korisnik_id'] = $user['korisnik_id'];
            $_SESSION['ime'] = $user['ime'];
            // Change the Location header to use an absolute URL
            header("Location: /Restoran/restoran.php");
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

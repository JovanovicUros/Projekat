<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telefon = $_POST['telefon'];
    $adresa = $_POST['adresa'];

    $sql = "INSERT INTO Korisnici (ime, username, lozinka, telefon, adresa) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $ime, $username, $password, $telefon, $adresa);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
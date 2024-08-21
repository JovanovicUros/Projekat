<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $adresa = $_POST['adresa'];
    $jela = isset($_POST['jela']) ? implode(', ', $_POST['jela']) : '';

    $sql = "INSERT INTO porudzbine (ime, email, telefon, adresa, jela) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $ime, $email, $telefon, $adresa, $jela);

    if ($stmt->execute()) {
        header("Location: ../restoran.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

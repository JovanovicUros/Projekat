<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $opis = $_POST['opis'];
    $ocena = $_POST['ocena'];

    $sql = "INSERT INTO ocene (ime, email, opis, ocena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $ime, $email, $opis, $ocena);

    if ($stmt->execute()) {
        header("Location: ../recenzije.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

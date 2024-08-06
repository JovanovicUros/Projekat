<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $slika = '';

    if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $slika = basename($_FILES['slika']['name']);
        $target = '../slike/' . $slika;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target);
    }

    $sql = "INSERT INTO meni (naziv, opis, cena, slika) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $naziv, $opis, $cena, $slika);

    if ($stmt->execute()) {
        header("Location: ../menadzer_menija.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<?php
include 'konekcija.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $slika = $_POST['stara_slika'];

    if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $slika = basename($_FILES['slika']['name']);
        $target = '../slike/' . $slika;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target);
    }

    $sql = "UPDATE meni SET naziv=?, opis=?, cena=?, slika=? WHERE jelo_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $naziv, $opis, $cena, $slika, $id);

    if ($stmt->execute()) {
        header("Location: ../menadzer_menija.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM meni WHERE jelo_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $jelo = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Roboto&display=swap" rel="stylesheet">
    <title>Izmeni Jelo</title>
</head>
<body>
    <div class="container mt-5">
        <div class="menu-form-card">
            <h2 class="text-center">Izmeni Jelo</h2>
            <form action="izmeni_jelo.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $jelo['jelo_id']; ?>">
                <input type="hidden" name="stara_slika" value="<?php echo $jelo['slika']; ?>">
                <div class="mb-3">
                    <label for="naziv" class="form-label">Unesite ime jela</label>
                    <input type="text" class="form-control" id="naziv" name="naziv" value="<?php echo $jelo['naziv']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="opis" class="form-label">Unesite opis jela</label>
                    <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $jelo['opis']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cena" class="form-label">Unesite cenu jela</label>
                    <input type="text" class="form-control" id="cena" name="cena" value="<?php echo $jelo['cena']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="slika" class="form-label">Slika jela</label>
                    <input type="file" class="form-control" id="slika" name="slika">
                </div>
                <button type="submit" class="btn btn-primary w-100">Izmeni</button>
            </form>
        </div>
    </div>
</body>
</html>

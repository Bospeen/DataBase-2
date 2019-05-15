<?php
session_start()
?>
<html>
<body>
<style>
    body {
        background-image: url("moi - kopie.jpg");
    }

    button {
        color: #000000;
    }

    form {
        font-size: large;
        color: #000000;
        border: 1px black solid;
        width: 200px;
        margin-left: 600px;
    }

</style>
<?php
$servername = "localhost";
$databasename = "db_level2_opdr1";
$username = "DC";
$password = "DC2";
$naam = "";
$achternaam = "";
$geboortedatum ="";
$id = "";

$conn = new mysqli($servername, $username, $password, $databasename);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM verjaardagen WHERE id=$id";


    if (!$result = $conn->query($sql)) {
        die('There was an error running the query [' . $conn->error . ']');
    }
    if ($row = $result->fetch_assoc()) {
        $naam = $row['Naam'];
        $achternaam = $row['Achternaam'];
        $geboortedatum = strtotime ($row["Geboortedatum"])  ;
        $geboortedatum = date("d-m-Y", $geboortedatum);
    }
}

if (isset($_POST['submit'])) {
    $naam = $_POST['Naam'];
    $achternaam = $_POST['Achternaam'];
    $geboortedatum = strtotime(mysqli_real_escape_string($conn, $_POST["Geboortedatum"]));
    $geboortedatum = date("Y-m-d", $geboortedatum);
    if ($id) {
        $sql = "UPDATE verjaardagen SET Naam = '$naam', Achternaam = '$achternaam', Geboortedatum = '$geboortedatum' WHERE id = '$id'";
    } else {
        $sql = "INSERT into verjaardagen (Naam, Achternaam, Geboortedatum) values ('$naam', '$achternaam', '$geboortedatum')";
    }


    if ($conn->query($sql) === TRUE) {
        header("Location: /DataBase%202/eindopdracht2.php");
        $conn->close();
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        exit();
    }
}
$titel ="";
if ($id) {
    $titel = "Verjaardag wijzigen";
} else {
    $titel ="Verjaardag toevoegen";
}
if (isset($_POST['terug'])) {
    header("Location: /DataBase%202/eindopdracht2.php");
    exit();
}

?>
<form action="" method="post">
    <label>Naam: </label><input style="margin-top: 10px;" type="text" name="Naam" value=<?php echo $naam ?>><br>
    <label>Achternaam: </label><input type="text" name="Achternaam" value=<?php echo $achternaam ?>><br>
    <label>Geboortedatum: </label><input type="text" name="Geboortedatum" value=<?php echo $geboortedatum ?>><br>
    <input style="margin-bottom: 10px;" name="submit" type="submit" value="<?php echo $titel ?>">
    <input type="submit" name="terug" value="overzicht van items">
</form>
</body>
</html>
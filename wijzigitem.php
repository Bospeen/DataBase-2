<?php
session_start()
?>
<html>
<body>
<style>
    body {
        background-image: url("hallo.jpeg");
    }

    button {
        color: blue;
    }

    form {
        font-size: large;
        color: #fff9fb;
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
$prijs = 0;
$omschrijving = "";
$winkel = "";
$link = "";
$id = "";

$conn = new mysqli($servername, $username, $password, $databasename);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM verlanglijstje WHERE id=$id";


    if (!$result = $conn->query($sql)) {
        die('There was an error running the query [' . $conn->error . ']');
    }
    if ($row = $result->fetch_assoc()) {
        $naam = $row['Naam'];
        $omschrijving = $row['Omschrijving'];
        $prijs = $row['Prijs'];
        $winkel = $row['Winkel'];
        $link = $row['Link'];
    }
}

if (isset($_POST['submit'])) {
    $naam = $_POST['Naam'];
    $omschrijving = $_POST['Omschrijving'];
    $prijs = $_POST['Prijs'];
    $winkel = $_POST['Winkel'];
    $link = $_POST['Link'];
if ($id) {
    $sql = "UPDATE verlanglijstje SET Naam = '$naam', Omschrijving = '$omschrijving', Prijs = '$prijs', Winkel = '$winkel', Link = '$link' WHERE id = '$id'";
} else {
    $sql = "INSERT into verlanglijstje (Naam, Omschrijving, Prijs, Winkel, Link) values ('$naam', '$omschrijving', '$prijs', '$winkel', '$link')";
}


    if ($conn->query($sql) === TRUE) {
        header("Location: /DataBase%202/Oefenopdracht8.php");
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
  $titel = "Item wijzigen";
} else {
    $titel ="Item toevoegen";
}

?>
<form action="" method="post">
    <label>Naam: </label><input style="margin-top: 10px;" type="text" name="Naam" value=<?php echo $naam ?>><br>
    <label>Omschrijving: </label><input type="text" name="Omschrijving" value=<?php echo $omschrijving ?>><br>
    <label>Prijs: </label><input type="text" name="Prijs" value=<?php echo $prijs ?>><br>
    <label>Winkel: </label><input type="text" name="Winkel" value=<?php echo $winkel ?>><br>
    <label>Link: </label><input type="text" name="Link" value=<?php echo $link ?>><br>
    <input style="margin-bottom: 10px;" name="submit" type="submit" value="<?php echo $titel ?>">
    <input type="submit" name="submit" value="overzicht van items">
</form>
</body>
</html>
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
    form{
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

$conn = new mysqli($servername, $username, $password, $databasename);
$id = $_GET['id'];

$sql = "SELECT * FROM verlanglijstje where Id = $id;";

if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}
while ($rij = $result->fetch_assoc()){
        $artist = $rij['artist'];
        $title =$rij['title'];

    }
    $result->free();


if (isset($_POST['terug'])) {
    header("Location: /DataBase%202/oefenopdracht5.php");
    exit();
} else if (isset($_POST['submit'])) {

    $artist = $_POST['artist'];
    $title = $_POST['title'];

    if (empty($artist) || empty($title)) {
        die("Vul bijde velden in!");
    }
    $sql = "UPDATE songs SET artist = '$artist', title = '$title' WHERE Id = '$id'";


        if (!$conn->query($sql) === TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } else {
            header("Location: /DataBase%202/oefenopdracht5.php");
        }
    }

    $conn->close();
?>
<form action="" method="post">
    <label>Artiest: </label><input style="margin-top: 10px;" type="text" name="artist" value="<?php echo $artist; ?>"><br>
    <label>Titel van lied: </label><input type="text" name="title" value="<?php echo $title ?>"><br>
    <input style="margin-bottom: 10px" name="submit" type="submit" value="Liedje wijzigen">
    <input type="submit" name="terug" value="Naar overzicht">
</form>
</body>
</html>
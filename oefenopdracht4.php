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
<form action="" method="post">
    <label>Artiest: </label><input style="margin-top: 10px;" type="text" name="artist"><br>
    <label>Naam van het liedje: </label><input type="text" name="title"><br>
    <input style="margin-bottom: 10px;" name="submit" type="submit" value="Liedje toevoegen">
    <input type="submit" name="terug" value="overzicht van songs">
</form>
<?php
$servername = "localhost";
$databasename = "db_level2_opdr1";
$username = "DC";
$password = "DC2";

$conn = new mysqli($servername, $username, $password, $databasename);

if (isset($_POST['terug'])) {
    header("Location: /DataBase%202/oefenopdracht5.php");
    exit();
} else if (isset($_POST['submit'])) {

    $artist = $_POST['artist'];
    $title = $_POST['title'];

    if(empty($artist) || empty($title)){
        die("Vul beide velden in!");
    }

    $sql = "INSERT into songs (artist, title) VALUES('$artist', '$title')";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        header("Location: /DataBase%202/oefenopdracht5.php");
    }
}

$conn->close();

?>
</body>
</html>






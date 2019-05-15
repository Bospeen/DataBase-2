<html>
<body>
<style>
    body {
        background-image: url("hallo.jpeg");
    }
    th {
        border-bottom: black 2px solid;
    }

    td {
        border-bottom: 1px black dotted;
    }

    table {
        background: rgba(255, 255, 255, 0.5);
        margin-left: auto;
        margin-right: auto;
        margin-top: 0px;
        border: 1px black solid;
    }
    div {
        text-align: center;
        margin-top: 5px;
    }

</style>
<?php
$servername = "localhost";
$databasename = "db_level2_opdr1";
$username = "DC";
$password = "DC2";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    //Ga dan naar het form.
    header("<a href='wijzigsong.php'>");

$sql = "SELECT * FROM songs;";

if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}
?>
<table>
    <tr>
        <th>ID</th>
        <th>Artiest</th>
        <th>Titel</th>
        <th>Aanpassen</th>
        <th>Verwijderen</th>
    </tr>

    <?php while ($rij = $result->fetch_assoc()){
        $id = $rij['id'];
        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $rij['artist'] . "</td>";
        echo "<td>" . $rij['title'] . "</td>";
        echo "<td><button onclick=\"window.location.href = 'wijzigsong.php?id=$id';\">Aanpassen</button></td>";
        echo "<td><button onclick=\"window.location.href = 'deletesong.php?id=$id';\">Verwijderen</button></td>";

        echo "</tr>";
    }
    $result->free();
    $conn->close();
    ?>
    </table>
<div style="margin-left: 20px">
<button onclick="window.location.href = 'oefenopdracht4.php?id=';">Liedje toevoegen</button>
</div>
</body>
</html>
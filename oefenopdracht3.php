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
//echo "Connected successfully";

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
        echo "<tr>";
        echo "<td>" . $id = $rij['id'] . "</td>";
        echo "<td>" . $rij['artist'] . "</td>";
        echo "<td>" . $rij['title'] . "</td>";
        echo "<td><button onclick=\"window.location.href = 'wijzigsong.php';\">Aanpassen</button>";
        echo "<td><button onclick=\"window.location.href = 'oefenopdracht4.php';\">Verwijderen</button>";

        echo "</tr>\n";
    }
    $result->free();
    $conn->close();
    ?>
</table>
</body>
</html>
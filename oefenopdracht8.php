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
header("<a href='wijzigitem.php'>");

$sql = "SELECT * FROM verlanglijstje;";

if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

?>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Omschrijving</th>
        <th>Prijs in euro's</th>
        <th>Winkel</th>
        <th>Link</th>
        <th>Aanpassen</th>
        <th>Verwijderen</th>
    </tr>

    <?php while ($rij = $result->fetch_assoc()){
        $id = $rij['id'];
        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $rij['Naam'] . "</td>";
        echo "<td>" . $rij['Omschrijving'] . "</td>";
        echo "<td>€" . $rij['Prijs'] . "</td>";
        echo "<td>" . $rij['Winkel'] . "</td>";
        $link = $rij['Link'];
        echo "<td><a href=$link  target= _blank>Link</a></td>";
        echo "<td><button onclick=\"window.location.href = 'wijzigitem.php?id=$id';\">Aanpassen</button></td>";
        echo "<td><button onclick=\"window.location.href = 'deleteitem.php?id=$id';\">Verwijderen</button></td>";

        echo "</tr>";
    }
    $result->free();
    $conn->close();
    ?>
</table>
<div style="margin-left: 20px">
    <button onclick="window.location.href = 'wijzigitem.php';">item toevoegen</button>
</div>
</body>
</html>

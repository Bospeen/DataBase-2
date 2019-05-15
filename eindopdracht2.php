<html>
<body>
<style>
    body {
        background-image: url("moi - kopie.jpg");
    }
    th {
        border-bottom: black 2px solid;
    }

    td {
        border-bottom: 1px black dotted;
    }

    table {
        background: rgba(0, 0, 0, 0.5);
        margin-left: auto;
        margin-right: auto;
        margin-top: 0px;
        border: 1px black solid;
    }
    div{
    text-align: center;
        margin-top: 20
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
header("<a href='wijzigver..php'>");

$sql = "SELECT * FROM verjaardagen;";

if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

?>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Achtenaam</th>
        <th>Geboortedatum</th>
        <th>Leeftijd</th>
        <th>Aanpassen</th>
        <th>Verwijderen</th>
    </tr>

<?php while ($rij = $result->fetch_assoc()) {
    $id = $rij['id'];
    echo "<tr>";
    echo "<td>" . $id . "</td>";
    echo "<td>" . $rij['Naam'] . "</td>";
    echo "<td>" . $rij['Achternaam'] . "</td>";
    $birthdate = $rij['Geboortedatum'];
    $birthDateArray = explode("-", $birthdate);
    echo '<td>' . $birthDateArray[2] . "-" . $birthDateArray[1] . "-" . $birthDateArray[0] . "</td>";
    $date1 = new DateTime("now");
    $date2 = new DateTime($birthdate);
    $age = $date1 -> diff($date2);
    echo '<td>' . $age->y . " Jaar, " . $age->m . " Maanden, " . $age->d . " Dagen" ."</td>";
    echo "<td><button onclick=\"window.location.href = 'wijzigver..php?id=$id';\">Aanpassen</button></td>";
    echo "<td><button onclick=\"window.location.href = 'deletever..php?id=$id';\">Verwijderen</button></td>";

}
?>
</table>
<div style="margin-left: 20px">
    <button onclick="window.location.href = 'wijzigver..php';">item toevoegen</button>
</div>
</body>
</html>
<html>
<body>
<style>
    body {
        background-image: url("moi - kopie.jpg");
    }
    button {
        color: blue;
    }
    .container {
        border-radius: 10px;
        width: 400px;
        height: 200px;
        margin: auto;
        font-family: sans-serif;
        background-color: #636363;
        margin-top: 70px;
        text-align: center;
    }

</style>
<?php
if (isset($_POST['terug'])) {
    header("Location: /DataBase%202/eindopdracht2.php");
    exit();
}

if (isset($_POST['verwijder'])) {
    if(!isset($_GET['id'])){
        echo "Error: Er is geen geldig ID mee gegeven!<br>" ;
        echo "Klik <a href='eindopdracht2.php'>hier</a> om terug te gaan naar het overzicht.";
        exit();
    }
    $id = $_GET['id'];

    $servername = "localhost";
    $databasename = "db_level2_opdr1";
    $username = "DC";
    $password = "DC2";
    $conn = new mysqli($servername, $username, $password, $databasename);
    $sql = "DELETE from verjaardagen where id = $id";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    } else {
        $conn->close();
        header("Location: /DataBase%202/eindopdracht2.php");
    }
}
?>

<div class="container">
    <div style="padding-top: 50px">Weet je zeker dat u dit wilt verwijderen?</div><br><br>
    <form action="" method="post">
        <input type="submit" name="verwijder" value="Ja">
        <input type="submit" name="terug" value="Nee">
    </form>
</div>
</body>
</html>
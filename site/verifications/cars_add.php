<?php
require '../database/settings_db.php';
if (isset($_GET['chassi']) && !empty($_GET['chassi']) && isset($_GET['valor']) && !empty($_GET['valor']) && isset($_GET['modelo']) && !empty($_GET['modelo']) && isset($_GET['km']) && !empty($_GET['km']) && isset($_GET['marca']) && !empty($_GET['marca'])) {
    $chassi = $_GET['chassi'];
    $valor = $_GET['valor'];
    $modelo = $_GET['modelo'];
    $km = $_GET['km'];
    $marca = $_GET['marca'];

    $sql = "INSERT INTO carros(chassi, modelo, valor_aluguel, quilometros_rodados, id_marca) VALUES(:chassi, :modelo, :valor, :km, :marca)";
    $result = $conn->prepare($sql);
    $result->bindValue("chassi", $chassi);
    $result->bindValue("modelo", $modelo);
    $result->bindValue("valor", $valor);
    $result->bindValue("km", $km);
    $result->bindValue("marca", $marca);
    $result->execute();
    $crated_car = $result->fetch(PDO::FETCH_OBJ);
    header('Location: ../cars_table.php?register="ok"');
}

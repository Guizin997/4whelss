<?php
require 'template/header.php';
require 'database/settings_db.php';

$sql = "SELECT * FROM `carros`";
$result = $conn->prepare($sql);
$result->execute();
$cars = $result->fetchAll(PDO::FETCH_OBJ)
?>

<div id="body">
   <table class="table table-striped">
      <thead>
         <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Valor do Aluguel</th>
            <th>Quilômetros Rodados</th>
            <th>Marca</th>
            <th>Ações</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <?php
            foreach ($cars as $car) {
               echo '<th>' . $car->id_carros . '</th>';
               echo '<th>' . $car->modelo . '</th>';
               echo '<th>' . $car->valor_aluguel . '</th>';
               echo '<th>' . "$car->quilometros_rodados Km" . '</th>';
               echo '<th>' . $car->id_marcas . '</th>';
            }
            ?>
         </tr>
      </tbody>
   </table>
</div>

<?php
require 'template/footer.php';
?>
<?php
require 'template/header.php';
require 'database/settings_db.php';

// $sql = "SELECT * FROM carros";
// $result = $conn->prepare($sql);
// $result->execute();
// $cars = $result->fetchAll(PDO::FETCH_OBJ)
$sql = "SELECT c.chassi, c.modelo, c.valor_aluguel, c.quilometros_rodados, m.nome AS marca 
      FROM carros AS c
      JOIN marcas AS m ON c.id_marca = m.id_marca";
$result = $conn->prepare($sql);
$result->execute();
$cars = $result->fetchAll(PDO::FETCH_OBJ);
?>

<div id="body">
   <div class="container-fluid">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carsTable">Adicionar Carro</button>
      <div class="modal fade" id="carsTable" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="insertModal">Informações do Carro</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                     </div>
                     <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Send message</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="p-4">
      <table class="table table-striped">
         <thead>
            <tr class="table-dark">
               <th>Nº do Chassi</th>
               <th>Modelo</th>
               <th>Valor do Aluguel</th>
               <th>Quilômetros Rodados</th>
               <th>Marca</th>
               <th>Ações</th>
            </tr>
         </thead>
         <tbody>
            <?php
            if($result->rowCount() > 0) {
               foreach ($cars as $car) {
                  echo '<tr>';
                  echo "<th> $car->chassi </th>";
                  echo "<th> $car->modelo </th>";
                  echo "<th> $car->valor_aluguel </th>";
                  echo "<th> $car->quilometros_rodados Km </th>";
                  echo "<th> $car->marca </th>";
                  echo '</tr>';
               }
               $content = true;  
            } else {
               $content = false;
            }
            ?>
         </tbody>
      </table>
      <?php
      if ($content == false) {
         echo '<div class="container-fluid d-flex justify-content-center py-3">
                  <div class="card text-danger border-2">
                     <div class="card-body">
                        <h3>Não há carros cadastrados no sistema!</h3>
                     </div>
                  </div>
               </div>';
      }
      ?>
   </div>
</div>

<?php
require 'template/footer.php';
?>
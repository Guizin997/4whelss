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
   <div class="container-fluid d-flex flex-wrap justify-content-between">
      <h1 class="m-2">Cadastro de Carros</h1>
      <button type="button" class="btn btn-primary fw-bold m-2" data-bs-toggle="modal" data-bs-target="#carsTable">Adicionar Carro</button>
      <div class="modal fade" id="carsTable" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title fs-5" id="insertModal">Informações do Carro</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form action="" method="get" class="row g-3">
                     <div class="col-md-6">
                        <label for="inputChassi" class="form-label fw-semibold">Nº do Chassi</label>
                        <input type="number" class="form-control" id="inputChassi" name="chassi">
                     </div>
                     <div class="col-md-6">
                        <label for="inputValor" class="form-label fw-semibold">Valor do Aluguel</label>
                        <input type="number" class="form-control" id="inputValor" name="valor">
                     </div>
                     <div class="col-12">
                        <label for="inputModelo" class="form-label fw-semibold">Modelo do Carro</label>
                        <input type="text" class="form-control" id="inputModelo" name="modelo">
                     </div>
                     <div class="col-md-6">
                        <label for="inputKm" class="form-label fw-semibold">Quilômetros Rodados</label>
                        <input type="number" class="form-control" id="inputKm" name="km">
                     </div>
                     <div class="col-md-6">
                        <label for="inputMarca" class="form-label fw-semibold">Marca do carro</label>
                        <select id="inputMarca" class="form-select" name="marca">
                           <option selected></option>
                           <?php
                           $sql = "SELECT * FROM marcas";
                           $result = $conn->prepare($sql);
                           $result->execute();
                           $options = $result->fetchALL(PDO::FETCH_OBJ);
                           if ($result->rowCount() > 0) {
                              foreach ($options as $option) {
                                 echo "<option >$option->nome</option>";
                              }
                           }
                           ?>
                        </select>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Adicionar</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid py-4 table-responsive">
      <table class="table table-striped table-bordered">
         <thead>
            <tr class="table-dark">
               <th>Nº do Chassi</th>
               <th>Modelo</th>
               <th>Valor do Aluguel (R$)</th>
               <th>Quilômetros Rodados (Km)</th>
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
                  echo "<td> $car->modelo </td>";
                  echo "<td> R$ $car->valor_aluguel,00 </td>";
                  echo "<td> $car->quilometros_rodados Km </td>";
                  echo "<td>$car->marca </td>";
                  echo '<td class="d-flex justify-content-center p-0 py-1">';
                  echo '<button class="btn btn-warning me-2">Editar</button>';
                  echo '<button class="btn btn-danger ms-2">Deletar</button>';
                  echo '</td>';
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
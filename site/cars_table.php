<?php
require 'template/header.php';
require 'database/settings_db.php';
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
                  <form action="verifications/cars_add.php" method="get" class="row g-3">
                     <div class="col-md-6">
                        <label for="inputChassi" class="form-label fw-semibold">Nº do Chassi</label>
                        <input type="text" maxlength="17" class="form-control" id="inputChassi" name="chassi" required>
                     </div>
                     <div class="col-md-6">
                        <label for="inputValor" class="form-label fw-semibold">Valor do Aluguel</label>
                        <input type="number" class="form-control" id="inputValor" name="valor" required>
                     </div>
                     <div class="col-12">
                        <label for="inputModelo" class="form-label fw-semibold">Modelo do Carro</label>
                        <input type="text" class="form-control" id="inputModelo" name="modelo" required>
                     </div>
                     <div class="col-md-6">
                        <label for="inputKm" class="form-label fw-semibold">Quilômetros Rodados</label>
                        <input type="text" class="form-control" id="inputKm" name="km" value="Zero">
                     </div>
                     <div class="col-md-6">
                        <label for="inputMarca" class="form-label fw-semibold">Marca do carro</label>
                        <select id="inputMarca" class="form-select" name="marca" required>
                           <option selected></option>
                           <?php
                           $sql = "SELECT * FROM marcas";
                           $result = $conn->prepare($sql);
                           $result->execute();
                           $options = $result->fetchAll(PDO::FETCH_OBJ);
                           if ($result->rowCount() > 0) {
                              foreach ($options as $option) {
                                 echo "<option value='$option->id_marca'>$option->nome</option>";
                              }
                           }
                           ?>
                        </select>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Adicionar">
                     </div>
                  </form>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php
   
   ?>
   <div class="container-fluid py-4 table-responsive">
      <table class="table table-striped table-bordered">
         <thead>
            <tr class="table-dark">
               <th class="text-center align-content-center">Nº do Chassi</th>
               <th class="text-center align-content-center">Modelo</th>
               <th class="text-center align-content-center">Valor do Aluguel (R$)</th>
               <th class="text-center align-content-center">Quilômetros Rodados (Km)</th>
               <th class="text-center align-content-center">Marca</th>
               <th class="text-center align-content-center">Ações</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $sql = "SELECT c.chassi, c.modelo, c.valor_aluguel, c.quilometros_rodados, m.nome AS marca 
                  FROM carros AS c
                  JOIN marcas AS m ON c.id_marca = m.id_marca";
            $result = $conn->prepare($sql);
            $result->execute();
            $cars = $result->fetchAll(PDO::FETCH_OBJ);

            if($result->rowCount() > 0) {
               foreach ($cars as $car) {
                  echo '<tr>';
                  echo "<th class='text-center align-content-center'> $car->chassi </th>";
                  echo "<td class='text-center align-content-center'> $car->modelo </td>";
                  echo "<td class='text-center align-content-center'> R$ $car->valor_aluguel,00 </td>";
                  echo "<td class='text-center align-content-center'> $car->quilometros_rodados Km </td>";
                  echo "<td class='text-center align-content-center'> $car->marca </td>";
                  echo '<th class="align-content-center d-flex justify-content-center">';
                  echo '<button class="btn bg-warning me-2">Editar</button>';
                  echo '<button class="btn bg-danger ms-2">Deletar</button>';
                  echo '</th>';
                  echo '</tr>';
               }
            } else {
               $content = false;
            }
            ?>
         </tbody>
      </table>
      <?php
      if (isset($content)) {
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
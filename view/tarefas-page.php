<?php
session_start();

require_once("controller/ControllerTarefa.php");

if ((!isset($_SESSION['login'])) or (!$_SESSION['login'])) {
    header("location: view/login-page.php");
}

$controller_tarefa = new ControllerTarefa();

$id = filter_input(INPUT_GET, "id");
if ($id > 0) {
    if ($controller_tarefa->Deletar($id)) {
        echo "Tarefa Excluida!";
    } else {
        echo "Erro ao tentar Excluir!";
    }
}

$tarefas = $controller_tarefa->PesquisarTodos();
?>

<div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Tarefas</h2>
      
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-12">
              <?php
              if ($tarefas != null) {
                  ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Data</th>
                    <th scope="col">Satus</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($tarefas as $tarefa) {
                      ?>
                    <tr>
                      <th scope="row"><?php echo $tarefa->getId(); ?></th>
                      <td><?php echo $tarefa->getNome(); ?></td>
                      <td><?php echo $tarefa->getDataTarefa(); ?></td>
                      <td><?php echo $tarefa->getStatus(); ?></td>
                      <td><a href="?pagina=tarefa&id=<?php echo $tarefa->getId(); ?>" class="btn btn-primary">Ver</a></td>
                    </tr>
                  <?php
                  } ?>
                </tbody>
              </table>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
session_start();

require_once("controller/ControllerTarefa.php");

if ((!isset($_SESSION['login'])) or (!$_SESSION['login'])) {
    header("location: view/login-page.php");
}

$controller_tarefa = new ControllerTarefa();

$id = '';
$usuario_id = '';
$nome = '';
$descricao = '';
$data_tarefa = '';
$data_cadastro = '';
$status = '';
$email = '';


$id = filter_input(INPUT_GET, "id");
$tarefa = null;
if ($id > 0) {
    $tarefa = $controller_tarefa->PesquisarTarefa($id);

    $id = $tarefa->getId();
    $usuario_id = $tarefa->getUsuarioId();
    $nome = $tarefa->getNome();
    $descricao = $tarefa->getDescricao();
    $data_tarefa = $tarefa->getDataTarefa();
    $data_cadastro = $tarefa->getDataCadastro();
    $status = $tarefa->getStatus();
    $email = $tarefa->getEmail();
}
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
              if ($tarefa != null) {
                  ?>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">ID</i>
                      </span>
                    </div>
                    <input id="id" name="id" type="id" class="form-control" placeholder="id" value="<?php echo $id ?>"/>
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">Nome</i>
                      </span>
                    </div>
                    <input id="nome" name="nome" type="nome" class="form-control" placeholder="nome" value="<?php echo $nome ?>"/>
                  </div>
              <!-- <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Verified Users</h4>
                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
              </div>
            </div> -->
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
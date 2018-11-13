<?php
session_start();

require_once("controller/ControllerUsuario.php");
$controllerUsuario = new ControllerUsuario();

$email = '';
$pass = '';

$btnEntrar = filter_input(INPUT_POST, "btnEntrar");
if ($btnEntrar) {
    $email = filter_input(INPUT_POST, "email");
    $pass = filter_input(INPUT_POST, "pass");
    $user = $controllerUsuario->TestarLogin($email, $pass);
    if ($user->getId()) {
        echo "<div class='alert alert-success'>
        <div class='container'>
          <div class='alert-icon'>
            <i class='material-icons'>check</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
          <b>Usúario Logado com Sucesso!</b> 
        </div>
      </div>";
        $_SESSION['login'] = $email;
        $_SESSION['user'] = $user;
        header("location:index.php?pagina=tarefas");
    } else {
        echo "<div class='alert alert-danger'>
        <div class='container'>
          <div class='alert-icon'>
            <i class='material-icons'>error_outline</i>
          </div>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
          </button>
          <b>Usuário ou Senha incorretos!</b> 
        </div>
      </div>";
        unset($_SESSION['login']);
        unset($_SESSION['user']);
    }
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">
        <form class="form" method="POST" action="">
          <div class="card-header card-header-info text-center" style="margin-top: -10px;">
            <h4 class="card-title">Login</h4>
          </div>
          <div class="card-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">mail</i>
                </span>
              </div>
              <input id="email" name="email" type="email" class="form-control" placeholder="Email..." value="<?php echo $email ?>"/>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">lock_outline</i>
                </span>
              </div>
              <input id="pass" name="pass" type="password" class="form-control" placeholder="Password..." value="<?php echo $pass ?>" />
            </div>
          </div>
          <div class="footer text-center">
            <input type="submit" class="btn btn-info btn-link btn-wd btn-lg" name="btnEntrar" value="Entrar" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
   
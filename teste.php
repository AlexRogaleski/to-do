<?php
echo '<h2>Cadastrando Novo Usuário</h2>';

require_once("model/ModelUsuario.php");
require_once("controller/ControllerUsuario.php");

$op = 3;
if ($op == 1) {
    $usuario = new ModelUsuario;
    $usuario->setNome('Alex');
    $usuario->setEmail('teste4@email.com');
    $usuario->setSenha('123');

    $controlUsuario = new ControllerUsuario;

    var_dump($controlUsuario->Cadastrar($usuario));
} elseif ($op == 2) {
    $controlUsuario = new ControllerUsuario;
    $retorno = $controlUsuario->Deletar(7);
    var_dump($retorno);
    if ($retorno) {
        echo '<h3>Usuario Deletado!</h3>';
    } else {
        echo '<h3>Erro ao Deletar!</h3>';
    }
} elseif ($op == 3) {
    $controlUsuario = new ControllerUsuario;
    $usuarios = $controlUsuario->PesquisarTodos();
    foreach ($usuarios as $usuario) {
        var_dump($usuario);
        echo "<br><br>";
    }
} elseif ($op == 4) {
}

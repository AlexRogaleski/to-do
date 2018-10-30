<?php
echo '<h2>Cadastrando Novo Usuário</h2>';

require_once("model/ModelUsuario.php");
require_once("controller/ControllerUsuario.php");


$usuario = new ModelUsuario;
$usuario->setNome('Alex');
$usuario->setEmail('teste@email.com');
$usuario->setSenha('123');

$controlUsuario = new ControllerUsuario;

var_dump($controlUsuario->Cadastrar($usuario));

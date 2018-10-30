<?php
require_once("DAO/DAOUsuario.php");

class ControllerUsuario
{
    private $DAOUsuario;

    public function __construct()
    {
        $this->DAOUsuario = new DAOUsuario();
    }

    public function Cadastrar(ModelUsuario $usuario)
    {
        if ((strlen(trim($usuario->getNome())) > 1) and
            (strlen(trim($usuario->getEmail())) > 1) and
            (strlen(trim($usuario->getSenha())) > 1)) {
            return $this->DAOUsuario->Cadastrar($usuario);
        } else {
            return false;
        }
    }
}

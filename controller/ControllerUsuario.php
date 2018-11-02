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

    public function Atualizar(ModelUsuario $usuario)
    {
        if ((strlen(trim($usuario->getNome())) > 1) and
            (strlen(trim($usuario->getEmail())) > 1) and
            (strlen(trim($usuario->getSenha())) > 1)) {
            return $this->DAOUsuario->Atualizar($usuario);
        } else {
            return false;
        }
    }

    public function Deletar($id)
    {
        if ($id > 0) {
            return $this->DAOUsuario->Deletar($id);
        } else {
            return null;
        }
    }

    public function PesquisarTodos()
    {
        return $this->DAOUsuario->PesquisarTodos();
    }
}

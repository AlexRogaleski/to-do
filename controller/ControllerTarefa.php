<?php
require_once("DAO/DAOTarefa.php");

class ControllerTarefa
{
    private $DAOTarefa;

    public function __construct()
    {
        $this->DAOTarefa = new DAOTarefa();
    }

    public function Cadastrar(ModelTarefa $tarefa)
    {
        if ((strlen(trim($tarefa->getUsuarioId())) > 1) and
            (strlen(trim($tarefa->getNome())) > 1) and
            (strlen(trim($tarefa->getDataTarefa())) > 1) and
            (strlen(trim($tarefa->getStatus())) > 1)) {
            return $this->DAOTarefa->Cadastrar($tarefa);
        } else {
            return false;
        }
    }

    public function Atualizar(ModelTarefa $tarefa)
    {
        if ((strlen(trim($tarefa->getUsuarioId())) > 1) and
            (strlen(trim($tarefa->getNome())) > 1) and
            (strlen(trim($tarefa->getDataTarefa())) > 1) and
            (strlen(trim($tarefa->getStatus())) > 1)) {
            return $this->DAOTarefa->Atualizar($tarefa);
        } else {
            return false;
        }
    }

    public function Deletar($id)
    {
        if ($id > 0) {
            return $this->DAOTarefa->Deletar($id);
        } else {
            return null;
        }
    }

    public function PesquisarTodos()
    {
        return $this->DAOTarefa->PesquisarTodos();
    }

    public function PesquisarTarefa($id)
    {
        if ($id) {
            return $this->DAOTarefa->PesquisarTarefa($id);
        } else {
            return null;
        }
    }
}

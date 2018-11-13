<?php
require_once("Banco.php");
require_once("model/ModelTarefa.php");

class DAOTarefa
{
    private $banco;
    private $debug;

    public function __construct()
    {
        $this->banco = new Banco;
        $this->debug = true;
    }

    public function __destruct()
    {
        $this->banco->Disconnect();
    }

    public function Cadastrar(ModelTarefa $tarefa)
    {
        try {
            $sql = "insert into tarefa(id, usuario_id, nome, descricao, data_tarefa, status, email) values (:id, :usuario_id, :nome, :descricao, :data_tarefa, :status, :email)";

            $param = array(
                ":id" => $tarefa->getId(),
                ":usuario_id" => $tarefa->getUsuarioId(),
                ":nome" => $tarefa->getNome(),
                ":descricao" => $tarefa->getDescricao(),
                ":data_tarefa" => $tarefa->getDataTarefa(),
                ":status" => $tarefa->getStatus(),
                ":email" => $tarefa->getEmail()
            );

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }

    public function Deletar($id)
    {
        try {
            $sql = "delete from tarefa where id = :id";

            $param = array(":id" => $id);

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }

    public function Atualizar(ModelTarefa $tarefa)
    {
        try {
            $sql = "update tarefa set usuario_id  = :usuario_id, nome  = :nome, descricao  = :descricao, data_tarefa  = :data_tarefa, status  = :status, email = :email where id = :id";

            $param = array(
                ":usuario_id" => $tarefa->getUsuarioId(),
                ":nome" => $tarefa->getNome(),
                ":descricao" => $tarefa->getDescricao(),
                ":data_tarefa" => $tarefa->getDataTarefa(),
                ":status" => $tarefa->getStatus(),
                ":email" => $tarefa->getEmail(),
                ":id" => $tarefa->getId());

            return $this->banco->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }

    public function PesquisarTodos()
    {
        try {
            $sql = "select id, usuario_id, nome, descricao, data_tarefa, status, email, data_cadastro from tarefa";
            $objetos = $this->banco->ExecuteQuery($sql);

            $tarefas = array();
            foreach ($objetos as $objeto) {
                $tarefa = new ModelTarefa();
                $tarefa->setId($objeto["id"]);
                $tarefa->setUsuarioId($objeto["usuario_id"]);
                $tarefa->setNome($objeto["nome"]);
                $tarefa->setDescricao($objeto["descricao"]);
                $tarefa->setDataTarefa($objeto["data_tarefa"]);
                $tarefa->setStatus($objeto["status"]);
                $tarefa->setEmail($objeto["email"]);
                $tarefa->setDataCadastro($objeto["data_cadastro"]);

                $tarefas[] = $tarefa;
            }
            return $tarefas;
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }

    public function PesquisarTarefa($id)
    {
        try {
            $sql = "select * from tarefa where id = :id";

            $param = array(":id" => $id);

            $objeto = $this->banco->ExecuteQueryOneRow($sql, $param);

            $tarefa = new ModelTarefa();
            $tarefa->setId($objeto["id"]);
            $tarefa->setUsuarioId($objeto["usuario_id"]);
            $tarefa->setNome($objeto["nome"]);
            $tarefa->setDescricao($objeto["descricao"]);
            $tarefa->setDataTarefa($objeto["data_tarefa"]);
            $tarefa->setStatus($objeto["status"]);
            $tarefa->setEmail($objeto["email"]);
            $tarefa->setDataCadastro($objeto["data_cadastro"]);

            return $tarefa;
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }
}

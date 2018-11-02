<?php
require_once("Banco.php");
require_once("model/ModelUsuario.php");

class DAOUsuario
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

    public function Cadastrar(ModelUsuario $usuario)
    {
        try {
            $sql = "insert into usuario(id, nome, email, senha) values (:id, :nome, :email, :senha)";

            $param = array(
                ":id" => $usuario->getId(),
                ":nome" => $usuario->getNome(),
                ":email" => $usuario->getEmail(),
                ":senha" => $usuario->getSenha()
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
            $sql = "delete from usuario where id = :id";

            $param = array(":id" => $id);

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
            $sql = "select id, nome, email, senha from usuario";
            $objetos = $this->banco->ExecuteQuery($sql);

            $usuarios = array();
            foreach ($objetos as $objeto) {
                $usuario = new ModelUsuario();
                $usuario->setId($objeto["id"]);
                $usuario->setNome($objeto["nome"]);
                $usuario->setEmail($objeto["email"]);
                $usuario->setSenha($objeto["senha"]);

                $usuarios[] = $usuario;
            }
            return $usuarios;
        } catch (PDOException $e) {
            if ($this->debug) {
                echo "Erro: {$e->getMessage()}";
            }
        }
    }
}

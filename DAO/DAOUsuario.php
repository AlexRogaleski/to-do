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
}

<?php
class ModelTarefa
{
    protected $id;
    protected $usuario_id;
    protected $nome;
    protected $descricao;
    protected $data_tarefa;
    protected $data_cadastro;
    protected $status;
    protected $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    // public function getUsuario()
    // {
    //     $usuario = new ModeloUsuario;
    //     $usuario->getUsuario($this->usuario_id);
    //     return $usuario;
    // }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDataTarefa()
    {
        return $this->data_tarefa;
    }

    public function setDataTarefa($data_tarefa)
    {
        $this->data_tarefa = $data_tarefa;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

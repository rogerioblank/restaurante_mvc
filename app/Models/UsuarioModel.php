<?php
// LOCAL: app/Models/UsuarioModel.php

class UsuarioModel
{
    private $db;

    public function __construct($conexao)
    {
        $this->db = $conexao;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados)
    {
        $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['nome' => $dados['nome'], 'senha' => password_hash($dados['senha'], PASSWORD_DEFAULT)]);
        return $this->db->lastInsertId();
    }

    /* public function criar($dados) {
        $sql = "INSERT INTO usuarios (nome) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['nome' => $dados['nome']]);
        return $this->db->lastInsertId();
    }*/

    public function atualizar($id, $dados)
    {
        $sql = "UPDATE usuarios SET nome = :nome WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['nome' => $dados['nome'], 'id' => $id]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}

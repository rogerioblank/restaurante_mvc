<?php
class UsuarioModel
{
    private $db;

    public function __construct($conexao)
    {
        $this->db = $conexao;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios where id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($nome, $senha)
    {
        $sql = "INSERT INTO usuarios (nome, senha) values (?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nome, $senha]);

        return $this->db->lastInsertId();
    }

    public function atualizar($id, $nome, $senha)
    {
        $sql = "UPDATE usuarios SET nome = ?, senha = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nome, $senha, $id]);
    }

    public function deletar($id, $nome)
    {
        $sql = "DELETE FROM usuarios WHERE id = ? and nome = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id, $nome]);
    }
}

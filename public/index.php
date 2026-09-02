<?php
// LOCAL: /restaurante_mvc/public/index.php

// 1. Puxa a conexão (Saindo de public/ para buscar em config/)
require_once "../config/conexao.php";
require "../app/Controllers/UsuarioController.php";

// 2. Captura o que foi digitado na URL (ex: 'cardapio' ou 'contato')
$url = $_GET['url'] ?? 'home';

echo "<h2>Restaurante MVC - Sistema Ativo</h2>";
echo "Você solicitou a página: <strong>$url</strong>";

// 3. No futuro, aqui o index.php vai chamar os Controllers
// Por enquanto, apenas confirmamos que a rota está funcionando!                   // precisa deixar $pdo pronto


$controller = new UsuarioController();
$acao = $_GET['acao'] ?? 'home';
$id = $_GET['id'] ?? null;

switch ($acao) {
    case 'cadastrar': $controller->cadastrar($conexao); break;
    case 'atualizar': $controller->atualizar($conexao, $id); break;
    case 'excluir':   $controller->excluir($conexao, $id); break;
    default:          $controller->home($conexao, $id); // lista + form (vazio ou preenchido se veio ?id=)
}
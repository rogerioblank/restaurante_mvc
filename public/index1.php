<?php
// LOCAL: /restaurante_mvc/public/index.php

// 1. Puxa a conexão (Saindo de public/ para buscar em config/)
require_once "../config/conexao.php";

// 2. Captura o que foi digitado na URL (ex: 'cardapio' ou 'contato')
$url = $_GET['url'] ?? 'home';

echo "<h2>Restaurante MVC - Sistema Ativo</h2>";
echo "Você solicitou a página: <strong>$url</strong>";

// 3. No futuro, aqui o index.php vai chamar os Controllers
// Por enquanto, apenas confirmamos que a rota está funcionando!
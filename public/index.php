<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
</head>

<body>

    <?php require '../config/conexao.php'; ?>

    <?php require '../app\Models\UsuarioModel.php'; ?>

    <main>

        <?php
        // LOCAL: /restaurante_mvc/public/index.php

        // 2. Captura o que foi digitado na URL (ex: 'cardapio' ou 'contato')
        $url = $_GET['url'] ?? 'home';

        echo "<h2>Restaurante MVC - Sistema Ativo</h2>";
        echo "Você solicitou a página: <strong>$url</strong>";

        // 3. No futuro, aqui o index.php vai chamar os Controllers
        // Por enquanto, apenas confirmamos que a rota está funcionando!


        $usuarioModel = new UsuarioModel($conexao);
        $usuario = $usuarioModel->buscarPorId(1);
        print_r($usuario);

        /*$usuarioModel = new UsuarioModel($conexao);
        $usuario = $usuarioModel->inserir('rogerio', 'força@1234');
        echo "ID inserido: " . $usuario;*/

        /*$usuarioModel = new UsuarioModel($conexao);
        $usuario = $usuarioModel->atualizar(1, 'rogerioatz', 'senhanova');
        if ($usuario) {
            echo "Usuário atualizado!";
        } else {
            echo "Erro ao atualizar usuário.";
        }

        $usuarioModel = new UsuarioModel($conexao);
        $usuario = $usuarioModel->deletar(2, 'rogerio');
        if ($usuario) {
            echo "Usuário Excluído!";
        } else {
            echo "Erro ao Excluir usuário.";
        }*/



        ?>
    </main>

</body>

</html>
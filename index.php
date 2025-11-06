<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuleta Quente</title>
</head>
<body class="fundofixo">
    <!-- MENU -->
    <?php include('menu_publico.php'); ?>
    <a name="home"></a>

    <main class="container">
        <!-- CARROUSEL -->
        <?php include('carrousel.php'); ?>
        <!-- DESTAQUES -->
        <a name="destaques"></a>
        <hr>
        <?php include('produtos_destaque.php'); ?>

        <!-- PRODUTOS -->
        <a name="produtos"></a>
        <hr>
        <?php include('produtos_geral.php'); ?>

        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
            <a name="contato"></a>
        </footer>
    </main>

    
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">

</head>

<body class="fundofixo">
    <main class="container">
        <h1 class="breadcrumb">Área Administrativa</h1>
        <div class="row">

            <!-- ADM PRODUTOS -->
            <div class="col-sm-6 col-md-4">
            <div class="thumbnail alert-danger">
                <img src="../imagens/icone_produtos.png" alt="">
                <br>
                <div class="alert-danger">
                    <!-- botão principal -->
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group">
                            <button 
                                class="btn btn-default disabled"
                                style="cursor: default"
                            >
                                PRODUTOS
                            </button>
                        </div> <!-- fecha btn-group -->
                    </div> <!-- fecha btn-group-justified -->
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group"> <!-- Botão Listar -->
                            <a href="produtos_lista.php">
                                <button class="btn btn-danger">Listar</button>
                            </a>
                        </div> <!-- fecha btn-group -->
                        <div class="btn-group"> <!-- Botão Inserir -->
                            <a href="produtos_insere.php">
                                <button class="btn btn-danger">Inserir</button>
                            </a>
                        </div> <!-- fecha btn-group -->
                    </div> <!-- fecha btn-group-justified -->
                </div> <!-- fecha alert-danger -->
            </div> <!-- fecha thumbnail -->
            </div> <!-- fecha dimensionamento -->

            <!-- ADM TIPOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-warning">
                    <img src="../imagens/icone_tipos.png" alt="">
                    <br>
                    <div class="alert-warning">
                        <!-- botão principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button 
                                    class="btn btn-default disabled"
                                    style="cursor: default"
                                >
                                    TIPOS
                                </button>
                            </div> <!-- fecha btn-group -->
                        </div> <!-- fecha btn-group-justified -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group"> <!-- Botão Listar -->
                                <a href="tipos_lista.php">
                                    <button class="btn btn-warning">Listar</button>
                                </a>
                            </div> <!-- fecha btn-group -->
                            <div class="btn-group"> <!-- Botão Inserir -->
                                <a href="tipos_insere.php">
                                    <button class="btn btn-warning">Inserir</button>
                                </a>
                            </div> <!-- fecha btn-group -->
                        </div> <!-- fecha btn-group-justified -->
                    </div> <!-- fecha alert-warning -->
                </div> <!-- fecha thumbnail -->
            </div> <!-- fecha dimensionamento -->

            <!-- ADM USUÁRIO -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-info">
                    <img src="../imagens/icone_user.png" alt="">
                    <br>
                    <div class="alert-info">
                        <!-- botão principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button 
                                    class="btn btn-default disabled"
                                    style="cursor: default"
                                >
                                    USUÁRIOS
                                </button>
                            </div> <!-- fecha btn-group -->
                        </div> <!-- fecha btn-group-justified -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group"> <!-- Botão Listar -->
                                <a href="usuarios_lista.php">
                                    <button class="btn btn-info">Listar</button>
                                </a>
                            </div> <!-- fecha btn-group -->
                            <div class="btn-group"> <!-- Botão Inserir -->
                                <a href="usuarios_insere.php">
                                    <button class="btn btn-info">Inserir</button>
                                </a>
                            </div> <!-- fecha btn-group -->
                        </div> <!-- fecha btn-group-justified -->
                    </div> <!-- fecha alert-info -->
                </div> <!-- fecha thumbnail -->
            </div> <!-- fecha dimensionamento -->

        </div>

    </main>

    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<?php
//Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
    // Selecionar o banco de dados (USE)
    mysqli_select_db($conn_produtos,$database_conn);

    // Declarar Variáveis para acrescentar dados no banco
    $tabela_insert  =   "tbusuarios";
    $campos_insert  =   "login_usuario, senha_usuario, nivel_usuario";
    
    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $login_usuario    =   $_POST['login_usuario'];
    $senha_usuario   =   $_POST['senha_usuario'];
    $nivel_usuario   =   $_POST['nivel_usuario'];

    // Reunir os valores a serem inseridos
    $valores_insert =   "'$login_usuario','$senha_usuario','$nivel_usuario'";

    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                     VALUE
                        (".$valores_insert.")
                    ";
    $resultado  =   $conn_produtos->query($insertSQL);

    // Após a ação a página será redirecionada
    $destino    =   "usuarios_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
?>
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

<body>
    <main class="container">
        <div> <!-- Abre row -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4"> <!-- Abre dimensionamento -->
                <h2 class="breadcrumb text-info">
                    <a href="usuarios_insere.php">
                        <button class="btn btn-info">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserir Usuário
                </h2>
                <div class="thumbnail"> <!-- thumbnail -->
                    <div class="alert alert-info" role="alert"> <!-- alert -->
                        <form 
                            action="usuarios_insere.php"
                            enctype="multipart/form-data"
                            method="post"
                            id="form_usuario_insere"
                            name="form_usuario_insere"
                        >
                            <!-- input Login -->
                             <label for="login_usuario">Login:</label>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input 
                                    type="text"
                                    name="login_usuario"
                                    id="login_usuario"
                                    class="form-control"
                                    placeholder="Digite o usuário."
                                    maxlength="10"
                                    required
                                >
                             </div> <!-- Fecha input-group -->
                             <!-- Fechamento input Login -->
                              <br>

                             <!-- input Senha -->
                             <label for="senha_usuario">Login:</label>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-qrcode"></span>
                                </span>
                                <input 
                                    type="password"
                                    name="senha_usuario"
                                    id="senha_usuario"
                                    class="form-control"
                                    placeholder="Digite sua senha."
                                    maxlength="20"
                                    required
                                >
                             </div> <!-- Fecha input-group -->
                             <!-- Fechamento input Senha -->
                              <br>

                             <!-- radio nivel_usuario -->
                            <label for="nivel_usuario">Nível do usuário?</label>
                            <div class="input-group">
                                <label 
                                    for="nivel_usuario_c"
                                    class="radio-inline"
                                >
                                    <input 
                                        type="radio"
                                        name="nivel_usuario"
                                        id="nivel_usuario"
                                        value="com"
                                        checked
                                    >
                                    Comum
                                </label>
                                <label 
                                    for="nivel_usuario_s"
                                    class="radio-inline"
                                >
                                    <input 
                                        type="radio"
                                        name="nivel_usuario"
                                        id="nivel_usuario"
                                        value="sup"
                                    >
                                    Supervisor
                                </label>
                            </div> <!-- Fecha input-group -->
                            <!-- fechamento input radio nivel_usuario -->
                             <br>

                             <!-- btn enviar -->
                            <input 
                            type="submit"
                            value="Cadastrar"
                            name="enviar"
                            id="enviar"
                            class="btn btn-info btn-block"                                
                        >
                            <!-- fecha btn enviar -->

                        </form>
                    </div> <!-- fecha alert -->
                </div> <!-- fecha thumbnail -->


            </div> <!-- fecha dimensionamento -->
        </div> <!-- fecha row -->

    </main>

    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
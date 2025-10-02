<?php
//Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
    // Selecionar o banco de dados (USE)
    mysqli_select_db($conn_produtos,$database_conn);

    // Declarar Variáveis para acrescentar dados no banco
    $tabela_insert  =   "tbtipos";
    $campos_insert  =   "rotulo_tipo, sigla_tipo";
    
    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $rotulo_tipo    =   $_POST['rotulo_tipo'];
    $sigla_tipo   =   $_POST['sigla_tipo'];

    // Reunir os valores a serem inseridos
    $valores_insert =   "'$rotulo_tipo','$sigla_tipo'";

    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                     VALUE
                        (".$valores_insert.")
                    ";
    $resultado  =   $conn_produtos->query($insertSQL);

    // Após a ação a página será redirecionada
    $destino    =   "tipos_lista.php";
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
    <title>Tipo - insere</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">

</head>

<body>
    
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> <!-- Dimensionamento -->
                <h2 class="breadcrumb text-warning">
                    <a href="tipos_lista.php">
                        <button class="btn btn-warning">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Tipo
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-warning">
                        <form 
                            action="tipos_insere.php"
                            name="form_insere_tipo"
                            id="form_insere_tipo"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            <!-- input text rotulo_tipo -->
                            <label for="rotulo_tipo">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-apple"></span>
                                </span>
                                <input 
                                    type="text"
                                    name="rotulo_tipo"
                                    id="rotulo_tipo"
                                    class="form-control"
                                    autofocus
                                    maxlength="15"
                                    required
                                    placeholder="Digite o rótulo do tipo."
                                >
                            </div> <!-- fecha input-group -->
                            <!-- fecha text rotulo_tipo -->
                             <br>

                             <!-- input text sigla_tipo -->
                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th-list"></span>
                                </span>
                                <input 
                                    type="text"
                                    name="sigla_tipo"
                                    id="sigla_tipo"
                                    class="form-control"
                                    maxlength="3"
                                    required
                                    placeholder="Digite a sigla do tipo."
                                >
                            </div> <!-- fecha input-group -->
                            <!-- fecha text sigla_tipo -->
                            <br>

                            <!-- btn enviar -->
                            <input 
                                type="submit"
                                value="Cadastrar"
                                name="enviar"
                                id="enviar"
                                role="button"
                                class="btn btn-warning btn-block"
                            
                            >

                        </form> <!-- fecha forms -->
                    </div> <!-- fecha alert alert-warning -->
                </div> <!-- fecha thumbnail -->
            </div> <!-- fecha dimensionamento -->
        </div> <!-- fecha row -->
    </main>

    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
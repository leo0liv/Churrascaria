<?php
//Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

//Variáveis Globais
$tabela         =   "tbusuarios";
$campo_filtro   =   "id_usuario";


if($_POST){
    // Selecionar o banco de dados (USE)
    mysqli_select_db($conn_produtos,$database_conn);
 
    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $login_usuario    =   $_POST['login_usuario'];
    $senha_usuario    =   $_POST['senha_usuario'];
    $nivel_usuario    =   $_POST['nivel_usuario'];

    //campo para filtrar o registro (WHERE)
    $filtro_update  =   $_POST['id_usuario'];

    // Consulta SQL para inserção dos dados
    $updateSQL  =   "UPDATE ".$tabela."
                        SET login_usuario  =   '".$login_usuario."',
                            senha_usuario  =   '".$senha_usuario."',
                            nivel_usuario  =   '".$nivel_usuario."'
                     WHERE  ".$campo_filtro."='".$filtro_update."';
                    ";
    $resultado  =   $conn_produtos->query($updateSQL);

    // Após a ação a página será redirecionada
    $destino    =   "usuarios_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};

    //consulta para trazer e filtrar os dados
    //Definir o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);
    $filtro_select  =   $_GET['id_usuario'];
    $consulta       =   "SELECT *
                        FROM   ".$tabela."
                        WHERE  ".$campo_filtro."=".$filtro_select.";
                        ";
    $lista          =   $conn_produtos->query($consulta);
    $row            =   $lista->fetch_assoc();
    $totalRows      =   ($lista)->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Atualiza</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">

</head>

<body class="fundofixo">
    <main class="container">
        <div> <!-- Abre row -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4"> <!-- Abre dimensionamento -->
                <h2 class="breadcrumb text-info">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-info">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualiza Usuário
                </h2>
                <div class="thumbnail"> <!-- thumbnail -->
                    <div class="alert alert-info" role="alert"> <!-- alert -->
                        <form 
                            action="usuarios_atualiza.php"
                            enctype="multipart/form-data"
                            method="post"
                            id="form_usuarios_atualiza"
                            name="form_usuarios_atualiza"
                        >
                            <!-- Inserir campo id_tipo OCULTO para uso em filtro -->
                            <input 
                                type="hidden"
                                name="id_usuario"
                                id="id_usuario"
                                value="<?php echo $row['id_usuario']; ?>"
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
                                    value="<?php echo $row['login_usuario']; ?>"
                                >
                             </div> <!-- Fecha input-group -->
                             <!-- Fechamento input Login -->
                              <br>

                             <!-- input Senha -->
                             <label for="senha_usuario">Senha:</label>
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
                                    value="<?php echo $row['senha_usuario']; ?>"
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
                                        <?php echo $row['nivel_usuario']=="com" ? "checked" : null; ?>
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
                                        <?php echo $row['nivel_usuario']=="sup" ? "checked" : null; ?>
                                    >
                                    Supervisor
                                </label>
                            </div> <!-- Fecha input-group -->
                            <!-- fechamento input radio nivel_usuario -->
                             <br>

                             <!-- btn enviar -->
                            <input 
                            type="submit"
                            value="Atualizar"
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
<?php mysqli_free_result($lista); ?>
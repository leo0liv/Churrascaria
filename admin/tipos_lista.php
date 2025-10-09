<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "
                SELECT  *
                FROM    tbtipos
                ORDER BY rotulo_tipo ASC;
                ";
// Fazer uma lista completa dos dados
$lista      =   $conn_produtos->query($consulta);
// Separar os dados em linhas (row)
$row        =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos - Lista</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include("menu_adm.php"); ?>
    <!-- main>h1 -->
    <main class="container">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"> <!-- dimensionamento -->
            <h1 class="breadcrumb alert-warning ">Lista de Tipos</h1>
            <div class="btn btn-warning disabled">
                Total de tipos:
                <small class="badge"><?php echo $totalRows; ?></small>
            </div>
            <!-- table>thead>tr>th*8 -->
            <table class="table table-hover table-condensed tbopacidade" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>SIGLA</th>
                    <th>RÓTULO</th>
                    <th>
                        <a 
                            href="tipos_insere.php"
                            class="btn btn-block btn-primary btn-xs"
                        >
                            <span class="hidden-xs">ADICIONAR<br></span>
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </th>
                </tr>
            </thead>
            <!-- tbody>tr>td*4 -->
            <tbody>
                <?php do{ ?><!-- Abre a estrutura de repetição -->
                <tr>
                    <td><?php echo $row['id_tipo']; ?></td>
                    <td><?php echo $row['sigla_tipo']; ?></td>
                    <td><?php echo $row['rotulo_tipo']; ?></td>
                    <td>
                        <a 
                            href="tipos_atualiza.php"
                            class="btn btn-block btn-warning btn-xs"
                        >
                            <span class="hidden-xs">ALTERAR<br></span>
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <button
                            class="btn btn-danger btn-xs btn-block delete"
                            data-nome="<?php echo $row['rotulo_tipo']; ?>"
                            data-id="<?php echo $row['id_tipo']; ?>"
                        >
                            <span class="hidden-xs">EXCLUIR<br></span>
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>

                    </td>
                </tr>
                <?php }while($row = $lista->fetch_assoc()); ?>
                <!-- Fecha a estrutura de repetição -->
            </tbody>
            </table>
        </div> <!-- fecha dimensionamento -->
</main>

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>
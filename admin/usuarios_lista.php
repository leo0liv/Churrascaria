<?php 
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta  =   "
                SELECT *
                FROM tbusuarios
                ORDER BY login_usuario ASC;
                ";
// Fazer a lista completa dos dados
$lista  =   $conn_produtos->query($consulta);
// Separar os dados em linhas (row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Lista</title>
    <!-- Depois vamos inserir aqui o Bootstrap -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Depois vamos inserir o meu_estilo.css -->
     <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
    <?php include("menu_adm.php");?>
    <!-- main>h1 -->
    <main class="container">
        <h1 class="breadcrumb alert-info">Lista de Usuários</h1>
        <div class="btn btn-info disabled">
            Total de Usuários
            <small class="badge"><?php echo $totalRows; ?></small>
        </div>
        <!-- table>thead>tr>th*8 -->
        <table class="table table-hover table-condensed tbopacidade">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>LOGIN</th>
                    <th>NÍVEL</th>
                    <th>
                        <a 
                            href="usuarios_insere.php"
                            class="btn btn-block btn-primary btn-xs"
                        >
                            <span class="hidden-xs">ADICIONAR <br></span>
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </th>
                </tr>
            </thead>
            <!-- tbody>tr>td*4 -->
            <tbody>
                <!-- Abre a estrutura de repetição -->
                 <?php do{ ?>
                <tr>
                    <!-- <td><?php echo $row['id_usuario']; ?></td> -->
                    <td><?php echo $row['login_usuario']; ?></td>
                    <td>
                        <?php 
                            if($row['nivel_usuario']=='sup'){
                                echo('<span class="glyphicon glyphicon-sunglasses text-black"></span>&nbsp;sup');
                            }else if($row['nivel_usuario']=='com'){
                                echo('<span class="glyphicon glyphicon-user text-info"></span>&nbsp;com');
                            };
                        ?>
                    </td>
                    <td>
                        <a 
                            href="usuarios_atualiza.php"
                            class="btn btn-warning btn-xs btn-block"
                        >
                            <span class="hidden-xs">ALTERAR<br></span>
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <button 
                            class="btn btn-danger btn-xs btn-block"
                        >
                            <span class="hidden-xs">EXCLUIR<br></span>
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php }while($row = $lista->fetch_assoc()); ?>
                <!-- Fecha a estrutura de rapetição -->
            </tbody>
        </table>
    </main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>
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
    <!-- Depois vamos inserir o meu_estilo.css -->
</head>
<body>
    <!-- main>h1 -->
    <main>
        <h1>Lista de Usuários</h1>
        <div>
            Total de Usuários
            <small><?php echo $totalRows; ?></small>
        </div>
        <!-- table>thead>tr>th*8 -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>LOGIN</th>
                    <th>NÍVEL</th>
                    <th>
                        <a href="usuarios_insere.php">ADICIONAR</a>
                    </th>
                </tr>
            </thead>
            <!-- tbody>tr>td*4 -->
            <tbody>
                <!-- Abre a estrutura de repetição -->
                 <?php do{ ?>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['login_usuario']; ?></td>
                    <td><?php echo $row['nivel_usuario']; ?></td>
                    <td>ALTERAR|EXCLUIR</td>
                </tr>
                <?php }while($row = $lista->fetch_assoc()); ?>
                <!-- Fecha a estrutura de rapetição -->
            </tbody>
        </table>
    </main>
</body>
</html>
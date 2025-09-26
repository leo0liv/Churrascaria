<?php 
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT *
                 FROM tbtipos
                 ORDER BY rotulo_tipo ASC;
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
    <title>Tipos - Lista</title>
    <!-- Depois vamos inserir aqui o Bootstrap -->
    <!-- Depois vamos inserir o meu_estilo.css -->
</head>
<body>
    <!-- Main>h1 -->
    <main>
        <h1>Lista de Tipos</h1>
        <div>
            Total de Tipos:
            <small><?php echo $totalRows; ?></small>
        </div>
        <!-- table>thead>tr>th*4 -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SIGLA</th>
                    <th>RÓTULO</th>
                    <th>ADICIONAR</th>
                </tr>
            </thead>
            <!-- tbody>tr>td*4 -->
            <tbody>
                <!-- Abre a estrutura de repetição -->
                 <?php do{ ?>
                <tr>
                    <td><?php echo $row['id_tipo']; ?></td>
                    <td><?php echo $row['sigla_tipo']; ?></td>
                    <td><?php echo $row['rotulo_tipo']; ?></td>
                    <td>ALTERAR|EXCLUIR</td>
                </tr>
                <?php }while($row = $lista->fetch_assoc()); ?>
                <!-- Fecha a estrutura de rapetição -->
            </tbody>
        </table>
    </main>
</body>
</html>
<?php mysqli_free_result($lista); ?>
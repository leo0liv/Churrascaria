<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

// Selecionar os dados
$consulta   =   "
                SELECT  *
                FROM    tbprodutos
                ORDER BY descri_produto ASC;
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
    <title>Produtos - lista</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include("menu_adm.php");?>
<!-- main>h1 -->
<main class="container">
    <h1 class="breadcrumb alert-danger">Lista de Produtos</h1>
    <div class="btn btn-danger disabled">
        Total de produtos:
        <small class="badge"><?php echo $totalRows; ?></small>
    </div>
    <!-- table>thead>tr>th*8 -->
    <table class="table table-hover table-condensed tbopacidade">
        <thead> <!-- Cabeçalho da tabela -->
            <tr> <!-- linha da tabela -->
                <th>ID</th> <!-- célula de cabeçalho -->
                <th>TIPO</th>
                <!-- <th>DESTAQUE</th> -->
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a 
                        href="produtos_insere.php"
                        class="btn btn-block btn-primary btn-xs"
                    >
                        <span class="hidden-xs">ADICIONAR <br></span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody>
            <!-- Abre a estrutura de repetição -->
            <?php do{ ?>
            <tr>
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td>
                    <?php
                        if($row['destaque_produto']=='Sim'){
                            echo('<span class="glyphicon glyphicon-heart text-danger"></span>');
                        } else if($row['destaque_produto']=='Não'){
                            echo('<span class="glyphicon glyphicon-ok text-info"></span>');
                        }
                    ?>
                    <!-- <?php echo $row['destaque_produto']; ?> -->
                    <?php echo $row['descri_produto']; ?>
                </td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo number_format($row['valor_produto'],2,',','.'); ?></td>
                <!-- 
                    vírgula >> 0,00 >> separador de decimais;
                    ponto >> 1.000 >> separador de milhares;
                -->
                <td>
                    <!-- Para exibir uma imagem insira em 'src'
                         o diretório que ela está armazenada e
                         a váriavel com seu nome.
                    -->
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>"
                     alt="<?php echo $row['descri_produto']; ?>"
                     width="100px">
                </td>
                <td>
                    <a 
                        href="produtos_atualiza.php"
                        class="btn btn-warning btn-xs btn-block"
                    >
                        <span class="hidden-xs">ALTERAR<br></span>
                        <span class="glyphicon glyphicon-refresh"></span>
                    </a>
                    <button class="btn btn-danger btn-xs btn-block">
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            <?php }while($row = $lista->fetch_assoc());  ?>
            <!-- Fechar a estrutura de repetição -->
        </tbody>
    </table>
</main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>
<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e SE necessário filtrar
$tabela         =   "vw_tbprodutos";
$campo_filtro   =   "id_produto";
$ordenar_por    =   "descri_produto ASC";
$filtro_select  =   $_GET['id_produto'];
$consulta       =   "SELECT  *
                     FROM    ".$tabela."
                     WHERE   ".$campo_filtro."='".$filtro_select."'
                     ORDER BY ".$ordenar_por.";
                    ";
$lista      =   $conn_produtos->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - detalhe</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body class="container">
<h2 class="breadcrumb alert-danger">
    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
        <span class="glyphicon glyphicon-chevron-left"></span>
        
    </a>
    <strong><?php echo $row['descri_produto']; ?></strong>
</h2>
<div class="row"> <!-- manter os elementos na linha (poliça) -->
    
    <!-- Abre thumbnail/card -->
    <?php do{ ?> <!-- Abre a estrutura de repetição -->
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"> <!-- dimensionamento -->
        <div class="thumbnail">
                <img 
                    src="imagens/<?php echo $row['imagem_produto']; ?>" 
                    alt=""
                    class="img-responsive img-rounded"
                >
            <div class="caption text-right">
                <h3 class="text-danger">
                    <strong><?php echo $row['descri_produto']; ?></strong>
                </h3>
                <p class="text-warning">
                    <strong><?php echo $row['rotulo_tipo']; ?></strong>
                </p>
                <p class="text-left">
                    <?php echo $row['resumo_produto']; ?>
                </p>
                <p>
                    <button class="btn btn-default disabled" role="button">
                        <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                    </button>
                    <!-- <a 
                       href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" 
                       class="btn btn-danger" 
                       role="button"
                    >
                        <span class="hidden-xs">Saiba mais...</span>
                        <span class="visible-xs glyphicon glyphicon-eye-open"></span>
                    </a> -->
                </p>
            </div> <!-- fecha caption -->
        </div> <!-- fecha thumbnail -->
    </div> <!-- fecha dimensionamento -->
    <?php }while($row=$lista->fetch_assoc()); ?> 
    <!-- Fecha a estrutura de repetição -->
    <!-- Fecha thumbnail/card -->

</div> <!-- fecha row -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>
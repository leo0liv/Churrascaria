<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e SE necessário filtrar
$tabela_destaque             =   "vw_tbprodutos";
$campo_filtro_destaque       =   "destaque_produto";
$ordenar_por_destaque        =   "descri_produto ASC";
$filtro_select_destaque      =   "Sim";
$consulta_destaque  =   "SELECT  *
                         FROM    ".$tabela_destaque."
                         WHERE   ".$campo_filtro_destaque."='".$filtro_select_destaque."'
                         ORDER BY ".$ordenar_por_destaque.";
                        ";
$lista_destaque      =   $conn_produtos->query($consulta_destaque);
$row_destaque        =   $lista_destaque->fetch_assoc();
$totalRows_destaque  =   ($lista_destaque)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - destaque</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body class="container">
<h2 class="breadcrumb alert-danger">Destaques</h2>
<div class="row"> <!-- manter os elementos na linha (poliça) -->
    
    <!-- Abre thumbnail/card -->
    <?php do{ ?> <!-- Abre a estrutura de repetição -->
    <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
        <div class="thumbnail">
            <a 
                href="produto_detalhe.php?id_produto=<?php echo $row_destaque['id_produto']; ?>" 
            >
                <img 
                    src="imagens/<?php echo $row_destaque['imagem_produto']; ?>" 
                    alt=""
                    class="img-responsive img-rounded"
                    style="height: 20em;"
                >
            </a>
            <div class="caption text-right">
                <h3 class="text-danger">
                    <strong><?php echo $row_destaque['descri_produto']; ?></strong>
                </h3>
                <p class="text-warning">
                    <strong><?php echo $row_destaque['rotulo_tipo']; ?></strong>
                </p>
                <p class="text-left">
                    <?php echo mb_strimwidth($row_destaque['resumo_produto'],0,42,"..."); ?>
                </p>
                <p>
                    <button class="btn btn-default disabled" role="button">
                        <?php echo number_format($row_destaque['valor_produto'],2,',','.'); ?>
                    </button>
                    <a 
                       href="produto_detalhe.php?id_produto=<?php echo $row_destaque['id_produto']; ?>" 
                       class="btn btn-danger" 
                       role="button"
                    >
                        <span class="hidden-xs">Saiba mais...</span>
                        <span class="visible-xs glyphicon glyphicon-eye-open"></span>
                    </a>
                </p>
            </div> <!-- fecha caption -->
        </div> <!-- fecha thumbnail -->
    </div> <!-- fecha dimensionamento -->
    <?php }while($row_destaque=$lista_destaque->fetch_assoc()); ?> 
    <!-- Fecha a estrutura de repetição -->
    <!-- Fecha thumbnail/card -->

</div> <!-- fecha row -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista_destaque); ?>

<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e SE necessário filtrar
$tabela         =   "vw_tbprodutos";
$ordenar_por    =   "descri_produto ASC";
$consulta       =   "
                    SELECT  *
                    FROM    ".$tabela."
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
    <title>Modelo</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body>
<h2 class="breadcrumb alert-danger">Produtos</h2>
<div class="row"> <!-- manter os elementos na linha (poliça) -->
    
    <!-- Abre thumbnail/card -->
    <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
        <div class="thumbnail">
            <img 
                src="imagens/abacaxi.jpg" 
                alt=""
                class="img-responsive img-rounded"
            >
            <div class="caption text-right">
                <h3 class="text-danger">
                    <strong>descri_produto</strong>
                </h3>
                <p class="text-warning">
                    <strong>rotulo_tipo</strong>
                </p>
                <p class="text-left">
                    resumo_produto
                </p>
                <p>
                    <button class="btn btn-default disabled" role="button">
                        valor_produto
                    </button>
                    <a href="" class="btn btn-danger" role="button">
                        <span class="hidden-xs">Saiba mais...</span>
                        <span class="visible-xs glyphicon glyphicon-eye-open"></span>
                    </a>
                </p>
            </div> <!-- fecha caption -->
        </div> <!-- fecha thumbnail -->
    </div> <!-- fecha dimensionamento -->
    <!-- Fecha thumbnail/card -->

</div> <!-- fecha row -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>

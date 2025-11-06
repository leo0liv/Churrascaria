<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e SE necessário filtrar
$tabela         =   "vw_tbprodutos";
$campo_filtro   =   "descri_produto";
$ordenar_por    =   "descri_produto ASC";
$filtro_select  =   $_GET['buscar'];
$consulta       =   "SELECT  *
                     FROM    ".$tabela."
                     WHERE   ".$campo_filtro."  LIKE ('%".$filtro_select."%')
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
    <title>Produto - busca</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include('menu_publico.php'); ?>
<!-- CARROUSSEL -->
<?php include('carrousel.php'); ?>
<main class="container">
    <section>
        <!-- Mostrar se os registro retornarem VAZIOS -->
        <?php if($totalRows == 0){ ?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                Você pesquisou:
                "<i><strong><?php echo $_GET['buscar']; ?></strong></i>"
                <br>
                Em breve os mais deliciosos produtos ao seu dispor!
            </h2>
        <?php }; ?>
        <!-- Mostrar se os registro NÃO retornarem VAZIOS -->
        <?php if($totalRows > 0){ ?>
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            Você pesquisou:
            "<i><strong><?php echo $_GET['buscar']; ?></strong></i>"
        </h2>
        <div class="row"> <!-- manter os elementos na linha (poliça) -->
            
            <!-- Abre thumbnail/card -->
            <?php do{ ?> <!-- Abre a estrutura de repetição -->
            <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
                <div class="thumbnail">
                    <a 
                        href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" 
                    >
                        <img 
                            src="imagens/<?php echo $row['imagem_produto']; ?>" 
                            alt=""
                            class="img-responsive img-rounded"
                            style="height: 20em;"
                        >
                    </a>
                    <div class="caption text-right">
                        <h3 class="text-danger">
                            <strong><?php echo $row['descri_produto']; ?></strong>
                        </h3>
                        <p class="text-warning">
                            <strong><?php echo $row['rotulo_tipo']; ?></strong>
                        </p>
                        <p class="text-left">
                            <?php echo mb_strimwidth($row['resumo_produto'],0,42,"..."); ?>
                        </p>
                        <p>
                            <button class="btn btn-default disabled" role="button">
                                <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                            </button>
                            <a 
                            href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" 
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
            <?php }while($row=$lista->fetch_assoc()); ?> 
            <!-- Fecha a estrutura de repetição -->
            <!-- Fecha thumbnail/card -->

        </div> <!-- fecha row -->
        <?php }; ?>
    </section>
    <!-- RODAPÉ -->
    <footer>
        <?php include('rodape.php'); ?>
        <a name="contato"></a>
    </footer>
</main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>
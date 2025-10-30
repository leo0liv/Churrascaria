<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e SE necessário filtrar
$tabela         =   "vw_tbprodutos";
$ordenar_por    =   "rotulo_tipo ASC, descri_produto ASC";

$consulta       =   "SELECT  *
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
    <title>Produtos - tipos</title>
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
    Produtos por Tipo
</h2>

<?php
// Variável para controlar o grupo atual
$tipo_atual =   "";
if($totalRows > 0){ // Verifica se há produtos para exibir
    do{
        // se o id_tipo_produto atual for diferente do anterior, cria um novo grupo
        if($tipo_atual != $row['id_tipo_produto']){
            // se não for o primeiro grupo, fecha row anterior
            if($tipo_atual != ""){
                echo '</div>';
            }
            //atualiza $tipo_atual e exibe o novo cabeçalho do grupo
            $tipo_atual = $row['id_tipo_produto'];
            echo '<h2 class="breadcrumb alert-warning">'.$row['rotulo_tipo'].'</h2>';
            // abre uma nova div row para os produtos deste grupo
            echo '<div class="row"> <!-- manter os elementos na linha (Poliça)  -->'; 
        }
?>
    <!-- Abre thumbnail/card -->
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
    <?php 
        }while($row=$lista->fetch_assoc()); 

        
        // é importante fechar a última div row que ficou aberta após o loop
        echo '</div> <!-- fecha row -->';
        }else{
            // Mensagem caso não haja produtos
            echo '<div class="alert-warning role="alert">Nenhum produto encontrado.</div>';
        }
    ?>

</div> <!-- fecha row -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>
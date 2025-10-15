<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

// Variáveis Globais
$tabela         =   "tbprodutos";
$campo_filtro   =   "id_produto";

/*
if($_POST){
    // Selecionar o banco de dados (USE)
    mysqli_select_db($conn_produtos,$database_conn);

    // Variáveis para acrescentar dados no banco
    $tabela_insert  =   "tbprodutos";
    $campos_insert  =   "
                            id_tipo_produto,
                            destaque_produto,
                            descri_produto,
                            resumo_produto,
                            valor_produto,
                            imagem_produto
                        ";

    // Guardar o nome da imagem no banco e o arquivo no diretório
    if(isset($_POST['enviar'])){
        $nome_img   =   $_FILES['imagem_produto']['name'];
        $tmp_img    =   $_FILES['imagem_produto']['tmp_name'];
        $dir_img    =   "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    };

    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $id_tipo_produto    =   $_POST['id_tipo_produto'];
    $destaque_produto   =   $_POST['destaque_produto'];
    $descri_produto     =   $_POST['descri_produto'];
    $resumo_produto     =   $_POST['resumo_produto'];     
    $valor_produto      =   $_POST['valor_produto'];
    $imagem_produto     =   $_FILES['imagem_produto']['name'];

    // Reunir os valores a serem inseridos
    $valores_insert =   "
                        '$id_tipo_produto',
                        '$destaque_produto',
                        '$descri_produto',
                        '$resumo_produto',
                        '$valor_produto',
                        '$imagem_produto'
                        ";

    // Consulta SQL para inserção dos dados
    $insertSQL  =   "
                    INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                    VALUES
                        (".$valores_insert.");
                    ";
    $resultado  =   $conn_produtos->query($insertSQL);

    // Após a ação a página será redirecionada
    $destino    =   "produtos_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
*/

// Consulta para trazer e filtrar os dados
// Definir o USE do banoc de dados;
mysqli_select_db($conn_produtos,$database_conn);
$filtro_select    =   $_GET['id_produto'];
$consulta           =   "
                    SELECT *
                    FROM    ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select.";
                    ";
$lista          =   $conn_produtos->query($consulta);
$row            =   $lista->fetch_assoc();
$totalRows      =   ($lista)->num_rows;

// Selecionar o banco de dados (USE)
mysqli_select_db($conn_produtos,$database_conn);

// Selecionar os dados da chave estrangeira
$tabela_fk      =   "tbtipos";
$ordenar_por    =   "rotulo_tipo ASC";
$consulta_fk    =   "
                    SELECT *
                    FROM    ".$tabela_fk."
                    ORDER BY ".$ordenar_por.";
                    ";
$lista_fk       =   $conn_produtos->query($consulta_fk);
$row_fk         =   $lista_fk->fetch_assoc();
$totalRows_fk   =   ($lista_fk)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - Atualiza</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include("menu_adm.php"); ?>
<main class="container">
    <div> <!-- abre row -->
        <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4" > <!-- abre dimensionamento -->
            <h2 class="breadcrumb text-danger">
                <a href="produtos_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Atualiza Produto
            </h2>
            <div class="thumbnail"> <!-- thumbnail -->
                <div class="alert alert-danger" role="alert"> <!-- alert -->
                    <form 
                        action="produtos_atualiza.php"
                        enctype="multipart/form-data"
                        method="post"
                        id="form_produto_atualiza"
                        name="form_produto_atualiza"
                    >
                        <!-- Select id_tipo_produto -->
                        <label for="id_tipo_produto">Tipo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tasks"></span>
                            </span>
                            <!-- select>option*2 -->
                            <select 
                                name="id_tipo_produto" 
                                id="id_tipo_produto"
                                class="form-control"
                                required
                            >
                                <!-- Abre estrutura de repetição -->
                                <?php do{ ?>
                                    <option value="<?php echo $row_fk['id_tipo']; ?>">
                                        <?php echo $row_fk['rotulo_tipo']; ?>
                                    </option>
                                <?php }while($row_fk=$lista_fk->fetch_assoc()); ?>
                                <!-- Fecha estrutura de repetição -->
                            </select>
                        </div> <!-- fecha input-group -->
                        <!-- fecha Select id_tipo_produto -->
                        <br>

                        <!-- radio destaque_produto -->
                        <label for="destaque_produto">Destaque?</label>
                        <div class="input-group">
                            <label 
                                for="destaque_produto_s"
                                class="radio-inline"
                            >
                                <input 
                                    type="radio"
                                    name="destaque_produto"
                                    id="destaque_produto"
                                    value="Sim"
                                >
                                Sim
                            </label>
                            <label 
                                for="destaque_produto_n"
                                class="radio-inline"
                            >
                                <input 
                                    type="radio"
                                    name="destaque_produto"
                                    id="destaque_produto"
                                    value="Não"
                                    checked
                                >
                                Não
                            </label>
                        </div> <!-- fecha input-group -->
                        <!-- fecha radio destaque_produto -->
                        <br>

                        <!-- text descri_produto -->
                        <label for="descri_produto">Descrição:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-cutlery"></span>
                            </span>
                            <input 
                                type="text" 
                                name="descri_produto" 
                                id="descri_produto"
                                class="form-control"
                                placeholder="Digite o título do produto."
                                maxlength="100"
                                required
                                value="<?php echo $row['descri_produto']; ?>"
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha text descri_produto -->
                        <br>

                        <!-- textarea resumo_produto -->
                        <label for="resumo_produto">Resumo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-list-alt"></span>
                            </span>
                            <textarea 
                                name="resumo_produto" 
                                id="resumo_produto"
                                class="form-control"
                                placeholder="Digite os detalhes do produto."
                                cols="30"
                                rows="8"
                            ><?php echo $row['resumo_produto']; ?></textarea>
                        </div> <!-- fecha input-group -->
                        <!-- fecha textarea resumo_produto -->
                        <br>

                        <!-- number valor_produto -->
                        <label for="valor_produto">Valor:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tags"></span>
                            </span>
                            <input 
                                type="number"
                                name="valor_produto"
                                id="valor_produto"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="<?php echo $row['valor_produto']; ?>"
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha number valor_produto -->
                        <br>

                        <!-- file imagem_produto -->
                        <label for="imagem_produto">Imagem:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-picture"></span>
                            </span>
                            <!-- Exibir a imagem a ser inserida -->
                            <img 
                                src="" 
                                alt=""
                                name="imagem"
                                id="imagem"
                                class="img-responsive"
                                style="max-height: 150px;"
                            >
                            <input 
                                type="file" 
                                name="imagem_produto" 
                                id="imagem_produto"
                                class="form-control"
                                accept="image/*"
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha file imagem_produto -->
                        <br>

                        <!-- btn enviar -->
                         <input 
                            type="submit" 
                            value="Atualizar"
                            name="enviar"
                            id="enviar"
                            class="btn btn-danger btn-block"
                         >
                    </form>

                </div> <!-- fecha alert -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
    </div> <!-- fecha row -->
</main>

<!-- Script para a imagem -->
<script>
document.getElementById("imagem_produto").onchange = function(){
    var reader = new FileReader();
    if(this.files[0].size>512000){
        alert("A imagem deve ter no máximo 500kb.");
        $("#imagem").attr("src","blank");
        $("#imagem").hide();
        $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
        $("#imagem_produto").unwrap();
        return false;
    }
    if(this.files[0].type.indexOf("image")==-1){
        alert("Formato inválido, escolha uma imagem.");
        $("#imagem").attr("src","blank");
        $("#imagem").hide();
        $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
        $("#imagem_produto").unwrap();
        return false;
    }
    reader.onload = function(e){
        // obter dados carregados e renderizar uma miniatura.
        document.getElementById("imagem").src = e.target.result;
        $("imagem").show();
    };
    // leia o arquivo de imagem como um URL de dados.
    reader.readAsDataURL(this.files[0]);
};
</script>

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>
<?php
    mysqli_free_result($lista_fk);
    mysqli_free_result($lista);
?>
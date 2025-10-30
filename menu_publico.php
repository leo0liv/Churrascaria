<?php
// Incluir o arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer o dados
$tabela_menu    =   "tbtipos";
$ordenar_menu   =   "rotulo_tipo";
$consulta_menu  =   "SELECT *
                     FROM   ".$tabela_menu."
                     ORDER BY ".$ordenar_menu.";
                    ";
$lista_menu      =   $conn_produtos->query($consulta_menu );
$row_menu        =   $lista_menu ->fetch_assoc();
$totalRows_menu  =   ($lista_menu )->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body>
<!-- abre a barra de navegação -->
<nav class="navbar navbar-inverse">
    <div class="conatiner-fluid">
        <div class="navbar-header"> <!-- Agrupamento MOBILE -->
            <a href="index.php" class="navbar-brand">
                <img src="imagens/logochurrascopequeno.png" alt="">
            </a>
            <button 
                type="button" 
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target="#defaultNavbar"
                aria-expanded="false"
            >
                <span class="sr-only">Navegação Mobile</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
        </div> <!-- fecha agrupamento MOBILE -->
        <div class="collapse navbar-collapse" id="defaultNavbar"> <!-- barra de navegação -->
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li>
                    <a href="index.php#destaques">DESTAQUES</a>
                </li>
                <li>
                    <a href="index.php#produtos">PRODUTOS</a>
                </li>
                <li class="dropdown">
                    <a 
                        href="produtos_tipos.php"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        TIPOS
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="produtos_tipos.php">
                                TODOS
                            </a>
                        </li>
                        <?php do { ?> <!-- Abre estrutura de repetição -->
                            <li>
                                <a href="produtos_por_tipo.php?id_tipo=<?php echo $row_menu['id_tipo']; ?>">
                                    <?php echo $row_menu['rotulo_tipo']; ?>
                                </a>
                            </li>
                        <?php } while ($row_menu=$lista_menu->fetch_assoc()); ?> <!-- fecha estrutura de repetição -->
                    </ul>
                </li> <!-- fecha dropdown -->
                <li>
                    <a href="index.php#contato">CONTATO</a>
                </li>
                <!-- form Busca -->
                <form 
                    action="produtos_busca.php"
                    method="get"
                    name="form_busca"
                    id="form_busca"
                    class="navbar-form navbar-left"
                    role="search"
                >
                    <div class="form-group">
                        <div class="input-group">
                            <input 
                                type="text"
                                class="form-control"
                                placeholder="Busca produto"
                                name="buscar"
                                id="buscar"
                                size="9"
                                required
                            >
                            <span class="input-group-btn">
                                <button 
                                    type="submit" 
                                    class="btn btn-default"
                                >
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div> <!-- fecha input-group -->
                    </div> <!-- fecha form-group -->
                </form>
                <li class="active">
                    <a href="admin/index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
            </ul>
        </div> <!-- fecha barra de navegação -->

    </div> <!-- fecha container fluid -->

</nav>
<!-- fehca barra de navegação -->


<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista_menu); ?>
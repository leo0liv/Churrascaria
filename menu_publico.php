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
<!-- abre a barra de navegação -->
<nav class="navbar navbar-inverse">
    <div class="conatiner-fluid">
        <div class="nav-header"> <!-- Agrupamento MOBILE -->
            <a href="index.php" class="navbar-brand">
                <img src="imagens/logochurrascopequeno.png" alt="">
            </a>
            <button 
                type="button" 
                class="navbar-toggle collapsed"
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
                        href=""
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
                        <li><a href="">Churrasco</a></li>
                        <li><a href="">Sobremesa</a></li>
                    </ul>
                </li> <!-- fecha dropdown -->
                <li>
                    <a href="index.php#contato">CONTATO</a>
                </li>
                <!-- form Busca -->
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rodape</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
</head>
<body class="fundofixo">
<div class="row panel-footer" style="background-color: rgba(255, 255, 255, 0.6);"> <!-- Abre painel de rodapé -->

    <!-- Área de localização -->
    <div class="col-sm-6 col-md-4">
        <div class="panel-footer" style="background: none;">
            <img src="imagens/logochurrascopequeno.png" alt="">
            <br>
            <i>O melhor churrasco da região</i>
            <address>
                <i>Rua Dom Joaquim, 495 - Centro - Itapetininga - SP - CEP 18200-000</i>
                <br>
                <span class="glyphicon glyphicon-phone-alt"></span>
                &nbsp;Fone: (15) 3511 1200
                <br>
                <span class="glyphicon glyphicon-envelope"></span>
                &nbsp;E-mail:
                <a 
                    href="mailto:contato@chuletaquente.com.br?subject=Contato&cc=seuemail@mail.com"
                >
                    contato@chuletaquente.com.br
                </a>
                <div class="embed-responsive embed-responsive-16by9"> <!-- Mapa -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3527403234593!2d-48.055459823913246!3d-23.59167916270815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc93b46246ed%3A0x6ec0870ce87bb6fd!2sSenac%20Itapetininga!5e0!3m2!1spt-BR!2sbr!4v1761610401296!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> <!-- fecha Mapa -->
            </address>
        </div> <!-- fecha panel-footer -->
    </div> <!-- Fecha dimensionamento / área -->

    <!-- Área de Navegação -->
    <div class="col-sm-6 col-md-4">
        <div class="panel-footer" style="background: none;">
            <h4>LINKS</h4>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="index.php#home" class="text-danger">
                        <span class="glyphicon glyphicon-home">&nbsp;HOME</span>
                    </a>
                </li>
                <li>
                    <a href="index.php#destaques" class="text-danger">
                        <span class="glyphicon glyphicon-fire">&nbsp;DESTAQUES</span>
                    </a>
                </li>
                <li>
                    <a href="index.php#produtos" class="text-danger">
                        <span class="glyphicon glyphicon-cutlery">&nbsp;PRODUTOS</span>
                    </a>
                </li>
                <li>
                    <a href="produtos_tipos.php" class="text-danger">
                        <span class="glyphicon glyphicon-tasks">&nbsp;TIPOS</span>
                    </a>
                </li>
                <li>
                    <a href="index.php#contato" class="text-danger">
                        <span class="glyphicon glyphicon-send">&nbsp;CONTATO</span>
                    </a>
                </li>
                <li>
                    <a href="admin/index.php" class="text-danger">
                        <span class="glyphicon glyphicon-user">&nbsp;ADMINISTRAÇÃO</span>
                    </a>
                </li>
            </ul> <!-- fecha nav nav-pills nav-stacked -->
        </div><!-- fecha panel-footer -->
    </div> <!-- Fecha dimensionamento / área -->

    <!-- Área de Contato -->
    <div class="col-sm-6 col-md-4">
        <div class="panel-footer" style="background: none;">
            <h4>CONTATO</h4>
            <form  
                action="rodape_contato_envia.php"
                name="form_contato"
                id="form_contato"
                method="post"
            >
                <!-- Input-group NOME -->
                <p>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <input 
                            type="text"
                            name="nome_contato"
                            id="nome_contato"
                            placeholder="Digite seu nome."
                            aria-describedby="basic-addon1"
                            required
                            class="form-control"
                        >
                    </div> <!-- fecha input-group -->
                </p>

                <!-- contrua o input group email use glyphicon-envelope -->
                <p>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon2">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </span>
                        <input 
                            type="email"
                            name="email_contato"
                            id="email_contato"
                            placeholder="Digite seu email."
                            aria-describedby="basic-addon2"
                            required
                            class="form-control"
                        >
                    </div> <!-- fecha input-group -->
                </p>
                <!-- contrua o textarea comentário use glyphicon-pencil -->
                <p>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </span>
                        <textarea 
                            name="text_contato"
                            id="text_contato"
                            class="form-control"
                            placeholder="Comentário, dúvidas e/ou sugestões."
                            aria-describedby="basic-addon3"
                            required
                            cols="30"
                            rows="5"
                        ></textarea>
                    </div> <!-- fecha input-group -->
                </p>
                <!-- contrua o botão enviar use glyphicon-send -->
                <button class="btn btn-danger btn-block">
                    Enviar
                    <span class="glyphicon glyphicon-send"></span>
                </button>

            </form>
        </div><!-- fecha panel-footer -->
    </div> <!-- Fecha dimensionamento / área -->

    <!-- Área de Desenvolvedor -->
    <div class="col-sm-12">
        <div class="panel-footer" style="background: none;">
            <h6 class="text-danger text-center">
                Developed by Leo&trade; 2025
                <br>
                <a href="https://www.iwanezuk.com.br">
                    www.iwanezuk.com.br
                </a>
            </h6>
        </div><!-- fecha panel-footer -->
    </div> <!-- Fecha dimensionamento / área -->

</div> <!-- fecha painel de rodapé -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
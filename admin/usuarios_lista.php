<?php 
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta  =   "
                SELECT *
                FROM tbusuarios
                ORDER BY login_usuario ASC;
                ";
// Fazer a lista completa dos dados
$lista  =   $conn_produtos->query($consulta);
// Separar os dados em linhas (row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Lista</title>
    <!-- Depois vamos inserir aqui o Bootstrap -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Depois vamos inserir o meu_estilo.css -->
     <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
    <?php include("menu_adm.php");?>
    <!-- main>h1 -->
    <main class="container">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"> <!-- Abre dimensionamento -->
            <h1 class="breadcrumb alert-info">Lista de Usuários</h1>
            <div class="btn btn-info disabled">
                Total de Usuários
                <small class="badge"><?php echo $totalRows; ?></small>
            </div>
            <!-- table>thead>tr>th*8 -->
            <table class="table table-hover table-condensed tbopacidade">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>LOGIN</th>
                        <th>NÍVEL</th>
                        <th>
                            <a 
                                href="usuarios_insere.php"
                                class="btn btn-block btn-primary btn-xs"
                            >
                                <span class="hidden-xs">ADICIONAR <br></span>
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <!-- tbody>tr>td*4 -->
                <tbody>
                    <!-- Abre a estrutura de repetição -->
                    <?php do{ ?>
                    <tr>
                        <!-- <td><?php echo $row['id_usuario']; ?></td> -->
                        <td><?php echo $row['login_usuario']; ?></td>
                        <td>
                            <?php 
                                if($row['nivel_usuario']=='sup'){
                                    echo('<span class="glyphicon glyphicon-sunglasses text-black"></span>&nbsp;sup');
                                }else if($row['nivel_usuario']=='com'){
                                    echo('<span class="glyphicon glyphicon-user text-info"></span>&nbsp;com');
                                };
                            ?>
                        </td>
                        <td>
                            <a 
                                href="usuarios_atualiza.php"
                                class="btn btn-warning btn-xs btn-block"
                            >
                                <span class="hidden-xs">ALTERAR<br></span>
                                <span class="glyphicon glyphicon-refresh"></span>
                            </a>
                            <button 
                                data-id="<?php echo $row['id_usuario']; ?>"
                                data-nome="<?php echo $row['login_usuario']; ?>"
                                class="btn btn-danger btn-xs btn-block delete"
                            >
                                <span class="hidden-xs">EXCLUIR<br></span>
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                    <?php }while($row = $lista->fetch_assoc()); ?>
                    <!-- Fecha a estrutura de rapetição -->
                </tbody>
            </table>
        </div><!-- Fecha dimensionamento -->
    </main>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                >
                    &times;
                </button>
                <h4 class="modal-title text-danger">ATENÇÃO</h4>
            </div> <!-- fecha modal-header -->
            <div class="modal-body">
                Deseja mesmo EXCLUIR o usuário?
                <h4><span class="nome text-danger"></span></h4>

            </div> <!-- fecha modal-body -->
            <div class="modal-footer">
                <a 
                    href="#" 
                    type="button" 
                    class="btn btn-danger delete-yes"
                >
                    Confirmar
                </a>
                <button class="btn btn-success" data-dismiss="modal">
                    Cancelar
                </button>
            </div> <!-- fecha modal-footer -->
        </div> <!-- fecha modal-content -->
    </div> <!-- fecha modal-dialog -->
 </div> <!-- fecha modal -->

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Script para o modal -->
<script type="text/javascript">
        $('.delete').on('click',function(){
            var nome    =   $(this).data('nome');
            // buscar o valor do atributo data-nome
            var id    =   $(this).data('id');
            // buscar o valor do atributo data-id
            $('span.nome').text(nome);
            // Inserir o nome do item na pergunta de confirmação
            $('a.delete-yes').attr('href','usuarios_exclui.php?id_usuario='+id);
            // mudar dinamicamente o id do link no botão confirmar
            $('#myModal').modal('show'); // abre modal
        });
    </script>
</body>
</html>
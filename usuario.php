<!DOCTYPE html>
<html>
    <head>
        <title>Usuário</title>
        <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>

    <nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><h3><img src="img/logo2.png" width="50px" height="50px">Sistema Interno de Gestão de Requisição de Pagamentos</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SIGRP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="menu.php"><i class="fa-solid fa-house"></i>&nbsp;HOME</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="ccustos.php"><i class="fa-solid fa-ranking-star"></i> Centro de Custos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="dadosbancarios.php"><i class="fa-solid fa-file-invoice-dollar"></i> Dados Bancários</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="fornecedor.php"><i class="fa-solid fa-boxes-packing"></i> Fornecedor</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="meiopagamento.php"><i class="fa-solid fa-piggy-bank"></i> Meio de Pagamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="orcamento.php"><i class="fa-solid fa-layer-group"></i> Orçamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="perfilusuario.php"><i class="fa-solid fa-users-gear"></i> Perfil de Usuário</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="requisicaopagamento.php"><i class="fa-solid fa-flag"></i> Requisição de Pagamento</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="requisicaopagamento.php"><i class="fa-solid fa-users-viewfinder"></i>&nbsp;Seção</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="usuario.php"><i class="fa-solid fa-user"></i> Usuário</a>
        </ul>
        </div>
    </div>
    </div>
    </nav>

    <div class="container" style="margin-top: 90px; width: 900px;">
        <h3>Usuário</h3>
        <br>
        <div style="text-align: right;">
            <a class="btn btn-sm btn-success" href="adicionar_usuario.php" role="button"><i class="fa-regular fa-file"></i>&nbsp;Novo</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Perfil</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include 'conexao.php';
                        $sql = "SELECT usuario.idUsuario,
                                       usuario.nome,
                                       usuario.email,
                                       usuario.senha,
                                       usuario.dataCriacao,
                                       case usuario.status
                                       when 1 then 'Ativo'
                                       when 0 then 'Inativo' end as status,
                                       perfilusuario.nome AS perfil
                                FROM usuario
                                LEFT JOIN perfilusuario ON idPerfilUsuario = PerfilUsuario_idPerfilUsuario
                                ORDER BY usuario.nome";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {

                            $idUsuario  = $array['idUsuario'];
                            $nome = $array['nome'];
                            $email = $array['email'];
                            $dataCriacao = $array['dataCriacao'];
                            $status = $array['status'];
                            $PerfilUsuario_idPerfilUsuario = $array['perfil'];

                    ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $status ?></td>
                    <td><?php echo $PerfilUsuario_idPerfilUsuario ?></td>
                    
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar_usuario.php?id=<?php echo $idUsuario ?>" role="button" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa-regular fa-pen-to-square"></i></a>

                        <a class="btn btn-danger btn-sm" href="deletar_usuario.php?id=<?php echo $idUsuario ?>" role="button" data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa-regular fa-trash-can"></i></a></td>

            <?php } ?>
                </tr>
            </tbody>
            </table>
        <div style="text-align: right;">
            <a href="menu.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    </body>
</html>
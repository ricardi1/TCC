<!DOCTYPE html>
<html>
    <head>
        <title>SIGRP</title>
        <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <?php

        session_start();

        $usuario = $_SESSION['usuario'];
        $_SESSION['usuario'];

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
        }

        include 'conexao.php';

        $sql =  "SELECT usuario.email,
                        usuario.status,
                        usuario.Secao_idSecao,
                        usuario.PerfilUsuario_idPerfilUsuario,
                        secao.Usuario_idUsuarioChefe
                FROM usuario
                LEFT JOIN secao ON secao.idSecao = usuario.Secao_idSecao
                WHERE usuario.email = '$usuario'";
        $buscar = mysqli_query($conexao,$sql);
        while ($array = mysqli_fetch_array($buscar)) {
            $email = $array['email'];
            $status = $array['status']; 
            $Secao_idSecao = $array['Secao_idSecao'];
            $PerfilUsuario_idPerfilUsuario = $array['PerfilUsuario_idPerfilUsuario'];
            $Usuario_idUsuarioChefe = $array['Usuario_idUsuarioChefe']; 
        ?>

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

    <div class="container-fluid" style="margin-top: 90px; width: 90%;" >
        <h4>Lista de pagamentos pendentes de aprovação financeira</h4>
        <br>
        <!-- <div style="text-align: right;">
            <a class="btn btn-sm btn-success" href="adicionar_requisicaopagamento.php" role="button"><i class="fa-regular fa-file"></i>&nbsp;Novo</a>
        </div> -->
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Data Emissão</th>
                <th scope="col">Data Vencimento</th>
                <th scope="col">Nota Fiscal</th>
                <th scope="col">Data da Requisição</th>
                <th scope="col">Meio de Pagamento</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Orçamento</th>
                <th scope="col">Usuário</th>
                <th scope="col">Centro de Custos</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include 'conexao.php';
                        $sql = "SELECT  requisicaopagamento.idRequisicaoPagamento,
                                        requisicaopagamento.descricao,
                                        CONCAT('R$ ',FORMAT(requisicaopagamento.valor,2,'de_DE')) AS valor,
                                        DATE_FORMAT(requisicaopagamento.dataEmissao, '%d/%m/%Y') AS dataEmissao,
                                        DATE_FORMAT(requisicaopagamento.dataVencimento, '%d/%m/%Y') AS dataVencimento,
                                        requisicaopagamento.numeroNF,
                                        DATE_FORMAT(requisicaopagamento.dataRequisicao, '%d/%m/%Y') AS dataRequisicao,
                                        meiopagamento.descricao AS meiopagamento,
                                        fornecedor.nome AS fornecedor,
                                        orcamento.descricao AS orcamento,
                                        usuario.nome AS requisitante,
                                        ccustos.descricao AS ccusto,
                                        case requisicaopagamento.status
                                            when 0 then 'Pendente de aprovação'
                                            when 1 then 'Aprovado por gestor'
                                            when 2 then 'Aprovação financeira' END AS status
                                FROM requisicaopagamento
                                LEFT JOIN meiopagamento ON 
                                            meiopagamento.idMeioPagamento = requisicaopagamento.MeioPagamento_idMeioPagamento
                                LEFT JOIN fornecedor ON 
                                            fornecedor.idFornecedor = requisicaopagamento.Fornecedor_idFornecedor
                                LEFT JOIN orcamento ON 
                                            orcamento.idOrcamento = requisicaopagamento.Orcamento_idOrcamento
                                LEFT JOIN usuario ON 
                                            usuario.idUsuario = requisicaopagamento.Usuario_idUsuario
                                LEFT JOIN ccustos ON 
                                            ccustos.idCCustos = requisicaopagamento.CCustos_idCCustos
                                WHERE requisicaopagamento.status = 1
                                ORDER BY requisicaopagamento.dataRequisicao";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {
                            $idRequisicaoPagamento = $array['idRequisicaoPagamento'];
                            $descricao = $array['descricao'];
                            $valor = $array['valor'];
                            $dataEmissao = $array['dataEmissao'];
                            $dataVencimento = $array['dataVencimento'];
                            $numeroNF = $array['numeroNF'];
                            $dataRequisicao = $array['dataRequisicao'];
                            $status = $array['status'];
                            $MeioPagamento_idMeioPagamento = $array['meiopagamento'];
                            $Fornecedor_idFornecedor = $array['fornecedor'];
                            $Orcamento_idOrcamento = $array['orcamento'];
                            $Usuario_idUsuario = $array['requisitante'];
                            $CCustos_idCCustos = $array['ccusto'];
                    ?>
                <tr>
                    <td><?php echo $descricao ?></td>
                    <td><?php echo $valor ?></td>
                    <td><?php echo $dataEmissao ?></td>
                    <td><?php echo $dataVencimento ?></td>
                    <td><?php echo $numeroNF ?></td>
                    <td><?php echo $dataRequisicao ?></td>
                    <td><?php echo $MeioPagamento_idMeioPagamento ?></td>
                    <td><?php echo $Fornecedor_idFornecedor ?></td>
                    <td><?php echo $Orcamento_idOrcamento ?></td>
                    <td><?php echo $Usuario_idUsuario ?></td>
                    <td><?php echo $CCustos_idCCustos ?></td>

                    <?php
                     if(($PerfilUsuario_idPerfilUsuario == 4)) {
                    ?> 
                    <td><a class="btn btn-success btn-sm" href="_atualizar_aprovacao_financeira.php?id=<?php echo $idRequisicaoPagamento ?>" role="button" data-toggle="tooltip" data-placement="top" title="Aprovar Pagamento"><i class="fa-solid fa-check"></i></a>

                       <!-- <a class="btn btn-danger btn-sm" href="_atualizar_aprovacao_gestor.php?id=//<?php echo $idRequisicaoPagamento ?>" role="button" data-toggle="tooltip" data-placement="top" title="Reprovar Pagamento"><i class="fa-solid fa-minus"></i></a></td> -->
                       <?php } ?>
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
    <?php } ?>
    </body>
</html>
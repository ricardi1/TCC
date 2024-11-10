<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container" style="margin-top: 100px;">

<?php

?>

<div class="row">
  <?php
  if(($PerfilUsuario_idPerfilUsuario == 4)||($PerfilUsuario_idPerfilUsuario == 1)) {
    
  ?>  
    <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 20px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pagamentos pendentes de aprovação financeira</h5>
        <p class="card-text">Exibe pagamentos que estão aguardando aprovação do Gerente Financeiro.</p>
        <a href="_aprovacao_financeira.php" type="button" class="btn btn-primary position-relative">
        Listar pagamentos
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php
                include 'conexao.php';
                $sql = "SELECT count(idRequisicaoPagamento) AS pendentes FROM requisicaopagamento WHERE status = 1";

                $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {
                               $pendentes = $array['pendentes'];     
            ?>
                <?php echo $pendentes ?>
                        <?php } ?>
            <span class="visually-hidden">unread messages</span>
        </span>
        </a>
      </div>
    </div>
  </div>

  <?php } ?>

  <?php
  if(($PerfilUsuario_idPerfilUsuario == 3)||($PerfilUsuario_idPerfilUsuario == 1)) {
    
  ?>  
    <div class="col-sm-6" style="margin-top: 20px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pagamentos pendentes de aprovação do gestor do departamento</h5>
        <p class="card-text">Exibe pagamentos que estão aguardando a aprovação do Gestor do Departamento.</p>
        <a href="_aprovacao_gestor.php" type="button" class="btn btn-primary position-relative">
        Listar pagamentos
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php
                include 'conexao.php';
                $sql = "SELECT COUNT(requisicaopagamento.idRequisicaoPagamento) AS pendentes FROM requisicaopagamento
                        LEFT JOIN usuario ON usuario.idUsuario = requisicaopagamento.Usuario_idUsuario
                        LEFT JOIN secao ON secao.idSecao = usuario.Secao_idSecao
                        WHERE secao.idSecao = $Secao_idSecao
                          AND requisicaopagamento.status = 0";

                $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {
                               $pendentes = $array['pendentes'];     
            ?>
                <?php echo $pendentes ?>
                        <?php } ?>
            <span class="visually-hidden">unread messages</span>
        </span>
        </a>
      </div>
    </div>
  </div>
  <?php } ?>

  <div class="col-sm-6" style="margin-top: 20px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Exibir todas as requisições de pagamento</h5>
        <p class="card-text">Exibe todos os pagamentos independente do status.</p>
        <a href="listar_requisicaopagamento.php" class="btn btn-primary">Listar pagamentos</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6" style="margin-top: 20px;">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar nova requisição de pagamento</h5>
        <p class="card-text">Insere uma nova requisição de pagamento.</p>
        <a href="adicionar_requisicaopagamento.php" class="btn btn-primary">Adicionar requisição</a>
      </div>
    </div>
  </div>

  

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php } ?>
</body>
</html>
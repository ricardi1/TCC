<!DOCTYPE html>
<html>
    <head>
        <title>Usuário</title>
        <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <div class="container" style="margin-top: 40px; width: 800px;">
        <h3>Usuário</h3>
        <br>
        <div style="text-align: right;">
            <a class="btn btn-sm btn-success" href="adicionar_usuario.php" role="button"><i class="fa-regular fa-file"></i>&nbsp;Novo</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Senha</th>
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
                                       perfilusuario.nome AS perfil
                                FROM usuario
                                LEFT JOIN perfilusuario ON idPerfilUsuario = PerfilUsuario_idPerfilUsuario";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {

                            $idUsuario  = $array['idUsuario'];
                            $nome = $array['nome'];
                            $email = $array['email'];
                            $senha = $array['senha'];
                            $dataCriacao = $array['dataCriacao'];
                            $PerfilUsuario_idPerfilUsuario = $array['perfil'];

                    ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $senha ?></td>
                    <td><?php echo $PerfilUsuario_idPerfilUsuario ?></td>
                    <td><a class="btn btn-warning btn-sm" href="editar_usuario.php?id=<?php echo $idUsuario ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>

                        <a class="btn btn-danger btn-sm" href="deletar_usuario.php?id=<?php echo $idUsuario ?>" role="button"><i class="fa-regular fa-trash-can"></i>&nbsp;Excluir</a></td>

            <?php } ?>
                </tr>
            </tbody>
            </table>
        <div style="text-align: right;">
            <a href="index.php" role="button" class="btn btn-sm btn-primary"><i class="fa-solid fa-chevron-left"></i>&nbsp;Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
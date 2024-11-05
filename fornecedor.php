<!DOCTYPE html>
<html>
    <head>
        <title>Fornecedores</title>
        <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <div class="container" style="margin-top: 40px; width: 1200px;">
        <h3>Fornecedores</h3>
        <br>
        <div style="text-align: right;">
            <a class="btn btn-sm btn-success" href="adicionar_fornecedor.php" role="button"><i class="fa-regular fa-file"></i>&nbsp;Novo</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Rua</th>
                <th scope="col">Número</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">CNPJ</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM fornecedor ORDER BY nome";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {

                            $idFornecedor = $array['idFornecedor'];
                            $nome = $array['nome'];
                            $rua = $array['rua'];
                            $numero = $array['numero'];
                            $bairro = $array['bairro'];
                            $cidade = $array['cidade'];
                            $uf = $array['uf'];
                            $cnpj = $array['cnpj'];
                            $email = $array['email'];
                            $telefone = $array['telefone'];
                    ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $rua ?></td>
                    <td><?php echo $numero ?></td>
                    <td><?php echo $bairro ?></td>
                    <td><?php echo $cidade ?></td>
                    <td><?php echo $uf ?></td>
                    <td><?php echo $cnpj ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $telefone ?></td>
                    <td><a class="btn btn-warning btn-sm" href="editar_fornecedor.php?id=<?php echo $idFornecedor ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>

                        <a class="btn btn-danger btn-sm" href="deletar_fornecedor.php?id=<?php echo $idFornecedor ?>" role="button"><i class="fa-regular fa-trash-can"></i>&nbsp;Excluir</a></td>

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
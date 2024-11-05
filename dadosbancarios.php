<!DOCTYPE html>
<html>
    <head>
        <title>Dados Bancários</title>
        <script src="https://kit.fontawesome.com/642a493c63.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

    <div class="container" style="margin-top: 40px; width: 600px;">
        <h3>Dados Bancários</h3>
        <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Tipo Conta</th>
                <th scope="col">Banco</th>
                <th scope="col">Agencia</th>
                <th scope="col">Número Conta</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM dadosbancarios ORDER BY banco";
                        $buscar = mysqli_query($conexao, $sql);

                        while ($array = mysqli_fetch_array($buscar)) {

                            $tipoConta = $array['tipoConta'];
                            $banco = $array['banco'];
                            $agencia = $array['agencia'];
                            $numero = $array['numero'];
                    ?>
                <tr>
                    <td><?php echo $tipoConta ?></td>
                    <td><?php echo $banco ?></td>
                    <td><?php echo $agencia ?></td>
                    <td><?php echo $numero ?></td>
                    <td><a class="btn btn-warning btn-sm" href="editar_dadosbancarios.php?id=<?php echo $idDadosBancarios ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Editar</a>

                        <a class="btn btn-danger btn-sm" href="deletar_dadosbancarios.php?id=<?php echo $idDadosBancarios ?>" role="button"><i class="fa-regular fa-trash-can"></i>&nbsp;Excluir</a></td>

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
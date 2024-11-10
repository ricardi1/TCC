<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container" style="width: 350px; margin-top: 100px; border-radius: 0.50rem; border: 2px solid #f3f3f3">
    <div style="padding: 10px;">
    <center>
        <img src="img/cadeado.png" width="125px" height="125px">
    </center>
    <form action="index1.php" method="post">
        <div class="mb-3">
        <label class="form-label">Usuário</label>
        <input type="text" class="form-control" placeholder="Digite o e-mail do usuário" name="usuario" autocomplete="off" required>
        </div>
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" placeholder="Senha" name="senha" autocomplete="off" required>
    <br>
    <div style="text-align: right;">
            <button type="submit" class="btn btn-sm btn-success">Entrar</button>
    </div>
    </form>
    </div>
</div>

<!--<div style="margin-top: 10px;">
<center>
    <small>Você não possui cadastro? Clique <a href="cadastro_usuario_externo.php">aqui</a></small>
</center>
</div>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
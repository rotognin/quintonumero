<!DOCTYPE html>
<html>
<?php 
    include ('./html/head.php'); 
?>
<body>
    <div class="container">
        <br>
        <div class="card text-center" style="border:0px solid white">
            <h3><span class="azul">Acesso às perguntas.</span></h3>
            <span><i>Versão: <?php echo APP_VERSION; ?></i></span>
            <br>
            <div class="row justify-content-md-center">
                <form method="post" action="<?php echo $rota('login'); ?>">
                    <div class="input-group input-group-sm mb-3" style="margin: 0 auto;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Login:&nbsp</span>
                        </div>
                        <input type="text" class="form-control" id="login" name="login" size="30px" required autofocus>
                    </div>
                    <div class="input-group input-group-sm mb-3" style="margin: 0 auto;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Senha:</span>
                        </div>
                        <input type="password" class="form-control" id="senha" name="senha" size="30px" required>
                    </div>
                    <input type="submit" value="Entrar" class="btn botao">
                </form>
            </div>
            <br>
            <?php include_once ('./html/mensagem.php'); ?>
        </div>
    </div>
    <?php include_once ('./html/js/scriptsjs.php'); ?>
</body>
</html>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8"><h3 class="azul"><?php echo $titulo; ?></h3></div>
    </div>
</div>

<p class="lead">
    <b>Bem vindo(a): </b> <?php echo $_SESSION['usuNome']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="badge badge-dark" href="<?php echo $rota('logout'); ?>" role="button">Sair</a>
</p>

<hr>
<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Quinto número';
            require_once 'html/movimentacao/topo.php';
            include('html/mensagem.php'); 
        ?>
        <h3>Desempenho:</h3>
        <p class="lead">
            <b>99 Perguntas respondidas</b>
            <table class="table table-bordered">
                <tr>
                    <td><a href="index.php"><b>80</b> na 1ª tentativa</a></td>
                    <td><a href="index.php"><b>10</b> na 2ª tentativa</a></td>
                    <td><a href="index.php"><b>5</b> na 3ª tentativa</a></td>
                    <td><a href="index.php"><b>4</b> nas demais tentativas</a></td>
                    <td><a href="index.php"><b>0</b> desistências</a></td>
                    <td><a href="index.php"><b>0</b> abandonos</a></td>
                </tr>
            </table>
        </p>

        <div class="container">
            <h3>Responder pergunta:</h3>
            <div class="card">Fácil</div>
            <div class="card">Média</div>
            <div class="card">Difícil</div>
        </div>
        

        
    </div>

    <?php include_once 'html/js/scriptsjs.php'; ?>
</body>
</html>
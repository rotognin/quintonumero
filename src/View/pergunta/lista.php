<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Perguntas cadastradas no sistema';
            require_once 'html/admin/topo.php';
        ?>
    </div>
    
    <div class="container-fluid">
        <a class="btn fundo-azul text-white" href="<?php echo $rota('novo', 'pergunta'); ?>">Nova Pergunta</a>

        <table class="table table-hover table-sm">
            <thead class="fundo-azul branco">
                <tr>
                    <th>ID</th>
                    <th>Números</th>
                    <th>Resposta</th>
                    <th>Dificuldade</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($perguntas){
                    foreach($perguntas as $pergunta){
                        $acao = (STATUS[$pergunta->status] == 'Ativo') ? 'inativar' : 'ativar';

                        echo '<tr>';
                            echo '<td>' . $pergunta->id . '</td>';
                            echo '<td>'; 
                                echo $pergunta->numero1 . ' - ' . $pergunta->numero2 . ' - ' . 
                                     $pergunta->numero3 . ' - ' . $pergunta->numero4;
                            echo '</td>';
                            echo '<td>' . $pergunta->resposta . '</td>';
                            echo '<td>' . DIFICULDADE[$pergunta->dificuldade] . '</td>';

                            echo '<td>';
                                echo '<form method="post" action="index.php?control=pergunta&action=' . $acao . '">';
                                    echo '<input type="hidden" name="_token" value="' . $_SESSION['csrf'] . '">';
                                    echo '<input type="hidden" name="pergunta_id" value="' . $pergunta->id . '">';
                                    echo STATUS[$pergunta->status] . '&nbsp;&nbsp;&nbsp;';
                                    echo '<input type="submit" style="margin-left: 10px" value="' . ucfirst($acao) . '" class="btn botao btn-sm">';
                                echo '</form>';
                            echo '</td>';

                            echo '<td>';
                                echo '<form method="post" action="index.php?control=pergunta&action=alterar">';
                                    echo '<input type="hidden" name="_token" value="' . $_SESSION['csrf'] . '">';
                                    echo '<input type="hidden" name="pergunta_id" value="' . $pergunta->id . '">';
                                    echo '<input type="submit" style="margin-left: 10px" value="Alterar" class="btn botao btn-sm float-left">';
                                echo '</form>';
                            echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                        echo '<td colspan="5"><i>Nenhuma pergunta cadastrada...</i></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php include 'html/js/scriptsjs.php'; ?>
</body>
</html>
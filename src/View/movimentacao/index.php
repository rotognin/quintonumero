<!DOCTYPE html>
<html>
<?php include 'html/head.php'; ?>
<body>
    <div class="container-fluid">
        <?php 
            $titulo = 'Sistema de anotações';
            require_once 'html/movimentacao/topo.php';
            include('html/mensagem.php'); 
        ?>

        <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION['csrf']; ?>">

        <div class="d-flex align-items-stretch">
            <div class="container">
                <p class="h3">
                    Categorias &nbsp;&nbsp;&nbsp;
                    <span class="badge badge-primary"><?php echo (is_array($categorias)) ? count($categorias) : 0; ?></span>
                    <a title="Nova Categoria" href="<?php echo $rota('novo', 'categoria'); ?>">
                        <span class="badge badge-primary">+</span>
                    </a>
                    <a title="Listar Categorias" href="<?php echo $rota('categorias', 'categoria'); ?>">
                        <span class="badge badge-primary">*</span>
                    </a>
                </p>
                <hr>

                <?php
                    $qtd_categorias = (is_array($categorias)) ? count($categorias) : 0;

                    if ($qtd_categorias > 0){
                        echo '<div class="container barra-rolagem" id="div_categorias" data-qtd-categorias="' . $qtd_categorias . '">';

                        $id = 0;

                        foreach($categorias as $categoria){
                            $id++;

                            echo '<p id="categoria_' . $id . '" data-cat-id="' . $categoria->id . '" onclick="selecionarCategoria(' . $id . ');" class="selecao">' . $categoria->nome;
                                echo '<span class="badge badge-primary badge-pill float-right">' . $categoria->qtd_textos . '</span>';
                            echo '</p>';
                        }

                        echo '</div>';
                    } else {
                        echo '<p><i>Nenhuma categoria criada...</i></p>';
                    }
                ?>

            </div>

            <div class="container" >
                <p class="h2">
                    Notas &nbsp;&nbsp;&nbsp;
                    <span id="qtd_notas" class="badge badge-primary"><?php echo "0"; ?></span>
                    <a data-toggle="tooltip" data-placement="top" title="Nova Nota" href="<?php echo $rota('novo', 'texto'); ?>">
                        <span class="badge badge-primary">+</span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Listar Notas" href="<?php echo $rota('textos', 'texto'); ?>">
                        <span class="badge badge-primary">*</span>
                    </a>
                </p>
                <hr>

                <div class="container barra-rolagem" id="div_notas" data-qtd-notas="0">
                </div>
            </div>

        </div>
        <br>
    </div>
    <div class="card bg-light" style="max-width:90%; margin:0 auto;">
        <p class="card-body" id="texto">
        
        </p>
    </div>

    <?php include_once 'html/js/scriptsjs.php'; ?>
    <script src="html/js/script.min.js"></script>
</body>
</html>
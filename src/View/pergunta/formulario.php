<form class="col-12" method="post" action="<?php echo $rota($acao, 'pergunta'); ?>">
    <input type="hidden" name="_token" value="<?php echo $_SESSION['csrf']; ?>">
    
    <div class="form-group">
        <label for="id" style="margin:0px"><b>ID: &nbsp;</b></label><br>
        <input type="number" id="id" name="id" readonly value="<?php echo ($pergunta->id ?? '0'); ?>">
    </div>
    <div class="form-group">
        <label for="numero1" style="margin:0px"><b>Número 1: &nbsp;</b></label><br>
        <input type="number" id="numero1" name="numero1" value="<?php echo ($pergunta->numero1 ?? ''); ?>" size="10" autofocus>
    </div>
    <div class="form-group">
        <label for="numero2" style="margin:0px"><b>Número 2: &nbsp;</b></label><br>
        <input type="number" id="numero2" name="numero2" value="<?php echo ($pergunta->numero2 ?? ''); ?>" size="10">
    </div>
    <div class="form-group">
        <label for="numero3" style="margin:0px"><b>Número 3: &nbsp;</b></label><br>
        <input type="number" id="numero3" name="numero3" value="<?php echo ($pergunta->numero3 ?? ''); ?>" size="10">
    </div>
    <div class="form-group">
        <label for="numero4" style="margin:0px"><b>Número 4: &nbsp;</b></label><br>
        <input type="number" id="numero4" name="numero4" value="<?php echo ($pergunta->numero4 ?? ''); ?>" size="10">
    </div>
    <div class="form-group">
        <label for="resposta" style="margin:0px"><b>Resposta: &nbsp;</b></label><br>
        <input type="number" id="resposta" name="resposta" value="<?php echo ($pergunta->resposta ?? ''); ?>" size="10">
    </div>

    <!-- Explicação -->
    <div class="form-group">
        <label for="explicacao" style="margin:0px"><b>Explicação: &nbsp;</b></label><br>
        <textarea id="explicacao" name="explicacao" rows="5" cols="80"><?php echo ($pergunta->explicacao ?? ''); ?></textarea>
    </div>

    <div class="form-group">
        <?php
            $dificuldade = ($pergunta->dificuldade ?? 1);
        ?>
        <label for="dificuldade" style="margin:0px"><b>Dificuldade: &nbsp;</b></label><br>
        <select name="dificuldade" id="dificuldade">
            <option value="1" <?php echo ($dificuldade == 1) ? 'selected' : ''; ?>>Baixa &nbsp;&nbsp;</option>
            <option value="2" <?php echo ($dificuldade == 2) ? 'selected' : ''; ?>>Média &nbsp;&nbsp;</option>
            <option value="3" <?php echo ($dificuldade == 3) ? 'selected' : ''; ?>>Alta &nbsp;&nbsp;</option>
        </select>
    </div>

    <input type="hidden" id="status" name="status" value="<?php echo ($pergunta->status ?? '0'); ?>">
    <button type="submit" value="<?php echo ucfirst($acao); ?>" class="btn botao"><?php echo ucfirst($acao); ?></button>
</form>
<?php

namespace Src\Model\Funcoes;

use Src\Model\Funcoes\Qtdpergunta;
use Src\Model\Funcoes\Pergunta;

class Responder
{
    private int $idPergunta;

    public function sortearPergunta(int $dificuldade)
    {
        $qtdPergunta = new Qtdpergunta();
        $qtdPerguntas = $qtdPergunta->carregarQuantidade(CAMPO_DIFICULDADE[$dificuldade]);

        if ($qtdPerguntas == 0){
            $this->idPergunta = 0;
            return false;
        }

        $indexPergunta = rand(0, $qtdPerguntas - 1);
        $pergunta = (new Pergunta())
                    ->find('status = :status AND dificuldade = :dificuldade', 'status=0&dificuldade=' . $dificuldade)
                    ->limit(1)->offset($indexPergunta)
                    ->fetch(true);




    }

    public function pegarIdSorteado()
    {
        return (int) $this->idPergunta;
    }
}
<?php

namespace Src\Model\Funcoes;

use Src\Model\Entidades\Qtdperguntas;
use Src\Model\Entidades\Perguntas;

class Qtdpergunta
{
    public function contarPerguntas()
    {
        $qtdperguntas = (new Qtdperguntas())->findById(1);

        if (!$qtdperguntas){
            $qtdperguntas = new Qtdperguntas();
        }

        $faceis = (new Perguntas())
                  ->find('status = :status AND dificuldade = :dificuldade', 'status=0&dificuldade=1')
                  ->count();

        $medias = (new Perguntas())
                  ->find('status = :status AND dificuldade = :dificuldade', 'status=0&dificuldade=2')
                  ->count();

        $dificeis = (new Perguntas())
                   ->find('status = :status AND dificuldade = :dificuldade', 'status=0&dificuldade=3')
                   ->count();

        $qtdperguntas->faceis = $faceis;
        $qtdperguntas->medias = $medias;
        $qtdperguntas->dificeis = $dificeis;

        $qtdperguntas->save();
    }
}
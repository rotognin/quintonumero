<?php

namespace Src\Controller;

use Src\Model\Funcoes\Responder;
use Src\Model\Funcoes\Pergunta;

class ResponderController extends Controller
{
    public static function facil()
    {
        $responder = new Responder();

        if (!$responder->sortearPergunta(FACIL)){
            // Se não encontrar perguntas com esse nível, ir para a view correspondente
            parent::view('avisos.naoencontrada', ['nivel' => 'Fácil']);
            exit;
        }

        self::carregarPergunta($responder->pegarIdSorteado());
    }

    public static function carregarPergunta(int $idPergunta)
    {
        // Carregar a pergunta pelo ID e retornar para a view com o objeto carregado



        
    }
}
<?php

namespace Src\Controller;

use Src\Model\Funcoes\Responder;
use Src\Model\Funcoes\Pergunta;
use Lib\Token;

class ResponderController extends Controller
{
    public static function facil()
    {
        self::buscarPergunta(FACIL);
    }

    public static function media()
    {
        self::buscarPergunta(MEDIA);
    }

    public static function dificil()
    {
        self::buscarPergunta(DIFICIL);
    }

    public static function buscarPergunta(int $nivel)
    {
        $responder = new Responder();

        if (!$responder->sortearPergunta($nivel)){
            // Se não encontrar perguntas com esse nível, ir para a view correspondente
            parent::view('avisos.naoencontrada', ['nivel' => 'Fácil']);
            exit;
        }

        self::carregarPergunta($responder->pegarIdSorteado());
    }

    public static function carregarPergunta(int $idPergunta)
    {
        // Carregar a pergunta pelo ID e retornar para a view com o objeto carregado
        $pergunta = new Pergunta();
        $pergunta->carregar($idPergunta);

        Token::criarCsrf();

        // Antes de ir para a página da pergunta, já registrar que o usuário
        // solicitou para respondê-la. Dessa forma essa pergunta já ficará marcada
        // na tabela de PerguntasXUsuário, para o caso do mesmo desistir de responder ou
        // fechar a página em vez de clicar em "Desistir"




        parent::view('movimentacao.responder', ['pergunta' => $pergunta->objeto()]);



        
    }
}
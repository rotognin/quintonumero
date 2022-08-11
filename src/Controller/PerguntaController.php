<?php

namespace Src\Controller;

use Src\Model\Funcoes\Pergunta;
use Lib\Token;

class PerguntaController extends Controller
{
    public static function perguntas(array $post, array $get, string $mensagem = '')
    {
        $perguntas = new Pergunta();
        if (!$perguntas->listar()){
            $mensagem = $perguntas->mensagem;
        }

        Token::criarCsrf();
        parent::view('pergunta.lista', ['perguntas' => $perguntas->obter(), 'mensagem' => $mensagem]);
    }

    public static function novo(array $post, array $get, string $mensagem = '')
    {
        Token::criarCsrf();
        parent::view('pergunta.novo', ['mensagem' => $mensagem]);
    }

    public static function gravar(array $post, array $get)
    {
        self::persistir($post, $get, true);
    }

    public static function atualizar(array $post, array $get)
    {
        self::persistir($post, $get, false);
    }

    private static function persistir(array $post, array $get, bool $novo)
    {
        if (!Token::valido($post)){
            parent::logout();
            exit;
        }

        $view = ($novo) ? 'novo' : 'alterar';

        $pergunta = new Pergunta();
        if (!$pergunta->dados($post)){
            Token::criarCsrf();
            parent::view('pergunta.' . $view, ['mensagem' => $pergunta->mensagem, 'pergunta' => $pergunta->objeto()]);
            exit;
        }

        if ($pergunta->gravar()){
            self::perguntas([], [], 'Pergunta gravada com sucesso.');
        } else {
            Token::criarCsrf();
            parent::view('pergunta.' . $view, ['mensagem' => $pergunta->mensagem, 'pergunta' => $pergunta->objeto()]);
        }
    }

    public static function alterar(array $post, array $get, string $mensagem = '')
    {
        Token::criarCsrf();
        
        $id = filter_var($post['pergunta_id'], FILTER_VALIDATE_INT);
        $pergunta = new Pergunta();
        $pergunta->carregar($id);

        parent::view('pergunta.alterar', ['pergunta' => $pergunta->objeto(), 'mensagem' => $mensagem]);
    }

    public static function ativar(array $post, array $get)
    {
        self::alterarStatus($post, $get, 0);
    }

    public static function inativar(array $post, array $get)
    {
        self::alterarStatus($post, $get, 1);
    }

    private static function alterarStatus(array $post, array $get, int $status)
    {
        if (!Token::valido($post)){
            parent::logout();
            exit;
        }

        $id = filter_var($post['pergunta_id'], FILTER_VALIDATE_INT);

        $pergunta = new Pergunta();
        $pergunta->carregar($id);
        $pergunta->alterarStatus($status);

        self::perguntas([], []);
    }
}
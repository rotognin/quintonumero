<?php

namespace Src\Controller;

class MovimentacaoController extends Controller
{
    public static function inicio(array $post, array $get, string $mensagem = '')
    {
        parent::view('movimentacao.index', ['mensagem' => $mensagem]);
    }
}
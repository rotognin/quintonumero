<?php

namespace Src\Controller;

class AdministracaoController extends Controller
{
    public static function inicio(array $post, array $get, string $mensagem = '')
    {
        parent::view('admin.index', ['mensagem' => $mensagem]);
    }
}
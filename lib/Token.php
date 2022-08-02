<?php

namespace Lib;

class Token
{
    /**
     * Criação do token CSRF guardando na seção
     */
    public static function criarCsrf()
    {
        $csrf = sha1(date('d-m-Y H-i-s'));
        $_SESSION['csrf'] = $csrf;
        return $csrf;
    }

    /**
     * Verificar se o token foi passado e se é válido
     */
    public static function valido(array $dados)
    {
        return (isset($dados['_token']) && $dados['_token'] == $_SESSION['csrf']);
    }
}
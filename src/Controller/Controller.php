<?php

namespace Src\Controller;

use Src\Model\Funcoes\Login;

class Controller
{
    public static function login(array $post, array $get)
    {
        $login = new Login($post['login'], $post['senha']);
        if (!$login->realizar()){
            self::view('index', ['mensagem' => $login->mensagem]);
            exit;
        }

        if (NIVEL[$login->nivel] == 'Administrador'){
            AdministracaoController::inicio($post, $get);
        } else {
            MovimentacaoController::inicio($post, $get); // Fazer essa função
        }
    }

    public static function logout()
    {
        session_unset();
        self::view('index');
    }

    public static function principal()
    {
        self::logout();
    }

    public static function view(string $view, array $array = [])
    {
        $view = str_replace('.', DS, $view);
        $arquivo = '.' . DS . 'src' . DS . 'View' . DS . $view . '.php';

        if (!file_exists($arquivo)){
            echo '.... Arquivo não existe ... ' . $arquivo;
            die();
        }

        if (!empty($array)){
            foreach($array as $var => $valor){
                $$var = $var;
                $$var = $valor;
            }
        }

        $rota = function(string $acao = '', string $controlador = ''){
            $link = 'index.php?';

            if (!empty($controlador)){
                $link .= 'control=' . $controlador . '&';
            }

            if (!empty($acao)){
                $link .= 'action=' . $acao;
            }

            return $link;
        };

        ob_start();
        require_once $arquivo;
        $pagina = ob_get_contents();
        ob_end_clean();
        echo $pagina;
    }
}
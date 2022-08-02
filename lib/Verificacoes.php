<?php

namespace Lib;

class Verificacoes
{
    /**
     * Verificar se a data é válida.
     * Receber a data dessa forma: YYYY-mm-dd
     */
    public static function dataValida(string $data)
    {
        $data_array = explode('-', $data);

        if (count($data_array) != 3){
            return false;
        }

        $ano = $data_array[0];
        $mes = $data_array[1];
        $dia = $data_array[2];

        return checkdate($mes, $dia, $ano);
    }

    /**
     * Verificar se um horário é válido.
     * Receber o horário dessa forma: hh:mm
     */
    public static function horaValida(string $horario)
    {
        $hora_array = explode(':', $horario);

        if (count($hora_array) < 2){
            return false;
        }

        $hora = $hora_array[0];
        $minuto = $hora_array[1];

        $retorno = true;

        if ($hora > 23 || $minuto > 59){
            $retorno = false;
        }

        return $retorno;
    }
}
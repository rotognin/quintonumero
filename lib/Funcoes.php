<?php

namespace Lib;

class Funcoes
{
    public static function verificarString(string $texto, bool $completo = true) {
        if ($completo){
            $texto = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", "", $texto);
            $texto = strip_tags($texto);
        }

        $texto = trim($texto);
        $texto = addslashes($texto);
        $texto = htmlentities($texto, ENT_QUOTES);
        return $texto;
    }

    /**
     * Recebe o campo Data do banco no formato "AAAA-MM-DD HH:MM" e o formata para DD/MM/AAAA HH:MM
     */
    public static function ajustarDataHora(string $dataHoraOrigem)
    {
        if ($dataHoraOrigem == '' || $dataHoraOrigem == 'NULL'){
            return '';
        }
        
        $info = explode(' ', $dataHoraOrigem);

        if (count($info) != 2){
            return '';
        }

        $data = self::ajustarData($info[0]);
        $hora = self::ajustarHora($info[1]);

        return ($data == '00/00/0000') ? '' : $data . ' ' . $hora;
    }

    public static function ajustarData(string $dataOrigem)
    {
        if ($dataOrigem == '' || $dataOrigem == 'NULL'){
            return '';
        }
        
        $data = explode('-', $dataOrigem);

        if (count($data) != 3){
            return '';
        }

        $dataAjustada = $data[2] . '/' . $data[1] . '/' . $data[0];
        return ($dataAjustada == '00/00/0000') ? '' : $dataAjustada;
    }

    /**
     * Recebe o campo Hora do banco e o formata para HH:MM, se estiver correto
     */
    public static function ajustarHora(string $horaOrigem)
    {
        if ($horaOrigem == '' || $horaOrigem == 'NULL'){
            return '';
        }

        $hora = explode(':', $horaOrigem);

        if (count($hora) < 2){
            return '';
        }

        $horaAjustada = $hora[0] . ':' . $hora[1];

        return $horaAjustada;
    }
}
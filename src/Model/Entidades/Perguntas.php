<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Perguntas extends DataLayer
{
    public function __construct()
    {
        parent::__construct('perguntas', ['numero1', 'numero2', 'numero3', 'numero4', 'resposta'], 'id', false);
    }
}
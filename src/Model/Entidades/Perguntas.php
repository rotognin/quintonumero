<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Perguntas extends DataLayer
{
    public function __construct()
    {
        parent::__construct('perguntas', [], 'id', false);
    }
}
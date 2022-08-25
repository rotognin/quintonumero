<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Qtdperguntas extends DataLayer
{
    public function __construct()
    {
        parent::__construct('qtdperguntas', [], 'id', false);
    }
}
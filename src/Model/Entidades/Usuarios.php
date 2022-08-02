<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Usuarios extends DataLayer
{
    public function __construct()
    {
        parent::__construct('usuarios', ['nome', 'login', 'senha', 'nivel'], 'id', false);
    }
}
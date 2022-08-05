<?php

namespace Src\Model\Entidades;

use CoffeeCode\DataLayer\DataLayer;

class Usuperguntas extends DataLayer
{
    public function __construct()
    {
        parent::__construct('usuperguntas', ['usuario_id', 'pergunta_id'], 'id', false);
    }
}
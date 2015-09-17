<?php
namespace App\DataAccess\Entity;

use \InvalidArgumentException as Argument;

class Agenda
{

    protected $titulo;

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        if (empty($titulo)) {
            throw new Argument('O título não pode ser nulo');
        }
        $this->titulo = $titulo;
        return $this;
    }
}
<?php
namespace PrevisaoTempo\DataAccess\Entity;

class SiglaTempo
{
    protected $sigla;

    public function setSigla($sigla)
    {
        if (empty($sigla)) {
            throw new \InvalidArgumentException('A sigla não pode ser vazia');
        }
        
        $this->sigla = $sigla;
        return $this;
    }
 
}
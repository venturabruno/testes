<?php
namespace PrevisaoTempo\DataAccess\Entity;

class SiglaTempo
{
    protected $id;
    
    protected $sigla;
    
    protected $descricao;
    
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->getId();
    }

    public function setSigla($sigla)
    {
        if (empty($sigla)) {
            throw new \InvalidArgumentException('A sigla não pode ser vazia');
        }
        
        $this->sigla = $sigla;
        return $this;
    }
    
    public function  getSigla()
    {
    	return $this->sigla;
    }
    
    public function setDescricao($descricao)
    {
    	if (empty($descricao)) {
    		throw new \InvalidArgumentException('A descricao não pode ser vazia');
    	}
    
    	$this->descricao = $descricao;
    	return $this;
    }
 	
    public function getDescricao()
    {
    	return $this->descricao;
    }
}
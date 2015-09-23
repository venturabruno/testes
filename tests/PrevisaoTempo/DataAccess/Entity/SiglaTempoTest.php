<?php

use PrevisaoTempo\DataAccess\Entity\SiglaTempo;

class SiglaTempoTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($class = 'PrevisaoTempo\DataAccess\Entity\SiglaTempo'), 'Class not found: ' . $class);
    }

    public function testInstanciandoSemArgumentos()
    {
        $instance = new SiglaTempo();
        $this->assertInstanceOf('PrevisaoTempo\DataAccess\Entity\SiglaTempo', $instance);
    }

    public function testDefindoSiglaComValidacaoDados()
    {
        $intancia = new SiglaTempo();
        $sigla = 'c';
        $retorno = $intancia->setSigla($sigla);
        $this->assertEquals($intancia, $retorno, 'Valor devolvido deve ser a mesma instáncia de interface fluente');
        $this->assertAttributeEquals($sigla, 'sigla', $intancia, 'Atributo não foi definido corretamente');
    }
    
     /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage A sigla não pode ser vazia
     */
    public function testDefindoSiglaComValorVazio()
    {
        $intancia = new SiglaTempo();
        $intancia->setSigla("");
    }
    
    public function testDefindoDescricaoComValidacaoDados()
    {
    	$intancia = new SiglaTempo();
    	$descricao = 'descricao';
    	$retorno = $intancia->setDescricao($descricao);
    	$this->assertEquals($intancia, $retorno, 'Valor devolvido deve ser a mesma instáncia de interface fluente');
    	$this->assertAttributeEquals($descricao, 'descricao', $intancia, 'Atributo não foi definido corretamente');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage A descricao não pode ser vazia
     */
    public function testDefindoDescricaoComValorVazio()
    {
    	$intancia = new SiglaTempo();
    	$intancia->setDescricao("");
    }
    
    public function testDefinindoASiglaERetornaExatamenteValorODefinido()
    {
    	$intancia = new SiglaTempo();
    	$intancia->setSigla("sigla");
    	$this->assertEquals("sigla", $intancia->getSigla());
    }
    
    public function testDefinindoADescricaoERetornaExatamenteValorODefinido()
    {
    	$intancia = new SiglaTempo();
    	$intancia->setDescricao("descricao");
    	$this->assertEquals("descricao", $intancia->getDescricao());
    }
}
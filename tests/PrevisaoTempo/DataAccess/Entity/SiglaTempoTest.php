<?php

use PrevisaoTempo\DataAccess\Entity\SiglaTempo;

class SiglaTempoTest extends \PHPUnit_Framework_TestCase
{
    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($class = 'PrevisaoTempo\DataAccess\Entity\SiglaTempo'), 'Class not found: ' . $class);
    }

    public function testInstantiationWithoutArguments()
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
}
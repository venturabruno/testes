<?php
use App\DataAccess\Entity\Agenda;

class AgendaTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {}

    public function assertPreConditions()
    {
        $this->assertTrue(class_exists($class = 'App\DataAccess\Entity\Agenda'), 'Class not found: ' . $class);
    }

    public function testInstantiationWithoutArguments()
    {
        $instance = new Agenda();
        $this->assertInstanceOf('App\DataAccess\Entity\Agenda', $instance);
    }

    /**
     * @depends testInstantiationWithoutArgumentsShouldWork
     */
    public function testSetTitleWithValidData()
    {
        $instancia = new Agenda();
        $titulo = 'Título';
        $retorno = $instancia->setTitulo($titulo);
        $this->assertEquals($instancia, $retorno, 'Valor devolvido deve ser a mesma instáncia de interface fluente');
        $this->assertAttributeEquals($titulo, 'titulo', $instancia, 'Atributo não foi definido corretamente');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O título não pode ser nulo
     */
    public function testSetTitleWithInvalidDataShouldThrownAnException()
    {
        $tiuloInvalido = '';
        $instancia = new Agenda();
        $instancia->setTitulo($tiuloInvalido);
    }
    
    public function testShouldDefineAndRetrieveTheTitle()
    {
        $titulo = 'Título';
        $instancia = new Agenda();
        $instancia->setTitulo($titulo);
        $this->assertTrue(method_exists($instancia, 'getTitulo'), 'Não há nenhum método getTitulo no objeto');
        $this->assertEquals($titulo, $instancia->getTitulo());
    }

    public function tearDown()
    {}
}
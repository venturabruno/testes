<?php
namespace PrevisaoTempo\DataAccess;

use PrevisaoTempo\DataAccess\Entity\SiglaTempo;

class PDOAccessTest extends AbstractDataAccessTest
{

    public function testInserindoSiglaTempo()
    {
        $siglaTemplo = new SiglaTempo();
        $siglaTemplo->setSigla('c');
        $siglaTemplo->setDescricao('Chuva');
        $dataAccess = new PDODataAccess($this->pdo);
        $id = $dataAccess->insert($siglaTemplo);
        $this->assertEquals(1, $id);
        $singlaTempoInserida = $dataAccess->getById($id);
        $this->assertInstanceOf('PrevisaoTempo\DataAccess\Entity\SiglaTempo', $singlaTempoInserida);
        $this->assertEquals($siglaTemplo->getSigla(), $singlaTempoInserida->getSigla());
        $this->assertEquals($siglaTemplo->getDescricao(), $singlaTempoInserida->getDEscricao());
    }
    
    /**
     * @expectedException RuntimeException
     * @expectedExpcetionMessage Falha ao recuparar siglatempo
     */ 
    public function testInserindoSiglaTempoComObjetoInvalido()
    {
        $siglaTemplo = new SiglaTempo();
        $dataAccess = new PDODataAccess($this->pdo);
        $id = $dataAccess->insert($siglaTemplo);
        $this->assertNotEquals(1, $id);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testRetornoPeloIdComArgumentoInvalido()
    {
        $dataAccess = new PDODataAccess($this->pdo);
        $dataAccess->getById(null);
    }
    
    /**
     * @expectedException RuntimeException
     */
    public function testRetornoPeloIdComArgumentoZero()
    {
        $dataAccess = new PDODataAccess($this->pdo);
        $dataAccess->getById(0);
    }
}
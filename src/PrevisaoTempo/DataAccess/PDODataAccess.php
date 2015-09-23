<?php
namespace PrevisaoTempo\DataAccess;

use \PDO;
use PrevisaoTempo\DataAccess\Entity\SiglaTempo;

class PDODataAccess implements DataAccess
{

    /**
     *
     * @var \PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(SiglaTempo $siglaTempo)
    {
        $stm = $this->pdo->prepare('INSERT INTO siglatempo(
                sigla,
                descricao
            ) VALUES (
                :sigla,
                :descricao
            );');
        
        $stm->bindValue(':sigla', $siglaTempo->getSigla(), PDO::PARAM_STR);
        $stm->bindValue(':descricao', $siglaTempo->getDescricao(), PDO::PARAM_STR);
        if ($stm->execute()) {
            return (int) $this->pdo->lastInsertId();
        }
        throw new \RuntimeException('Falha ao inserir');
    }
    
    public function getById($id)
    {
        if (is_int($id)) {
            $siglatempo = null;
            $stm = $this->pdo->prepare(
                'SELECT
                    id,
                    sigla,
                    descricao
                FROM
                    siglatempo
                WHERE
                    id = :id;'
            );
            $stm->setFetchMode(PDO::FETCH_CLASS, 'PrevisaoTempo\DataAccess\Entity\SiglaTempo');
            $stm->bindValue(':id', $id, PDO::PARAM_INT);
            if ($stm->execute()) {
                $siglatempo = $stm->fetch();
                $stm->closeCursor();
            }
            if (!$siglatempo instanceof SiglaTempo) {
                throw new \RuntimeException('Falha ao recuparar siglatempo');
            }
            return $siglatempo;
        }
        throw new \InvalidArgumentException(print_r($id, true) . ' e um valor invalido');
    }
}
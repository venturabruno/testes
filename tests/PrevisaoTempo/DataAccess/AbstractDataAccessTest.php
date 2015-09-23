<?php
namespace PrevisaoTempo\DataAccess;

use \PDO;

abstract class AbstractDataAccessTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @var \PDO
     */
    protected $pdo;

    protected function setUp()
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec('
            CREATE TABLE IF NOT EXISTS siglatempo (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                sigla TEXT NOT NULL,
                descricao TEXT NOT NULL
            );
        ');
    }

    protected function tearDown()
    {
        $this->pdo->exec('DROP TABLE position');
    }
}
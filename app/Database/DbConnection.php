<?php namespace App\Database;

use PDO;

class DbConnection
{
    /**
     * Singleton instance
     *
     * @var DbConnection
     */
    private static $instance = null;

    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * DbConnection constructor.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Use a single connection instanse
     *
     * @return DbConnection
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DbConnection(
                new PDO(
                    constant('DB_HOST'),
                    constant('DB_USER'),
                    constant('DB_PASS')
                )
            );
        }

        return self::$instance;
    }

    /**
     * Get the pdo
     *
     * @return PDO
     */
    public function getPDO()
    {
        return $this->pdo;
    }
}
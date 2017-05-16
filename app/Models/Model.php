<?php namespace App\Models;

use App\Database\DbConnection;

class Model
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * Table name
     * @var string
     */
    protected $table;

    /**
     * Model attributes
     * @var array
     */
    protected $attributes;

    /**
     * AbstractModel constructor.
     */
    public function __construct()
    {
        $this->db = DbConnection::getInstance()->getPDO();
    }

    /**
     * Set a model attribute
     *
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * Get a model attribute
     *
     * @param $key
     */
    public function getAttribute($key)
    {
        $this->attributes[$key];
    }

    /**
     * Instert Model
     *
     * @return bool
     */
    public function insert()
    {
        // get attribute keys
        $attributes_keys = $this->getImplodedAttributeKeys();

        // constract PDO placeholders
        $pdo_placeholders = $this->generatePDOPlaceholders();

        // get values to be passed in the PDO
        $attributes_values = array_values($this->attributes);

        return $this->db->prepare('INSERT INTO ' . $this->table .
            '(' . $attributes_keys . ') VALUES (' . $pdo_placeholders .')')
            ->execute($attributes_values);
    }

    public function find()
    {

        $where_clause = $this->generateWhereClause();

        // get values to be passed in the PDO
        $attributes_values = array_values($this->attributes);

        $statement = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $where_clause );
        $statement->execute($attributes_values);
        return $statement->fetch();
    }

    /**
     * Get imploded attribute keys
     *
     * @return string
     */
    protected function getImplodedAttributeKeys()
    {
        // get attribute keys
        return implode(', ', array_keys($this->attributes));
    }

    /**
     * Generate where clause based on the attributes that are set
     *
     * @return string
     */
    public function generateWhereClause()
    {
        $where_clause = '';
        $i = 1;
        foreach ($this->attributes as $key => $value) {
            $where_clause .= $key . ' = ? ';
            if ($i<count($this->attributes)) {
                $where_clause .= 'and ';
            }
            $i++;
        }

        return $where_clause;
    }

    /**
     * Generate PDO placeholders based on the atributtes that are set
     *
     * @return string
     */
    protected function generatePDOPlaceholders()
    {
        // constract PDO placeholders
        $pdo_placeholders = '';
        for ($i=1; $i < count($this->attributes); $i++) {
            $pdo_placeholders .= '?, ';
        }
        $pdo_placeholders .= '?';

        return $pdo_placeholders;
    }
}
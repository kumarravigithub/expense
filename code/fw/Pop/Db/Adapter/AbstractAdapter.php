<?php

namespace Pop\Db\Adapter;

abstract class AbstractAdapter
{

    /**
     * Database results
     * @var resource
     */
    protected $result;

    /**
     * Default database connection
     * @var resource
     */
    protected $connection;

    /**
     * Database tables
     * @var array
     */
    protected $tables = array();

    /**
     * Constructor
     *
     * Instantiate the database adapter object.
     *
     * @param  array $options
     * @return \Pop\Db\Adapter\AbstractAdapter
     */
    abstract public function __construct(array $options);

    /**
     * Throw an exception upon a database error.
     *
     * @throws Exception
     * @return void
     */
    abstract public function showError();

    /**
     * Execute the SQL query and create a result resource, or display the SQL error.
     *
     * @param  string $sql
     * @return void
     */
    abstract public function query($sql);

    /**
     * Return the results array from the results resource.
     *
     * @throws Exception
     * @return array
     */
    abstract public function fetch();

    /**
     * Return the escaped string value.
     *
     * @param  string $value
     * @return string
     */
    abstract public function escape($value);

    /**
     * Return the auto-increment ID of the last query.
     *
     * @return int
     */
    abstract public function lastId();

    /**
     * Return the number of rows in the result.
     *
     * @throws Exception
     * @return int
     */
    abstract public function numRows();

    /**
     * Return the number of fields in the result.
     *
     * @throws Exception
     * @return int
     */
    abstract public function numFields();

    /**
     * Get the result resource
     *
     * @return resource
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get the connection resource
     *
     * @return resource
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Get an array of the tables of the database.
     *
     * @return array
     */
    public function getTables()
    {
        if (count($this->tables) == 0) {
            $this->tables = $this->loadTables();
        }

        return $this->tables;
    }

    /**
     * Return the database version.
     *
     * @return string
     */
    abstract public function version();

    /**
     * Load the tables of the database into an array.
     *
     * @return array
     */
    abstract protected function loadTables();

}

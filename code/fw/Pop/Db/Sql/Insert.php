<?php

namespace Pop\Db\Sql;


class Insert extends AbstractSql
{

    /**
     * Render the INSERT statement
     *
     * @return string
     */
    public function render()
    {
        // Start building the INSERT statement
        $sql = 'INSERT INTO ' . $this->sql->quoteId($this->sql->getTable()) . ' ';
        $columns = array();
        $values = array();

        $paramCount = 1;
        $dbType = $this->sql->getDbType();

        foreach ($this->columns as $column => $value) {
            $colValue = (strpos($column, '.') !== false) ?
                substr($column, (strpos($column, '.') + 1)) : $column;

            // Check for named parameters
            if ((':' . $colValue == substr($value, 0, strlen(':' . $colValue))) &&
                ($dbType !== \Pop\Db\Sql::SQLITE) &&
                ($dbType !== \Pop\Db\Sql::ORACLE)) {
                if (($dbType == \Pop\Db\Sql::MYSQL) || ($dbType == \Pop\Db\Sql::SQLSRV)) {
                    $value = '?';
                } else if ($dbType == \Pop\Db\Sql::PGSQL) {
                    $value = '$' . $paramCount;
                    $paramCount++;
                }
            }
            $columns[] = $this->sql->quoteId($column);
            $values[] = (null === $value) ? 'NULL' : $this->sql->quote($value);
        }

        $sql .= '(' . implode(', ', $columns) . ') VALUES ';
        $sql .= '(' . implode(', ', $values) . ')';

        return $sql;
    }

}

<?php

namespace Pop\Db\Sql;


class Delete extends AbstractSql
{

    /**
     * WHERE predicate object
     * @var \Pop\Db\Sql\Predicate
     */
    protected $where = null;

    /**
     * Set the WHERE clause
     *
     * @return \Pop\Db\Sql\Predicate
     */
    public function where()
    {
        if (null === $this->where) {
            $this->where = new Predicate($this->sql);
        }

        return $this->where;
    }

    /**
     * Render the DELETE statement
     *
     * @return string
     */
    public function render()
    {
        // Start building the DELETE statement
        $sql = 'DELETE FROM ' . $this->sql->quoteId($this->sql->getTable());

        // Build any WHERE clauses
        if (null !== $this->where) {
            $sql .= ' WHERE ' . $this->where;
        }

        // Build any ORDER BY clause
        if (null !== $this->orderBy) {
            $sql .= ' ORDER BY ' . $this->orderBy;
        }

        // Build any LIMIT clause
        if (null !== $this->limit) {
            $sql .= ' LIMIT ' . (int)$this->limit;
        }

        return $sql;
    }

}

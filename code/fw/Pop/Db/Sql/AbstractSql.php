<?php


/**
 * @namespace
 */
namespace Pop\Db\Sql;


abstract class AbstractSql
{

    /**
     * SQL columns
     * @var array
     */
    protected $columns = array();

    /**
     * SQL object
     * @var \Pop\Db\Sql
     */
    protected $sql = null;

    /**
     * ORDER BY value
     * @var string
     */
    protected $orderBy = null;

    /**
     * LIMIT value
     * @var mixed
     */
    protected $limit = null;

    /**
     * OFFSET value
     * @var int
     */
    protected $offset = null;

    /**
     * Constructor
     *
     * Instantiate the SQL object.
     *
     * @param  \Pop\Db\Sql $sql
     * @param  mixed       $columns
     * @return \Pop\Db\Sql\AbstractSql
     */
    public function __construct(\Pop\Db\Sql $sql, $columns = null)
    {
        $this->sql = $sql;
        if (null !== $columns) {
            if (!is_array($columns)) {
                $columns = array($columns);
            }
            $this->columns = $columns;
        }
    }

    /**
     * Set the ORDER BY value
     *
     * @param mixed  $by
     * @param string $order
     * @return \Pop\Db\Sql\AbstractSql
     */
    public function orderBy($by, $order = 'ASC')
    {
        $byColumns = null;

        if (is_array($by)) {
            $quotedAry = array();
            foreach ($by as $value) {
                $quotedAry[] = $this->sql->quoteId(trim($value));
            }
            $byColumns = implode(', ', $quotedAry);
        } else if (strpos($by, ',') !== false) {
            $ary = explode(',' , $by);
            $quotedAry = array();
            foreach ($ary as $value) {
                $quotedAry[] = $this->sql->quoteId(trim($value));
            }
            $byColumns = implode(', ', $quotedAry);
        } else {
            $byColumns = $this->sql->quoteId(trim($by));
        }

        $this->orderBy .= ((null !== $this->orderBy) ? ', ' : '') . $byColumns;
        $order = strtoupper($order);

        if (strpos($order, 'RAND') !== false) {
            $this->orderBy = ($this->sql->getDbType() == \Pop\Db\Sql::SQLITE) ? ' RANDOM()' : ' RAND()';
        } else if (($order == 'ASC') || ($order == 'DESC')) {
            $this->orderBy .= ' ' . $order;
        }

        return $this;
    }

    /**
     * Set the LIMIT value
     *
     * @param mixed $limit
     * @return \Pop\Db\Sql\AbstractSql
     */
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Set the OFFSET value
     *
     * @param  int $offset
     * @return \Pop\Db\Sql\AbstractSql
     */
    public function offset($offset)
    {
        $this->offset = (int)$offset;
        return $this;
    }

    /**
     * Abstract render method
     *
     * @return string
     */
    abstract public function render();

}

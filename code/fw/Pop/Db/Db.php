<?php


namespace Pop\Db;

class Db {

    protected $adapter = null;

    /**
     * Constructor
     *
     * Instantiate the database connection object.
     *
     * @param  string $type
     * @param  array  $options
     * @param  string $prefix
     * @throws Exception
     * @return \Pop\Db\Db
     */
    public function __construct($type, array $options, $prefix = 'Pop\Db\Adapter\\') {
        $class = $prefix . ucfirst(strtolower($type));

        if (!class_exists($class)) {
            throw new Exception('Error: That database adapter class does not exist.');
        }

        $this->adapter = new $class($options);
    }

    /**
     * Determine whether or not an instance of the DB object exists already,
     * and instantiate the object if it doesn't exist.
     *
     * @param  string $type
     * @param  array  $options
     * @param  string $prefix
     * @return \Pop\Db\Db
     */
    public static function factory($type, array $options, $prefix = 'Pop\Db\Adapter\\') {
        return new self($type, $options, $prefix);
    }

    public static function connect($adaptor = 'Mysqli', $creds = '') {
        if ($creds == '') {
            require_once __DIR__ . '/dbconfig.php';
        }
        $db = Db::factory($adaptor, $creds);
        return $db;
    }

    /**
     * Get the database adapter.
     *
     * @return mixed
     */
    public function adapter() {
        return $this->adapter;
    }

    /**
     * Get the database adapter type.
     *
     * @return string
     */
    public function getAdapterType() {
        $type = null;

        $class = get_class($this->adapter);

        if (stripos($class, 'Pdo') !== false) {
            $type = 'Pdo\\' . ucfirst($this->adapter->getDbtype());
        } else {
            $type = ucfirst(str_replace('Pop\Db\Adapter\\', '', $class));
        }

        return $type;
    }

}
<?php

namespace Pop\Auth;

class Resource
{

    /**
     * Resource name
     * @var string
     */
    protected $name = null;

    /**
     * Constructor
     *
     * Instantiate the resource object
     *
     * @param  string $name
     * @return \Pop\Auth\Resource
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Static method to instantiate the resource object and return itself
     * to facilitate chaining methods together.
     *
     * @param  string $name
     * @return \Pop\Auth\Resource
     */
    public static function factory($name)
    {
        return new self($name);
    }

    /**
     * Method to get the role name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Method to return the string value of the name of the role
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

}

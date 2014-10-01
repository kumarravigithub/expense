<?php

namespace Pop\Auth\Adapter;


interface AdapterInterface
{

    /**
     * Method to authenticate the user
     *
     * @param  string $username
     * @param  string $password
     * @param  int    $encryption
     * @param  array  $options
     * @return boolean
     */
    public function authenticate($username, $password, $encryption, $options);

    /**
     * Method to the user data array
     *
     * @return array
     */
    public function getUser();

}

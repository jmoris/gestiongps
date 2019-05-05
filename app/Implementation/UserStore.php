<?php

namespace App\Implementation;

class UserStore {

	protected static $instance;
	private $email;
	private $password;
	private $user;
	private $connection;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function store($email, $password, $user)
    {
    	$this->email = $email;
    	$this->password = $email;
    	$this->user = $user;
    	$this->connection = true;
    }

    public function isConnected()
    {
    	return $this->connection;
    }

    public function logOut()
    {
    	$this->email = null;
    	$this->password = null;
    	$this->user = null;
    	$this->connection= false;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * singleton via the `new` operator.
     */
    protected __construct()
    {
        // your constructor logic here.
    }

    /**
     * Private clone method to prevent cloning of the instance of the singleton instance.
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the singleton instance.
     */
    private function __wakeup()
    {
    }


}



<?php

namespace App\Implementation;

class UserStore {

	protected static $instance;

	

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function store($email, $password, $user)
    {
    	\Session::put('email', $email);
    	\Session::put('password', $password);
    	\Session::put('user', $user);
    	\Session::put('connected', true);
    }

    public function isConnected()
    {
    	return \Session::get('connected');
    }

    public function logOut()
    {
    	\Session::forget('email');
    	\Session::forget('password');
    	\Session::forget('user');
    	\Session::put('connected', false);
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * singleton via the `new` operator.
     */
    protected function __construct()
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



<?php

class Config
{
    private $setting = [];
    private static $instance;

    private function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    public function set($key, $value)
    {
        $this->setting[$key] = $value;
    }

    public function get($key)
    {
        return $this->setting[$key];
    }
}


$config = Config::getInstance();
$config->set('name', 'saeed');

$otheConfig = Config::getInstance();
echo $otheConfig->get('name');
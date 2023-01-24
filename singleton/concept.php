<?php


class Singleton
{
    private static $instances = [];


    protected function __construct() { }


    protected function __clone() { }


    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function someBusinessLogic()
    {
        // ...
    }
}


function clientCode()
{
    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    print_r($s1);
    print_r($s2);
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }
}

clientCode();
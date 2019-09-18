<?php
class DB
{

    private static $CI = null;
    private static $databases = [];

    // Make constructor private, so nobody can call "new Class".
    private function __construct() {}

    // Make clone magic method private, so nobody can clone instance.
    private function __clone() {}

    // Make sleep magic method private, so nobody can serialize instance.
    private function __sleep() {}

    // Make wakeup magic method private, so nobody can unserialize instance.
    private function __wakeup() {}

    public static function use($database)
    {
        if (!isset(self::$CI))
        {
            self::$CI =& get_instance();
        }

        if (!isset(self::$databases[$database]))
        {
            self::$databases[$database] = self::$CI->load->database($database, true);
        }

        return self::$databases[$database];
    }

    public static function queries()
    {
        $executedQueries = [];

        foreach(self::$databases as $db => $obj)
        {
            $executedQueries[$db] = $obj->queries;
        }

        return $executedQueries;
    }

}
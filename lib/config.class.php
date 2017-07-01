<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 23.06.2017
 * Time: 10:05
 */
class Config{
    protected static $setting = array();
    // protected static $setting = [];

   public static function get($key) {
       return isset(self::$setting) ? self::$setting[$key] : null;
   }

public  static function set($key, $value) {
       self::$setting[$key] = $value;
}
}

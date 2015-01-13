<?php
defined('__FRAMEWORK3IL__') or die('Acces interdit');
class Singleton {
private static $_instance = null;
private function __construct(){
}
public static function getInstance() {
if(is_null(self::$_instance)){
self::$_instance = new Singleton();
}
return self::$_instance;
}
}
 

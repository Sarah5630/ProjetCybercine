<?php

namespace Projet\Models;

use PDO;
use PDOException;
use Exception;

abstract class Manager
{
  // Singleton  
  private static $db = null;

  // database connexion method
  public static function manager()
  {
    if (isset(self::$db)) {
      return self::$db;
    } else {
      if (isset($_ENV['DB_PORT']) && !empty($_ENV['DB_PORT'])){
        $port= ":".$_ENV['DB_PORT'];
      }else{
        $port = "";
      }
      try {
        self::$db = new PDO(
          "mysql:dbname=" . $_ENV['DB_NAME'] . "; host=" . $_ENV['DB_HOST'] . $port . "; charset=utf8",
          $_ENV['DB_LOGIN'],
          $_ENV['DB_PASSWORD']
        );

        // using PDO constants to manage errors" 
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$db;
      } catch (PDOException $e) {

        // throw the exception to the caller
        throw new Exception($e->getMessage());
      }
    }
  }
}

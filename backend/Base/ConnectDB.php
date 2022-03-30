<?php 

namespace System;

use PDO;

class ConnectDB{

    private static $con = null;

    public static function con(){
       
        if(!self::$con){
            
            $host = CONFIG['database']['host'] ?? 'localhost';
            $dbname = CONFIG['database']['dbname'];

            $user = CONFIG['database']['user'];
            $pass = CONFIG['database']['pass'];

            $dns = 'firebird:dbname='.$dbname.';host='.$host.';charset=utf8';
            self::$con = new PDO($dns, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); 
        }
        return self::$con;
    }

}
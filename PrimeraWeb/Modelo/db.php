<?php 

class DB{

    private static $url = "localhost:3306";
    private static $user = "root";
    private static $pass = "";
    private static $dbName = "mi_tienda";
    private static $conn = null;

    public static function getConn(){
        if (self::$conn == null) {
            try {
                $conn = new PDO("mysql:host=".self::$url.";dbname=".self::$dbName."",self::$user,self::$pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\Throwable $th) {
                echo "Error al conectar con la base de datos: ".$th->getMessage();
            }
            
        }
        return self::$conn;
    }
}


?>

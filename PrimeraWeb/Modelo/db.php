<?php 

class DB{

    private static $url = "localhost:3306";
    private static $user = "root";
    private static $pass = "";
    private static $dbName = "mi_tienda";
    private static $conn = null;

    public static function getConn(){
        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=".self::$url.";dbname=".self::$dbName,self::$user,self::$pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error al conectar con la base de datos: ".$e->getMessage();
            }
            
        }
        return self::$conn;
    }
}


?>

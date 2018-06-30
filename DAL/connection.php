<?php
// error_reporting(E_USER_ERROR); // disable user errors

class Database {
    private $connection;
    private static $_instance;
    private $host = 'localhost';
    private $username = 'amir';
    private $password = 'password';
    private $_db = 'mydb';

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->_db);

        // connection error handling - 
        // will write in a log file & output 'General Error' to the client
        if(!($this->connection)){  

            $file = 'log.txt';   
			$current = file_get_contents($file);
			$time = date("Y-m-d H:i:s");
			$current .= $time . ' -> DB Error = ' . mysqli_connect_error() . "\n";			
            file_put_contents($file, $current);
            
			die( 'General Error At ' . $time ); // user error message
        }
    }

    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        unset($connection);
    }

}

function connectToDB($sql){
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $result = mysqli_query($connection, $sql);
    return $result;
}

?>

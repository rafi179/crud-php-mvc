<?php
// membuat kelas untuk database wrapper
class Database{
    // config database
    private $db_host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $dbh; // databse handler;
    private $stmt;
    // constructor
    public function __construct(){
        // data source name
        $dsn = 'mysql:host=' .$this->db_host. ';dbname='.$this->db_name;
        // option
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // menghubungkan ke database
        try{
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    // query
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    // binding
    public function bind($param, $value, $type = null){
        // cek type value yang dimasukan
        if(is_null($type)){
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        // binding value
        $this->stmt->bindValue($param, $value, $type);
    }
    // eksekusi query
    public function execute(){
        $this->stmt->execute();
    }
    // ambil banyak data
    public function resultAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // ambil satu data
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // rowCount
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
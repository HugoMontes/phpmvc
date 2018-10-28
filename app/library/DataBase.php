<?php
// CLASE PARA CONECTARSE A LA BASE DE DATOS
// Y EJECUTAR CONSULTAS PDO
class DataBase{
    
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $name = DB_NAME;
    
    private $dbh;  // Data Base Handler
    private $stmt; // Statement (ejecutar consulta)
    private $error;

    public function __construct(){
        // CONFIGURAR LA CONEXION
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->name;
        // OPCIONES DE PDO
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
        // CREAR UNA INSTANCIA DE PDO
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            // DEFINIR JUEGO DE CARACTERES
            $this->dbh->exec('set names utf8');
        }catch(PDOException $ex){
            // MOSTRAR ERROR DE CONEXION
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }

    // PREPARAR LA CONSULTA A EJECUTAR
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    // VINCULA CONSULTA CON VIND
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // FUNCION PARA EJECUTAR LA CONSULTA
    public function execute(){
        return $this->stmt->execute();
    }

    // OBTENER LOS REGISTROS DE LA CONSULTA
    public function rows(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // OBTENER UN REGISTRO DE LA CONSULTA
    public function row(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // OBTENER CANTIDAD DE REGISTROS
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
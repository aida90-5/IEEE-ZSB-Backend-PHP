<?php
class Database{
    public $connection;
public function __construct($config,$username='root',$password='aida')){
$dsn = 'mysql:'. http_build_query($config,'',';');
       $this ->connection = new PDO($dsn,'root','aida',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        ]);
    }
}
puplic function query($query){

    $statment = this->connection->prepare($query);
    $statment -> execute();
    return $statment ;

}
}
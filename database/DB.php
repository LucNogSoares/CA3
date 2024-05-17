<?php 

class DB
{

  public $models;
  public $table_name;
  public $model;
  public $whereRaw;
  public $sql;
  public static $conn;

  public function __construct($modelsFile = 'models.php')
  {
    $this->models = require __DIR__.'/\/'.$modelsFile;
    return $this;
  }

  public static function connect($credentialsFile = 'credentials.php') 
  {
    $credentials = require __DIR__.'/\/'.$credentialsFile;
    $server = $credentials['server'];
    $user = $credentials['user'];
    $password = $credentials['password'];
    $database = $credentials['database'];
  
    $conn = mysqli_connect($server,$user,$password);
    mysqli_select_db($conn, $database);

    self::$conn = $conn;

    return $conn;
  }

  public function table($table_name) {
    $this->table_name = $table_name;
    $this->model = $this->models[$table_name];
    return $this;
  }

  public function insert($values)
  {
    $select = '';
    $values = '';
    $lastIndex = count($this->model) - 1;
    foreach($this->model as $i => $column){
      $separator = $i == $lastIndex ? "" : ",";
      $select .= "`$column`$separator";
      $value = $values[$column] ? "'$values[$column]'" : "NULL";
      $values .= $value.$separator;
    }

    $this->sql = "INSERT INTO `{$this->table_name}` ($select) VALUES ($values)";
    return $this->execQuery();
  }

  public function where($whereRaw)
  {
    $this->whereRaw = $whereRaw;
    return $this;
  }

  public function update($values)
  {
    $setters = '';
    $lastIndex = count($this->model) - 1;
    foreach($this->model as $i => $column){
      $separator = $i == $lastIndex ? "" : ",";
      $value = $values[$column] ? "'$values[$column]'" : "NULL";
      $setters .= "`$column` = $value$separator";
    }

    $this->sql = "UPDATE `{$this->table_name}` SET $setters WHERE {$this->whereRaw}";

    return $this->execQuery();
  }

  public function patch($values)
  {
    $setters = '';
    $lastIndex = count(array_keys($values)) - 1;
    foreach(array_keys($values) as $i => $column){
      $separator = $i == $lastIndex ? "" : ",";
      $value = $values[$column] ? "'$values[$column]'" : "NULL";
      $setters .= "`$column` = $value$separator";
    }

    $this->sql = "UPDATE `{$this->table_name}` SET $setters WHERE {$this->whereRaw}";

    return $this->execQuery();
  }

  public function delete()
  {
    $this->sql = "DELETE FROM `{$this->table_name}` WHERE {$this->whereRaw}";

    return $this->execQuery();
  }
  
  protected function execQuery()
  {
    return mysqli_query(self::$conn, $this->sql);
  }

  public static function close()
  {
    try {
      mysqli_close(self::$conn);
      return true;
    } catch (\Throwable $th) {
      return false;
    } 
  }

}


?>
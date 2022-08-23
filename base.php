<?php
session_start();

class DB{
  protected $dsn="mysql:host=localhost;charset=utf8;dbname=test";
  protected $user='root';
  protected $pw='';
  public $table;
  protected $pdo;

  public function __construct($table)
  {
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
  }

  public function all(...$arg)
  {
    $sql="SELECT * FROM $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
        $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($id)
  {
    $sql="SELECT * FROM $this->table ";
      if(is_array($id)){
        foreach($id as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
      }else{
        $sql .=" WHERE `id` = '$id' ";
      }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  public function del($id)
  {
    $sql="DELETE FROM $this->table ";
      if(is_array($id)){
        foreach($id as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
      }else{
        $sql .=" WHERE `id` = '$id' ";
      }
    return $this->pdo->exec($sql);
  }

  public function save($array)
  {
    if(isset($array['id'])){
      foreach($array as $key => $value){
        if($key!='id'){
          $tmp[]="`$key`='$value'";
        }
      }
      $sql="UPDATE $this->table SET ".join(',',$tmp)." WHERE `id` = '{$array['id']}'";
    }else{
      $sql="INSERT INTO $this->table (`".join("`,`",array_keys($array))."`) values('".join("','",$array)."')";
    }
    return $this->pdo->exec($sql);
  }

  public function math($math,$col,...$arg)
  {
    $sql="SELECT $math($col) FROM $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
        $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }
  
  public function q($sql)
  {
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
}

function to($url)
{
  header("location:".$url);
}

function dd($array)
{
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

$User=new DB('user');

?>
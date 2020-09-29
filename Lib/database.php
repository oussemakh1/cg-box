<?php

include '../Config/config.php';


class Database
{

  //Predfined Database info in the config folder

  public  $host = DB_HOST;
  public $userName = DB_USERNAME;
  public  $password =  DB_PASSWORD;
  public  $dbName= DB_NAME;

  public $link;
  public $error;

  //Execute the connector to database function auto
  public function __construct()
  {

     $this->connect2DB();

  }

  //Database connector function
  private function connect2DB()
  {

    try{
          $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
          $this->link = new PDO($dsn,$this->userName,$this->password);
          $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }
    catch(Exception $e)
    {
      $this->error = "CONNECTION FAILED! " . $e->getMessage();
      return false;
    }

  }

//Select query from database  function
public function select($query,array $cols)
{
          $stmt = $this->link->prepare($query);
          $stmt->execute($cols);

          if($stmt->rowCount() > 0){
              return $stmt;
          }else{
              return false;
          }
}


//Insert data into database
public function insert($query,array $cols)
{

          $insert_row = $this->link->prepare($query);
          $insert_row->execute($cols);
          if($insert_row){
              return $insert_row;
          }else{
              return false;
          }
}

//Update data from database
public function update($query,array $cols)
{
          $update_row = $this->link->prepare($query);
          $update_row->execute($cols);
          if($update_row){
              return $update_row;
          }else{
              return false;
          }
}


//Delete data from database
public function delete($query,array $cols)
{

          $delete_row = $this->link->prepare($query);
          $delete_row->execute($cols);

          if($delete_row){
              return $delete_row;
          }else{
              return false;
          }
}

//Get simple query from database
public function query($query)
{
          return $this->link->query($query);
}




}

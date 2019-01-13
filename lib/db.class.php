<?php

class DB {

    protected $connection;

  /**
   * DB constructor.
   * @param $host
   * @param $name
   * @param $password
   * @param $db_name
   * @throws Exception
   */
    public function __construct($host,$name,$password,$db_name){
      $this->connection = new mysqli($host,$name,$password,$db_name);
      if(mysqli_connect_error()){
        throw new Exception('can not connect to database');
      }
    }

  /**
   * @param $sql
   * @return array|bool
   * @throws Exception
   */
    public function query($sql){
      if( !$this->connection ){
        return false;
      }

      $result = $this->connection->query($sql);

      if( mysqli_error($this->connection) ){
        throw new Exception(mysqli_error($this->connection));
      }

      if( is_bool($result) ){
        return $result;
      }

      $data = array();

      while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }

      return $data;

    }

  /**
   * @param $str
   * @return string
   */
    public function escape($str){
      return mysqli_escape_string($this->connection,$str);
    }


}
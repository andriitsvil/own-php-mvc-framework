<?php

class User extends Model{
  /**
   * @param $login
   * @return bool
   */
  public function getByLogin($login){
    $login = $this->db->escape($login);
    $sql = "SELECT * FROM users WHERE login = '{$login}' LIMIT 1";
    $result = $this->db->query($sql);
    if( isset($result[0]) ){
      return $result[0];
    }
    return false;
  }
}
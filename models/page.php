<?php

class Page extends Model{

  /**
   * @param bool $only_published
   * @return mixed
   */
  public function getList($only_published = false){
    $sql = "SELECT * FROM pages WHERE 1";

    if($only_published){
      $sql .= "AND is_published = 1";
    }

    return $this->db->query($sql);
  }


  public function getByAlias($alias){
    $alias = $this->db->escape($alias);

    $sql = "SELECT * FROM pages WHERE alias = '{$alias}' LIMIT 1";

    $result = $this->db->query($sql);

    return isset($result[0]) ? $result[0] : null ;
  }
}
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

  /**
   * @param $alias
   * @return |null
   */
  public function getByAlias($alias){
    $alias = $this->db->escape($alias);

    $sql = "SELECT * FROM pages WHERE alias = '{$alias}' LIMIT 1";

    $result = $this->db->query($sql);

    return isset($result[0]) ? $result[0] : null ;
  }

  /**
   * @param $id
   * @return |null
   */
  public function getById($id){
    $id = (int)$id;

    $sql = "SELECT * FROM pages WHERE id = '{$id}' LIMIT 1";

    $result = $this->db->query($sql);

    return isset($result[0]) ? $result[0] : null ;
  }

  /**
   * @param $data
   * @param null $id
   * @return bool
   */
  public function save($data, $id = null){
    if( !isset($data['alias']) || !isset($data['title']) || !isset($data['content'])){
      return false;
    }
    $id = (int)$id;
    $alias = $this->db->escape($data['alias']);
    $title = $this->db->escape($data['title']);
    $content = $this->db->escape($data['content']);
    $is_published = isset($data['is_published']) ? 1 : 0 ;

    if( !$id){ //add new record
      $sql = "
        INSERT INTO pages
          SET alias = '{$alias}',
              title = '{$title}',
              content = '{$content}',
              is_published = '{$is_published}'
          
      ";
    } else{  //update existing record
      $sql = "
        UPDATE pages
          SET alias = '{$alias}',
              title = '{$title}',
              content = '{$content}',
              is_published = '{$is_published}'
          WHERE id = '{$id}'
      ";
    }

    return $this->db->query($sql);

  }

  /**
   * @param $id
   * @return mixed
   */
  public function delete($id){
    $id = (int)$id;
    $sql = "DELETE FROM pages WHERE id = {$id}";
    return $this->db->query($sql);
  }
}
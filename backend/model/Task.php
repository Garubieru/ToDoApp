<?php

class Task
{
  private $id;
  private $id_status;
  private $description;
  private $date_time;

  public function __set($attr, $value)
  {
    $this->$attr = $value;
  }

  public function __get($attr)
  {
    return $this->$attr;
  }
}

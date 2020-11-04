<?php

// CRUD
class TaskServices
{
  private $connection;
  private $task;

  public function __construct(Connection $connection, Task $task)
  {
    $this->connection = $connection->connect();
    $this->task = $task;
  }

  public function create()
  {
    $query = "INSERT INTO tasks_tb(description) VALUES(:description);";
    $stmt = $this->connection->prepare($query);

    $stmt->bindValue(':description', $this->task->__get('description'));
    $stmt->execute();
  }

  public function recover()
  {
    $query = 'SELECT t.id, t.description, s.status from tasks_tb as t LEFT JOIN status_tb as s ON(t.id_status = s.id)';
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $tasks;
  }

  public function update($action)
  {
    if ($action === 'description') {
      $query = "UPDATE tasks_tb as t SET t.description = :description WHERE id = :id";

      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':description', $this->task->__get('description'));
      $stmt->bindValue(':id', $this->task->__get('id'));

      $stmt->execute();
    } else if ($action === 'status') {
      $query = "UPDATE tasks_tb as t SET t.id_status = :status WHERE id = :id";

      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':status', $this->task->__get('id_status'));
      $stmt->bindValue(':id', $this->task->__get('id'));
      $stmt->execute();
    }
  }

  public function delete()
  {
    $query = "DELETE FROM tasks_tb WHERE id = :id";

    $stmt = $this->connection->prepare($query);
    $stmt->bindValue(':id', $this->task->__get('id'));

    $stmt->execute();
  }
}

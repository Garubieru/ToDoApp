<?php

require_once '../ToDoApp/backend/model/Task.php';
require_once '../services/TaskServices.php';
require_once '../database/connection.php';


$action = isset($_GET['action']) ? $_GET['action'] : $action;


if ($action === 'insert') {
  $task = new Task();
  $connection = new Connection();

  $task->__set('description', $_POST['description']);

  $taskService = new TaskServices($connection, $task);

  $taskService->create();

  header('Location: ../../views/new-task.php?status=inserted');
} else if ($action === 'recover') {
  $task = new Task();
  $connection = new Connection();

  $taskService = new TaskServices($connection, $task);
  $tasks = $taskService->recover();
} else if ($action === 'updateDesc') {
  session_start();
  $task = new Task();
  $connection = new Connection();

  $task->__set('id', $_POST['id']);
  $task->__set('description', $_POST['new-description']);

  $taskService = new TaskServices($connection, $task);

  $taskService->update('description');

  header('Location: ../../views/' . $_SESSION['came_from']);
} else if ($action === 'updateStatus') {
  session_start();
  $task = new Task();
  $connection = new Connection();

  $task->__set('id', $_GET['id']);
  $task->__set('id_status', 2);

  $taskService = new TaskServices($connection, $task);

  $taskService->update('status');

  header('Location: ../../views/' . $_SESSION['came_from']);
} else if ($action === 'remove') {
  session_start();
  $task = new Task();
  $connection = new Connection();

  $task->__set('id', $_GET['id']);

  $taskService = new TaskServices($connection, $task);

  $taskService->delete();
  header('Location: ../../views/' . $_SESSION['came_from']);
}

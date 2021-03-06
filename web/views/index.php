<?php
session_start();
$_SESSION['came_from'] = 'index.php';

$action = 'recover';
require '../controller/TaskController.php';

$pendingTasks = array();
foreach ($tasks as $task) {
  if ($task->status === 'pending') {
    array_push($pendingTasks, $task);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ToDo | Pending Tasks</title>
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/partials/page-landing.css" />
  <link rel="stylesheet" href="../styles/partials/header.css" />
  <link rel="stylesheet" href="../styles/partials/nav.css" />
  <link rel="stylesheet" href="../styles/partials/tasks.css" />
  <link rel="stylesheet" href="../styles/partials/form.css" />
  <link rel="stylesheet" href="../styles/partials/alert.css">
  <script src="https://kit.fontawesome.com/7c4c74c96f.js" crossorigin="anonymous"></script>


  <script src="../scripts/actions.js"></script>
</head>

<body>
  <div id="page-landing">
    <div class="page-content">
      <header>
        <div class="container">
          <div class="header-logo">
            <i class="fas fa-check-circle fa-2x"></i>
            <h1>ToDo List</h1>
          </div>
        </div>
      </header>

      <main>
        <nav class="nav-bar">
          <ul class="nav-list">
            <li class="nav-item active">
              <a href="" class="nav-link">Pending tasks</a>
            </li>
            <li class="nav-item">
              <a href="./new-task.php" class="nav-link">New task</a>
            </li>
            <li class="nav-item">
              <a href="./all-task.php" class="nav-link">All tasks</a>
            </li>
          </ul>
        </nav>

        <div class="task-card">
          <h2><i class="fas fa-exclamation-circle"></i> Pending tasks</h2>

          <?if (empty($pendingTasks)) {?>
          <div class="no-tasks">
            <i class="fas fa-laugh-beam fa-5x smile"></i>
            <p>Great! There is no pending tasks.</p>
          </div>
          <? } ?>

          <? foreach($pendingTasks as $task) { ?>
          <div class="task-item" id='task-<?= $task->id ?>'>
            <div class="task-info">
              <div class="task-warning <?= $task->status ?>"></div>

              <div class="task-description">
                <h3 class='task-title'><?= $task->description ?></h3>
              </div>

              <div class="task-actions">
                <i onclick="remove(<?= $task->id ?>)" class="fas fa-minus-square icon remove"></i>
                <i onclick="edit(<?= $task->id ?>)" class="fas fa-pen-square icon edit"></i>
                <i onclick="complete(<?= $task->id ?>)" class="fas fa-check-square icon confirm"></i>
              </div>
            </div>
          </div>
          <? } ?>
        </div>
      </main>
    </div>
  </div>
</body>

</html>
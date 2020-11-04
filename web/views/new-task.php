<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ToDo | New task</title>
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


</head>

<body>
  <? if (isset($_GET['status']) && $_GET['status'] === 'inserted') { ?>
  <div class="overlay">
    <div class="alert">
      <h1>Task inserted!</h1>
      <button class='btn btn-new' onclick="window.location.href = './new-task.php';">Go back</button>
    </div>
  </div>
  <? } ?>

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
            <li class="nav-item">
              <a href="./index.php" class="nav-link">Pending tasks</a>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link">New task</a>
            </li>
            <li class="nav-item">
              <a href="./all-task.php" class="nav-link">All tasks</a>
            </li>
          </ul>
        </nav>

        <div class="task-card">
          <h2><i class="fas fa-plus"></i> New task</h2>

          <form action="../controller/TaskController.php?action=insert" method="POST" id="task-form">
            <div class="input-task-block">
              <label for="description">Task description: </label>
              <input type="text" name="description" id="description" placeholder="Description" />
            </div>
          </form>

          <button class="btn btn-new" type="submit" form="task-form">Add</button>
        </div>
      </main>
    </div>
  </div>
</body>

</html>
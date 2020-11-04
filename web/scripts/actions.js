function edit(id) {
  const taskItem = document.getElementById(`task-${id}`);
  const taskDescription = taskItem.querySelector('.task-description');

  const taskTitle = taskDescription.querySelector('.task-title');

  const form = document.createElement('form');
  form.action = `../controller/TaskController.php?action=updateDesc`;
  form.method = 'POST';
  form.id = 'edit-form';

  const inputBlock = document.createElement('div');
  inputBlock.className = 'input-block';

  const inputEdit = document.createElement('input');
  inputEdit.type = 'text';
  inputEdit.id = 'input-edit';
  inputEdit.name = 'new-description';
  inputEdit.value = taskDescription.innerText;

  const inputHidden = document.createElement('input');
  inputHidden.type = 'hidden';
  inputHidden.name = 'id';
  inputHidden.value = id;

  const btnEdit = document.createElement('button');
  btnEdit.innerHTML = 'Edit';
  btnEdit.type = 'submit';
  btnEdit.form = 'edit-form';
  btnEdit.className = 'btn btn-edit';

  taskDescription.removeChild(taskTitle);

  inputBlock.appendChild(inputEdit);
  inputBlock.appendChild(btnEdit);
  inputBlock.appendChild(inputHidden);

  form.appendChild(inputBlock);

  taskDescription.appendChild(form);
}

function complete(id) {
  location.href = `../controller/TaskController.php?action=updateStatus&id=${id}`;
}

function remove(id) {
  location.href = `../controller/TaskController.php?action=remove&id=${id}`;
}

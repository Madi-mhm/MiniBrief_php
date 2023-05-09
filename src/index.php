<?php 
  
require_once './TodoManager.php';
$MyTodoListManager = new TodoListManager();


// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $MyTodoListManager->delete($_GET['delete']);
}

$getAllTodoList = $MyTodoListManager->getAllTodoList();


if (!empty($_POST['title']) && !empty($_POST['description']) )  {
    $newTodoList = new TodoList();

    $newTodoList->setTitle($_POST['title']);
    $newTodoList->setDescription($_POST['description']);
    $newTodoList->setImportant(isset($_POST['important']) && $_POST['important'] == 'on');

    
    $MyTodoListManager->create($newTodoList);

}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_sponsor.css">
    <title>Admin Sponsor</title>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brief_php</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <article>
        <header>
            <h1>Todo List</h1>
        </header>
        <main>
            <div class="todoListContainer">
                <form id="myForm" method="POST" action=""  class="todoListInsideContainer">
                    <div class="todoListTitle">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="todoListDescription">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description">
                    </div>
                    <div class="todoListimportant">
                        <label for="important">Important</label>
                        <input type="checkbox" name="important" id="important">
                    </div>
                    
                    <input name="submit" value="Add" type="submit" form="myForm" id="button">
                    
                </form>  
            </div>
            <div class="todoListJobs">
                <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Important</th>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getAllTodoList as $todo) { ?>
                        <tr>
                            <td><?php echo $todo->getId(); ?></td>
                            <td><?php echo $todo->getTitle(); ?></td>
                            <td><?php echo $todo->getDescription(); ?></td>
                            <td><?php echo $todo->getImportant(); ?></td>
                            <td><a href="index.php?delete=<?php echo $todo->getId(); ?>"  class="trash">Delete</a></td>
                        </tr>
                    <?php } ?>
                    
                    
                      

                    </tbody>
                <tbody>
            </table>
                </div>
        </main>
    </article>
   
</body>
</html>
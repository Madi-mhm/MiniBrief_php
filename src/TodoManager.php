<?php 

require_once ("./TodoClass.php");
require_once ("./DBManager.php");



class TodoListManager extends DBManager {

public function getAllTodoList() {

    $TodoListData = [];

    $res = $this->getConnexion()->query('SELECT * FROM task 
                                        Order by task.id ASC');

    foreach ($res as $key) {
        $newTodoList = new TodoList;
        $newTodoList->setId($key['id']);
        $newTodoList->setTitle($key['title']);
        $newTodoList->setDescription($key['description']);
        $newTodoList->setImportant($key['important']);
        

        $TodoListData[] = $newTodoList;
    }
 return $TodoListData;
}

public function create($todoList){
    $request = 'INSERT INTO task (title, description, important) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);


    $query -> execute([
        $todoList->getTitle(),
        $todoList->getDescription(),
        intval($todoList->getImportant() ? 1 : 0)
        
    ]);

    // Rafraichie la page
    header('Refresh:');
    
}

public function findById($todoId) {
    $request = 'SELECT * FROM task WHERE id = :id';
    $query = $this->getConnexion()->prepare($request);
    $query->execute([':id' => $todoId]);
    $row = $query->fetch();
  
    if ($row) {
        $todoId = new TodoList();
        $todoId->setId($row['id']);
        $todoId->setTitle($row['title']);
        $todoId->setDescription($row['description']);
        $todoId->setImportant($row['important']);
        return $todoId;
    }
  
    return null;
  }

 public function delete($todoListId) {
    if ($todoListId) {
        $todoListToDelete = $this->findById($todoListId);

        if ($todoListToDelete) {
            $request = 'DELETE FROM task WHERE id = ' . $todoListId;
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: index.php');
            exit();
        }
    }
}


}

?>

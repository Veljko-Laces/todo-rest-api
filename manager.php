<?php

function makeSqlRequest($sqlRequest, $useDatabase, $fetchResults){
    $engine = "mysql";
    $host = "localhost";
    $port = 3306;
    $dbName = "todos_db";
    $username = "root";
    $password = "";

    try {
        $dsn = $useDatabase 
            ? "$engine:host=$host;port=$port;dbname=$dbName" 
            : "$engine:host=$host;port=$port";
        $pdo = new PDO($dsn, $username, $password);

        if ($fetchResults) {
            $statement = $pdo->prepare($sqlRequest);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } else {
            $pdo->exec($sqlRequest);
        }
    } catch (PDOException $e) {
        echo json_encode(['Erreur' => $e->getMessage()]);
    }
}

function addTodoManager($newTodo){
    $add_todo = "INSERT INTO `todos`(`todo`) VALUES ('$newTodo')";
    makeSqlRequest($add_todo, true, false);
}

function deleteTodoManager($todoId){
    $delete_todo = "DELETE FROM `todos` WHERE id = '$todoId'"; 
    makeSqlRequest($delete_todo, true, false);
}

function getTodoManager($todoId){
    $get_todo = "SELECT id, todo, done FROM `todos` WHERE id = '$todoId';";
    $sqlRequest = makeSqlRequest($get_todo, true, true);
    return $sqlRequest;
}

function updateTodoDoneManager($todoId, $nouveauDone){
    $update_todo = "UPDATE `todos` SET `done`='$nouveauDone' WHERE id = $todoId;";
    $sqlRequest = makeSqlRequest($update_todo, true, false);
}

function updateTodoTodoManager($todoId, $nouveauTodo){
    $update_task = "UPDATE `todos` SET `todo`='$nouveauTodo' WHERE id = $todoId;";
    $sqlRequest = makeSqlRequest($update_task, true, false);
}

function getTodosManager() {
    $todos = makeSqlRequest("SELECT id, todo, done FROM todos;", true, true);
    return $todos;
}

?>

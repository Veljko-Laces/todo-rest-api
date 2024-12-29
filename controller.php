<?php

function getTodosController() {
    $todos = getTodosManager();
    if (empty($todos)) {
        http_response_code(500);
        echo json_encode(["message" => "Une erreur est survenue"]);
        return;
    }

    http_response_code(200);
    echo json_encode(["todos" => $todos]);
    return;
}

function addTodoController() {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    if (!isset($input['todo'])) {
        http_response_code(400);
        echo json_encode(["message" => "todo est requis"]);
        return;
    }

    if (!is_string($input['todo'])) {
        http_response_code(400);
        echo json_encode(["message" => "todo doit être une chaîne de caractères"]);
        return;
    }

    $cleanInput = htmlspecialchars($input['todo']);

    addTodoManager($cleanInput);
    http_response_code(201);
    echo json_encode(["message" => "Nouveau todo ajouté"]);
    return;
}

function getTodoController($id) {
    $todo = getTodoManager($id);
    if(empty($todo)) {
        http_response_code(400);
        echo json_encode(["message" => "Entrez un id valide"]);
        return;
    }
    http_response_code(200);
    echo json_encode($todo);
}

function updateTodoController($id) {
    $todo = getTodoManager($id);
    if (empty($todo)) {
        http_response_code(400);
        echo json_encode(["message" => "Entrez un id valide"]);
        return;
    }

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    $noTodo = !isset($input["todo"]);
    $noDone = !isset($input["done"]);

    if ($noDone && $noTodo) {
        http_response_code(400);
        echo json_encode(["message" => "todo et/ou done sont requis"]);
        return;
    }

    if (isset($input['todo']) && isset($input['done'])) {
        if (!is_string($input['todo'])) {
            http_response_code(400);
            echo json_encode(["message" => "todo doit être une chaîne de caractères"]);
            return;
        }

        if (!is_bool($input['done'])) {
            http_response_code(400);
            echo json_encode(["message" => "done doit être un booléen"]);
            return;
        }

        $cleanInputTodo = htmlspecialchars($input['todo']);
        $cleanInputDone = htmlspecialchars($input['done']);

        updateTodoDoneManager($id, $cleanInputDone);
        updateTodoTodoManager($id, $cleanInputTodo);

        http_response_code(200);
        echo json_encode(["message" => "Todo et l'état modifié"]);
        return;
    } elseif (isset($input['todo'])) {
        if (!is_string($input['todo'])) {
            http_response_code(400);
            echo json_encode(["message" => "todo doit être une chaîne de caractères"]);
            return;
        }
        $cleanInputTodo = htmlspecialchars($input['todo']);
        updateTodoTodoManager($id, $cleanInputTodo);
        http_response_code(200);
        echo json_encode(["message" => "Todo modifié"]);
        return;

    } elseif (isset($input['done'])) {
        if (!is_bool($input['done'])) {
            http_response_code(400);
            echo json_encode(["message" => "done doit être un booléen"]);
            return;
        }
        $cleanInputDone = htmlspecialchars($input['done']);
        updateTodoDoneManager($id, $cleanInputDone);
        http_response_code(200);
        echo json_encode(["message" => "état du todo modifié"]);
        return;
    }
}

function deleteTodoController($id) {
    $todo = getTodoManager($id);
    if (empty($todo)) {
        http_response_code(400);
        echo json_encode(["message" => "Entrez un id valide"]);
        return;
    }
    deleteTodoManager($id);
    http_response_code(201);
    echo json_encode(["message" => "Todo supprimé"]);
    return;
}

?>
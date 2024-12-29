
<?php
require 'database.php';
require 'controller.php';

initApp();

header('Content-Type: application/json');

$url = explode('/to-do-list-rest-api', $_SERVER["REQUEST_URI"]);

switch ($url[1]) {
    // if ($url[1] === '/')
    case '/':
        if ($_SERVER["REQUEST_METHOD"] === 'GET') {
            getTodosController();
            break;
        } elseif ($_SERVER["REQUEST_METHOD"] === 'POST') {
            addTodoController();
            break;
        }
    
    case (preg_match('/^\/([0-9]+)$/', $url[1], $matches) ? true : false):
        $id = $matches[1];
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            getTodoController($id);
            break;
        } elseif ($_SERVER["REQUEST_METHOD"] === "PUT") {
            updateTodoController($id);
            break;
        } elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
            deleteTodoController($id);
            break;
        }

    default:
        http_response_code(404);
        echo json_encode(['message' => 'Route inexistante']);
}
?>
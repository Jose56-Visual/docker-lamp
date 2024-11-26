<?php
// Incluye archivos necesarios
require_once 'init.php';
require_once 'usuarios.php';
require_once 'nuevoUsuarioForm.php';
require_once 'nuevoUsuario.php';
require_once 'editaUsuarioForm.php';
require_once 'editaUsuario.php';
require_once 'borraUsuario.php';
require_once 'tareas.php';
require_once 'borraTarea.php';

// Manejador de acciones basado en parámetros GET
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'init':
        initApp();
        break;
    case 'showUsers':
        showUsers();
        break;
    case 'showNewUserForm':
        showNewUserForm();
        break;
    case 'createUser':
        createUser();
        break;
    case 'editUserForm':
        showEditUserForm();
        break;
    case 'updateUser':
        updateUser();
        break;
    case 'deleteUser':
        deleteUser();
        break;
    case 'showTasks':
        showTasks();
        break;
    case 'deleteTask':
        deleteTask();
        break;
    default:
        echo '<ul>
            <li><a href="index.php?action=init">Inicializar Aplicación</a></li>
            <li><a href="index.php?action=showUsers">Lista de Usuarios</a></li>
            <li><a href="index.php?action=showNewUserForm">Nuevo Usuario</a></li>
            <li><a href="index.php?action=showTasks">Lista de Tareas</a></li>
        </ul>';
        break;
}
?>

<?php
// Array global que contiene las tareas
$GLOBALS['tareas'] = [
    ["id" => 1, "descripcion" => "Tarea 1", "estado" => "pendiente"],
    ["id" => 2, "descripcion" => "Tarea 2", "estado" => "en proceso"],
    ["id" => 3, "descripcion" => "Tarea 3", "estado" => "completada"]
];

// Función que devuelve el listado de tareas
function obtenerListadoTareas() {
    return $GLOBALS['tareas'];
}

// Función que filtra el contenido de un campo
function filtrarCampo($campo) {
    $campo = trim($campo); // Elimina espacios en blanco al inicio y al final
    $campo = stripslashes($campo); // Elimina las barras invertidas
    $campo = htmlspecialchars($campo); // Convierte caracteres especiales en entidades HTML
    $campo = preg_replace('/\s+/', ' ', $campo); // Elimina espacios en blanco duplicados
    return $campo;
}

// Función que comprueba si un campo contiene información de texto válida
function esCampoValido($campo) {
    $campo = filtrarCampo($campo);
    if (!empty($campo) && strlen($campo) <= 255) { // Limitar longitud a 255 caracteres
        return true;
    }
    return false;
}

// Función que guarda una tarea de forma simulada
function guardarTarea($id, $descripcion, $estado) {
    $descripcion = filtrarCampo($descripcion);
    $estado = filtrarCampo($estado);
    if (esCampoValido($descripcion) && esCampoValido($estado)) {
        $nuevaTarea = ["id" => $id, "descripcion" => $descripcion, "estado" => $estado];
        $GLOBALS['tareas'][] = $nuevaTarea;
        return true;
    }
    return false;
}
?>
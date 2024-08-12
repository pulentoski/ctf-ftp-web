<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    // Vulnerabilidad: Ejecución de comandos en lugar de una verdadera consulta de notas.
    $output = shell_exec($student_id);

    // Mostrar la salida del comando.
    echo "<pre>$output</pre>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Notas - Intranet Profesores</title>
</head>
<body>
    <h2>Consulta de Notas - Intranet Profesores</h2>
    <form method="POST">
        ID del Alumno: <input type="text" name="student_id" required><br>
        <input type="submit" value="Consultar">
    </form>
</body>
</html>

<?php
session_start();

// Contraseña encriptada correcta para 'admin'
$hash_password = password_hash('admin', PASSWORD_BCRYPT); // Esto genera el hash de 'admin'

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciales (usuario: 'admin', contraseña: 'admin')
    if ($username === 'admin' && password_verify($password, $hash_password)) {
        $_SESSION['loggedin'] = true;
        header("Location: notas.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Intranet Profesores - Instituto Profesional</title>
</head>
<body>
    <!-- Logo de la institución -->
    <img src="logo.png" alt="Logo de la Institución" style="width:200px;height:auto;">

    <h2>Intranet Profesores - Instituto Profesional</h2>
    <form method="POST">
        Usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>

<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

// Conexión a la base de datos
$servername = "mariadb";
$dbusername = "Threepwood";
$dbpassword = "monkeyisland";
$dbname = "user_db";

// Crear conexión
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para verificar que el usuario existe
$sql = "SELECT * FROM users_web WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // El usuario existe, iniciar sesión y redirigir a la página principal
    session_start();
    $_SESSION['logged_in'] = true;
    header('Location: home.php');
    exit;
} else {
    // El usuario no existe, mostrar mensaje de error
    echo "Usuario o contraseña incorrectos";
}
$conn->close();
?>

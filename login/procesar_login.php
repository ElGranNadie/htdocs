<?php
// ------------------------
// inicio de sesión y conexión a la base de datos
//--------------------------
session_start(); // Inicia o retoma una sesión existente.
require_once "../registro/conexion.php"; // Incluye el archivo que contiene la conexión a la base de datos(conexion.php).
// Verifica si la conexión fue exitosa

//------------------------------------
// captura de datos del formulario de inicio de sesión
//------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el método de solicitud es POST.
    // Verifica si los campos de correo y contraseña están establecidos
    $correo = $_POST['correo']; //correo electrónico del formulario de inicio de sesión.
    $password = $_POST['pass']; //contraseña del formulario de inicio de sesión.

//---------------------------------
 // Preparar la consulta para prevenir inyección SQL
//---------------------------------
    //background: linear-gradient(135deg,rgba(255, 0, 0, 0), #333);

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?"); // Prepara la consulta SQL para seleccionar el usuario por correo electrónico.
    $stmt->bind_param("s", $correo); // Vincula el  correo electrónico como una cadena (s).
    $stmt->execute(); // Ejecuta la consulta 
    $result = $stmt->get_result(); // Obtiene el resultado de la consulta 

    if ($result->num_rows > 0) {  // Verifica si se encontró al menos un usuario con el correo proporcionado.
        $usuario = $result->fetch_assoc(); // si se encontró un usuario, obtiene sus datos como un array asociativo.

//---------------------------------       
// Verificar la contraseña
//---------------------------------

        if (password_verify($password, $usuario['pass'])) {  // Verifica si la contraseña  coincide con la almacenada en la base de datos.
            $_SESSION['usuario_id'] = $usuario['id']; // Almacena el ID del usuario en la sesión.
            $_SESSION['correo'] = $usuario['correo']; // Almacena el correo electrónico del usuario en la sesión.
            $_SESSION['nombre_us'] = $usuario['nombre_us']; // Almacena el nombre de usuario en la sesión.
            
            header("Location: ../login/chat.php"); // Redirige al usuario a la página de chat después de un inicio de sesión exitoso.
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta"; // Si la contraseña no coincide, genera un mensaje de error en la sesión.
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado"; // Si no se encuentra el usuario con el correo proporcionado, genera un mensaje de error en la sesión.
    }

    if (isset($_SESSION['error'])) {
        header("Location: login.php"); // SI hay un error, redirige al usuario de vuelta a la página del login.
        exit();
    }

    $stmt->close();
} else {
    header("Location: login.php"); // Si el método de solicitud no es POST, redirige al usuario a la página de login .
}

$conn->close(); // Cierra la conexión a la base de datos.
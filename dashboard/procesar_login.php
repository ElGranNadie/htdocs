<?php
/**
 * @file procesar_login.php
 * @brief Maneja el inicio de sesión de usuarios.
 *
 * Este script recibe los datos del formulario de login, valida la entrada,
 * consulta la base de datos, verifica la contraseña y gestiona la sesión.
 *
 * @section dependencias Dependencias
 * - ../dashboard/conexion.php : Conexión a la base de datos
 * - ../utils/validaciones.php : Funciones de validación de datos
 *
 * @section flujo Flujo principal
 * 1. Verificar que la solicitud sea POST.
 * 2. Recibir los datos del formulario `login.php` (correo y contraseña).
 * 3. Validar correo y contraseña ingresados.
 * 4. Consultar el usuario en la base de datos.
 * 5. Verificar contraseña encriptada.
 * 6. Guardar datos del usuario en la sesión.
 * 7. Redirigir al dashboard en caso exitoso.
 * 8. Redirigir de nuevo a `login.php` si la autenticación falla o no es POST.
 *
 * @details Variables de sesión utilizadas:
 * - $_SESSION['user_id'] : ID del usuario autenticado.
 * - $_SESSION['correo'] : Correo electrónico del usuario.
 * - $_SESSION['usuario_nombre'] : Nombre del usuario para mostrar.
 *
 * @subsection paso1 Verificar método POST
 * @code
 * if ($_SERVER["REQUEST_METHOD"] == "POST") {
 * @endcode
 *
 * @subsection paso2 Capturar datos del formulario login.php
 * @code
 *     $correo = trim($_POST['correo']);
 *     $password = trim($_POST['pass']);
 *     $errores = [];
 *
 *     if (empty($correo) || empty($password)) {
 *         $errores[] = "Por favor ingrese correo y contraseña";
 *     }
 * @endcode
 *
 * @subsection paso3 Validar correo
 * @code
 *     $validCorreo = validarCorreo($correo);
 *     if (!empty($validCorreo)) {
 *         $errores = array_merge($errores, $validCorreo);
 *     }
 * @endcode
 *
 * @subsection paso4 Consultar usuario en la base de datos
 * @code
 *     if (empty($errores)) {
 *         if ($stmt = $conn->prepare("SELECT id, correo, nombre_us, pass FROM usuarios WHERE correo = ?")) {
 *             $stmt->bind_param("s", $correo);
 *             $stmt->execute();
 *             $result = $stmt->get_result();
 * @endcode
 *
 * @subsection paso5 Verificar contraseña y guardar sesión
 * @code
 *             if ($result && $result->num_rows > 0) {
 *                 $usuario = $result->fetch_assoc();
 *
 *                 if (password_verify($password, $usuario['pass'])) {
 *                     $_SESSION['user_id'] = $usuario['id'];
 *                     $_SESSION['correo'] = $usuario['correo'];
 *                     $_SESSION['usuario_nombre'] = $usuario['nombre_us'];
 *                     header("Location: ../dashboard/chat.php");
 *                     exit();
 *                 } else {
 *                     $errores[] = "Contraseña incorrecta";
 *                 }
 *             } else {
 *                 $errores[] = "Usuario no encontrado";
 *             }
 *             $stmt->close();
 *         } else {
 *             $errores[] = "Error en la consulta a la base de datos";
 *         }
 *     }
 * @endcode
 *
 * @subsection pasoFinal Redirección en caso de éxito
 * 
 * @details Si todas las validaciones son correctas y la contraseña coincide,
 * se inicia la sesión del usuario y se redirige al dashboard/chat.
 * Esto indica que el usuario ha sido autenticado correctamente.
 * 
 * @code
 * $_SESSION['user_id'] = $usuario['id'];
 * $_SESSION['correo'] = $usuario['correo'];
 * $_SESSION['usuario_nombre'] = $usuario['nombre_us'];
 * header("Location: ../dashboard/chat.php");
 * exit();
 * @endcode
 * @subsection paso6 Redirigir si hay errores
 * @code
 *     if (!empty($errores)) {
 *         $_SESSION['error'] = $errores;
 *         header("Location: login.php");
 *         exit();
 *     }
 * @endcode
 *
 * @subsection paso7 Redirigir si no es POST
 * @code
 * } else {
 *     header("Location: login.php");
 *     exit();
 * }
 * @endcode
 *
 * @subsection paso8 Cerrar conexión
 * @code
 * $conn->close();
 * @endcode
 */
session_start();
require_once "../dashboard/conexion.php"; 
require_once "../utils/validaciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['pass']);
    $errores = [];

    if (empty($correo) || empty($password)) {
        $errores[] = "Por favor ingrese correo y contraseña";
    }

    // Validar correo antes de la consulta
    $validCorreo = validarCorreo($correo);
    if (!empty($validCorreo)) {
        $errores = array_merge($errores, $validCorreo);
    }

    if (empty($errores)) {
        if ($stmt = $conn->prepare("SELECT id, correo, nombre_us, pass FROM usuarios WHERE correo = ?")) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();

                if (password_verify($password, $usuario['pass'])) {
                    // Guardamos variables de sesión consistentes
                    $_SESSION['user_id'] = $usuario['id'];
                    $_SESSION['correo'] = $usuario['correo'];
                    $_SESSION['usuario_nombre'] = $usuario['nombre_us'];

                    header("Location: ../dashboard/chat.php");
                    exit();
                } else {
                    $errores[] = "Contraseña incorrecta";
                }
            } else {
                $errores[] = "Usuario no encontrado";
            }

            $stmt->close();
        } else {
            $errores[] = "Error en la consulta a la base de datos";
        }
    }

    if (!empty($errores)) {
        $_SESSION['error'] = $errores;
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();

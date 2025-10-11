<?php
/**
 * @file verificar.php
 * @brief Gestión del proceso de verificación de correo electrónico.
 * 
 * Este archivo se encarga de validar el código de verificación enviado al correo
 * del usuario durante el registro. Si el código es correcto y no ha expirado,
 * el usuario es marcado como verificado en la base de datos.
 * 
 * @details
 * El flujo de este script sigue los siguientes pasos:
 * - El usuario se registra y recibe un código por correo.
 * - Ingresa el código en un formulario.
 * - El sistema valida el código y su vigencia.
 * - Si es válido, marca al usuario como verificado y limpia los datos temporales.
 * 
 * --------------------------------------------------------------
 * @section dependencias Dependencias
 * --------------------------------------------------------------
 * 
 * @code
 * session_start();
 * require_once '../dashboard/conexion.php';
 * @endcode
 * 
 * - `session_start()` → Permite acceder a variables de sesión, como el correo del usuario pendiente por verificar.
 * - `../dashboard/conexion.php` → Incluye la conexión a la base de datos mediante `mysqli`.
 * - Se requiere la extensión `mysqli` para consultas seguras y preparadas.
 * 
 * --------------------------------------------------------------
 * @section flujo Flujo del proceso
 * --------------------------------------------------------------
 * 
 * @subsection paso1 Paso 1: Verificar sesión activa
 * 
 * @code
 * if (!isset($_SESSION['correo_verificar'])) {
 *     $_SESSION['error'] = "Sesión no válida. Inicia el proceso de registro nuevamente.";
 *     header("Location: ../dashboard/registro.php");
 *     exit();
 * }
 * @endcode
 * 
 * Se valida que exista una sesión con el correo pendiente por verificar.
 * Si no existe, el usuario es redirigido al formulario de registro para reiniciar el proceso.
 * 
 * ---
 * 
 * @subsection paso2 Paso 2: Obtener correo de sesión
 * 
 * @code
 * $correo = $_SESSION['correo_verificar'];
 * @endcode
 * 
 * Almacena el correo electrónico actual del usuario desde la sesión, 
 * para posteriormente consultar su código de verificación en la base de datos.
 * 
 * ---
 * 
 * @subsection paso3 Paso 3: Capturar y validar envío del formulario
 * 
 * @code
 * if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 *     $codigo = $_POST['codigo'] ?? '';
 *     if (empty($codigo)) {
 *         $_SESSION['error'] = "Debes ingresar el código de verificación.";
 *         header("Location: verificar.php");
 *         exit();
 *     }
 * }
 * @endcode
 * 
 * Se verifica que la solicitud provenga del formulario `POST` y que el campo
 * `codigo` no esté vacío. Si está vacío, se devuelve un mensaje de error.
 * 
 * ---
 * 
 * @subsection paso4 Paso 4: Consultar código de verificación en base de datos
 * 
 * @code
 * $stmt = $conn->prepare("SELECT codigo_verificacion, expiracion_codigo FROM usuarios WHERE correo = ?");
 * $stmt->bind_param("s", $correo);
 * $stmt->execute();
 * $result = $stmt->get_result();
 * @endcode
 * 
 * Se realiza una consulta preparada para obtener el código de verificación y su fecha de expiración.
 * Si el correo no existe, el proceso termina y se redirige al formulario.
 * 
 * ---
 * 
 * @subsection paso5 Paso 5: Comparar códigos
 * 
 * @code
 * if ($usuario['codigo_verificacion'] !== $codigo) {
 *     $_SESSION['error'] = "El código ingresado es incorrecto.";
 *     header("Location: verificar.php");
 *     exit();
 * }
 * @endcode
 * 
 * Se compara el código que el usuario ingresó con el que está guardado en la base de datos.
 * Si no coinciden, el proceso se detiene.
 * 
 * ---
 * 
 * @subsection paso6 Paso 6: Validar expiración del código
 * 
 * @code
 * if ($usuario['expiracion_codigo'] < $ahora) {
 *     $_SESSION['error'] = "El código ha expirado. Solicita uno nuevo.";
 *     header("Location: verificar.php");
 *     exit();
 * }
 * @endcode
 * 
 * Comprueba que el código aún esté vigente. Si ya pasó el tiempo límite (10 minutos),
 * el usuario debe solicitar un nuevo código de verificación.
 * 
 * ---
 * 
 * @subsection paso7 Paso 7: Confirmar verificación y limpiar datos
 * 
 * @code
 * $stmt = $conn->prepare("UPDATE usuarios 
 *     SET verificado = 1, codigo_verificacion = NULL, expiracion_codigo = NULL 
 *     WHERE correo = ?");
 * $stmt->bind_param("s", $correo);
 * $stmt->execute();
 * @endcode
 * 
 * Si todo es correcto, se actualiza el campo `verificado` a 1 y se eliminan
 * los datos del código de verificación, garantizando que no pueda reutilizarse.
 * 
 * ---
 * 
 * @subsection paso8 Paso 8: Redirección final
 * 
 * @code
 * unset($_SESSION['correo_verificar']);
 * $_SESSION['success'] = "¡Correo verificado correctamente! Ya puedes iniciar sesión.";
 * header("Location: ../dashboard/login.php");
 * exit();
 * @endcode
 * 
 * Limpia la variable de sesión y redirige al formulario de inicio de sesión,
 * mostrando un mensaje de éxito.
 * 
 * --------------------------------------------------------------
 * @section variables Variables principales
 * --------------------------------------------------------------
 * 
 * @var string $_SESSION['correo_verificar']
 * Correo electrónico del usuario en proceso de validación.
 * 
 * @var string $correo
 * Correo actual obtenido de la sesión, usado para consultas en base de datos.
 * 
 * @var string $codigo
 * Código ingresado por el usuario en el formulario de verificación.
 * 
 * @var string $usuario['codigo_verificacion']
 * Código original generado y almacenado al momento del registro.
 * 
 * @var string $usuario['expiracion_codigo']
 * Fecha y hora límite para utilizar el código antes de que expire.
 * 
 * @var string $ahora
 * Fecha y hora actual del sistema usada para comparar la expiración.
 * 
 * --------------------------------------------------------------
 * @section seguridad Seguridad
 * --------------------------------------------------------------
 * 
 * - Se valida la existencia de sesión antes de cualquier acción.
 * - Se usan **consultas preparadas** para prevenir inyección SQL.
 * - Se eliminan variables de sesión y códigos una vez utilizados.
 * - Se verifica la expiración del código para mayor protección.
 * 
 * --------------------------------------------------------------
 * @section resumen Resumen de flujo
 * --------------------------------------------------------------
 * 
 * | Paso | Descripción | Resultado |
 * |------|--------------|------------|
 * | 1 | Verifica sesión activa | Si no hay, redirige al registro |
 * | 2 | Obtiene correo desde sesión | Se usa en consultas SQL |
 * | 3 | Recibe código del formulario | Inicia validación |
 * | 4 | Consulta en base de datos | Obtiene código y expiración |
 * | 5 | Compara código | Detecta coincidencia |
 * | 6 | Verifica expiración | Valida tiempo de uso |
 * | 7 | Actualiza verificación | Marca usuario como verificado |
 * | 8 | Limpia sesión y redirige | Termina flujo correctamente |
 */
session_start();
require '../varset/varset.php';
require_once '../dashboard/conexion.php';
// ✅ Verifica si hay un correo guardado en sesión
if (!isset($_SESSION['correo_verificar'])) {
    $_SESSION['error'] = "Sesión no válida. Inicia el proceso de registro nuevamente.";
    header("Location: ../dashboard/registro.php");
    exit();
}
$correo = $_SESSION['correo_verificar'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';

    if (empty($codigo)) {
        $_SESSION['error'] = "Debes ingresar el código de verificación.";
        header("Location: verificar.php");
        exit();
    }

    // Consultar el código de verificación
    $stmt = $conn->prepare("SELECT codigo_verificacion, expiracion_codigo FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: verificar.php");
        exit();
    }

    $usuario = $result->fetch_assoc();
    $ahora = date('Y-m-d H:i:s');

    if ($usuario['codigo_verificacion'] !== $codigo) {
        $_SESSION['error'] = "El código ingresado es incorrecto.";
        header("Location: verificar.php");
        exit();
    }

    if ($usuario['expiracion_codigo'] < $ahora) {
        $_SESSION['error'] = "El código ha expirado. Solicita uno nuevo.";
        header("Location: verificar.php");
        exit();
    }

    // ✅ Verificación exitosa
    $stmt = $conn->prepare("UPDATE usuarios SET verificado = 1, codigo_verificacion = NULL, expiracion_codigo = NULL WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();

    unset($_SESSION['correo_verificar']);

    $_SESSION['success'] = "¡Correo verificado correctamente! Ya puedes iniciar sesión.";
    header("Location: ../dashboard/login.php");
    exit();
}
?>
<!-- HTML del formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar correo</title>
    <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
    <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
    <style>
        form {
            background-color: var();
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            max-width: 400px;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <?php include '../dashboard/header.php'; ?>
    <main>
        <div class="row justify-content-evenly rowdecontenedores">
            <section class="intro-section contenedordeseccion category-content" style="padding: 1rem;">
                <span class="alpha">
                    <span class="highlight">
                        Verificación de Correo Electrónico
                    </span>
                </span>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="message error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="message success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                <form method="POST" action="verificar.php" style="padding:1rem; margin:1rem;">
                    <input type="text" name="codigo" placeholder="Código de verificación" required>
                    <div class="nav-item">
                        <button type="submit" class="nav-link">Verificar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <?php include '../dashboard/footer.php'; ?>
    <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</body>
</html>





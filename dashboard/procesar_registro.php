<?php
/**
 * @file procesar_registro.php
 * @brief Maneja el proceso de registro de usuarios, validaciones, preferencias y verificación por correo.
 *
 * Este script gestiona el registro de nuevos usuarios en el sistema. Incluye la validación de datos,
 * almacenamiento temporal en sesión, inserción de datos en la base de datos y envío de un código
 * de verificación por correo electrónico mediante PHPMailer.
 *
 * @section dependencias Dependencias
 * - ../dashboard/conexion.php : Conexión a la base de datos.
 * - ../utils/validaciones.php : Funciones de validación (correo, contraseña, etc.).
 * - ../dashboard/mail.php : Configuración y funciones de envío de correos (PHPMailer).
 * - ../dashboard/credenciales.php : Contiene EMAIL_USER y EMAIL_PASS para autenticación SMTP.
 *
 * @section flujo Flujo principal
 * 1. Verificar que la solicitud se haya enviado mediante POST.
 * 2. Determinar el paso del registro (`paso=1` o `finalizar_registro`).
 * 3. Validar los datos ingresados (correo, contraseña, usuario, etc.).
 * 4. Verificar duplicados en la base de datos (correo y usuario).
 * 5. Almacenar temporalmente los datos en sesión.
 * 6. Registrar preferencias del usuario.
 * 7. Generar código de verificación y enviar correo.
 * 8. Confirmar registro exitoso o manejar errores mediante rollback.
 *
 * @details Variables de sesión utilizadas:
 * - `$_SESSION['old']` : Mantiene los valores previos del formulario para conservarlos ante errores.
 * - `$_SESSION['temp_user_data']` : Datos temporales del usuario entre pasos del registro.
 * - `$_SESSION['correo_verificar']` : Correo al que se enviará el código de verificación.
 * - `$_SESSION['error']` : Lista de errores de validación o fallos en el proceso.
 * - `$_SESSION['success']` : Mensaje de éxito si el registro fue completado.
 *
 * @subsection paso1 Verificar método POST
 * @code
 * if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 * @endcode
 * Solo se procesa el registro si la solicitud proviene de un formulario con método POST.
 *
 * @subsection paso2 Paso 1 del registro (datos personales)
 * @code
 * if (isset($_POST['paso']) && $_POST['paso'] === '1') {
 *     $nombre = trim($_POST['nombre']);
 *     $correo = trim($_POST['correo']);
 *     $password = $_POST['pass'];
 *     $edad = intval($_POST['edad']);
 *     $usuario = trim($_POST['usuario']);
 * @endcode
 * Aquí se capturan los datos iniciales del usuario (nombre, correo, edad y usuario).
 *
 * @subsection paso3 Validación de datos
 * @code
 * $errores = array_merge($errores, validarCorreo($correo));
 * $errores = array_merge($errores, validarPassword($password));
 * @endcode
 * Se validan formato de correo y complejidad de contraseña.  
 * Si existen errores, se redirige a `registro.php` mostrando mensajes.
 *
 * @subsection paso4 Verificación de duplicados
 * @code
 * $check_email = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
 * $check_user = $conn->prepare("SELECT nombre_us FROM usuarios WHERE nombre_us = ?");
 * @endcode
 * Antes de crear el usuario, se verifica que el correo y nombre de usuario no estén en uso.
 *
 * @subsection paso5 Almacenar datos temporales en sesión
 * @code
 * $_SESSION['temp_user_data'] = [
 *     'nombre' => $nombre,
 *     'correo' => $correo,
 *     'password' => $password,
 *     'edad' => $edad,
 *     'usuario' => $usuario
 * ];
 * header("Location: preferencias.php");
 * exit();
 * @endcode
 * Los datos se guardan temporalmente y el usuario es redirigido a la selección de preferencias culinarias.
 *
 * @subsection paso6 Finalizar registro e insertar en la base de datos
 * @code
 * elseif (isset($_POST['finalizar_registro'])) {
 *     $hashed_password = password_hash($userData['password'], PASSWORD_DEFAULT);
 *     $codigo = generarCodigo();
 *     $expira = date('Y-m-d H:i:s', strtotime('+10 minutes'));
 * @endcode
 * Se genera un código de verificación de 6 dígitos con expiración de 10 minutos.
 *
 * @subsection paso7 Inserción en base de datos
 * @code
 * $stmt = $conn->prepare("INSERT INTO usuarios (...) VALUES (?, ?, ?, ?, ?, ?, ?)");
 * $stmt->bind_param(...);
 * @endcode
 * Inserta datos personales del usuario y luego sus preferencias culinarias.
 *
 * @subsection paso8 Envío de correo de verificación
 * @code
 * if (enviarCodigo($userData['correo'], $codigo)) {
 *     $conn->commit();
 *     $_SESSION['correo_verificar'] = $userData['correo'];
 *     $_SESSION['success'] = "Registro completado exitosamente...";
 *     header("Location: ../dashboard/verificar.php");
 *     exit();
 * }
 * @endcode
 * Si el correo se envía correctamente, se confirma el registro y se redirige a la verificación.
 *
 * @subsection paso9 Manejo de errores
 * @code
 * } catch (Exception $e) {
 *     $conn->rollback();
 *     $_SESSION['error'] = ["Error al completar el registro: " . $e->getMessage()];
 *     header("Location: preferencias.php");
 *     exit();
 * }
 * @endcode
 * En caso de error, se revierte la transacción para mantener la integridad de los datos.
 *
 * @subsection paso10 Redirección si no es POST
 * @code
 * } else {
 *     header("Location: registro.php");
 *     exit();
 * }
 * @endcode
 * Si la solicitud no proviene del formulario o no es POST, se redirige a `registro.php`.
 *
 * @subsection pasoFinal Cierre de conexión
 * @code
 * $conn->close();
 * @endcode
 * Se cierra la conexión a la base de datos al finalizar el proceso.
 * 
 * @section variables Variables utilizadas en el proceso
 *
 * A continuación se describen las **principales variables** empleadas durante el flujo de registro.  
 * Se indican su propósito, tipo y momento en el que intervienen dentro del proceso.
 *
 * ---
 *
 * 🔹 **$nombre**  
 * • Tipo: *string*  
 * • Descripción: Contiene el nombre completo del usuario capturado desde el formulario de registro.  
 * • Se utiliza durante la primera etapa (`paso=1`).
 *
 * 🔹 **$correo**  
 * • Tipo: *string*  
 * • Descripción: Dirección de correo electrónico del usuario. También se usa para enviar el código de verificación.  
 * • Etapa: Paso 1 y paso final (envío del código).
 *
 * 🔹 **$password**  
 * • Tipo: *string*  
 * • Descripción: Contraseña ingresada por el usuario en texto plano.  
 * • Etapa: Paso 1 (antes de encriptar).
 *
 * 🔹 **$hashed_password**  
 * • Tipo: *string*  
 * • Descripción: Contraseña cifrada mediante `password_hash()` antes de almacenarla en la base de datos.  
 * • Etapa: Paso 6 (finalización del registro).
 *
 * 🔹 **$edad**  
 * • Tipo: *int*  
 * • Descripción: Edad numérica del usuario capturada desde el formulario.  
 * • Etapa: Paso 1.
 *
 * 🔹 **$usuario**  
 * • Tipo: *string*  
 * • Descripción:  Apodo o alias único elegido por el usuario para identificarse dentro del sistema.  
 * • Etapa: Paso 1.
 *
 * 🔹 **$errores**  
 * • Tipo: *array*  
 * • Descripción: Lista de errores detectados durante las validaciones (correo, contraseña, duplicados).  
 * • Etapa: Paso 3 y validaciones.
 *
 * 🔹 **$codigo**  
 * • Tipo: *string (6 dígitos)*  
 * • Descripción: Código único de verificación generado por la función `generarCodigo()`.  
 *   Este código se envía al correo electrónico del usuario para confirmar su autenticidad  
 *   y validar su registro dentro del sistema.  
 * • Expira en 10 minutos desde su creación.  
 * • Etapa: Paso 6 (verificación por correo).

 *
 * 🔹 **$expira**  
 * • Tipo: *string (datetime)*  
 * • Descripción: Fecha y hora límite para validar el código de verificación.  
 * • Etapa: Paso 6.
 *
 * 🔹 **$conn**  
 * • Tipo: *mysqli*  
 * • Descripción: Conexión activa a la base de datos utilizada para todas las operaciones SQL.  
 * • Etapa: Global (en todo el flujo).
 *
 * 🔹 **$stmt**  
 * • Tipo: *mysqli_stmt*  
 * • Descripción: Sentencia preparada para insertar datos del usuario y preferencias.  
 * • Etapa: Paso 7 (inserción en base de datos).
 *
 * ---
 * 🧠 **Variables de sesión**
 *
 * 🔸 `$_SESSION['temp_user_data']`  
 * Contiene los datos temporales del usuario entre el primer paso y la selección de preferencias.  
 * Se elimina tras completar el registro.
 *
 * 🔸 `$_SESSION['correo_verificar']`  
 * Guarda el correo al que se envía el código de verificación, usado luego en `verificar.php`.
 *
 * 🔸 `$_SESSION['success']`  
 * Mensaje de éxito mostrado tras completar el registro correctamente.
 *
 * 🔸 `$_SESSION['error']`  
 * Lista de errores acumulados o mensajes de fallo en el registro.
 *
 * 🔸 `$_SESSION['old']`  
 * Permite mantener los datos previos del formulario si ocurre un error.
 *
 * ---
 *
 * 🧩 **Funciones auxiliares**
 *
 * 🔸 `generarCodigo()`  
 * Devuelve un número aleatorio de 6 dígitos (`string`) entre **100000** y **999999**, usado como código de verificación.
 *
 * 🔸 `enviarCodigo($correo, $codigo)`  
 * Envía el código generado al correo del usuario mediante **PHPMailer**.  
 * Retorna `true` si el envío fue exitoso o `false` si ocurrió un error.
 *
 * ---
 *
 * ✅ **Redirección final**  
 * Una vez completado el registro, el sistema envía el correo de verificación y redirige automáticamente al usuario hacia  
 * `../dashboard/verificar.php`, donde podrá ingresar el código recibido.  
 * En caso de error o fallo en el envío, se revierte la transacción (`rollback`) y se retorna a `preferencias.php`.
 */
session_start();
require_once '../dashboard/conexion.php';
require_once '../utils/validaciones.php';
require_once '../dashboard/mail.php'; // PHPMailer configurado
require_once '../dashboard/credenciales.php'; // EMAIL_USER y EMAIL_PASS

/// @cond IGNORE
function generarCodigo(){
    return strval(rand(100000, 999999));
}
    // ...
/// @endcond

/// @cond IGNORE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ...
/// @endcond
    if (isset($_POST['paso']) && $_POST['paso'] === '1') {
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $password = $_POST['pass'];
        $edad = intval($_POST['edad']);
        $usuario = trim($_POST['usuario']);

        $errores = [];

        // Validar correo
        $errores = array_merge($errores, validarCorreo($correo));

        // Validar contraseña
        $errores = array_merge($errores, validarPassword($password));

        // Guardar datos para que se mantengan
        $_SESSION['old'] = [
            'nombre' => $nombre,
            'correo' => $correo,
            'edad' => $edad,
            'usuario' => $usuario
        ];

        if (!empty($errores)) {
            $_SESSION['error'] = $errores;
            header("Location: registro.php");
            exit();
        }

        // Verificar si el correo ya existe
        $check_email = $conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
        $check_email->bind_param("s", $correo);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = ["Este correo ya está registrado"];
            header("Location: registro.php");
            exit();
        }

        // Verificar si el nombre de usuario ya existe
        $check_user = $conn->prepare("SELECT nombre_us FROM usuarios WHERE nombre_us = ?");
        $check_user->bind_param("s", $usuario);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = ["Este nombre de usuario ya está en uso"];
            header("Location: registro.php");
            exit();
        }

        // Guardar datos temporalmente en la sesión
        $_SESSION['temp_user_data'] = [
            'nombre'   => $nombre,
            'correo'   => $correo,
            'password' => $password,
            'edad'     => $edad,
            'usuario'  => $usuario
        ];

        header("Location: preferencias.php");
        exit();
    }

    elseif (isset($_POST['finalizar_registro'])) {
        if (!isset($_SESSION['temp_user_data'])) {
            header("Location: registro.php");
            exit();
        }


        $userData = $_SESSION['temp_user_data'];
        $hashed_password = password_hash($userData['password'], PASSWORD_DEFAULT);

        //Generar codigo de verificacion y vencimiento
        $codigo = generarCodigo();
        $expira = date ('Y-m-d H:i:s', strtotime('+10 minutes'));

        $conn -> begin_transaction();

        try {
            $conn->begin_transaction();

            $stmt = $conn->prepare("INSERT INTO usuarios (nombre_us, correo, pass, edad, usuario, codigo_verificacion, expiracion_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssisss",
                $userData['nombre'],
                $userData['correo'],
                $hashed_password,
                $userData['edad'],
                $userData['usuario'],
                $codigo,
                $expira
            );
            $stmt->execute();
            $usuario_id = $conn->insert_id;
            //insertar preferencias
            $stmt = $conn->prepare("INSERT INTO preferencias_culinarias (usuario_id, sabores_preferidos, alergias, peso, altura) VALUES (?, ?, ?, ?, ?)");
            $sabores = $_POST['sabores'] ?? '';
            $alergias = $_POST['alergias'] ?? '';
            $peso = $_POST['peso'] ?? '';
            $altura = ($_POST['altura'] ?? '') ? ($_POST['altura'] / 100) : '';

            $stmt->bind_param("issss", $usuario_id, $sabores, $alergias, $peso, $altura);
            $stmt->execute();

            //Usar la funcion de enviarCodigo
            if(enviarCodigo($userData['correo'], $codigo)){
                $conn->commit();

                unset($_SESSION['temp_user_data']);
                $_SESSION['correo_verificar'] = $userData['correo'];

                $_SESSION['success'] = "Registro completado exitosamente. Se ha enviado un codigo de verficación.";
                header("Location: ../dashboard/verificar.php");
                exit();
            }else{
                throw new Exception("No se pudo enviar el correo de verificación.");
            }
        } catch (Exception $e) {
            $conn->rollback();
            $_SESSION['error'] = ["Error al completar el registro: " . $e->getMessage()];
            header("Location: preferencias.php");
            exit();
        }   
        /// @cond IGNORE
    } else {
        header("Location: registro.php");
        exit();
    }
} else {
    header("Location: registro.php");
    exit();
}
        // ...
/// @endcond

$conn->close();
?>

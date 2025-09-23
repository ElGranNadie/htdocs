<?php // Se requiere porque aqui se definen las variables que se usan en el dashboard
  require '../varset/varset.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>¿Quiénes Somos? | N.I.C.O.L.E</title> <!-- Título de la página -->
  <?php require 'other.php'; ?> <!-- Incluye metadatos y enlaces comunes -->
  <?php require 'stylesheet.php'; ?> <!-- Incluye los estilos del dashboard -->
  <style>
    .std {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
      padding-bottom: 1rem;
    }
    .std2 {
      display: flex;
      margin: 0 auto;
      max-width: 50%;
      height: auto;
      padding-bottom: 1rem;
    }
    .spc1 {
      padding-left: 1rem;
    }
    .spc2 {
      padding-left: 2rem;
    }
    .spc3 {
      padding-left: 3rem;
    }
    .spc4 {
      padding-left: 4rem;
    }
  </style>
</head>
<body>
<div>
  <?php require 'header.php';?> <!-- Incluye el encabezado de la página -->
  <main> <!-- Contenido principal de la página -->
    <div class="row justify-content-evenly rowdecontenedores">
      <div class="col-md-12 col-12" style=" padding-bottom: 1rem;">
        <section class="category-content container contenedordeseccion" style="max-width: 100%;">
          <span class="alpha">
            <span class="highlight">Manual de usuario</span>
          </span>
          <div class="col-11 d-flex align-items-start flex-column" style="text-align: justify;">
            <p>Este manual esta dirigido a los usuarios finales y tiene el propósito de mostrar paso a paso el uso de las funcionalidades de la plataforma.</p>
            <p class="spc1">
              <span class="alpha">
                <span class="highlight">
                  I. Como ingresar al sitio web
                </span>
              </span>
            </p>
            <p>El usuario ingresara al enlace: <a href="https://nicole.sytes.net/">https://nicole.sytes.net/</a></p>
            <p class="spc1">
              <span class="alpha">
                <span class="highlight">
                  II. Controles persistentes
                </span>
              </span>
            </p>
            <p>Aquí te muestro los botones que te ayudaran a navegar en la pagina web y que serán tu guía constante.</p>
            <p>Siempre estaran visibles en pantalla, por eso veremos como funcionan y despues navegaremos por la pagina.</p>
            <img class="std" src="../imagenes/01.png" alt="Imagen 1">
            <p>Vas a llegar a la página de inicio donde podrás ver la página de introducción de Nicole. En la parte superior se podrá encontrar un menú con opciones como el que es NICOLE, ¿Quiénes Somos?, etc. Esta barra en la parte superior podras encontrarla mientras navegas a través de la web. Los botones marcados podrán llevarte a diferentes sitios de la pagina.</p>
            <p class="spc2">1. Es el botón de introducción, te llevará a la pagina web en la que te encuentras, servirá para volver de nuevo aquí.</p>
            <p class="spc2">2. El botón de “¿Quiénes Somos?” te llevara a la pagina que explica quienes somos como compañía y como personas, pronto hablaremos de ella.</p>
            <p class="spc2">3. El botón de “¿Qué hacemos?” te llevara a la pagina que muestra que hacemos como aplicacion y como proyecto, mostrarte que buscamos hacer y que necesidades queremos satisfacer. CAMBIAR LO QUE HAY EN LA PAGINA</p>
            <p class="spc2">4. Con el botón “Contactanos” podras encontrar información útil para reportar situaciones con la aplicación así como podras ver correos para contactar con nosotros como compañía.</p>
            <p class="spc2">5. El ultimo botón, “iniciar sesión” te mostrara el “inicio de sesión”, una pagina donde podras registrarte y/o iniciar sesión como usuario.</p>
            <p>En la parte inferior podras ver un “footer” una Fila de objetos, donde podras ver a la gatita Nicole, el logo de nuestra aplicación, el copyright de la compañía y los siguientes accesos directos.</p>
            <img class="std" src="../imagenes/02.png" alt="Imagen 2">
            <p class="spc2">6. El enlace de “Terminos y condiciones” tiene la función de llevarte a la pagina que muestra nuestros términos y condiciones.</p>
            <p class="spc2">7. El enlace de “Privacidad” te llevara a la pagina que contiene nuestras políticas de privacidad.</p>
            <p class="spc2">8. El símbolo del famoso logo de Instagram te llevara a nuestra pagina de la red social de Instagram, donde encontraras nuestras publicaciones. 
              El símbolo de f, conocido por ser de la compañía de Facebook, te llevara a la pagina de Facebook, mostrándote nuestras publicaciones pertenecientes a la pagina de facebook.</p>
            <p class="spc2">9.	El símbolo del libro con una “i”, es el manual de usuario con información para el uso de la pagina.</p>
            <img class="std" src="../imagenes/03.png" alt="Imagen 3">
            <p>Por último, el décimo botón</p>
            <p class="spc2">10. Este te permitirá cambiar los colores de la pagina de un color claro a un color oscuro y viceversa.</p>
            <img class="std" src="../imagenes/04.png" alt="Imagen 4">
            <p>Cabe aclarar que si la pagina se muestra en un dispositivo demasiado angosto, los botones de la barra superior se comprimirán en un único botón con tres líneas horizontales que sirve como menú y utilizar el boton muestra las opciones barra superior, volver a presionar el botón con líneas horizontales, volverá a cerrar el menú.</p>
            <div class="row">
              <img class="col-6 d-flex std" src="../imagenes/05.png" alt="Imagen 5">
              <img class="col-6 d-flex std" src="../imagenes/06.png" alt="Imagen 6">
            </div>
            <p class="spc1">
              <span class="alpha">
                <span class="highlight">
                  III. Paginas en las que puedes navegar.
                </span>
              </span>
            </p>
            <p>Ya que te hemos mostrado todas las paginas web principales, preparemonos para navegar por cada una de ellas.</p>
            <p class="spc1">1. Introducción:</p>
            <p>Esta pagina es la pagina de bienvenida, te cuenta brevemente que funciones tiene Nicole, así como las recetas que puedes llegar a fabricar con nuestra ayuda.</p>
            <img class="std" src="../imagenes/15.png" alt="Imagen 15">
            <p class="spc1">2. ¿Quiénes somos?</p>
            <p>Aquí veras que es ALPHA 22, cuales son nuestros objetivos como compañía desarrolladora, lo que nos identifica, nuestra misión, nuestra visión y aquellos que conformamos el equipo.</p>
            <img class="std" src="../imagenes/16.png" alt="Imagen 16">
            <p class="spc1">3. Nicole</p>
            <p>El usuario al oprimir el recuadro numero 3, etiquetado como “Nicole” podrá leer en que esta enfocado el proyecto y poder conocer las características en los que esta funcionando.</p>
            <img class="std" src="../imagenes/17.png" alt="Imagen 17">
            <p class="spc1">4. Contáctanos</p>
            <p>El usuario al oprimir el recuadro numero 4 podrá ver los correos de contacto tanto de NICOLE, como de Alpha 22.</p>
            <img class="std" src="../imagenes/07.png" alt="Imagen 07">
            <p>Encontraras nuestro correo electrónico como compañía, por el cual podrás contactarnos para iniciar nuevos proyectos o preguntar sobre alguno de nuestros otros trabajos.</p>
            <p>Encontraras el correo electrónico enfocado para consultas relacionadas con Nicole, resolver problemas o recibir soporte de la aplicación.</p>
            <p class="spc1">5. Iniciar sesión</p>
            <img class="std" src="../imagenes/08.png" alt="Imagen 08">
            <p>El usuario al oprimir el recuadro número 5, se le redirigirá al login, sección dedicada al inicio de sesión o ingreso a la plataforma de chat.</p>
            <p>Vamos a tomarnos la libertad de conducirnos rápidamente por el interior de la aplicación ahora mismo y explicar las ultimas funciones numeradas anteriormente después. Como estamos en la sección 5, usaremos una letra adicional para recordar que seguimos en la sección de inicio de sesión. Usaremos esta estructura seguido para guiarnos en el camino, en caso de que te pierdas en algún paso puedes simplemente volver a la sección con una letra menos, es como jugar al tesoro perdido siguiendo pasos.</p>
            <p class="spc2">5A. En esta sección debes ingresar un correo electrónico previamente registrado en nuestra plataforma para poder utilizar nuestro chat, sin embargo, si no cuentas con una cuenta propia, podrás crearla en una sección dedicada para ello.</p>
            <p class="spc2">5B. Este campo esta dedicado para la contraseña, este código especial es único para cada correo, por favor, no compartas tu contraseña con nadie para prevenir cualquier problema con posibles filtraciones de información.</p>
            <p class="spc2">5C. Sabemos que es posible que olvides cual es tu contraseña, por lo que nos tomamos la libertad de ingresar una sección para que puedas registrar una nueva contraseña relacionando tu correo electrónico original con un código de seis dígitos.</p>
            <p class="spc2">El procedimiento para recuperar la contraseña requiere que siga el siguiente proceso:</p>
            <img class="std" src="../imagenes/09.png" alt="Imagen 09">
            <p class="spc3">5Ca. Ingresa aquí el correo electrónico asociado a tu cuenta, enviaremos un Código para que puedas recuperar tu contraseña, así confirmaremos que si tienes posesión de dicho correo.</p>
            <p class="spc3">5Cb. Presiona el boton para recibir el codigo en el correo.</p>
            <p class="spc3">5Ce. Una vez recibido el codigo en tu correo, ingresalo aqui para validarte como propietario.</p>
            <p class="spc3">Presiona el boton para confirmar el Código recibido en el correo, esto desbloqueara la siguiente sección.</p>
            <p class="spc3">Al terminar el proceso de validación, por favor ingresa tu nueva contraseña, esta debe tener como mínimo ocho dígitos.</p>
            <p class="spc3">Valida la contraseña anterior ingresando la misma, de nuevo en el recuadro</p>
            <p class="spc3">5Cd. Presiona el botón “Recuperar contraseña” para terminar de validar el procedimiento. Al finalizar, se te enviara de nuevo a la pagina de inicio de sesión.</p>
            <p>Volvemos al menu anterior, al inicio de sesion</p>
            <p class="spc2">5D.	El botón de inicio de sesión depende de que el correo electrónico y la contraseña coincidan con una cuenta registrada y además que la contraseña corresponda al correo electrónico, en caso de que no se cumplan las condiciones previas, al usar el botón de “inicio de sesión” se te indicara que ha fallado para que lo corrijas.</p>
            <p class="spc2">Al iniciar sesión procederás a ingresar al Chat, y veras algunos cambios importantes.</p>
            <img class="std" src="../imagenes/12.png" alt="Imagen 12">
            <img class="std" src="../imagenes/14.png" alt="Imagen 14">
            <p class="spc3">5Da. Veras aquí tu nombre de usuario.</p>
            <p class="spc3">5Db. Este mensaje se te mostrara al inicio en caso de que tu navegador no sea compatible con el reconocimiento a voz.</p>
            <p class="spc3">5Dc. Los mensajes que escribas en la sección de introducir texto aparecerán a la derecha del chat y sobre ellos veras tu nombre, para evitar cualquier confusión posible.</p>
            <p class="spc3">5Dd. Este es el mensaje que te cuenta Nicole, podrá mostrarte imágenes referentes a lo que necesites, cosas como recetas, ingredientes, calorías y mejoras a tu salud alimentaria.</p>
            <p class="spc3">5De. “Pásate a Nicole premium”, En mi caso, carece de los beneficios de tener una cuenta premium. Por lo que tengo una cantidad mínima de consultas a Nicole al día, solo podre pedirle diez mensajes al día y tendré obstrucciones con publicidad, sin embargo, estos límites se retiran sí realizo un pequeño pago, ya que al presionar el botón me redijera a la página que veremos a continuación.</p>
            <img class="std" src="../imagenes/13.png" alt="Imagen 13">
            <p class="spc4">5D. Los botones marcados te devolverán al chat, destacare el de la barra de navegación superior, el cual te llevara de vuelta al en caso de que te encuentres en cualquiera de las anteriores paginas mientras tu sesión esta iniciada.</p>
            <p class="spc4">5De1. Este botón te redirigirá a la plataforma de pago llamada mercado pago, esta plataforma es externa a nosotros, sin embargo, podre darte una introducción breve.</p>
            <div class="row">
              <img class="col-md-6 col-12 d-flex std" src="../imagenes/18.png" alt="Imagen 18">
              <img class="col-md-6 col-12 d-flex std" src="../imagenes/19.png" alt="Imagen 19">
              <img class="col-md-6 col-12 d-flex std" src="../imagenes/20.png" alt="Imagen 20">
            </div>
            <p class="spc4">Estas obligado a iniciar sesión en mercado pago, usando una cuenta ya creada previamente y realizar un pago de diez mil pesos, usando una tarjeta que disponga del saldo o una cuenta relacionada con pagos como lo es PayPal, después de ello serás redirigido a la pagina del chat, contando como un usuario premium.</p>
            <p class="spc3">5Df. Cerrar sesión significa que eliminaras tu conexión con el chat, esto para prevenir que otras personas ingresen a tu cuenta terceros a rebuscar información que no les interese, sin embargo, puedes volver a iniciar sesión como lo haces normalmente.</p>
            <p class="spc3">5Dg. El cuadro que reza “escribe tu mensaje” en la parte inferior del chat, te permitirá ingresar texto dando un solo clic sobre él y escribiendo podrás solicitarle a N.I.C.O.L.E infinidad de recetas, recomendaciones y dietas, así como ingredientes y próximamente, lugares donde consumirlos. Cuando termines de enviar el mensaje puedes presionar enter para enviar el mensaje, o también presionar el botón 5Di.</p>
            <p class="spc3">5Dh. Si tu equipo es compatible con el sistema de reconocimiento de voz,   puedes presionar el botón con el dibujo de un micrófono para dictar un mensaje al chat.</p>
            <p>Volvemos al menu anterior, al inicio de sesion</p>
            <p class="spc2">5E. El registro te llevara por varias páginas, así que iremos ilustrando cada paso y explicando cada campo con su respectiva etiqueta.</p>
            <img class="std" src="../imagenes/10.png" alt="Imagen 10">
            <p class="spc2">En la sección nombre es necesario tener el nombre real de usuario para poder utilizarlo en métodos de pago o legales.</p>
            <p class="spc2">El sector de correo es para un correo electrónico con el que podrás iniciar sesión pero también tiene que ser el correo electrónico asociado a la cuenta para la verificación de contraseña y usuario único, no ingresar un correo al que no tengas acceso te impedirá seguir el procedimiento.</p>
            <p class="spc2">En la sección de Usuario podrás ingresar cualquier nombre de usuario, este será el que utilice la IA y la plataforma para dirigirse a ti.</p>
            <p class="spc2">A continuación, se te pedirá que registres tu edad actual, la cual, nos permitirá llevar el registro dietario correcto para tu etapa de vida.</p>
            <p class="spc2">En la sección de contraseña debes digitar un valor de ocho dígitos, único para tu cuenta e intransferible, trata de que pueda ser algo que puedas recordar fácilmente. Por razones de seguridad, la contraseña se vera como pequeños puntos, pero al dar click en el ojo a la derecha del campo, podrás ver el valor real.</p>
            <p class="spc2">La condición de confirmar contraseña te pedirá que registres el mismo valor de contraseña que pusiste anteriormente, así podremos verificar que ingresaste la contraseña correcta.</p>
            <p class="spc3">5Ea. Es el sector que demuestra que aceptas nuestros términos y condiciones, estos los podrás leer si le das click al link en la sección 6 que dice “Aceptar términos y condiciones” o en el footer “términos y condiciones”.</p>
            <p class="spc3">5Eb. El botón de regresar es para aquellos que se niegan a registrarse o sienten que quieren revisar el login de nuevo, esto te devolverá a la pagina anterior.</p>
            <p class="spc3">5Ec. Verifica si los datos ingresados cumplen las condiciones de registro iniciales y te permitirá seguir a la parte siguiente.</p>
            <img class="std" src="../imagenes/11.png" alt="Imagen 11">
            <p class="spc3">Aquí es la sección a la que nos gusta llamar “preferencias” debido a que aquí nos indicaras que cosas prefieres.</p>
            <p class="spc3">En el caso de que sufras alguna alergia, esta:</p>
            <p class="spc4">5Ec1. Donde podrás desplegar una lista, ordenada por las alergias mas comunes posibles, pudiendo seleccionar una y luego usar el siguiente parámetro para añadirlo a la lista.</p>
            <p class="spc4">5Ec2. Si no encuentras tu alergia en especifico en la lista puedes escribirla en el cuadro de texto.</p>
            <p class="spc4">5Ec3. Presionando el botón respectivo, podrás añadir el elemento a la lista. Puedes añadir cuantos quieras.</p>
            <p class="spc4">5Ec4. Cada elemento añadido podrá aparecer con un botón “Eliminar” cuyo objetivo es borrar el elemento que tiene al lado. Es posible que borres algún elemento por error, pero podrás añadirlo como lo hiciste antes.</p>
            <p class="spc4">5Ec5. Esta lista es corta, son seis botones que inician desactivados, pero al darles un simple clic, se activaran, esto nos permitirá saber que sabores son tus preferidos, por lo que procuraremos inclinar tus dietas a tus sabores prefreridos.</p>
            <p class="spc4">5Ec6. Puedes registrar tu peso actual, lo cual será útil para saber tu estado de salud.</p>
            <p class="spc4">5Ec7. Puedes registrar tu altura actual, lo cual será útil para saber tu estado de salud.</p>
            <p class="spc4">5Ec8. Si te encuentras indeciso sobre tu registro, o si simplemente quieres volver al menú principal, podrás volver presionando el botón de “Regresar”</p>
            <p class="spc4">5Ec9. Con el botón de “Siguiente” podrás seguir a la página de validación de correo.</p>
            <p>SE DEBE PONER UNA NUEVA INFERFAZ PARA PONER EL CODIGO DE VERIFICACION JUSTO DESPUES DE PREFERENCIAS</p>
            <p>En el proceso de registro de usuario el sistema debe de contar con una interfaz que ira despues del apartado de preferencias, en la cual aparecera un input en el cual el usuario podra el codigo de 6 digitos que se le va a enviar al correo que previamente haya puesto en el proceso de registro, un boton para reviar el codigo y el boton de finalizar que reenviara a el inicio de sesion.</p>
          </div>
        </section>
      </div>
    </div>
  </main> <!-- Pie de página, el mismo pie de pagina de toda la vida -->
  <?php require 'footer.php';?><!-- Incluye el pie de página -->
  <?php require 'scripts.php';?><!-- Enlace a Bootstrap JS -->
</div>
</body>
</html>

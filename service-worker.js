const CACHE_NAME = 'nicole-cache-v1'; //Se define un nombre único para la caché de la aplicación. Si alguna vez se necesita actualizar todos los archivos, simplemente se cambia el nombre (ej. 'nicole-cache-v2'), sorras
// Una arraylist de todas las páginas, estilos, scripts e imágenes que se guardan para que funcione sin conexión.
// Estos son los archivos "esenciales" que forman el esqueleto de esta cosa.
const urlsToCache = [
  '/',// La raíz del sitio, importante para las visitas iniciales.
  'index.php',
  'quienes-somos.php',
  'que-hacemos.php',
  'contactanos.php',
  'estilos/base.css',
  'estilos/dashboardstyle.css',
  'js/main.js',
  'js/dashboardscript.js',
  'manifest.json',

  //Imágenes cruciales
  'imagenes/icono.png', 
  'imagenes/logo192.png',
  'imagenes/logo512.png'
  // Faltaría agregar otra imágen que sea importante
];

self.addEventListener('install', event => {// El primer evento: 'install'. Se dispara una sola vez cuando el navegador instala el Service Worker. Aquí es donde pre-cargamos nuestros archivos.
  event.waitUntil( //Esto le dice al navegador que espere a que la promesa dentro de él se complete antes de terminar la instalación.
    caches.open(CACHE_NAME) //Esto abre la caché con el nombre que definimos. Si no existe, la crea.
      .then(cache => {
        console.log('Cache abierto'); //Esto toma la lista 'urlsToCache' y guarda todos esos archivos en la caché.
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', event => { // El segundo evento: 'fetch'. Se dispara CADA VEZ que la aplicación intenta pedir un recurso a la red (una página, una imagen, un script, etc. Y así.).
  event.respondWith( //Esto nos permite interceptar la petición y responder con lo que queramos.
    caches.match(event.request) //Esto busca en la caché si ya tenemos guardado el archivo que se está pidiendo.
      .then(response => {
// Si 'response' existe, significa que el archivo se encontró en la caché, así que lo devolvemos directamente desde ahí.
// Si 'response' es nulo, significa que no lo tenemos en caché, así que procedemos a buscarlo en la red con 'fetch(event.request)'.
        return response || fetch(event.request);
      })
  );
});
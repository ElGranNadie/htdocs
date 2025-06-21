
// Carrusel de imágenes de comida
const imagenes = [
  "arepadelapulpadelcactus",
  "arraciraba",
  "arrozconmilpeso",
  "asadohuilense",
  "bedabeta",
  "blackeyebeansricearrozconfrijolabecitanegra",
  "caguanadepiña",
  "caldodecuchas",
  "caldodepreza",
  "casabedealmidon",
  "chichadeiwalayafrutodelcactus",
  "chichademaiz",
  "chocolo",
  "chucula",
  "dumplingesponjosobolitademasahervida",
  "envueltosdemazorca",
  "fariña",
  "guarapo",
  "guarrus",
  "injokowo",
  "johnnycakewithbutterjohnnycakeconmantequilla",
  "jurichifrishe",
  "kankuku",
  "lechona",
  "masatodearroz",
  "mazamorradepescado",
  "mermeladadecactus",
  "mincedfish",
  "nozi",
  "owirralet",
  "pescadoahumadoomoqueado",
  "pescadoguisado",
  "pescadomoquiao",
  "pilaodecerrillo",
  "poyoapoijushyfrijolguajiro",
  "quiñapirasopapicante",
  "rondon",
  "sancochoconchichavoyo",
  "sancochodegallina",
  "sopaderesplandor",
  "sopadezapallo",
  "tamales",
  "turujashycarneseca",
  "viudodepescado",
  "zhibi"
]// Array de nombres de imágenes
const carouselImages = [
  '../imagenes/imgcomidas/bedabetaimg.jpg',
  '../imagenes/imgcomidas/arracirabaimg.jpg',
  '../imagenes/imgcomidas/caguanadepiñaimg.jpg'
];//Esto ya no se usa, era puro experimento

let currentImg = 0;//contador

const carouselImg = document.querySelector('.carousel-img'); // Selecciona el elemento de imagen del carrusel
const leftBtn = document.querySelector('.carousel-btn.left'); // Selecciona el botón izquierdo del carrusel
const rightBtn = document.querySelector('.carousel-btn.right'); // Selecciona el botón derecho del carrusel

function showImage(idx) {
  carouselImg.src = String("../imagenes/imgcomidas/"+imagenes[idx]+"img.jpg"); //Aqi cambio la fuente de la imagen, es el indice de toooodas las imagenes
} // Esto muestra las imagenes

leftBtn.addEventListener('click', () => {
  currentImg = (currentImg - 1 + imagenes.length) % imagenes.length; // Asegura que el índice se mantenga dentro del rango
  // Si currentImg es menor que 0, se ajusta al final del array
  // Esto permite que el carrusel sea cíclico
  // Por ejemplo, si currentImg es 0 y se hace clic en el botón izquierdo, se ajusta a imagenes.length - 1
  // Si currentImg es 1 y se hace clic en el botón izquierdo, se ajusta a 0 y asa
  showImage(currentImg);
}); // Funcion del btn izquierdo

rightBtn.addEventListener('click', () => {
  currentImg = (currentImg + 1) % imagenes.length; // Lo mismo pero para el botón derecho, no lo voy a explicar de nuevo, que paja
  showImage(currentImg);
}); // Funcion del btn derecho

// Inicializar imagen
showImage(currentImg);

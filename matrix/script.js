// Inicializa el canvas
var canvas = document.querySelector('canvas'),
    ctx = canvas.getContext('2d');

// Establecer el ancho y la altura del lienzo.
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Configuración de las letras
var letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZ';
letters = letters.split('');

// Configuración de las columnas
var fontSize = 10,
    columns = canvas.width / fontSize;

// Configuración de las gotas
var drops = [];
for (var i = 0; i < columns; i++) {
  drops[i] = 1;
}

// Configuración de la función de dibujar
function draw() {
  ctx.fillStyle = 'rgba(0, 0, 0, .1)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  for (var i = 0; i < drops.length; i++) {
    var text = letters[Math.floor(Math.random() * letters.length)];
    ctx.fillStyle = '#0f0';
    ctx.fillText(text, i * fontSize, drops[i] * fontSize);
    drops[i]++;
    if (drops[i] * fontSize > canvas.height && Math.random() > .95) {
      drops[i] = 0;
    }
  }
}

// Bucle de la animación
setInterval(draw, 33);
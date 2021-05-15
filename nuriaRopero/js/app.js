const uno = document.getElementById('cuadro');
const dos = document.getElementById('cuadro2');
const tres = document.getElementById('cuadro3');
const cuatro = document.getElementById('cuadro4');
const cinco = document.getElementById('cuadro5');


const matriz = document.getElementById('matriz');
const actual = document.getElementById('actual');
const masuno = document.getElementById('masuno');
const masdos = document.getElementById('masdos');
const mastres = document.getElementById('mastres');


matriz.addEventListener('click', function() {
    uno.style.display = 'block';
    dos.style.display = 'none';
    tres.style.display = 'none';
    cuatro.style.display = 'none';
    cinco.style.display = 'none';
});

actual.addEventListener('click', function() {
    uno.style.display = 'none';
    dos.style.display = 'block';
    tres.style.display = 'none';
    cuatro.style.display = 'none';
    cinco.style.display = 'none';
});

masuno.addEventListener('click', function() {
    uno.style.display = 'none';
    dos.style.display = 'none';
    tres.style.display = 'block';
    cuatro.style.display = 'none';
    cinco.style.display = 'none';
});

masdos.addEventListener('click', function() {
    uno.style.display = 'none';
    dos.style.display = 'none';
    tres.style.display = 'none';
    cuatro.style.display = 'block';
    cinco.style.display = 'none';
});

mastres.addEventListener('click', function() {
    uno.style.display = 'none';
    dos.style.display = 'none';
    tres.style.display = 'none';
    cuatro.style.display = 'none';
    cinco.style.display = 'block';
});

